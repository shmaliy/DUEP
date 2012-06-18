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
		
		// Add actions wich can work with ajax
		$context = $this->_helper->AjaxContext();
		$context->addActionContext('index', 'json');		
		$context->initContext('json');
	}
	
	public function indexAction()
    {
    	$request = $this->getRequest();
		$view    = $this->view;
    	
    	$view->page = $request->getParam('page', 1);
    	$view->sidx = $request->getParam('sidx', 'ordering');
    	$view->rows = $request->getParam('rows');
    	
    	$usersMapper  = new Users_Model_Mapper_Users();
    	$collection   = $usersMapper->fetchPage(null, $view->sidx, $view->rows, $view->page);
    	$view->rowset = $collection->toArray();	    	
    	$view->total  = $usersMapper->fetchCount();
    	
    	//$groups = $usersMapper->getUsersGroupsByIdArray($collection->getIdentifiers());
    	//var_export($groups);
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
