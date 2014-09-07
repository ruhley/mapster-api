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
 * @since         0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Utility\Inflector;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = ['Paginator', 'RequestHandler'];

	public function index() {
		$this->enableCors();
		$settings = $this->getPaginatorSettings();
		$this->returnSuccess($this->getModel()->find('all', $settings)->contain($settings['contains']));
	}

	public function view($id = null) {
		$this->enableCors();
		$this->returnSuccess($this->getInstance($id));
	}

	public function add() {
		$this->enableCors();
		$model = $this->getModel();
		$entity = $model->newEntity($this->parseData($this->request->data));

		if ($this->request->is('post')) {
			if ($instance = $model->save($entity)) {
				$this->saveVersion($instance->id);
				$this->returnSuccess($instance);
			} else {
				$this->returnError($entity->errors());
			}
		}
	}

	public function edit($id = null) {
		$this->enableCors();
		$model = $this->getModel();
		$instance = $this->getInstance($id);

		$this->saveVersion($id);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$instance = $model->patchEntity($instance, $this->parseData($this->request->data));
			if ($model->save($instance)) {
				$this->returnSuccess($instance);
			} else {
				$this->returnError($entity->errors());
			}
		}
	}


	public function delete($id = null) {
		$this->enableCors();
		$model = $this->getModel();
		$instance = $this->getInstance($id);

		$this->request->allowMethod('post', 'delete');
		if ($model->delete($instance)) {
			$this->returnSuccess(null, 'The entity has been deleted.');
		} else {
			$this->returnError(null, 'The entity could not be deleted. Please, try again.');
		}
	}

	protected function returnSuccess($data = null, $message = '') {
		$this->set([
			'status' => true,
			'data' => $data,
			'message' => $message,
			'_serialize' => ['status', 'data', 'message']
		]);
	}

	protected function returnError($data = null, $message = '') {
		$this->set([
			'status' => false,
			'data' => $data,
			'message' => $message,
			'_serialize' => ['status', 'data', 'message']
		]);
	}



	protected function getModelName() {
		return $this->modelClass;
	}

	protected function getModelNameSingular() {
		return Inflector::singularize($this->getModelName());
	}

	protected function getModel() {
		$modelName = $this->getModelName();
		return $this->$modelName;
	}

	protected function getInstance($id) {
		$model = $this->getModel();
		return $model->get($id);
	}

	protected function getAssociations() {
		$model = $this->getModel();
		return $model->associations();
	}

	protected function hasVersion() {
		$associations = $this->getAssociations();

		foreach ($associations->keys() as $association) {
			if (strpos($association, 'versions')) {
				return $association;
			}
		}

		return false;
	}

	protected function saveVersion($id) {
		$version = $this->hasVersion();
		if ($version !== false) {
			$associatedModel = $this->getModel()->$version;
			$data = $this->parseData($this->request->data, $associatedModel->name());
			$data[strtolower($this->getModelNameSingular()).'_id'] = $id;
			$entity = $associatedModel->newEntity($data);
			if (!$associatedModel->save($entity)) {
				debug($entity->errors());
				exit;
			}
		}
	}

	protected function enableCors() {
		$this->response->header('Access-Control-Allow-Origin', '*');
		$this->response->header('Access-Control-Allow-Headers', 'Content-Type');
	}

	protected function getPaginatorSettings() {
		$fields = isset($_REQUEST['fields']) ? explode(',', $_REQUEST['fields']) : [];
		$order = isset($_REQUEST['order']) ? explode(',', $_REQUEST['order']) : [];
		$conditions = isset($_REQUEST['conditions']) ? explode(',', $_REQUEST['conditions']) : [];
		$contains = isset($_REQUEST['contains']) ? explode(',', $_REQUEST['contains']) : [];

		$settings = [
			'fields' => $fields,
			'order' => [],
			'conditions' => $conditions,
			'contains' => $contains
		];


		foreach ($order as $ord) {
			$ord = explode('|', $ord);

			if (count($ord) == 1) {
				array_push($ord, 'asc');
			}

			$settings['order'][$ord[0]] = $ord[1];
		}

		return $settings;
	}

	protected function parseData($data, $modelName = '') {
		if ($modelName == '') {
			$modelName = strtolower($this->getModelNameSingular());
			$parentModelName = '';
		} else {
			$parentModelName = strtolower($this->getModelNameSingular());
		}

		$filename = uniqid();
		$imageFolder = WWW_ROOT.DS.'img'.DS.$modelName.DS;
		$webFolder = 'http' . (($_SERVER['SERVER_PORT'] == 443) ? 's' : '').'://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['REQUEST_URI']).'/img/'.$modelName.'/';

		if (!file_exists($imageFolder)) {
			mkdir($imageFolder);
		}

		if (array_key_exists($modelName, $data)) {
			$data = $data[$modelName];
		} else if (array_key_exists($parentModelName, $data)) {
			$data = $data[$parentModelName];
		}

		foreach ($data as $key => $item) {
			if (in_array($key, ['image']) && strpos($item, 'data:image/') === 0) {
				preg_match('/data\:image\/([^\;]*)/', $item, $matches);
				$extension = $matches[1];
				file_put_contents($imageFolder.$filename.'.'.$extension, base64_decode(str_replace('data:image/'.$extension.';base64', '', $item)));
				$data[$key] = $webFolder.$filename.'.'.$extension;
				$this->createThumbs($imageFolder.$filename.'.'.$extension);
			}
		}

		return $data;
	}

	protected function createThumbs($src) {
		$sizes = ['tiny' => 30, 'small' => 50, 'medium' => 100, 'large' => 200, 'massive' => 500];
		$fileInfo = pathinfo($src);

		foreach ($sizes as $size => $dimension) {
			$this->resizeImage($src, str_replace('.'.$fileInfo['extension'], '-'.$size.'.'.$fileInfo['extension'], $src), $dimension, $dimension);
		}
	}

	protected function resizeImage($src, $dest, $newWidth, $newHeight, $forceDimensions = false) {
		$imageDetails = getimagesize($src);
		$original = array(
			'width' => $imageDetails[0],
			'height' => $imageDetails[1],
		);

		// get aspect ratio new width and height
		if ($forceDimensions) {
			$new = array(
				'width' => $newWidth,
				'height' => $newHeight
			);
		} else {
			if ($original['width'] > $original['height'])
			{
				$new = array(
					'width' => $newWidth,
					'height' => intval($original['height'] * $newWidth / $original['width'])
				);
			}
			else
			{
				$new = array(
					'width' => intval($original['width'] * $newHeight / $original['height']),
					'height' => $newHeight
				);
			}
		}


		$position = array(
			'x' => 0,
			'y' => 0
		);


		if ($imageDetails[2] == 1)
		{
			$imgt = 'ImageGIF';
			$imgcreatefrom = 'ImageCreateFromGIF';
		}
		else if ($imageDetails[2] == 2)
		{
			$imgt = 'ImageJPEG';
			$imgcreatefrom = 'ImageCreateFromJPEG';
		}
		else if ($imageDetails[2] == 3)
		{
			$imgt = 'ImagePNG';
			$imgcreatefrom = 'ImageCreateFromPNG';
		}

		if ($imgt) {
			$old_image = $imgcreatefrom($src);
			$new_image = imagecreatetruecolor($new['width'], $new['height']);

			switch ($imageDetails[2]) {
				case 1:
					// integer representation of the color black (rgb: 0,0,0)
					$background = imagecolorallocate($new_image, 0, 0, 0);
					// removing the black from the placeholder
					imagecolortransparent($simage, $background);

				break;
				case 3:
					// integer representation of the color black (rgb: 0,0,0)
					$background = imagecolorallocate($new_image, 0, 0, 0);
					// removing the black from the placeholder
					imagecolortransparent($new_image, $background);

					// turning off alpha blending (to ensure alpha channel information
					// is preserved, rather than removed (blending with the rest of the
					// image in the form of black))
					imagealphablending($new_image, false);

					// turning on alpha channel information saving (to ensure the full range
					// of transparency is preserved)
					imagesavealpha($new_image, true);

				break;

			}

			imagecopyresized($new_image, $old_image, $position['x'], $position['y'], 0, 0, $new['width'], $new['height'], $original['width'], $original['height']);
			$imgt($new_image, $dest);
		}
	}
}
