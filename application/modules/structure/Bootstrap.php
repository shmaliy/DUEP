<?php

/*
* Bootstrap->__construct()
* Module_Bootstrap->__construct()
* Bootstrap->run()
*/

class Structure_Bootstrap extends Zend_Application_Module_Bootstrap
{    
    public function __construct($application)
    {
    	parent::__construct($application);
    	$this->_afterConstruct();
    }
    
    protected function _afterConstruct()
    {
    	try {
    		$this->_setModels();
    		$this->_setRouter();
    	} catch (Exception $e) {
    		echo $e->getMessage() . '<br /><br />';
    		echo nl2br($e->getTraceAsString());
    		exit();
    	}
    }

    protected function _setModels()
    {
    	$loader = $this->getResourceLoader();
    	$loader->addResourceType('entities', 'models/Entity', 'Model_Entity');
    	$loader->addResourceType('collections', 'models/Collection', 'Model_Collection');
    	$loader->addResourceType('mappers', 'models/Mappers', 'Model_Mapper');
    }
    protected function _setRouter()
    {
    	$frontController = Zend_Controller_Front::getInstance();
    	$router = $frontController->getRouter();
    	//$router->setGlobalParam('lang', 'uk');
    	 
    	// Override default route
    	
    	/*  Mr. Fogg!!!! Please make the right order in the your's shitcode abowe!!!  */
    	
    	$router->addRoute(
    		'admin/structure', 
    		new Zend_Controller_Router_Route(
    	    	'structure/:controller/:action/*',
    			array(
    	    		'module' => 'structure'
    	    	)
    		)
    	);

    }
}
