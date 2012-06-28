<?php

class Users_AdminGroupsController extends Sunny_Controller_Action
{
	protected $_mapperName = 'Users_Model_Mapper_UsersGroups';
	
	public function init()
	{
		$this->_helper->layout->setLayout('admin-layout');
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
    	$request = $this->getRequest();
    	 
    	$session = $this->getSession();
    	$this->view->page   = $session->{self::SESSION_PAGE};
    	$this->view->rows   = $session->{self::SESSION_ROWS};
    	
    	$this->view->rowset = $this->_getMapper()->fetchPage();
    	$this->view->total  = $this->_getMapper()->fetchCount();
    	
    	$tree = $this->_getMapper()->fetchTree();
    	echo '<pre>';
    	//var_dump($tree);
    	echo '</pre>';
    	
    	$this->view->tree = $tree;
    	
    	
    }
	    
    public function editAction()
    {
    	$request = $this->getRequest();
		$mapper  = $this->_getMapper();
    	
    	// Setup form valid action
		$form = new Users_Form_UserGroupEdit();
    	$form->setAction($this->_helper->url->simple('edit', $this->_c, $this->_m));
    	
    	// Processing _POST
    	if ($request->isXmlHttpRequest() || $request->isPost()) {
    		if ($form->isValid($request->getParams())) {
    			// Save data
    			$entity = $mapper->createEntity($form->getValues());
    			$mapper->saveEntity($entity);
    			
    			if (!$request->isXmlHttpRequest()) {
    				$this->_helper->redirector->gotoSimple('index', $this->_c, $this->_m);
    			} else {
    				$this->view->redirectTo = $this->view->simpleUrl('index', $this->_c, $this->_m);
    			}
    		} else {
    			// Return errors
    			$this->view->formErrors        = $form->getErrors();
    			$this->view->formErrorMessages = $form->getErrorMessages();
    		}
    	} else {
    		// If _GET render form
			$id = $request->getParam('id', 'new');
    		if ($id != 'new') {
    			$entity = $mapper->findEntity($id);
    			if ($entity) {
    				$form->setDefaults($entity->toArray());
    			}
    		}
    		
    		$this->view->form = $form;
    	}
    }
    
    public function deleteAction()
    {
    	$request = $this->getRequest();
    	$mapper  = $this->_getMapper();
    	$entity  = $mapper->findEntity($request->getParam('id'));
    	$mapper->deleteEntity($entity);
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