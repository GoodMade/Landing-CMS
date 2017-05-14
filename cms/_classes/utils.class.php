<?php

/**
* The support Class
*/
class Utils
{
	
	public static function redirect($url)
	{

		header("Location: $url", true);

		exit();

	}

	public static function render($template, $vars)
	{

		$template = ROOT_PATH . "/cms/_templates/$template";

		ob_start();
			include($template);
			$result = ob_get_contents();
		ob_get_clean();

		return $result;

	}

	public static function renderIndex($content, $message)
	{
		return self::render(
			'index.html',
			 array(
			 	'content' => isset($content) ? $content : null,
			 	'error_message' => isset($message['error_message']) ? $message['error_message'] : null,
			 	'success_message' => isset($message['success_message']) ? $message['success_message'] : null
			 )
		);
	}

	public static function getRandomString($length = 10)
	{
		return substr( sha1( rand() ), $length);
	}

}

?>