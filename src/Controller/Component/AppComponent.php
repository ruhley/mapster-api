<?php

	namespace App\Controller\Component;

	use Cake\Controller\Component;
	use Cake\Event\Event;

	class AppComponent extends Component {
		public function beforeFilter(Event $event) {
			$this->controller = $this->_registry->getController();
		}
	}

?>