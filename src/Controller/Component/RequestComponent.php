<?php

	namespace App\Controller\Component;

	use App\Controller\Component\AppComponent;
	use Cake\Routing\Router;

	class RequestComponent extends AppComponent {
		public $components = ['Model', 'Image'];

		public function getPaginatorSettings() {
			$model = $this->Model->getModel();

			$settings = [
				'fields' => isset($_REQUEST['fields']) ? explode(',', $_REQUEST['fields']) : [],
				'order' => [],
				'conditions' => isset($_REQUEST['conditions']) ? explode(',', $_REQUEST['conditions']) : []
			];
			$contains = isset($_REQUEST['contains']) ? explode(',', $_REQUEST['contains']) : [];

			if (in_array('All', $contains)) {
				 $contains = $this->Model->getAssociationNames(false);
			}


			$order = isset($_REQUEST['order']) ? explode(',', $_REQUEST['order']) : [];
			foreach ($order as $ord) {
				$ord = explode('|', $ord);

				if (count($ord) == 1) {
					array_push($ord, 'asc');
				}

				$settings['order'][$ord[0]] = $ord[1];
			}

			foreach ($_REQUEST as $key => $value) {
				if ($model->hasField($key)) {
					array_push($settings['conditions'], $key.'="'.$value.'"');
				}
			}

			return array(
				'settings' => $settings,
				'contains' => $contains
			);
		}

		public function parseData($data, $modelName = '') {
			if ($modelName == '') {
				$modelName = $this->Model->getModelNameSingular();
				$parentModelName = '';
			} else {
				$parentModelName = strtolower($this->Model->getModelNameSingular());
			}

			$filename = uniqid();
			$imageFolder = WWW_ROOT.DS.'img'.DS.$modelName.DS;
			$webroot = Router::url('/', true);
			$webFolder = Router::url('/img/'.$modelName.'/', true);

			if (!file_exists($imageFolder)) {
				mkdir($imageFolder);
			}

			if (array_key_exists(lcfirst($modelName), $data)) {
				$data = $data[lcfirst($modelName)];
			} else if (array_key_exists($parentModelName, $data)) {
				$data = $data[$parentModelName];
			}

			foreach ($data as $key => $item) {
				if (in_array($key, ['image']) && $item != '') {
					// if base64 encoded
					if (strpos($item, 'data:image/') === 0) {
						preg_match('/data\:image\/([^\;]*)/', $item, $matches);
						$extension = strtolower($matches[1]);
						file_put_contents($imageFolder.$filename.'.'.$extension, base64_decode(str_replace('data:image/'.$extension.';base64', '', $item)));
						$data[$key] = $webFolder.$filename.'.'.$extension;
						$this->Image->createThumbs($imageFolder.$filename.'.'.$extension);
					// if from external url
					} else if (strpos($item, $webroot) === false) {
						$extension = explode('.', $item);
						$extension = strtolower(end($extension));
						if (getimagesize($item)) {
							file_put_contents($imageFolder.$filename.'.'.$extension, file_get_contents($item));
							$data[$key] = $webFolder.$filename.'.'.$extension;
							$this->Image->createThumbs($imageFolder.$filename.'.'.$extension);
						}
					}
				}
			}

			return $data;
		}
	}

?>