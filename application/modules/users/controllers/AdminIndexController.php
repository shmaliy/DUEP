<?php

class Users_AdminIndexController extends Sunny_Controller_AdminAction
{	
	protected $_mapperName = 'Users_Model_Mapper_Users';
	
	protected $_filters = array('users_groups_id' => 0);
	
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
    	// VERSION 14.07.2012
		$filter            = $this->_getSessionFilter();
    	$this->view->page  = $this->_getSessionPage();
    	$this->view->rows  = $this->_getSessionRows();
		
		$where = array(
			'users_groups_id = ?' => $filter['users_groups_id']
		);
		$where = null; // TODO rewrite query
		
    	$this->view->rowset = $this->_getMapper()->fetchPage(
    		$where,
    		null,
    		$this->view->rows,
    		$this->view->page
		);
		$this->view->total  = $this->_getMapper()->fetchCount($where);
		
		$form = new Users_Form_AdminIndexFilter();
		$gruopsMapper = new Users_Model_Mapper_UsersGroups();
		$collection = $gruopsMapper->fetchTree(null, array('id', 'title', 'users_groups_id'));
		$options = $form->collectionToMultiOptions($collection, array(), array('Нет'));		
		$form->getElement('users_groups_id')->setMultiOptions($options);
		
		$form->setDefaults($filter);
		$form->setAction($this->view->simpleUrl('set-filter', $this->_c, $this->_m));
		$this->view->filter = $form;
    }
	    
    public function editAction()
    {
		// Version 14.07.2012
		$request = $this->getRequest();
		
		$id = $request->getParam('id');
		$form = new Users_Form_UserEdit();
		
		$groupsMapper = new Users_Model_Mapper_UsersGroups();
		$collection = $groupsMapper->fetchTree(null, array('id', 'title', 'users_groups_id'));
		$options = $form->collectionToMultiOptions($collection, array(), array('Нет'));		
		$form->getElement('users_groups_id')->setMultiOptions($options);		
		$form->setAction($this->view->simpleUrl('edit', $this->_c, $this->_m));
		
		if ($request->isXmlHttpRequest() || $request->isPost()) {
			if ($form->isValid($request->getParams())) {
				$entity = $this->_getMapper()->createEntity($form->getValues());
				$this->_getMapper()->saveEntity($entity);
				
				$this->_helper->flashMessenger->addMessage('<div class="notification-done">Saved success</div>');
				$this->_gotoUrl('index', $this->_c, $this->_m);
			} else {
    			$this->view->formErrors        = $form->getErrors();
    			$this->view->formErrorMessages = $form->getErrorMessages();
			}
		} else {
			$entity = $this->_getMapper()->findEntity($id);
			if ($id && $entity) {
				$form->setDefaults($entity->toArray());
			}
			
			$this->view->form = $form;
		}		
    }
        
    public function deleteAction()
    {
    	// Version 14.07.2012
    	$validator = new Zend_Validate_Int();
    	if (!$validator->isValid($this->getRequest()->getParam('id'))) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Error delete item</div>');
			$this->_gotoUrl('index', $this->_c, $this->_m);
			return;
		}
		
    	$entity = $this->_getMapper()->findEntity($request->getParam('id'));
    	$this->_getMapper()->deleteEntity($entity);
		$this->_helper->flashMessenger->addMessage('<div class="notification-error">Success delete item</div>');
		$this->_gotoUrl('index', $this->_c, $this->_m);
    }
        
    public function setPageAction()
    {
    	// Version 14.07.2012
    	$validator = new Zend_Validate_Int();
    	$param = $this->getRequest()->getParam(self::SESSION_PAGE);
		if (!$validator->isValid($param)) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Error set page</div>');
			$this->_gotoUrl('index', $this->_c, $this->_m);
			return;
		}
		
		$this->_setSessionPage($param);
		$this->_gotoUrl('index', $this->_c, $this->_m);
    }
    
    public function setLimitAction()
    {
    	// Version 14.07.2012
    	$validator = new Zend_Validate_Int();
    	$param = $this->getRequest()->getParam(self::SESSION_ROWS);
		if (!$validator->isValid($param)) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Error set rows</div>');
			$this->_gotoUrl('index', $this->_c, $this->_m);
			return;
		}
		
    	$this->_setSessionPage(1);		
    	$this->_setSessionRows($param);
		$this->_gotoUrl('index', $this->_c, $this->_m);
    }
    
    public function setFilterAction()
    {
		// Version 14.07.2012
		$form = new Users_Form_AdminIndexFilter();
		$groupsMapper = new Users_Model_Mapper_UsersGroups();
		$collection = $groupsMapper->fetchTree(null, array('id', 'title', 'users_groups_id'));
		$options = $form->collectionToMultiOptions($collection, array(), array('Нет'));
		
		$form->getElement('users_groups_id')->setMultiOptions($options);
		
    	if (!$form->isValid($this->getRequest()->getParams())) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Error set filter</div>');
			$this->_gotoUrl('index', $this->_c, $this->_m);
			return;
		}
		
    	$this->_setSessionPage(1);
    	$this->_setSessionFilter($form->getValues());		
		$this->_gotoUrl('index', $this->_c, $this->_m);
    }
    
    public function loginAction()
    {
    	$this->view->form = new Users_Form_Login();
    }
}
