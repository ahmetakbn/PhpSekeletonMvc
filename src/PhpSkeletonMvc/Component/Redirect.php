<?php

namespace PhpSkeletonMvc\Component;

/**
 * Makes redirections
 * 
 * @author Ahmet Akbana
 */
class Redirect{
	
	/**
	 * Redirects to default controller(BASE_URL)
	 */
	public static function toIndex()
	{
		header("location: " .BASE_URL);
	}
		
	/**
	 * Redirects to a spesific controller and method
	 * 
	 * @param string $path
	 */
	public static function to($path)
	{
		header("location: ".BASE_URL.$path);
	}
}
