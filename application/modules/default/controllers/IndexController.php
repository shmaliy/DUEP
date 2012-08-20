<?php

class IndexController extends Zend_Controller_Action
{	
	/**
	 * Prepare controller for work with ajax based requests
	 * 
	 * (non-PHPdoc)
	 * @see Zend_Controller_Action::init()
	 */
    protected $_lang;
    protected $_resizer;
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
		$context->addActionContext('front-announcements', 'json');
		$context->addActionContext('front-news', 'json');
		$context->addActionContext('front-announcements-all', 'json');
		$context->addActionContext('front-news-all', 'json');
		$this->_resizer = new Sunny_ImageResizer();
		$context->initContext('json');
    	//var_export($this->getRequest()->getParams());
    	//var_export(getenv('REQUEST_URI'));
		$this->_lang = Zend_Registry::get('lang');
	}
	
	/**
	 * Main page controller
	 * Generate questions form and procces it if ajax requested
	 */
	public function indexAction()
    {

        
    	$groupsMapper = new Contents_Model_Mapper_ContentsGroups();
    	$this->view->agroup = $groupsMapper->getFrontGroupByAlias ("announcements");
    	$this->view->ngroup = $groupsMapper->getFrontGroupByAlias ("news");
    	
    	$catMapper = new Contents_Model_Mapper_ContentsCategories();
    	$this->view->acats = $catMapper->getFrontCatsByGroupId($this->view->agroup->id, $this->_lang);
    	$this->view->ncats = $catMapper->getFrontCatsByGroupId($this->view->ngroup->id, $this->_lang);
    	
    	$contentsMapper = new Contents_Model_Mapper_Contents();
    	$this->view->announcements = $contentsMapper->getFrontContentsByGroupId($this->view->agroup->id, $this->_lang,'date_created desc',6);
    	$this->view->news = $contentsMapper->getFrontContentsByGroupId($this->view->ngroup->id, $this->_lang,'date_created desc',6);
    	$this->view->baner = $contentsMapper->getFrontContentsByIndex($this->_lang,'date_created desc');
    	
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
    	
    	$this->view->announcements->formatDate('date_created', $translatedMonths, 'г.');
    	$this->view->news->formatDate('date_created', $translatedMonths, 'г.');
    	$this->view->baner->formatDate('date_created', $translatedMonths, 'г.');
    	
    	$resizer = array();
    	foreach ($this->view->baner as $item):
    	foreach ($this->view->imgs as $items):
    	if($item->media_id == $items->id):
    	$img = $item->toArray();
    	$img['small'] = $this->resize($items->server_path . '/' . $items->id . '.' . $items->type, 78, 56);
    	$img['big'] = $this->resize($items->server_path . '/' . $items->id . '.' . $items->type, 1008, 372);
    	$resizer[] = $img;
    	endif;
    	endforeach;
    	endforeach;
    	
    	$this->view->resizer = $resizer;
    }
    
    /**
    * Обработчик статических страниц
    */
    public function staticAction()
    {
    	
    }
    /**
    * Обработчик результатов поиска
    */
    public function searchAction()
    {
        
    }
    
    /**
     * ЭТОТ МЕТОД СОЗДАН ДЛЯ НАД�? ЧТОБ ОНА МОГЛА ВЕРСТАТЬ ПР�?МЕН�?ТЕЛЬНО К САЙТУ - НЕ УДАЛЯТЬ
     */
    public function developAction()
    {
    	
    }
	
    public function usersAction()
    {
    	
    }
    public function frontAnnouncementsAction()
    {
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
        
    	$ans_id = $this->getRequest()->getParam('ans_id');
    	$contentsMapper = new Contents_Model_Mapper_Contents();
    	$this->view->contents = $contentsMapper->getFrontContentsByCatId($ans_id, $this->_lang,'date_created desc',6);
    	$this->view->contents->formatDate('date_created', $translatedMonths, 'г.');
    	$this->view->contents = $this->view->contents->toArray();
    	
    }
    public function frontNewsAction()
    {
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

    	$news_id = $this->getRequest()->getParam('news_id');
    	$contentsMapper = new Contents_Model_Mapper_Contents();
    	$this->view->contents = $contentsMapper->getFrontContentsByCatId($news_id, $this->_lang,'date_created desc',6);
    	$this->view->contents->formatDate('date_created', $translatedMonths, 'г.');
    	$this->view->contents = $this->view->contents->toArray();
    }

    public function frontAnnouncementsAllAction()
    {
        $groupsMapper = new Contents_Model_Mapper_ContentsGroups();
        $this->view->agroup = $groupsMapper->getFrontGroupByAlias ("announcements");
         
        $catMapper = new Contents_Model_Mapper_ContentsCategories();
        $this->view->acats = $catMapper->getFrontCatsByGroupId($this->view->agroup->id, $this->_lang);
         
        $contentsMapper = new Contents_Model_Mapper_Contents();
        $this->view->contents = $contentsMapper->getFrontContentsByGroupId($this->view->agroup->id, $this->_lang,'date_created desc',6);
         
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
         
        $this->view->contents->formatDate('date_created', $translatedMonths, 'г.');
        $this->view->contents = $this->view->contents->toArray();

    }
    public function frontNewsAllAction()
    {
    
               $groupsMapper = new Contents_Model_Mapper_ContentsGroups();
        $this->view->ngroup = $groupsMapper->getFrontGroupByAlias ("news");
         
        $catMapper = new Contents_Model_Mapper_ContentsCategories();
        $this->view->ncats = $catMapper->getFrontCatsByGroupId($this->view->ngroup->id, $this->_lang);
         
        $contentsMapper = new Contents_Model_Mapper_Contents();
        $this->view->contents = $contentsMapper->getFrontContentsByGroupId($this->view->ngroup->id, $this->_lang,'date_created desc',6);
         
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
         
        $this->view->contents->formatDate('date_created', $translatedMonths, 'г.');
        $this->view->contents = $this->view->contents->toArray();
    }
    protected  function resize($image,$w,$h)
    {
        if (file_exists(ltrim($image, '/'))) {
            $savepath = explode('/', ltrim($image, '/'));
            $filename = $savepath[count($savepath)-1];
            $savepath[count($savepath)-1] = 'cache_'.$w.'x'.$h;
            $savepath[] = $filename;
            $cached = implode('/', $savepath);
    
            	
            if (!file_exists($cached) || filemtime($cached) + 100000 < time()) {
                if (file_exists($cached)) {
                    unlink($cached);
                }
    
                $imageID = $this->_resizer->readImage(ltrim($image, '/'));
                if ($imageID) {
                    $imageID = $this->_resizer->resize(
                    $imageID,
                    $w,
                    $h,
                    Sunny_ImageResizer::FIT_BOX,
    						'center',
    						'center'
                    );
                }
    
                if ($imageID) {
                    $this->_resizer->writeImage($imageID, 'jpg', $cached, 90);
                }
            }
            	
            $url = $this->view->Path() . $savepath[1] . '/' . $savepath[2];
        } else {
            $url = 'error';
        }
    
        return $url;
    }

    
}
