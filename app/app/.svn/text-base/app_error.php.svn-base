<?php
class AppError extends ErrorHandler {
	function __construct($method, $messages) {
		Configure::write('debug', 1);
		parent::__construct($method, $messages);
	}
	
	function badInput($params) {
		$this->controller->set('problem', $params['problem']);
		$this->_outputMessage('bad_input');
	}
	
	function _outputMessage($template) {
		// force the XML layout to be used
		$this->controller->output = null;
		$this->controller->render('/errors/' . $template, 'xml');
		echo $this->controller->output;
	}
}	
?>