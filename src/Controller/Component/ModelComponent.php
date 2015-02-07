<?php

	namespace App\Controller\Component;

	use App\Controller\Component\AppComponent;
	use Cake\Utility\Inflector;
	use Cake\Core\Exception\Exception as CakeException;

	class ModelComponent extends AppComponent {
		public $components = ['Request'];

		public function getModelName() {
			return $this->controller->modelClass;
		}

		public function getModelNameSingular() {
			return Inflector::singularize($this->getModelName());
		}

		public function getModel() {
			$modelName = $this->getModelName();
			return $this->controller->$modelName;
		}

		public function getInstance($id) {
			$model = $this->getModel();
			return $model->get($id);
		}

		public function getAssociations() {
			$model = $this->getModel();
			return $model->associations();
		}

		public function getAssociationNames($includeVersions = true) {
			$associations = $this->getAssociations()->keys();
			$response = array();

			if ($includeVersions) {
				return $associations;
			}

			foreach ($associations as $association) {
				if (strpos($association, 'version') === false) {
					array_push($response, $association);
				}
			}

			return $response;
		}

		public function hasVersion() {
			$associations = $this->getAssociationNames();

			foreach ($associations as $association) {
				if ($association == strtolower($this->getModelNameSingular()).'versions') {
					return $association;
				}
			}

			return false;
		}

		public function saveVersion($id) {
			$version = $this->hasVersion();

			if ($version !== false) {
				$associatedModel = $this->getModel()->$version;
				$data = $this->Request->parseData($this->controller->request->data, $associatedModel->name());
				$data[strtolower($this->getModelNameSingular()).'_id'] = $id;
				$entity = $associatedModel->newEntity($data);
				if (!$associatedModel->save($entity)) {
					throw new CakeException($entity->errors());
				}
			}
		}
	}

?>