<?php

/*
* Bootstrap->__construct()
* Module_Bootstrap->__construct()
* Bootstrap->run()
*/

class Contents_Bootstrap extends Zend_Application_Module_Bootstrap
{    
    public function __construct($application)
    {
    	parent::__construct($application);
    	$this->_afterConstruct();
    }
    
    protected function _afterConstruct()
    {
    	try {
    		$this->_setModels();
    		$this->_setRouter();
    	} catch (Exception $e) {
    		echo $e->getMessage() . '<br /><br />';
    		echo nl2br($e->getTraceAsString());
    		exit();
    	}
    }

    protected function _setModels()
    {
    	$loader = $this->getResourceLoader();
    	$loader->addResourceType('entities', 'models/Entity', 'Model_Entity');
    	$loader->addResourceType('collections', 'models/Collection', 'Model_Collection');
    	$loader->addResourceType('mappers', 'models/Mappers', 'Model_Mapper');
    }
    protected function _setRouter()
    {
    	$frontController = Zend_Controller_Front::getInstance();
    	$router = $frontController->getRouter();
    	//$router->setGlobalParam('lang', 'ru');
    	 
    	// Override default route
    	
    	$router->addRoute('contents/news/view', new Zend_Controller_Router_Route(
    	':lang/news/:cat/:alias/',
    	    	array(
    	'module' => 'contents',
    	'controller' => 'news',
    	    	    	        'action' => 'view',
    	'alias' => '',
    	    					'cat' => '',
    	    	    	        'lang' => ''
    	    	)
    	));
    	
    	$router->addRoute('contents/news/cat', new Zend_Controller_Router_Route(
    		':lang/news/:cat/',
    	    array(
    	    	'module' => 'contents',
    	        'controller' => 'news',
    	        'action' => 'cat',
    			'cat' => '',
    	        'lang' => ''
    	    )    	 
    	));

    	
    	$router->addRoute('contents/news/index', new Zend_Controller_Router_Route(
    	    ':lang/news/',
    	    array(
    	        'module' => 'contents',
    	        'controller' => 'news',
    	        'action' => 'index',
    	        'lang' => ''
    	    )
    	));
    	$router->addRoute('contents/events/view', new Zend_Controller_Router_Route(
    	':lang/events/:cat/:alias/',
    	    	array(
    	'module' => 'contents',
    	'controller' => 'events',
    	    	    	        'action' => 'view',
    	'alias' => '',
    	    					'cat' => '',
    	    	    	        'lang' => ''
    	    	)
    	));
    	
    	$router->addRoute('contents/events/cat', new Zend_Controller_Router_Route(
    		':lang/events/:cat/',
    	    array(
    	    	'module' => 'contents',
    	        'controller' => 'events',
    	        'action' => 'cat',
    			'cat' => '',
    	        'lang' => ''
    	    )    	 
    	));
    	$router->addRoute('contents/events/index', new Zend_Controller_Router_Route(
    	    	    	':lang/events',
    	array(
    	        			'module' => 'contents',
    	        			'controller' => 'events',
    	        			'action' => 'index',
    	        			'lang' => ''
    	)
    	 
    	));
    	$router->addRoute('contents/mir/view', new Zend_Controller_Router_Route(
    	    	    	    	    	':lang/mir/:alias/',
    	array(
    	    	    	      'module' => 'contents',
    	    	    	      'controller' => 'mir',
    	    	    	      'action' => 'view',
    	    	    		  'alias' => '',
    	    	    	      'lang' => ''
    	)
    	 
    	));
    	$router->addRoute('contents/mir/index', new Zend_Controller_Router_Route(
    	    	    	    	':lang/mir',
    	array(
    	    	        	   'module' => 'contents',
    	    	        	   'controller' => 'mir',
    	    	        		'action' => 'index',
    	    	        		'lang' => ''
    	)
    	
    	));
    	$router->addRoute('contents/licenses/view', new Zend_Controller_Router_Route(
    	    	    	    	    	    	':lang/licenses/:alias/',
    	array(
    	    	    	    	        	'module' => 'contents',
    	    	    	    	        	'controller' => 'licenses',
    	    	    	    	        	'action' => 'view',
    	    	    	    				'alias' => '',
    	    	    	    	        	'lang' => ''
    	)
    	
    	));
    	$router->addRoute('contents/licenses/index', new Zend_Controller_Router_Route(
    	    	    	    	    			':lang/licenses',
    	array(
    	    	    	        			'module' => 'contents',
    	    	    	        			'controller' => 'licenses',
    	    	    	        			'action' => 'index',
    	    	    	        			'lang' => ''
    	)
    	 
    	));
    	$router->addRoute('contents/structure-university/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	':lang/structure-university',
    	array(
    	    	    	    	        	'module' => 'contents',
    	    	    	    	        	'controller' => 'structure-university',
    	    	    	    	        	'action' => 'index',
    	    	    	    	        	'lang' => ''
    	)
    	
    	));
$router->addRoute('contents/announcements/view', new Zend_Controller_Router_Route(
    	':lang/announcements/:cat/:alias/',
    	    	array(
    	'module' => 'contents',
    	'controller' => 'announcements',
    	    	    	        'action' => 'view',
    	'alias' => '',
    	    					'cat' => '',
    	    	    	        'lang' => ''
    	    	)
    	));
    	
    	$router->addRoute('contents/announcements/cat', new Zend_Controller_Router_Route(
    		':lang/announcements/:cat/',
    	    array(
    	    	'module' => 'contents',
    	        'controller' => 'announcements',
    	        'action' => 'cat',
    			'cat' => '',
    	        'lang' => ''
    	    )    	 
    	));
    	$router->addRoute('contents/announcements/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	':lang/announcements',
    	array(
    	    	    	    	        	'module' => 'contents',
    	    	    	    	        	'controller' => 'announcements',
    	    	    	    	        	'action' => 'index',
    	    	    	    	        	'lang' => ''
    	)
    	
    	));
    	$router->addRoute('contents/contacts/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	':lang/contacts',
    	array(
    	    	    	    	    	    'module' => 'contents',
    	    	    	    	    	    'controller' => 'contacts',
    	    	    	    	    	    'action' => 'index',
    	    	    	    	    	    'lang' => ''
    	)
    	 
    	));
    	$router->addRoute('contents/career/vacancy', new Zend_Controller_Router_Route(
    	    	    	    	    	    	 ':lang/career/vacancys/:alias/',
    	array(
    	    	    	    	    	    'module' => 'contents',
    	    	    	    	    	    'controller' => 'career',
    	    	    	    	    	    'action' => 'vacancy',
    	    	    	    	    	    'alias' => '',
    	    	    	    	    	    'lang' => ''
    	)
    	
    	));
    	$router->addRoute('contents/career/vacancys', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	 ':lang/career/vacancys/',
    	array(
    	    	    	    	    	    	    'module' => 'contents',
    	    	    	    	    	    	    'controller' => 'career',
    	    	    	    	    	    	    'action' => 'vacancys',
    	    	    	    	    	    	    'lang' => ''
    	)
    	 
    	));
    	$router->addRoute('contents/career/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	':lang/career',
    	array(
    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	        			'controller' => 'career',
    	    	    	    	    	        			'action' => 'index',
    	    	    	    	    	        			'lang' => ''
    	)
    	 
    	));
    	$router->addRoute('contents/arrangement/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	':lang/arrangement',
    	array(
    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	        			'controller' => 'arrangement',
    	    	    	    	    	    	        			'action' => 'index',
    	    	    	    	    	    	        			'lang' => ''
    	)
    	
    	));
    	$router->addRoute('contents/activities/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	':lang/activities',
    	array(
    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	        			'controller' => 'activities',
    	    	    	    	    	    	    	        			'action' => 'index',
    	    	    	    	    	    	    	        			'lang' => ''
    	)
    	 
    	));
    	$router->addRoute('contents/awards/view', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	':lang/awards/:alias/',
    	array(
    	    	    	    	    	    	    	        	'module' => 'contents',
    	    	    	    	    	    	    	        	'controller' => 'awards',
    	    	    	    	    	    	    	        	'action' => 'view',
    	    	    	    	    	    	    				'alias' => '',
    	    	    	    	    	    	    	        	'lang' => ''
    	)
    	 
    	));
    	$router->addRoute('contents/awards/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	':lang/awards',
    	array(
    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	        			'controller' => 'awards',
    	    	    	    	    	    	        			'action' => 'index',
    	    	    	    	    	    	        			'lang' => ''
    	)
    	
    	));
    	$router->addRoute('contents/directions/discipline/', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	    	    	':lang/directions/:alias/discipline/:name',
    	array(
    	    	    	    	    	    	    	    	    	    	    	        	'module' => 'contents',
    	    	    	    	    	    	    	    	    	    	    	        	'controller' => 'directions',
    	    	    	    	    	    	    	    	    	    	    	        	'action' => 'discipline',
    	    	    	    	    	    	    	    	    	    	    				'alias' => '',
    																								'name' => '',
    	    	    	    	    	    	    	    	    	    	    	        	'lang' => ''
    	)
    	 
    	));
    	$router->addRoute('contents/directions/disciplines/', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	    	':lang/directions/:alias/disciplines',
    	array(
    	    	    	    	    	    	    	    	    	    	        	'module' => 'contents',
    	    	    	    	    	    	    	    	    	    	        	'controller' => 'directions',
    	    	    	    	    	    	    	    	    	    	        	'action' => 'disciplines',
    	    	    	    	    	    	    	    	    	    				'alias' => '',
    	    	    	    	    	    	    	    	    	    	        	'lang' => ''
    	)
    	
    	));
    	$router->addRoute('contents/directions/history/', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	':lang/directions/:alias/history',
    	array(
    	    	    	    	    	    	    	    	    	        	'module' => 'contents',
    	    	    	    	    	    	    	    	    	        	'controller' => 'directions',
    	    	    	    	    	    	    	    	    	        	'action' => 'history',
    	    	    	    	    	    	    	    	    				'alias' => '',
    	    	    	    	    	    	    	    	    	        	'lang' => ''
    	)
    	 
    	));
    	$router->addRoute('contents/directions/staff/', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	    	':lang/directions/:alias/staff',
    	array(
    	    	    	    	    	    	    	    	    	    	        	'module' => 'contents',
    	    	    	    	    	    	    	    	    	    	        	'controller' => 'directions',
    	    	    	    	    	    	    	    	    	    	        	'action' => 'staff',
    	    	    	    	    	    	    	    	    	    				'alias' => '',
    	    	    	    	    	    	    	    	    	    	        	'lang' => ''
    	)
    	
    	));
    	$router->addRoute('contents/directions/view', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	':lang/directions/:alias/',
    	array(
    	    	    	    	    	    	    	    	        	'module' => 'contents',
    	    	    	    	    	    	    	    	        	'controller' => 'directions',
    	    	    	    	    	    	    	    	        	'action' => 'view',
    	    	    	    	    	    	    	    				'alias' => '',
    	    	    	    	    	    	    	    	        	'lang' => ''
    	)
    	
    	));
    	$router->addRoute('contents/directions/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	':lang/directions',
    	array(
    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	        			'controller' => 'directions',
    	    	    	    	    	    	    	        			'action' => 'index',
    	    	    	    	    	    	    	        			'lang' => ''
    	)
    	 
    	));
    	$router->addRoute('contents/lines/staff', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	    	':lang/lines/:alias/staff',
    	array(
    	    	    	    	    	    	    	    	    	    	        	'module' => 'contents',
    	    	    	    	    	    	    	    	    	    	        	'controller' => 'lines',
    	    	    	    	    	    	    	    	    	    	        	'action' => 'staff',
    	    	    	    	    	    	    	    	    	    				'alias' => '',
    	    	    	    	    	    	    	    	    	    	        	'lang' => ''
    	)
    	
    	));
    	$router->addRoute('contents/lines/view', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	':lang/lines/:alias/',
    	array(
    	    	    	    	    	    	    	    	    	        	'module' => 'contents',
    	    	    	    	    	    	    	    	    	        	'controller' => 'lines',
    	    	    	    	    	    	    	    	    	        	'action' => 'view',
    	    	    	    	    	    	    	    	    				'alias' => '',
    	    	    	    	    	    	    	    	    	        	'lang' => ''
    	)
    	 
    	));
    	$router->addRoute('contents/lines/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	':lang/lines',
    	array(
    	    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	    	        			'controller' => 'lines',
    	    	    	    	    	    	    	    	        			'action' => 'index',
    	    	    	    	    	    	    	    	        			'lang' => ''
    	)
    	
    	));
    	$router->addRoute('contents/published/university', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	    	    	':lang/published/university',
    	array(
    	    	    	    	    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	    	    	    	    	        			'controller' => 'published',
    	    	    	    	    	    	    	    	    	    	    	        			'action' => 'university',
    	    	    	    	    	    	    	    	    	    	    	        			'lang' => ''
    	)
    	 
    	));
    	$router->addRoute('contents/published/other', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	    	':lang/published/other',
    	array(
    	    	    	    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	    	    	    	        			'controller' => 'published',
    	    	    	    	    	    	    	    	    	    	        			'action' => 'other',
    	    	    	    	    	    	    	    	    	    	        			'lang' => ''
    	)
    	
    	));
    	$router->addRoute('contents/published/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	':lang/published',
    	array(
    	    	    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	    	    	        			'controller' => 'published',
    	    	    	    	    	    	    	    	    	        			'action' => 'index',
    	    	    	    	    	    	    	    	    	        			'lang' => ''
    	)
    	 
    	));
    	$router->addRoute('contents/schedule/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	    	':lang/schedule',
    	array(
    	    	    	    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	    	    	    	        			'controller' => 'schedule',
    	    	    	    	    	    	    	    	    	    	        			'action' => 'index',
    	    	    	    	    	    	    	    	    	    	        			'lang' => ''
    	)
    	
    	));

    	$router->addRoute('contents/subdividion/staff', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	    	    	    	    	    	':lang/subdividion/:alias/staff',
    	array(
    	    	    	    	    	    	    	    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	    	    	    	    	    	    	    	        			'controller' => 'subdividion',
    	    	    	    	    	    	    	    	    	    	    	    	    	    	        			'action' => 'staff',
    	    	    	    																										'alias' => '',
    	    	    	    	    	    	    	    	    	    	    	    	    	    	        			'lang' => ''
    	)
    	
    	));
    	$router->addRoute('contents/subdividion/view', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	    	    	    	    	':lang/subdividion/:alias',
    	array(
    	    	    	    	    	    	    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	    	    	    	    	    	    	        			'controller' => 'subdividion',
    	    	    	    	    	    	    	    	    	    	    	    	    	        			'action' => 'view',
    	    	    																										'alias' => '',
    	    	    	    	    	    	    	    	    	    	    	    	    	        			'lang' => ''
    	)
    	 
    	));
    	$router->addRoute('contents/subdividion', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	    	    	    	':lang/subdividion',
    	array(
    	    	    	    	    	    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	    	    	    	    	    	        			'controller' => 'subdividion',
    	    	    	    	    	    	    	    	    	    	    	    	        			'action' => 'index',
    	    																										'lang' => ''
    	)
    	
    	));
    	$router->addRoute('contents/static/index', new Zend_Controller_Router_Route(
    	    	    		':lang/info/:alias/',
    	array(
    	    	    	    	'module' => 'contents',
    	    	    	        'controller' => 'static',
    	    	    	        'action' => 'index',
    	    	    			'alias' => '',
    	    	    	        'lang' => ''
    	)
    	));
    	
    	/*  Mr. Fogg!!!! Please make the right order in the your's shitcode abowe!!!  */
    	
    	$router->addRoute(
    		'admin/contents', 
    		new Zend_Controller_Router_Route(
    	    	'contents/:controller/:action/*',
    			array(
    	    		'module' => 'contents'
    	    	)
    		)
    	);

    }
}
