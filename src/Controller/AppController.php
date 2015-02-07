<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 */
class AppController extends Controller {

	public $components = [
		//Cake Components
		'RequestHandler',
		//Custome Components
		'Request', 'Response', 'Model'
	];

	public function invokeAction() {
		parent::invokeAction();
	}

	public function beforeFilter(Event $event) {
		$this->RequestHandler->renderAs($this, 'json');
		$this->Response->preflight();
		parent::beforeFilter($event);
	}

	public function index() {
		$this->request->allowMethod(['get']);

		$settings = $this->Request->getPaginatorSettings();
		$this->Response->returnSuccess($this->Model->getModel()->find('all', $settings['settings'])->contain($settings['contains']));
	}

	public function view($id = null) {
		$this->request->allowMethod(['get']);

		$this->Response->returnSuccess($this->Model->getInstance($id));
	}

	public function add() {
		$this->request->allowMethod(['post']);

		$model = $this->Model->getModel();
		$entity = $model->newEntity($this->Request->parseData($this->request->data));

		$instance = $model->save($entity);

		if ($instance !== false) {
			$this->Model->saveVersion($instance->id);
			$this->Response->returnSuccess($instance, 'Item created successfully');
		} else {
			$this->Response->returnError($entity->errors(), 'There was a problem creating the item');
		}
	}

	public function edit($id = null) {
		$this->request->allowMethod(['put']);

		$model = $this->Model->getModel();
		$instance = $this->Model->getInstance($id);

		$this->Model->saveVersion($id);

		$instance = $model->patchEntity($instance, $this->Request->parseData($this->request->data));
		if ($model->save($instance)) {
			$this->Response->returnSuccess([], 'Item edited successfully');
		} else {
			$this->Response->returnError($entity->errors(), 'There was a problem editing the item');
		}
	}


	public function delete($id = null) {
		$this->request->allowMethod(['delete']);

		$model = $this->Model->getModel();
		$instance = $this->Model->getInstance($id);

		if ($model->delete($instance)) {
			$this->Response->returnSuccess(null, 'The item has been deleted.');
		} else {
			$this->Response->returnError(null, 'The item could not be deleted. Please, try again.');
		}
	}
}
?>