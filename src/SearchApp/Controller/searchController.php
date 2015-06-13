<?php

namespace SearchApp\Controller;

use PhpSkeletonMvc\Core\BaseController;
use PhpSkeletonMvc\Core\View;

use SearchApp\Filter\SearchFilter;
use SearchApp\Model\SearchModel;

/**
 * Search Controller. Contains search actions
 * 
 * @author Ahmet Akbana
 */
class searchController extends BaseController{
	
	/**
	 * Default method of search controller
	 * 
	 * @return View
	 */
	public function indexAction()
	{
		$query = '';
		$result = '';
		
		if(isset($_POST['search'])){
			$query = $_POST['query'];
			
			$searchFilter = new SearchFilter();
			$query = $searchFilter->filter($query);
			
			$searchModel = new SearchModel();
			$result = $searchModel->search($query);
		}
		
		return new View('search', array(
			'userLogin' => $this->userLogin, 'query' => $query, 'result' => $result
		));
	}
	
}
