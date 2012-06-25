<?php

class Media_AdminIndexController extends Sunny_Controller_Action
{	
	protected $_mapperName = 'Media_Model_Mapper_Media';
	
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
    }
    
    public function editAction()
    {
    	$request = $this->getRequest();
		$mapper  = $this->_getMapper();
    	
    	// Setup form valid action
		$form = new Media_Form_MediaEdit();
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
    		} else {
    			$this->_helper->redirector->gotoSimple('upload', $this->_c, $this->_m);
    		}
    		
    		$this->view->form = $form;
    	}
    }
    
    public function uploadAction()
    {
    	$request = $this->getRequest();
    	
    	if ($request->isFlashRequest()) {
	    	$postName = 'upload';
	    	
	    	$transfer = new Zend_File_Transfer_Adapter_Http();
	    	$transfer->setDestination(PUBLIC_PATH . '/uploads');
	    	
	    	if (!$transfer->isValid($postName)) {
	    		$this->view->error[] = 'not valid';
	    	}
	    	
	    	$transfer->receive($postName);
	    	if (!$transfer->isReceived()) {
	    		$this->view->error[] = 'not recieved';
	    	}
	    	
	    	// TODO: move to model
	    	$fileInfo = $transfer->getFileInfo($postName);
	    	$entity = $this->_getMapper()->createEntity();
	    	$p = strripos($postName, '/');
	    	$entity->setName($fileInfo[$postName]['name']);
	    	$entity->setServerPath(PUBLIC_PATH . '/uploads');
	    	$id = $this->_getMapper()->saveEntity($entity);
	    	 
	    	$this->view->success = true;
	    	$this->view->fileInfo = $fileInfo;
	    	$this->view->redirectTo = $this->_helper->url->simple('edit', $this->_c, $this->_m, array('id' => $id));
	    	$this->_helper->json(get_object_vars($this->view));
    	} else {
    		$this->view->form = new Media_Form_MediaCreate(array('uploadUrl' => $this->_helper->url->simple($this->_a, $this->_c, $this->_m)));
    		//$this->view->render('admin-index/edit.php3');
    		$this->render('edit');
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
