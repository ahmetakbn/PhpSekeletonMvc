<?php

namespace SearchApp\Filter;

/**
 * Filters search input
 * 
 * @author Ahmet Akbana
 */
class SearchFilter{
	
	/**
	 * Removes html tags from string
	 * 
	 * @param string $query
	 * @return string $query
	 */
	public function filter($query)
	{
		if(!empty($query)){
			$query = filter_var($query, FILTER_SANITIZE_STRING);
		}
		
		return $query;
	}
	
}
