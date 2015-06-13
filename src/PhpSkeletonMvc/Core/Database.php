<?php

namespace PhpSkeletonMvc\Core;

use PDO;

/**
 * Base database class. Connects to database by using PDO with config values
 * 
 * @author Ahmet Akbana
 */
class Database Extends PDO
{
	/**
	 * Connects database by PDO
	 */
	function __construct()
	{
		parent::__construct(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
	}
}