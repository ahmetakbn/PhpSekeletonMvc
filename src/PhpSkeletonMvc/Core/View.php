<?php

namespace PhpSkeletonMvc\Core;

/**
 * Renders view file which is sent from controller
 * 
 * @author Ahmet Akbana
 */
class View{
	
	/**
	 * Renders view file and sends parameters to view
	 * 
	 * @param string $fileName
	 * @param array $viewData
	 */
	public function __construct($fileName, Array $viewData = null)
    {
        if ($viewData) {
            foreach ($viewData as $key => $value) {
                $this->{$key} = $value;
            }
        }
		
        require __DIR__.'/../../'.BASE_MODULE.'/View/Layout/header.php';
        require __DIR__.'/../../'.CURRENT_MODULE.'/View/'.$fileName.'.php';
        require __DIR__.'/../../'.BASE_MODULE.'/View/Layout/footer.php';
    }
}
