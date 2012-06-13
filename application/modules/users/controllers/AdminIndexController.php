<?php

class Users_AdminIndexController extends Sunny_Controller_Action
{	
	public function init()
	{
		$request = $this->getRequest();		
		if ($request->isXmlHttpRequest()) {
			// Forse ajax requests disable layout rendering
        	$this->_helper->layout()->disableLayout();			
		}
		
		// Setup session defaults
		$session = new Zend_Session_Namespace(get_class($this));
		
		// Add actions wich can work with ajax
		$context = $this->_helper->AjaxContext();
		$context->addActionContext('index', 'json');		
		$context->initContext('json');
	}
	
	public function indexAction()
    {
    	$request = $this->getRequest();
    	
    	// Get users list
    	$usersMapper = new Users_Model_Mapper_Users();
    	$this->view->collection = $usersMapper->fetchPage(
    		null,
    		$request->getParam('sidx', 'ordering'),
    		$request->getParam('rows'),
    		$request->getParam('page', 1)
    	);
    	$this->view->total = $usersMapper->fetchCount();
    	
    	// get rows
    	// get all ref for list
    }
    
    public function editAction()
    {
    	$request  = $this->getRequest();
    	$editForm = new Users_Form_Edit();
    	$editForm->setAction($this->_helper->url($request->getActionName()));
    	
    	if ($request->isXmlHttpRequest() || $request->isPost()) {
    		if ($editForm->isValid($request->getParams())) {
    			$usersMapper = new Users_Model_Mapper_Users();
    			$user = $usersMapper->create($request->getParams());
    			$usersMapper->save($user);
    		} else {
    			$this->view->editFormErrors = $editForm->getErrorMessages();
    		}
    	} else {
    		$this->view->editForm = $editForm;
    	}
    }
}
