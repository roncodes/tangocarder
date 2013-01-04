<?php
class Load {
	
	function __construct() {}
	
	/* 
	 * This will load an html view, and allow user to pass in variables
	 */
	public function view($view = NULL, $variables = array(), $return_html = false)
	{
		if($view == NULL) {
			return;
		}
		extract($variables);
		if($return_html == false) {
			include(APP_DIR . '/views/' . $view . '.php');
		} else {
			return file_get_contents(APP_DIR . '/views/' . $view . '.php');
		}
	}
	
	/* 
	 * Load from the library directory
	 */
	// public function library($name = NULL)
	// {
		// include(APP_DIR . '/library/' . $name . '.php');
	// }
	
}