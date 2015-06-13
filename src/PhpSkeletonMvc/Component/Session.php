<?php

namespace PhpSkeletonMvc\Component;

/**
 * Inits, destroys session, adds, gets from session and checks if user logged in
 * 
 * @author Ahmet Akbana
 */
class Session{
	
	/**
     * Starts the session
     */
    public static function init()
    {
        // if no session exist, starts the session
        if (session_id() == '') {
            session_start();
        }
    }
	
	/**
	 * Adds value with a spesific key to the session
	 */
	public static function add($key, $value)
    {
        $_SESSION[$key] = $value;
    }
	
	/**
	 * Gets session info by key
	 * 
	 * @param string $key
	 * @return session info or false
	 */
	public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }else{
        	return false;
        }
    }
	
    /**
     * Destroys the session 
     */
    public static function destroy()
    {
        session_destroy();
    }
	
	/**
	 * Checks if user logged in or not
	 * 
	 * @return boolean
	 */
	public static function checkUserLogin()
    {
		if(isset($_SESSION['user_login']) && $_SESSION['user_login'] === TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
    }
}
