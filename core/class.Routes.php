<?php 

class Routes {

	public function base_url()
	{
		$url = "http://localhost/_niceurl/";
		return $url;
	}
	
	public function segment($value){
		$currentURL = $_SERVER["REQUEST_URI"];
		$uri = explode('/', $currentURL);
		return $uri[$value];
	}

}