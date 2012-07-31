<?php

class Contents_AdminIndexController extends Sunny_Controller_AdminAction
{	
	protected $_mapperName = 'Contents_Model_Mapper_Contents';
	
	protected $_filters = array('contents_categories_id' => 0);
	
	protected function _checkGroup()
	{
		$groupAlias = $this->getRequest()->getParam('group');
    	if (null === $groupAlias) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Group not passed</div>');
			return false;
    	}
    	
    	$groupsMapper = new Contents_Model_Mapper_ContentsGroups();
    	$group = $groupsMapper->fetchRow(array('alias = ?' => $groupAlias));
    	if (!$group) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Group not found</div>');
			return false;
		}
		
		return $group;
	}
	
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
		if (false === ($group = $this->_checkGroup())) {
			return;
		}
		
		$filter            = $this->_getSessionFilter(null, $group->alias);
    	$this->view->page  = $this->_getSessionPage($group->alias);
    	$this->view->rows  = $this->_getSessionRows($group->alias);
		$this->view->group = $group;
    	
		$where = array(
			'contents_groups_id = ?'     => $group->id,
			'contents_categories_id = ?' => $filter['contents_categories_id']
		);
		
    	$this->view->rowset = $this->_getMapper()->fetchPage(
    		$where,
    		null,
    		$this->view->rows,
    		$this->view->page
		);
		$this->view->total  = $this->_getMapper()->fetchCount($where);
		
		$form = new Contents_Form_AdminIndexFilter();		
		$categoriesMapper = new Contents_Model_Mapper_ContentsCategories();
		$collection = $categoriesMapper->fetchTree(
			array('contents_groups_id = ?' => $group->id),
			array('id', 'title', 'contents_categories_id')
		);
		$options = $form->collectionToMultiOptions($collection, array(), array('Нет'));		
		$form->getElement('contents_categories_id')->setMultiOptions($options);
		
		$form->setDefaults($filter);
		$form->setAction($this->view->simpleUrl('set-filter', $this->_c, $this->_m, array('group' => $group->alias)));
		$this->view->filter = $form;
    }
    
	/**
	 * Генерирует форму по признаку $params["group"] и сохраняет в базе
	 */
    public function editAction()
    {
		$request = $this->getRequest();
		
		// Version 14.07.2012
		if (false === ($group = $this->_checkGroup())) {
			return;
		}
		
		$thumbnailsRootAlias = 'content_thumbnails';
		
		// Mappers section
		$mediaMapper = new Media_Model_Mapper_MediaCategories();
		$languagesMapper = new Contents_Model_Mapper_Languages();
		$categoriesMapper = new Contents_Model_Mapper_ContentsCategories();
		$contentsMapper = new Contents_Model_Mapper_Contents();
		
		
		// Alias of default language
		$defaultLanguage = $languagesMapper->getDefaultLanguage();
		
		
		
		$category = $mediaMapper->fetchRow(
			array(
				'alias = ?' => $thumbnailsRootAlias,
				'media_categories_id = 0' 
			)
		);
		$thumbnailsRootId = $category->getId();
		
		$id = $request->getParam('id');
		$formClassName = 'Contents_Form_'
		               . ucfirst(Zend_Filter::filterStatic($group->alias, 'Word_UnderscoreToCamelCase'))
		               . 'Edit';
		if (!@class_exists($formClassName)) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Editor not found</div>');
			$this->_gotoUrl('index', $this->_c, $this->_m, array('group' => $group->alias));
		}
		
		$form = new $formClassName();
		
		$parentContents = $contentsMapper->getContentsFromGroup($group->id, array($request->getParam('id', 0)));
		$parentContents = $form->collectionToMultiOptions($parentContents, array(), array('Нет'));
		$form->getElement('contents_id')->setMultiOptions($parentContents);
		
		
		$languages = $languagesMapper->fetchAll(
			array('published = 1'),
			array('ordering')
		);
		//var_export($languages);
		$languages = $form->createAssocMultioptions($languages, array());
		$form->getElement('languages_alias')->setMultiOptions($languages);
		
		
		$collection = $categoriesMapper->fetchTree(
			array('contents_groups_id = ?' => $group->id),
			array('id', 'title', 'contents_categories_id')
		);
		$options = $form->collectionToMultiOptions($collection, array(), array('Нет'));		
		$form->getElement('contents_categories_id')->setMultiOptions($options);		
		$form->getElement('contents_groups_id')->setValue($group->id);
		$form->setAction($this->view->simpleUrl('edit', $this->_c, $this->_m, array('group' => $group->alias)));
		
		if ($request->isXmlHttpRequest() || $request->isPost()) {
			if ($form->isValid($request->getParams())) {
				
				$values = $form->getValues();
				$params = $request->getParams();
				if (isset($params['media_id'])) {
					$values['media_id'] = $params['media_id'];
				}
				
				$entity = $this->_getMapper()->createEntity($values);
				$this->_getMapper()->saveEntity($entity);
				
				$this->_helper->flashMessenger->addMessage('<div class="notification-done">Saved success</div>');
				$this->_gotoUrl('index', $this->_c, $this->_m, array('group' => $group->alias));
				$this->view->action = 'update';
				$this->view->sourceUrl = 1;
			} else {
    			$this->view->formErrors        = $form->getErrors();
    			$this->view->formErrorMessages = $form->getErrorMessages();
			}
		} else {
			$entity = $this->_getMapper()->findEntity($id);
			if ($id && $entity) {
				$form->setDefaults($entity->toArray());
			}
			$this->view->catId = $thumbnailsRootId;
			$this->view->form = $form;
		}
		
	}
    
    public function deleteAction()
    {
    	// Version 14.07.2012
		if (false === ($group = $this->_checkGroup())) {
			return;
		}
    	
    	$validator = new Zend_Validate_Int();
    	if (!$validator->isValid($this->getRequest()->getParam('id'))) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Error delete item</div>');
			$this->_gotoUrl('index', $this->_c, $this->_m, array('group' => $group->alias));
			return;
		}
		
    	$entity = $this->_getMapper()->findEntity($request->getParam('id'));
    	$this->_getMapper()->deleteEntity($entity);
		$this->_helper->flashMessenger->addMessage('<div class="notification-done">Success delete item</div>');
		$this->_gotoUrl('index', $this->_c, $this->_m, array('group' => $group->alias));
    }
        
    public function setPageAction()
    {
    	// Version 14.07.2012
		if (false === ($group = $this->_checkGroup())) {
			return;
		}
    	
    	$validator = new Zend_Validate_Int();
    	$param = $this->getRequest()->getParam(self::SESSION_PAGE);
		if (!$validator->isValid($param)) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Error set page</div>');
			$this->_gotoUrl('index', $this->_c, $this->_m, array('group' => $group->alias));
			return;
		}
		
		$this->_setSessionPage($param, $group->alias);
		$this->_gotoUrl('index', $this->_c, $this->_m, array('group' => $group->alias));
    }
    
    public function setLimitAction()
    {
    	// Version 14.07.2012
		if (false === ($group = $this->_checkGroup())) {
			return;
		}
		
    	$validator = new Zend_Validate_Int();
    	$param = $this->getRequest()->getParam(self::SESSION_ROWS);
		if (!$validator->isValid($param)) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Error set rows</div>');
			$this->_gotoUrl('index', $this->_c, $this->_m, array('group' => $group->alias));
		}
		
		$this->_setSessionPage(1, $group->alias);		
    	$this->_setSessionRows($param, $group->alias);
		$this->_gotoUrl('index', $this->_c, $this->_m, array('group' => $group->alias));
    }
    
    public function setFilterAction()
    {
    	// Version 14.07.2012
		if (false === ($group = $this->_checkGroup())) {
			return;
		}
		
		$form = new Contents_Form_AdminIndexFilter();
		$categoriesMapper = new Contents_Model_Mapper_ContentsCategories();
		$collection = $categoriesMapper->fetchTree(
			array('contents_groups_id = ?' => $group->id),
			array('id', 'title', 'contents_categories_id')
		);
		$options = $form->collectionToMultiOptions($collection, array(), array('Нет'));		
		$form->getElement('contents_categories_id')->setMultiOptions($options);
				
    	if (!$form->isValid($this->getRequest()->getParams())) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Error set filter</div>');
			$this->_gotoUrl('index', $this->_c, $this->_m, array('group' => $group->alias));
			return;
		}
		
    	$this->_setSessionPage(1, $group->alias);
    	$this->_setSessionFilter($form->getValues(), null, $group->alias);		
		$this->_gotoUrl('index', $this->_c, $this->_m, array('group' => $group->alias));
	}
}
