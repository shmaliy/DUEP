<?php

class Media_PhotoGalleryController extends Zend_Controller_Action
{	
	/**
	 * Prepare controller for work with ajax based requests
	 * 
	 * (non-PHPdoc)
	 * @see Zend_Controller_Action::init()
	 */
    protected $_lang;
	public function init()
	{
		$request = $this->getRequest();
		
		if ($request->isXmlHttpRequest() || $request->isPost()) {
			// Both html or json ajax responses need to disable layout
        	$this->_helper->layout()->disableLayout();			
		}
		
		// Add actions wich can work with ajax
		$context = $this->_helper->AjaxContext();
		$context->addActionContext('index', 'json');
		$context->addActionContext('config', 'json');

		
		$context->initContext('json');
		$this->_lang = Zend_Registry::get('lang');
	}
	
	/**
	 * Обработчик страницы "списка всех Альбомов"
	 */
	public function indexAction()
    {
        
         
         
        $groupsMapper = new Contents_Model_Mapper_ContentsGroups();
        $this->view->pgroup = $groupsMapper->getFrontGroupByAlias ("gallery_of_images");
        $this->view->group = $groupsMapper->getFrontGroup();
        
        $catMapper = new Contents_Model_Mapper_ContentsCategories();
        $this->view->pcats = $catMapper->getFrontCatsByGroupId($this->view->pgroup->id, $this->_lang);
        $this->view->cats = $catMapper->getFrontCats();

        
        $contentsMapper = new Contents_Model_Mapper_Contents();
        $this->view->gallery = $contentsMapper->getFrontContentsByGroupId($this->view->pgroup->id, $this->_lang,'date_created desc');        

        $imgMapper = new Media_Model_Mapper_Media();
        $this->view->imgs = $imgMapper->getContentImgAll();
        
        $translatedMonths = array(
        1 => 'Январь',
        2 => 'Февраль',
        3 => 'Март',
        4 => 'Апрель',
        5 => 'Май',
        6 => 'Июнь',
        7 => 'Июль',
        8 => 'Август',
        9 => 'Сентябрь',
        10 => 'Октябрь',
        11 => 'Ноябрь',
        12 => 'Декабрь'
        );

        $this->view->gallery->formatDate('date_created', $translatedMonths, 'г.');
    
    }
    /**
    * Обработчик страницы "списка всех Альбомов по категориях"
    */
    public function catAction()
    {
    
         
        $cat =  $this->getRequest()->getParam('cat');
         
        $groupsMapper = new Contents_Model_Mapper_ContentsGroups();
        $this->view->pgroup = $groupsMapper->getFrontGroupByAlias ("gallery_of_images");
        $this->view->group = $groupsMapper->getFrontGroup();
        
        $catMapper = new Contents_Model_Mapper_ContentsCategories();
        $this->view->pcats = $catMapper->getFrontCatsByGroupId($this->view->pgroup->id, $this->_lang);
        $this->view->cat = $catMapper->getFrontCatsByAlias($cat, $this->_lang);
        $this->view->cats = $catMapper->getFrontCats();
        
        $contentsMapper = new Contents_Model_Mapper_Contents();
   
        $this->view->gallery = $contentsMapper->getFrontContentsByCatId($this->view->cat->id, $this->_lang, 'date_created desc');
        
        $imgMapper = new Media_Model_Mapper_Media();
        $this->view->imgs = $imgMapper->getContentImgAll();
        $translatedMonths = array(
        1 => 'Январь',
        2 => 'Февраль',
        3 => 'Март',
        4 => 'Апрель',
        5 => 'Май',
        6 => 'Июнь',
        7 => 'Июль',
        8 => 'Август',
        9 => 'Сентябрь',
        10 => 'Октябрь',
        11 => 'Ноябрь',
        12 => 'Декабрь'
        );

        $this->view->gallery->formatDate('date_created', $translatedMonths, 'г.');   
    }
    /**
    * Обработчик страницы "отдельного Альбома"
    */
    public function viewAction()
    {

        $cat =  $this->getRequest()->getParam('cat');
    	$alias =  $this->getRequest()->getParam('alias');
    	
        $groupsMapper = new Contents_Model_Mapper_ContentsGroups();
        $this->view->pgroup = $groupsMapper->getFrontGroupByAlias ("gallery_of_images");
        $this->view->group = $groupsMapper->getFrontGroup();
       
        $catMapper = new Contents_Model_Mapper_ContentsCategories();
        $this->view->pcats = $catMapper->getFrontCatsByGroupId($this->view->pgroup->id, $this->_lang);
        $this->view->cat = $catMapper->getFrontCatsByAlias($cat, $this->_lang);
   
        $this->view->cats = $catMapper->getFrontCats();
    	 
    	$contentsMapper = new Contents_Model_Mapper_Contents();
   
        $this->view->gallery = $contentsMapper->getFrontContentsByCatId($this->view->cat->id, $this->_lang, 'date_created desc');
   
    	$contentMapper = new Contents_Model_Mapper_Contents();
    	$this->view->album = $contentMapper->getFrontContentByAlias($alias, $this->_lang);
    	$rediarelationsMapper = new Media_Model_Mapper_MediaRelations();
    	$this->view->img = $rediarelationsMapper->getImgByAlbumId($this->view->album->media_id);
    	$imgMapper = new Media_Model_Mapper_Media();
    	$this->view->imgs = $imgMapper->getContentImgAll();
    	$translatedMonths = array(
    	1 => 'Январь',
    	2 => 'Февраль',
    	3 => 'Март',
    	4 => 'Апрель',
    	5 => 'Май',
    	6 => 'Июнь',
    	7 => 'Июль',
    	8 => 'Август',
    	9 => 'Сентябрь',
    	10 => 'Октябрь',
    	11 => 'Ноябрь',
    	12 => 'Декабрь'
    	);
    	 if($this->view->img !== NULL){
    	$this->view->imgs->formatDate('date_created', $translatedMonths, 'г.');
    	 };
    	
    	
    }
    
    /**
     * ЭТОТ МЕТОД СОЗДАН ДЛЯ НАДИ ЧТОБ ОНА МОГЛА ВЕРСТАТЬ ПРИМЕНИТЕЛЬНО К САЙТУ - НЕ УДАЛЯТЬ
     */
    public function developAction()
    {
    	
    }
	
    /**
     * Config page
     */
	public function configAction()
    {
		$this->_helper->layout->setLayout('admin-layout');
    	$request = $this->getRequest();
    	$formAdminConfig = new Application_Form_AdminConfig();
    	$adminConfig = new Application_Model_AdminConfig();
    	
    	if ($request->isXmlHttpRequest() || $request->isPost()) {
    		if ($formAdminConfig->isValid($request->getParams())) {
    			$adminConfig->save($formAdminConfig->getValues());
    			$this->view->error = $formAdminConfig->getValues();
    		} else {
    			$this->view->error = $formAdminConfig->getErrors();
    		}
    	} else {
    		$config = $adminConfig->load();
    		unset($config['demo']); // forse demo off after sucess config
    		$this->view->formAdminConfig = $formAdminConfig->setDefaults($config);
    	}
    }
    
    public function usersAction()
    {
    	
    }
    public function frontAnnouncementsAction()
    {
    	$ans_id = $this->getRequest()->getParam('ans_id');
    	$contentsMapper = new Contents_Model_Mapper_Contents();
    	$this->view->contents = $contentsMapper->getFrontContentsByCatId($ans_id,'date_created desc',6)->toArray();
    }
    public function frontNewsAction()
    {
    	$news_id = $this->getRequest()->getParam('news_id');
    	$contentsMapper = new Contents_Model_Mapper_Contents();
    	$this->view->contents = $contentsMapper->getFrontContentsByCatId($news_id,'date_created desc',6)->toArray();
    }
    
}
