<?php

/*
* Bootstrap->__construct()
* Module_Bootstrap->__construct()
* Bootstrap->run()
*/

class Users_Bootstrap extends Zend_Application_Module_Bootstrap
{    
    public function __construct($application)
    {
    	parent::__construct($application);
    	$this->_afterConstruct();
    }
    
    protected function _afterConstruct()
    {
    	try {
    		$this->_setRouter();
    	} catch (Exception $e) {
    		echo $e->getMessage() . '<br /><br />';
    		echo nl2br($e->getTraceAsString());
    		exit();
    	}
    }

    protected function _setRouter()
    {
    	
    }
}
