<?php

class Media_AdminIndexController extends Sunny_Controller_AdminAction
{	
	protected $_mapperName = 'Media_Model_Mapper_Media';
	
	protected $_filters = array('media_categories_id' => 0);
	
	protected $_categoryId = null;
	
	
	public function setCategoryId($id)
	{
		$this->_categoryId = $id;
	}
	
	public function init()
	{
		$this->_helper->layout->setLayout('admin-layout');
		parent::init();
		
		// Add actions witch can work with ajax
		$context = $this->_helper->AjaxContext();
		$context->addActionContext('index', 'json');		
		$context->addActionContext('edit', 'json');		
		$context->addActionContext('delete', 'json');		
		$context->addActionContext('set-limit', 'json');		
		$context->addActionContext('set-page', 'json');		
		$context->addActionContext('set-filter', 'json');	
		$context->addActionContext('select-image', 'json');
		$context->addActionContext('select-file', 'json');
		$context->initContext('json');
	}
	
	public function indexAction()
    {
    	// VERSION 14.07.2012
		$filter            = $this->_getSessionFilter();
    	$this->view->page  = $this->_getSessionPage();
    	$this->view->rows  = $this->_getSessionRows();
		
		$where = array(
			'media_categories_id = ?' => $filter['media_categories_id']
		);
		
    	$this->view->rowset = $this->_getMapper()->fetchPage(
    		$where,
    		null,
    		$this->view->rows,
    		$this->view->page
		);
		$this->view->total  = $this->_getMapper()->fetchCount($where);
		
		$form = new Media_Form_AdminIndexFilter();
		$categoriesMapper = new Media_Model_Mapper_MediaCategories();
		$collection = $categoriesMapper->fetchTree(null, array('id', 'title', 'media_categories_id'));
		$options = $form->collectionToMultiOptions($collection, array(), array('Нет'));		
		$form->getElement('media_categories_id')->setMultiOptions($options);
		
		$form->setDefaults($filter);
		$form->setAction($this->view->simpleUrl('set-filter', $this->_c, $this->_m));
		$this->view->filter = $form;
    }
    
    public function editAction()
    {
    	// Version 14.07.2012
		$request = $this->getRequest();
		
		$id = $request->getParam('id');
		$form = new Media_Form_MediaEdit();
		
		$categoriesMapper = new Media_Model_Mapper_MediaCategories();
		$collection = $categoriesMapper->fetchTree(null, array('id', 'title', 'media_categories_id'));
		$options = $form->collectionToMultiOptions($collection, array(), array('Нет'));		
		$form->getElement('media_categories_id')->setMultiOptions($options);		
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
			} elseif (!$id) {
				$this->_gotoUrl('upload', $this->_c, $this->_m);
			}
			
			$this->view->form = $form;
		}		
    }
    
    public function uploadAction()
    {
    	$this->_helper->viewRenderer->setNoRender();
    	
    	$request = $this->getRequest();
    	
    	if ($request->isFlashRequest() || $request->isPost()) {
	    	$postName = 'upload';
	    	$filename = $_FILES[$postName]['name'];
	    	$filter = new Sunny_FileRenamer(array('useCodebase' => 'utf-8'));
	    	
	    	$this->view->filename = $filter->filter($filename);
	    	
	    	$entity = $this->_getMapper()->createEntity();	
	    	$entity->setName($_FILES[$postName]['name']);
	    	$entity->setTitle($_FILES[$postName]['name']);
	    	$entity->setServerPath(realpath(PUBLIC_PATH . '/uploads'));
	    	$entity->setType(strtolower(end(explode('.', $_FILES[$postName]['name']))));
	    	
	    	if (!is_null($this->_categoryId)) {
	    		$entity->setMediaCategoriesId($this->_categoryId);
	    	}
	    	
	    	$id = $this->_getMapper()->saveEntity($entity);
	    	
	    	$this->view->lastId = $id;
	    	
	    	$name = $id;
	    	if(move_uploaded_file($_FILES[$postName]["tmp_name"], 'uploads/' . $name . '.' . strtolower(end(explode('.', $_FILES[$postName]['name'])))))
	    	{
	    		$this->view->success = true;
	    		$this->view->fileInfo = $fileInfo;
	    		$this->view->redirectTo = $this->_helper->url->simple('edit', $this->_c, $this->_m, array('id' => $id));
	    	} else {
	    		$this->_getMapper()->deleteEntity($this->_getMapper()->findEntity($id));
	    	}
	    	
	    	$this->_helper->json(get_object_vars($this->view));
	    } else {
    		$this->view->form = new Media_Form_MediaCreate(array('uploadUrl' => $this->view->simpleUrl($this->_a, $this->_c, $this->_m, array())));
    		
    		$this->render('edit');
    	}
    }
    
    public function uploadImageWidgetAction()
    {
    	$request = $this->getRequest();
    	$params = $request->getParams();
    	
    	$this->_helper->viewRenderer->setNoRender();
    	 
    	$request = $this->getRequest();
    	 
    	if ($request->isFlashRequest() || $request->isPost()) {
    		$postName = 'upload';
    		$filename = $_FILES[$postName]['name'];
    		$filter = new Sunny_FileRenamer(array('useCodebase' => 'utf-8'));
    	
    		$this->view->filename = $filter->filter($filename);
    	
    		$entity = $this->_getMapper()->createEntity();
    		$entity->setMediaCategoriesId($params['mediaCategoriesId']);
    		$entity->setName($_FILES[$postName]['name']);
    		$entity->setTitle($_FILES[$postName]['name']);
    		$entity->setServerPath(realpath(PUBLIC_PATH . '/uploads'));
    		$entity->setType(strtolower(end(explode('.', $_FILES[$postName]['name']))));
    	
    		$id = $this->_getMapper()->saveEntity($entity);
    	
    		$this->view->lastId = $id;
    		//$this->view->catId = $params['mediaCategoriesId'];
    		//$this->view->redir = $params["redirect"];
    		
    		
    		
    		$name = $id;
    		if(move_uploaded_file($_FILES[$postName]["tmp_name"], 'uploads/' . $name . '.' . strtolower(end(explode('.', $_FILES[$postName]['name'])))))
    		{
    			$this->view->success = true;
    			$this->view->fileInfo = $fileInfo;
    			$this->view->redirectTo = $params["redirect"];
    		} else {
    			$this->_getMapper()->deleteEntity($this->_getMapper()->findEntity($id));
    		}
    	
    		$this->_helper->json(get_object_vars($this->view));
    	} else {
    		$this->view->form = new Media_Form_MediaCreate(array('uploadUrl' => $this->_helper->url->simple($this->_a, $this->_c, $this->_m, 
    			array(
    				"mediaCategoriesId" => 5		
    			) 
    		)));
    	
    		$this->render('edit');
    	}
    }
    
    public function selectFileAction()
    {
    	
    }
    
    public function selectImageAction()
    {
    	$filter            = $this->_getSessionFilter();
    	$this->view->page  = $this->_getSessionPage();
    	$this->view->rows  = $this->_getSessionRows();
    	
    	$where = array(
    				'media_categories_id = ?' => $filter['media_categories_id'],
    				"type = 'jpg' OR type = 'jpeg' OR type = 'png' OR type = 'gif'"
    	);
    	
    	$this->view->rowset = $this->_getMapper()->fetchPage(
    	$where,
    	null,
    	$this->view->rows,
    	$this->view->page
    	);
    	$this->view->total  = $this->_getMapper()->fetchCount($where);
    	
    	$form = new Media_Form_AdminIndexFilter();
    	$categoriesMapper = new Media_Model_Mapper_MediaCategories();
    	$collection = $categoriesMapper->fetchTree(null, array('id', 'title', 'media_categories_id'));
    	$options = $form->collectionToMultiOptions($collection, array(), array('Нет'));
    	$form->getElement('media_categories_id')->setMultiOptions($options);
    	
    	$form->setDefaults($filter);
    	$form->setAction($this->view->simpleUrl('set-filter', $this->_c, $this->_m, array('back' => 'select-image')));
    	$this->view->filter = $form;
    	//$this->render('index');
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
		$request = $this->getRequest();
		$goto = $request->getParam('back', 'index');
    	
    	// Version 14.07.2012
		$form = new Media_Form_AdminIndexFilter();
		$categoriesMapper = new Media_Model_Mapper_MediaCategories();
		$collection = $categoriesMapper->fetchTree(null, array('id', 'title', 'media_categories_id'));
		$options = $form->collectionToMultiOptions($collection, array(), array('Нет'));
		
		$form->getElement('media_categories_id')->setMultiOptions($options);
		
    	if (!$form->isValid($this->getRequest()->getParams())) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Error set filter</div>');
			$this->_gotoUrl($goto, $this->_c, $this->_m);
			return;
		}
		
    	$this->_setSessionPage(1);
    	$this->_setSessionFilter($form->getValues());	
    		
		$this->_gotoUrl($goto, $this->_c, $this->_m);
    }
}
