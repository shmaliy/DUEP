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
		$options = $form->collectionToMultiOptions($collection, array());	
		foreach ($options as $key=>$value) {
			unset($options[$key]);
			break;
		}
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
		//Getting request
    	$request = $this->getRequest();
		
		// Version 14.07.2012
		if (false === ($group = $this->_checkGroup())) {
			return;
		}
		
		
		// Mappers section
		$mediaMapper = new Media_Model_Mapper_Media();
		$mediaCategoriesMapper = new Media_Model_Mapper_MediaCategories();
		$mediaRelations = new Media_Model_Mapper_MediaRelations();
		$languagesMapper = new Contents_Model_Mapper_Languages();
		$categoriesMapper = new Contents_Model_Mapper_ContentsCategories();
		$contentsMapper = new Contents_Model_Mapper_Contents();
		$groupsMapper = new Contents_Model_Mapper_ContentsGroups();
		

		
		
		
		
		
		
		
		// Alias of default language
		$defaultLanguage = $languagesMapper->getDefaultLanguage();
		
		
		//Auto set filter thumbnails
		$thumbnailsRootAlias = 'content_thumbnails';
		$category = $mediaCategoriesMapper->fetchRow(
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
		
		// PhotoGallery
		$photoGalleryGroup = $groupsMapper->getFrontGroupByAlias('gallery_of_images');
		
		$gallerys = $contentsMapper->fetchAll(
			array('contents_groups_id = ?' => $photoGalleryGroup->id),
			array('id', 'title')
		);
		
		$gallerysList = $form->collectionToMultiOptions($gallerys, array(), array('Нет'));
		$form->getElement('contents_photogallery_id')->setMultiOptions($gallerysList);
		
		
		// VideoGallery
		$videoGalleryGroup = $groupsMapper->getFrontGroupByAlias('gallery_of_videos');
		
		$video = $contentsMapper->fetchAll(
			array('contents_groups_id = ?' => $videoGalleryGroup->id),
			array('id', 'title')
		);
		
		$videoList = $form->collectionToMultiOptions($video, array(), array('Нет'));
		$form->getElement('contents_videogallery_id')->setMultiOptions($videoList);
		
		
		// MultiGallery
		$multiGalleryGroup = $groupsMapper->getFrontGroupByAlias('multi_gallerys');
		
		$multi = $contentsMapper->fetchAll(
			array('contents_groups_id = ?' => $multiGalleryGroup->id),
			array('id', 'title')
		);
		
		$multiList = $form->collectionToMultiOptions($multi, array(), array('Нет'));
		$form->getElement('contents_multigallery_id')->setMultiOptions($multiList);
		
		
		
		if($group->alias == 'events') {
			$annoucement = $groupsMapper->getFrontGroupByAlias('announcements');
			$childAnnouncements = $contentsMapper->getContentsFromGroup($annoucement->id, array($request->getParam('id', 0)));
			$childAnnouncements = $form->collectionToMultiOptions($childAnnouncements, array(), array('Нет'));
			$form->getElement('contents_events_announcement_id')->setMultiOptions($childAnnouncements);
		}
		
		$parentContents = $contentsMapper->getContentsFromGroup($group->id, array($request->getParam('id', 0)));
		if(count($parentContents) > 0) {
			$parentContents = $form->collectionToMultiOptions($parentContents, array(), array('Нет'));
			$form->getElement('contents_id')->setMultiOptions($parentContents);
		}
		
		
		$languages = $languagesMapper->fetchAll(
			array('published = 1'),
			array('ordering')
		);
		$languages = $form->createAssocMultioptions($languages, array());
		$form->getElement('languages_alias')->setMultiOptions($languages);
		
		
		$collection = $categoriesMapper->fetchTree(
			array('contents_groups_id = ?' => $group->id),
			array('id', 'title', 'contents_categories_id')
		);
		$options = $form->collectionToMultiOptions($collection, array());	
		foreach ($options as $key=>$value) {
			unset($options[$key]);
			break;
		}	
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
				
				$mediaIds = array();
				if (isset($params['media_ids'])) {
					$mediaIds = explode('|', $params['media_ids']);
					unset($values['media_ids']);
				}
				
				$entity = $this->_getMapper()->createEntity($values);
				$id = $this->_getMapper()->saveEntity($entity);
				$entity->setId($id);
				
				// Check relations
				$imagesRelations = $mediaRelations->fetchAll(array('relation_tbl_id = ?' => $entity->getId()));
				// Check add relations
				$addedRel = array();
				foreach ($mediaIds as $newRel) {
					$newRelId = current(explode('@', $newRel));
					foreach ($imagesRelations as $rel) {
						if ($newRelId == $rel->mediaId) {
							continue 2;
						}
					}
					
					//$addedRel[] = $newRelId;
					$mediaRelation = $mediaRelations->createEntity(array(
						'media_id'          => $newRelId,
						'relation_tbl_name' => 'contents',
						'relation_tbl_id'   => $entity->getId(),
						'relation_type'     => $group->alias
					));
					$mediaRelations->saveEntity($mediaRelation);
				}
				//var_export($addedRel);exit;
				// check del relations
				$deletedRel = array();
				foreach ($imagesRelations as $rel) {
					foreach ($mediaIds as $newRel) {
						$newRelId = current(explode('@', $newRel));
						if ($newRelId == $rel->mediaId) {
							continue 2;
							//$deletedRel[] = $rel->mediaId;
							/*$mediaRelation = $mediaRelations->createEntity(array(
								'media_id'          => $newRelId,
								'relation_tbl_name' => 'contents',
								'relation_tbl_id'   => $entity->getId(),
								'relation_type'     => $group->alias
							));
							$mediaRelations->deleteEntity($rel);*/														
						}
					}
					
					//$deletedRel[] = $rel->mediaId;
					$mediaRelations->deleteEntity($rel);
				}
				
				$this->_helper->flashMessenger->addMessage('<div class="notification-done">Saved success</div>');
				
				// Create redirect structure
				//$this->_makeRedirectStructure('index', null, null, array('group' => $group->alias));
				$this->_makeResponderStructure('index', null, null, array('group' => $group->alias));

			} else {
    			$this->view->formErrors        = $form->getErrors();
    			$this->view->formErrorMessages = $form->getErrorMessages();
			}
		} else {
			$entity = $this->_getMapper()->findEntity($id);
			if ($id && $entity) {
				$form->setDefaults($entity->toArray());
				$media = $mediaMapper->findEntity($entity->getMediaId());
				if($media) {
					$form->getElement("media_id")->setAttrib('media-type', $media->getType());
				}
				
				$imagesRelations = $mediaRelations->fetchAll(array('relation_tbl_id = ?' => $entity->getId()));
				$ids = array();
				foreach ($imagesRelations as $rel) {
					$ids[] = $rel->mediaId;
				}
				
				$images = $mediaMapper->findCollection($ids);
				if (count($images)) {
					$value = array();
					foreach ($images as $img) {
						$value[] = $img->getId() . '@' . $img->getType();
					}
					$form->getElement('media_ids')->setValue(implode('|', $value));
				}
			}
			$this->view->catId = $thumbnailsRootId;
			$this->view->form = $form;
		}
		
	}
    
    public function deleteAction()
    {
    	$request = $this->getRequest();
    	$params = $request->getParams();
    	
    	// Version 14.07.2012
		if (false === ($group = $this->_checkGroup(array('group' => $params['group'])))) {
			
			$this->_makeResponderStructure('index', null, null, array('group' => $group->alias), 'update');
			return;
		}
    	
    	$validator = new Zend_Validate_Int();
    	if (!$validator->isValid($this->getRequest()->getParam('id'))) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Error delete item</div>');
			$this->_makeResponderStructure('index', null, null, array('group' => $group->alias), 'update');
			return;
		}
		
    	$entity = $this->_getMapper()->findEntity($request->getParam('id'));
    	//var_export($entity);
    	//exit;
    	$this->_getMapper()->deleteEntity($entity);
		$this->_helper->flashMessenger->addMessage('<div class="notification-done">Success delete item</div>');
		$this->_makeResponderStructure('index', null, null, array('group' => $group->alias), 'update');
    }
        
    public function setPageAction()
    {
    	// Version 14.07.2012
		if (false === ($group = $this->_checkGroup())) {
			$this->_makeResponderStructure('index', null, null, array('group' => $group->alias), 'update');
			return;
		}
    	
    	$validator = new Zend_Validate_Int();
    	$param = $this->getRequest()->getParam(self::SESSION_PAGE);
		if (!$validator->isValid($param)) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Error set page</div>');
			$this->_makeResponderStructure('index', null, null, array('group' => $group->alias), 'update');
			return;
		}
		
		$this->_setSessionPage($param, $group->alias);
		$this->_makeResponderStructure('index', null, null, array('group' => $group->alias), 'update');
    }
    
    public function setLimitAction()
    {
    	// Version 14.07.2012
		if (false === ($group = $this->_checkGroup())) {
			$this->_makeResponderStructure('index', null, null, array('group' => $group->alias), 'update');
			return;
		}
		
    	$validator = new Zend_Validate_Int();
    	$param = $this->getRequest()->getParam(self::SESSION_ROWS);
		if (!$validator->isValid($param)) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Error set rows</div>');
			$this->_makeResponderStructure('index', null, null, array('group' => $group->alias), 'update');
			return;
		}
		
		$this->_setSessionPage(1, $group->alias);		
    	$this->_setSessionRows($param, $group->alias);
		$this->_makeResponderStructure('index', null, null, array('group' => $group->alias), 'update');
	}
    
    public function setFilterAction()
    {
    	// Version 14.07.2012
		if (false === ($group = $this->_checkGroup())) {
			$this->_makeResponderStructure('index', null, null, array('group' => $group->alias), 'update');
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
			$this->_makeResponderStructure('index', null, null, array('group' => $group->alias), 'update');
			return;
		}
		
    	$this->_setSessionPage(1, $group->alias);
    	$this->_setSessionFilter($form->getValues(), null, $group->alias);		
		$this->_makeResponderStructure('index', null, null, array('group' => $group->alias), 'update');
	}
}
