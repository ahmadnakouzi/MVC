<?php
/**
* 
*/
class Request
{
	/**
	* Return URL on calling getUrl function
	*/
	function getUrl()
	{
		if (isset($_SERVER["REQUEST_URI"])) {
			$url = $_SERVER["REQUEST_URI"];
			return $url;
		}	
	}

	/**
	*Split the recieved url to parameters
	*/
	function splitUrl($url)
	{
		$splitedUrl = rtrim($url, '/');
		$splitedUrl = explode('/Week10/MVC/v1/', $splitedUrl);

		return $splitedUrl;
	}
}