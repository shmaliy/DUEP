<?php

class IndexController extends Zend_Controller_Action
{	
	/**
	 * Prepare controller for work with ajax based requests
	 * 
	 * (non-PHPdoc)
	 * @see Zend_Controller_Action::init()
	 */
	public function init()
	{
		$request = $this->getRequest();
		
		if ($request->isXmlHttpRequest() || $request->isPost()) {
			// Both html or json ajax responses need to disable layout
        	$this->_helper->layout()->disableLayout();			
		}
		
		// Add actions wich can work with ajax
		$context = $this->_helper->AjaxContext();
		$context->addActionContext('index', 'json');
		
		$context->initContext('json');
	}
	
	/**
	 * Main page controller
	 * Generate questions form and procces it if ajax requested
	 */
	public function indexAction()
    {
    	$request = $this->getRequest();
    	$formAdminConfig = new Application_Form_AdminConfig();
    	
    	if ($request->isXmlHttpRequest() || $request->isPost()) {
    		if ($formAdminConfig->isValid($request->getParams())) {
    			$writer = new Zend_Config_Writer_Array();
    			$writer->setConfig(new Zend_Config($formAdminConfig->getValues()));
    			$writer->setFilename(APPLICATION_PATH . '/configs/siteconfig.php');
    			$writer->write();
    			$this->view->error = $formAdminConfig->getValues();
    		} else {
    			$this->view->error = $formAdminConfig->getErrors();
    		}
    	} else {
    		$config = new Zend_Config(require APPLICATION_PATH . '/configs/siteconfig.php');
    		$formAdminConfig->populate($config->toArray());
    		$this->view->formAdminConfig = $formAdminConfig;
    	}
    	
    	//$config = new Zend_Config(require APPLICATION_PATH . '/configs/config.php');
		//$writer = new Zend_Config_Writer_Array();
    	//$writer->setConfig($config);
    	//$writer->setFilename(APPLICATION_PATH . '/configs/config2.php');
    	//$writer->write();
    }
}
