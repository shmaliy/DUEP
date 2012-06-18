<?php

class Staff_AdminStudentsController extends Sunny_Controller_Action
{	
	public function init()
	{
		parent::init();
		
		// Add actions wich can work with ajax
		$context = $this->_helper->AjaxContext();
		$context->addActionContext('index', 'json');		
		$context->addActionContext('edit', 'json');		
		$context->addActionContext('delete', 'json');		
		$context->addActionContext('set-limit', 'json');		
		$context->addActionContext('set-page', 'json');		
		$context->addActionContext('set-filter', 'json');		
		$context->initContext('json');
	}
	
	public function indexAction()
    {
    	// Get request
    	$request = $this->getRequest();
    	
    	$session = $this->getSession();
    	$this->view->page   = $session->{self::SESSION_PAGE};
    	$this->view->rows   = $session->{self::SESSION_ROWS};
    	
    	$mapper = new Staff_Model_Mapper_Staff();
    	$this->view->rowset = $mapper->getAdminPageStudents();
    	$this->view->total  = $mapper->getAdminTotalStudents();
    	    	
    	// TODO: get users by staff
    	// TODO: get users groups by users
    }
    
    public function editAction()
    {
    	$request = $this->getRequest();
		$mapper  = new Staff_Model_Mapper_Staff();
    	
		$id = $this->getRequest()->getParam('id', 'new');
    	
		// Setup form valid action
		$form = new Staff_Form_StudentEdit();
    	$form->setAction($this->_helper->url->simple('edit', 'admin-students', 'staff'));
    	
    	// Processing _POST
    	if ($request->isXmlHttpRequest() || $request->isPost()) {
    		if ($form->isValid($request->getParams())) {
    			// Save data
    			$staff = $mapper->createEntity($form->getStaffValues());
    			$mapper->save($staff);
    			// TODO: staff extensions save
    			
    			if (!$request->isXmlHttpRequest()) {
    				$this->_helper->redirector->gotoSimple('index', 'admin-students', 'staff');
    			} else {
    				$this->view->redirectTo = $this->view->simpleUrl('index', 'admin-students', 'staff');
    			}
    		} else {
    			// Return errors
    			$this->view->formErrors        = $form->getErrors();
    			$this->view->formErrorMessages = $form->getErrorMessages();
    		}
    	} else {
    		// If _GET render form
    		if ($id != 'new') {
    			$staff = $mapper->findByPrimaryKey($id);
    			$form->setDefaults($staff->toArray());
    			// TODO: staff extensions getting
    		}
    		
    		$this->view->form = $form;
    	}
    }
    
    public function deleteAction()
    {
    	$request = $this->getRequest();
    	$mapper  = new Staff_Model_Mapper_Staff();
    	$staff   = $mapper->findByPrimaryKey($request->getParam);
    }
    
    public function setPageAction()
    {
    	$session = $this->getSession();
    	$page    = $this->getRequest()->getParam(self::SESSION_PAGE, 1);
    	$session->{self::SESSION_PAGE} = $page;
    }
    
    public function setLimitAction()
    {
    	$session = $this->getSession();
    	$rows    = $this->getRequest()->getParam(self::SESSION_ROWS, 20);
    	$session->{self::SESSION_PAGE} = 1;
    	$session->{self::SESSION_ROWS} = $rows;
    }
    
    public function setFilterAction()
    {
    	$session = $this->getSession();
    	$filter  = $this->getRequest()->getParam(self::SESSION_ROWS, array());
    	$session->{self::SESSION_PAGE} = 1;
    	$session->{self::SESSION_ROWS} = $filter;
    }
}
