<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.4
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Controller\Controller;
use Cake\Core\App;
use Cake\Core\Configure;
use Cake\Error\Exception;
use Cake\Event\Event;
use Cake\Network\Response;
use Cake\Routing\Router;
use Cake\Utility\Error\XmlException;
use Cake\Utility\Inflector;
use Cake\Utility\Xml;

/**
 * Request object for handling alternative HTTP requests
 *
 * Alternative HTTP requests can come from wireless units like mobile phones, palmtop computers,
 * and the like. These units have no use for Ajax requests, and this Component can tell how Cake
 * should respond to the different needs of a handheld computer and a desktop machine.
 *
 * @link http://book.cakephp.org/2.0/en/core-libraries/components/request-handling.html
 */
class RequestHandlerComponent extends Component {

/**
 * Determines whether or not callbacks will be fired on this component
 *
 * @var bool
 */
	public $enabled = true;

/**
 * Holds the reference to Controller::$request
 *
 * @var \Cake\Network\Request
 */
	public $request;

/**
 * Holds the reference to Controller::$response
 *
 * @var \Cake\Network\Response
 */
	public $response;

/**
 * Contains the file extension parsed out by the Router
 *
 * @var string
 * @see Router::parseExtensions()
 */
	public $ext = null;

/**
 * The template to use when rendering the given content type.
 *
 * @var string
 */
	protected $_renderType = null;

/**
 * Default config
 *
 * These are merged with user-provided config when the component is used.
 *
 * - `checkHttpCache` - Whether to check for http cache.
 * - `viewClassMap` - Mapping between type and view class.
 *
 * @var array
 */
	protected $_defaultConfig = [
		'checkHttpCache' => true,
		'viewClassMap' => '',
	];

/**
 * A mapping between extensions and deserializers for request bodies of that type.
 * By default only JSON and XML are mapped, use RequestHandlerComponent::addInputType()
 *
 * @var array
 */
	protected $_inputTypeMap = array(
		'json' => array('json_decode', true)
	);

/**
 * A mapping between type and viewClass. By default only JSON, XML, and AJAX are mapped.
 * Use RequestHandlerComponent::viewClassMap() to manipulate this map.
 *
 * @var array
 */
	protected $_viewClassMap = array(
		'json' => 'Json',
		'xml' => 'Xml',
		'ajax' => 'Ajax'
	);

/**
 * Constructor. Parses the accepted content types accepted by the client using HTTP_ACCEPT
 *
 * @param ComponentRegistry $collection ComponentRegistry object.
 * @param array $config Array of config.
 */
	public function __construct(ComponentRegistry $collection, array $config = array()) {
		parent::__construct($collection, $config);
		$this->addInputType('xml', array(array($this, 'convertXml')));

		$Controller = $collection->getController();
		$this->request = $Controller->request;
		$this->response = $Controller->response;
	}

/**
 * Events supported by this component.
 *
 * @return array
 */
	public function implementedEvents() {
		return [
			'Controller.initialize' => 'initialize',
			'Controller.startup' => 'startup',
			'Controller.beforeRender' => 'beforeRender',
			'Controller.beforeRedirect' => 'beforeRedirect',
		];
	}

/**
 * Checks to see if a specific content type has been requested and sets RequestHandler::$ext
 * accordingly. Checks the following in order: 1. The '_ext' value parsed by the Router. 2. A specific
 * AJAX type request indicated by the presence of a header. 3. The Accept header. With the exception
 * of an ajax request indicated using the second header based method above, the type must have
 * been configured in {@link Cake\Routing\Router}.
 *
 * @param Event $event The initialize event that was fired.
 * @return void
 * @see Router::parseExtensions()
 */
	public function initialize(Event $event) {
		if (isset($this->request->params['_ext'])) {
			$this->ext = $this->request->params['_ext'];
		}
		if (empty($this->ext) && $this->request->is('ajax')) {
			$this->ext = 'ajax';
		}
		if (empty($this->ext) || in_array($this->ext, array('html', 'htm'))) {
			$this->_setExtension();
		}

		$classMap = $this->_config['viewClassMap'];
		if ($classMap) {
			$this->viewClassMap($classMap);
		}
	}

/**
 * Set the extension based on the accept headers.
 * Compares the accepted types and configured extensions.
 * If there is one common type, that is assigned as the ext/content type for the response.
 * The type with the highest weight will be set. If the highest weight has more
 * than one type matching the extensions, the order in which extensions are specified
 * determines which type will be set.
 *
 * If html is one of the preferred types, no content type will be set, this
 * is to avoid issues with browsers that prefer html and several other content types.
 *
 * @return void
 */
	protected function _setExtension() {
		$accept = $this->request->parseAccept();
		if (empty($accept)) {
			return;
		}

		$accepts = $this->response->mapType($accept);
		$preferedTypes = current($accepts);
		if (array_intersect($preferedTypes, array('html', 'xhtml'))) {
			return;
		}

		$extensions = Router::extensions();
		foreach ($accepts as $types) {
			$ext = array_intersect($extensions, $types);
			if ($ext) {
				$this->ext = current($ext);
				break;
			}
		}
	}

/**
 * The startup method of the RequestHandler enables several automatic behaviors
 * related to the detection of certain properties of the HTTP request, including:
 *
 * - If Router::parseExtensions() is enabled, the layout and template type are
 *   switched based on the parsed extension or Accept-Type header. For example, if `controller/action.xml`
 *   is requested, the view path becomes `app/View/Controller/xml/action.ctp`. Also if
 *   `controller/action` is requested with `Accept-Type: application/xml` in the headers
 *   the view path will become `app/View/Controller/xml/action.ctp`. Layout and template
 *   types will only switch to mime-types recognized by Cake\Network\Response. If you need to declare
 *   additional mime-types, you can do so using Cake\Network\Response::type() in your controllers beforeFilter()
 *   method.
 * - If a helper with the same name as the extension exists, it is added to the controller.
 * - If the extension is of a type that RequestHandler understands, it will set that
 *   Content-type in the response header.
 * - If the XML data is POSTed, the data is parsed into an XML object, which is assigned
 *   to the $data property of the controller, which can then be saved to a model object.
 *
 * @param Event $event The startup event that was fired.
 * @return void
 */
	public function startup(Event $event) {
		$controller = $event->subject();
		$controller->request->params['isAjax'] = $this->request->is('ajax');
		$isRecognized = (
			!in_array($this->ext, array('html', 'htm')) &&
			$this->response->getMimeType($this->ext)
		);

		if (!empty($this->ext) && $isRecognized) {
			$this->renderAs($controller, $this->ext);
		} elseif (empty($this->ext) || in_array($this->ext, array('html', 'htm'))) {
			$this->respondAs('html', array('charset' => Configure::read('App.encoding')));
		}

		foreach ($this->_inputTypeMap as $type => $handler) {
			if ($this->requestedWith($type)) {
				$input = call_user_func_array(array($controller->request, 'input'), $handler);
				$controller->request->data = $input;
			}
		}
	}

/**
 * Helper method to parse xml input data, due to lack of anonymous functions
 * this lives here.
 *
 * @param string $xml XML string.
 * @return array Xml array data
 */
	public function convertXml($xml) {
		try {
			$xml = Xml::build($xml);
			if (isset($xml->data)) {
				return Xml::toArray($xml->data);
			}
			return Xml::toArray($xml);
		} catch (XmlException $e) {
			return array();
		}
	}

/**
 * Handles (fakes) redirects for Ajax requests using requestAction()
 * Modifies the $_POST and $_SERVER['REQUEST_METHOD'] to simulate a new GET request.
 *
 * @param Event $event The Controller.beforeRedirect event.
 * @param string|array $url A string or array containing the redirect location
 * @param \Cake\Network\Response $response The response object.
 * @return void
 */
	public function beforeRedirect(Event $event, $url, Response $response) {
		if (!$this->request->is('ajax')) {
			return;
		}
		if (empty($url)) {
			return;
		}
		$_SERVER['REQUEST_METHOD'] = 'GET';
		foreach ($_POST as $key => $val) {
			unset($_POST[$key]);
		}
		if (is_array($url)) {
			$url = Router::url($url + array('base' => false));
		}
		$controller = $event->subject();
		$response->body($controller->requestAction($url, array('return', 'bare' => false)));
		$response->send();
		$response->stop();
	}

/**
 * Checks if the response can be considered different according to the request
 * headers, and the caching response headers. If it was not modified, then the
 * render process is skipped. And the client will get a blank response with a
 * "304 Not Modified" header.
 *
 * @param Event $event The Controller.beforeRender event.
 * @return bool false if the render process should be aborted
 */
	public function beforeRender(Event $event) {
		if ($this->_config['checkHttpCache'] && $this->response->checkNotModified($this->request)) {
			return false;
		}
	}

/**
 * Returns true if the current call accepts an XML response, false otherwise
 *
 * @return bool True if client accepts an XML response
 */
	public function isXml() {
		return $this->prefers('xml');
	}

/**
 * Returns true if the current call accepts an RSS response, false otherwise
 *
 * @return bool True if client accepts an RSS response
 */
	public function isRss() {
		return $this->prefers('rss');
	}

/**
 * Returns true if the current call accepts an Atom response, false otherwise
 *
 * @return bool True if client accepts an RSS response
 */
	public function isAtom() {
		return $this->prefers('atom');
	}

/**
 * Returns true if user agent string matches a mobile web browser, or if the
 * client accepts WAP content.
 *
 * @return bool True if user agent is a mobile web browser
 */
	public function isMobile() {
		return $this->request->is('mobile') || $this->accepts('wap');
	}

/**
 * Returns true if the client accepts WAP content
 *
 * @return bool
 */
	public function isWap() {
		return $this->prefers('wap');
	}

/**
 * Determines which content types the client accepts. Acceptance is based on
 * the file extension parsed by the Router (if present), and by the HTTP_ACCEPT
 * header. Unlike Cake\Network\Request::accepts() this method deals entirely with mapped content types.
 *
 * Usage:
 *
 * `$this->RequestHandler->accepts(array('xml', 'html', 'json'));`
 *
 * Returns true if the client accepts any of the supplied types.
 *
 * `$this->RequestHandler->accepts('xml');`
 *
 * Returns true if the client accepts xml.
 *
 * @param string|array $type Can be null (or no parameter), a string type name, or an
 *   array of types
 * @return mixed If null or no parameter is passed, returns an array of content
 *   types the client accepts. If a string is passed, returns true
 *   if the client accepts it. If an array is passed, returns true
 *   if the client accepts one or more elements in the array.
 */
	public function accepts($type = null) {
		$accepted = $this->request->accepts();

		if (!$type) {
			return $this->response->mapType($accepted);
		}
		if (is_array($type)) {
			foreach ($type as $t) {
				$t = $this->mapAlias($t);
				if (in_array($t, $accepted)) {
					return true;
				}
			}
			return false;
		}
		if (is_string($type)) {
			return in_array($this->mapAlias($type), $accepted);
		}
		return false;
	}

/**
 * Determines the content type of the data the client has sent (i.e. in a POST request)
 *
 * @param string|array $type Can be null (or no parameter), a string type name, or an array of types
 * @return mixed If a single type is supplied a boolean will be returned. If no type is provided
 *   The mapped value of CONTENT_TYPE will be returned. If an array is supplied the first type
 *   in the request content type will be returned.
 */
	public function requestedWith($type = null) {
		if (!$this->request->is('post') &&
			!$this->request->is('put') &&
			!$this->request->is('delete')
		) {
			return null;
		}
		if (is_array($type)) {
			foreach ($type as $t) {
				if ($this->requestedWith($t)) {
					return $t;
				}
			}
			return false;
		}

		list($contentType) = explode(';', $this->request->env('CONTENT_TYPE'));
		if ($contentType === '') {
			list($contentType) = explode(';', $this->request->header('CONTENT_TYPE'));
		}
		if (!$type) {
			return $this->response->mapType($contentType);
		}
		if (is_string($type)) {
			return ($type === $this->response->mapType($contentType));
		}
	}

/**
 * Determines which content-types the client prefers. If no parameters are given,
 * the single content-type that the client most likely prefers is returned. If $type is
 * an array, the first item in the array that the client accepts is returned.
 * Preference is determined primarily by the file extension parsed by the Router
 * if provided, and secondarily by the list of content-types provided in
 * HTTP_ACCEPT.
 *
 * @param string|array $type An optional array of 'friendly' content-type names, i.e.
 *   'html', 'xml', 'js', etc.
 * @return mixed If $type is null or not provided, the first content-type in the
 *    list, based on preference, is returned. If a single type is provided
 *    a boolean will be returned if that type is preferred.
 *    If an array of types are provided then the first preferred type is returned.
 *    If no type is provided the first preferred type is returned.
 */
	public function prefers($type = null) {
		$acceptRaw = $this->request->parseAccept();

		if (empty($acceptRaw)) {
			return $this->ext;
		}
		$accepts = $this->response->mapType(array_shift($acceptRaw));

		if (!$type) {
			if (empty($this->ext) && !empty($accepts)) {
				return $accepts[0];
			}
			return $this->ext;
		}

		$types = (array)$type;

		if (count($types) === 1) {
			if (!empty($this->ext)) {
				return in_array($this->ext, $types);
			}
			return in_array($types[0], $accepts);
		}

		$intersect = array_values(array_intersect($accepts, $types));
		if (empty($intersect)) {
			return false;
		}
		return $intersect[0];
	}

/**
 * Sets either the view class if one exists or the layout and template path of the view.
 * The names of these are derived from the $type input parameter.
 *
 * ### Usage:
 *
 * Render the response as an 'ajax' response.
 *
 * `$this->RequestHandler->renderAs($this, 'ajax');`
 *
 * Render the response as an xml file and force the result as a file download.
 *
 * `$this->RequestHandler->renderAs($this, 'xml', array('attachment' => 'myfile.xml');`
 *
 * @param Controller $controller A reference to a controller object
 * @param string $type Type of response to send (e.g: 'ajax')
 * @param array $options Array of options to use
 * @return void
 * @see RequestHandlerComponent::respondAs()
 */
	public function renderAs(Controller $controller, $type, array $options = array()) {
		$defaults = array('charset' => 'UTF-8');
		$view = null;
		$viewClassMap = $this->viewClassMap();

		if (Configure::read('App.encoding') !== null) {
			$defaults['charset'] = Configure::read('App.encoding');
		}
		$options += $defaults;

		if (array_key_exists($type, $viewClassMap)) {
			$view = $viewClassMap[$type];
		} else {
			$view = Inflector::classify($type);
		}
		$viewClass = App::className($view, 'View', 'View');

		if ($viewClass) {
			$controller->viewClass = $viewClass;
		} else {
			if (empty($this->_renderType)) {
				$controller->viewPath .= DS . $type;
			} else {
				$controller->viewPath = preg_replace(
					"/([\/\\\\]{$this->_renderType})$/",
					DS . $type,
					$controller->viewPath
				);
			}

			$this->_renderType = $type;
			$controller->layoutPath = $type;
		}

		if ($this->response->getMimeType($type)) {
			$this->respondAs($type, $options);
		}

		$helper = ucfirst($type);

		if (!in_array($helper, $controller->helpers) && empty($controller->helpers[$helper])) {
			$helperClass = App::className($helper, 'View/Helper', 'Helper');
			if ($helperClass) {
				$controller->helpers[] = $helper;
			}
		}
	}

/**
 * Sets the response header based on type map index name. This wraps several methods
 * available on Cake\Network\Response. It also allows you to use Content-Type aliases.
 *
 * @param string|array $type Friendly type name, i.e. 'html' or 'xml', or a full content-type,
 *    like 'application/x-shockwave'.
 * @param array $options If $type is a friendly type name that is associated with
 *    more than one type of content, $index is used to select which content-type to use.
 * @return bool Returns false if the friendly type name given in $type does
 *    not exist in the type map, or if the Content-type header has
 *    already been set by this method.
 */
	public function respondAs($type, array $options = array()) {
		$defaults = array('index' => null, 'charset' => null, 'attachment' => false);
		$options += $defaults;

		$cType = $type;
		if (strpos($type, '/') === false) {
			$cType = $this->response->getMimeType($type);
		}
		if (is_array($cType)) {
			if (isset($cType[$options['index']])) {
				$cType = $cType[$options['index']];
			}

			if ($this->prefers($cType)) {
				$cType = $this->prefers($cType);
			} else {
				$cType = $cType[0];
			}
		}

		if (!$type) {
			return false;
		}
		if (empty($this->request->params['requested'])) {
			$this->response->type($cType);
		}
		if (!empty($options['charset'])) {
			$this->response->charset($options['charset']);
		}
		if (!empty($options['attachment'])) {
			$this->response->download($options['attachment']);
		}
		return true;
	}

/**
 * Returns the current response type (Content-type header), or null if not alias exists
 *
 * @return mixed A string content type alias, or raw content type if no alias map exists,
 *	otherwise null
 */
	public function responseType() {
		return $this->response->mapType($this->response->type());
	}

/**
 * Maps a content type alias back to its mime-type(s)
 *
 * @param string|array $alias String alias to convert back into a content type. Or an array of aliases to map.
 * @return string Null on an undefined alias. String value of the mapped alias type. If an
 *   alias maps to more than one content type, the first one will be returned.
 */
	public function mapAlias($alias) {
		if (is_array($alias)) {
			return array_map(array($this, 'mapAlias'), $alias);
		}
		$type = $this->response->getMimeType($alias);
		if ($type) {
			if (is_array($type)) {
				return $type[0];
			}
			return $type;
		}
		return null;
	}

/**
 * Add a new mapped input type. Mapped input types are automatically
 * converted by RequestHandlerComponent during the startup() callback.
 *
 * @param string $type The type alias being converted, ie. json
 * @param array $handler The handler array for the type. The first index should
 *    be the handling callback, all other arguments should be additional parameters
 *    for the handler.
 * @return void
 * @throws \Cake\Error\Exception
 */
	public function addInputType($type, $handler) {
		if (!is_array($handler) || !isset($handler[0]) || !is_callable($handler[0])) {
			throw new Exception('You must give a handler callback.');
		}
		$this->_inputTypeMap[$type] = $handler;
	}

/**
 * Getter/setter for viewClassMap
 *
 * @param array|string $type The type string or array with format `array('type' => 'viewClass')` to map one or more
 * @param array $viewClass The viewClass to be used for the type without `View` appended
 * @return array|string Returns viewClass when only string $type is set, else array with viewClassMap
 */
	public function viewClassMap($type = null, $viewClass = null) {
		if (!$viewClass && is_string($type) && isset($this->_viewClassMap[$type])) {
			return $this->_viewClassMap[$type];
		}
		if (is_string($type)) {
			$this->_viewClassMap[$type] = $viewClass;
		} elseif (is_array($type)) {
			foreach ($type as $key => $value) {
				$this->viewClassMap($key, $value);
			}
		}
		return $this->_viewClassMap;
	}

}
