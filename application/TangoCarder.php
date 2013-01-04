<?php
/*
 * Tango Carder
 * An example web app by Ron
 * Will be a simple wizard that allows the user to 
 * send redeem and gift random value tango card's 
 * within their budget to random people they suggest
 */
 
 class Tango_Carder {
	
	public $data = array();
 
	function __construct() 
	{
		if(!isset($_GET['controller'])) {
			$_GET['controller'] = DEFAULT_CONTROLLER;
			$_GET['method'] = 'index';
		}
		
		/* Default variables for view/layout */
		$this->data['meta_title'] = 'Tango Carder | ' . ucfirst($_GET['controller']);

		/* Pre load helpers, if any */
		foreach(glob(APP_DIR . '/helpers/*.php') as $helper) 
		{  
			include($helper);
		}

		/* Pre load all controllers available */
		foreach(glob(APP_DIR . '/controllers/*.php') as $controller_file) 
		{  
			include($controller_file);
			$controller_name = get_class_name_from_file($controller_file);
			$object_name = strtolower($controller_name);
			$this->$object_name = new $controller_name;
			if(!isset($this->$object_name->data)) {
				$this->$object_name->data = $this->data;
			} else {
				$this->$object_name->data = array_merge($this->data, $this->$object_name->data);
			}
		}
		
		/* Load interface and run app */
		$controller = strtolower($_GET['controller']);
		$method = strtolower($_GET['method']);
		
		/* Execute */
		$this->$controller->$method();
		$this->load->view('layout/application', array_merge($this->data, array('yield' => $this->load->view($controller . '/' . $method, $this->$controller->data, true))));

	}
	
	public function _api() {}
	
}

$app = new Tango_Carder;