<?php

class Users_IndexController extends Zend_Controller_Action
{	
	public function init()
	{
		$request = $this->getRequest();		
		if ($request->isXmlHttpRequest()) {
			// Forse ajax requests disable layout rendering
        	$this->_helper->layout()->disableLayout();			
		}
		
		// Add actions wich can work with ajax
		$context = $this->_helper->AjaxContext();
		$context->addActionContext('index', 'json');		
		$context->initContext('json');
	}
	
	public function indexAction()
    {
    	$this->view->editForm = new Users_Form_Edit();
    }
}
