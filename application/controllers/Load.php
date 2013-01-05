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
			ob_start();
			include APP_DIR . '/views/' . $view . '.php';
			$template = ob_get_contents();
			ob_end_clean();
			return $template;
		}
	}
	
}