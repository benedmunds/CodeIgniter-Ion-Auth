<?php
 
if (!function_exists ( 'startsWith' )){
	function startsWith($haystack, $needle)
	{
		if(!is_string($haystack) || empty($haystack)) return false;
		if(!is_string($needle) || empty($needle)) return false;
		
		return !strncmp($haystack, $needle, strlen($needle));
	}
}

if (!function_exists ( 'endsWith' )){
	function endsWith($haystack, $needle)
	{
		if(!is_string($haystack) || empty($haystack)) return false;
		if(!is_string($needle) || empty($needle)) return false;
		
		$length = strlen($needle);
	
		return (substr($haystack, -$length) === $needle);
	}
}