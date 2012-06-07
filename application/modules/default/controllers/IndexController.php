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
    	
    }
	
    /**
     * Config page
     */
	public function configAction()
    {
    	$request = $this->getRequest();
    	$formAdminConfig = new Application_Form_AdminConfig();
    	$adminConfig = new Default_Model_AdminConfig();
    	
    	if ($request->isXmlHttpRequest() || $request->isPost()) {
    		if ($formAdminConfig->isValid($request->getParams())) {
    			$adminConfig->save($formAdminConfig->getValues());
    			$this->view->error = 'ok';
    		} else {
    			$this->view->error = $formAdminConfig->getErrors();
    		}
    	} else {
    		$this->view->formAdminConfig = $formAdminConfig->setDefaults($adminConfig->load());
    	}
    }
}
