<?php

	namespace App\Controller\Component;

	use App\Controller\Component\AppComponent;

	class ResponseComponent extends AppComponent {
		public $components = ['Model'];

		public function returnSuccess($data = null, $message = '') {
			$this->controller->set([
				'status' => true,
				'data' => $data,
				'message' => $message,
				'model' => $this->Model->getModelName(),
				'_serialize' => ['status', 'data', 'message', 'model']
			]);
		}

		public function returnError($data = null, $message = '') {
			$this->controller->response->statusCode(400);
			$this->controller->set([
				'status' => false,
				'data' => $data,
				'message' => $message,
				'model' => $this->Model->getModelName(),
				'_serialize' => ['status', 'data', 'message', 'model']
			]);
		}

		public function preflight() {
			$headers = [
				'Access-Control-Allow-Origin: *',
				'Access-Control-Allow-Methods: GET, POST, PUT, DELETE',
				'Access-Control-Allow-Headers: Accept, Content-Type'
			];

			if ($this->controller->request->is('options')) {
				header('HTTP/1.1 200 OK');

				foreach ($headers as $header) {
					header($header);
				}
				exit;
			}

			$this->controller->response->header($headers);
		}
	}

?>