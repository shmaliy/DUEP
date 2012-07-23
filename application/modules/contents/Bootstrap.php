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
    	$router->setGlobalParam('lang', 'ru');
    	 
    	// Override default route
    	
    	$router->addRoute('contents/news/view', new Zend_Controller_Router_Route(
    		':lang/news/:alias/',
    	    array(
    	    	'module' => 'contents',
    	        'controller' => 'news',
    	        'action' => 'view',
    			'alias' => '',
    	        'lang' => 'ru'
    	    )    	 
    	));
    	
    	$router->addRoute('contents/news/index', new Zend_Controller_Router_Route(
    	    ':lang/news/',
    	    array(
    	        'module' => 'contents',
    	        'controller' => 'news',
    	        'action' => 'index',
    	        'lang' => 'ru'
    	    )
    	));
    	$router->addRoute('contents/events/view', new Zend_Controller_Router_Route(
    	    	    	    	':lang/events/:alias/',
    	array(
    	    	        	'module' => 'contents',
    	    	        	'controller' => 'events',
    	    	        	'action' => 'view',
    	    				'alias' => '',
    	    	        	'lang' => 'ru'
    	)
    	
    	));
    	$router->addRoute('contents/events/index', new Zend_Controller_Router_Route(
    	    	    	':lang/events',
    	array(
    	        			'module' => 'contents',
    	        			'controller' => 'events',
    	        			'action' => 'index',
    	        			'lang' => 'ru'
    	)
    	 
    	));
    	$router->addRoute('contents/mir/view', new Zend_Controller_Router_Route(
    	    	    	    	    	':lang/mir/:alias/',
    	array(
    	    	    	      'module' => 'contents',
    	    	    	      'controller' => 'mir',
    	    	    	      'action' => 'view',
    	    	    		  'alias' => '',
    	    	    	      'lang' => 'ru'
    	)
    	 
    	));
    	$router->addRoute('contents/mir/index', new Zend_Controller_Router_Route(
    	    	    	    	':lang/mir',
    	array(
    	    	        	   'module' => 'contents',
    	    	        	   'controller' => 'mir',
    	    	        		'action' => 'index',
    	    	        		'lang' => 'ru'
    	)
    	
    	));
    	$router->addRoute('contents/licenses/view', new Zend_Controller_Router_Route(
    	    	    	    	    	    	':lang/licenses/:alias/',
    	array(
    	    	    	    	        	'module' => 'contents',
    	    	    	    	        	'controller' => 'licenses',
    	    	    	    	        	'action' => 'view',
    	    	    	    				'alias' => '',
    	    	    	    	        	'lang' => 'ru'
    	)
    	
    	));
    	$router->addRoute('contents/licenses/index', new Zend_Controller_Router_Route(
    	    	    	    	    			':lang/licenses',
    	array(
    	    	    	        			'module' => 'contents',
    	    	    	        			'controller' => 'licenses',
    	    	    	        			'action' => 'index',
    	    	    	        			'lang' => 'ru'
    	)
    	 
    	));
    	$router->addRoute('contents/structure-university/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	':lang/structure-university',
    	array(
    	    	    	    	        	'module' => 'contents',
    	    	    	    	        	'controller' => 'structure-university',
    	    	    	    	        	'action' => 'index',
    	    	    	    	        	'lang' => 'ru'
    	)
    	
    	));
    	$router->addRoute('contents/announcements/view', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	':lang/announcements/:alias/',
    	array(
    	    	    	    	    	    'module' => 'contents',
    	    	    	    	    	    'controller' => 'announcements',
    	    	    	    	    	    'action' => 'view',
    	    	    	    	    		'alias' => '',
    	    	    	    	    	        	'lang' => 'ru'
    	)
    	 
    	));
    	$router->addRoute('contents/announcements/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	':lang/announcements',
    	array(
    	    	    	    	        	'module' => 'contents',
    	    	    	    	        	'controller' => 'announcements',
    	    	    	    	        	'action' => 'index',
    	    	    	    	        	'lang' => 'ru'
    	)
    	
    	));
    	$router->addRoute('contents/contacts/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	':lang/contacts',
    	array(
    	    	    	    	    	    'module' => 'contents',
    	    	    	    	    	    'controller' => 'contacts',
    	    	    	    	    	    'action' => 'index',
    	    	    	    	    	    'lang' => 'ru'
    	)
    	 
    	));
    	$router->addRoute('contents/career/vacancy', new Zend_Controller_Router_Route(
    	    	    	    	    	    	 ':lang/career/:alias/',
    	array(
    	    	    	    	    	    'module' => 'contents',
    	    	    	    	    	    'controller' => 'career',
    	    	    	    	    	    'action' => 'vacancy',
    	    	    	    	    	    'alias' => '',
    	    	    	    	    	    'lang' => 'ru'
    	)
    	
    	));
    	$router->addRoute('contents/career/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	':lang/career',
    	array(
    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	        			'controller' => 'career',
    	    	    	    	    	        			'action' => 'index',
    	    	    	    	    	        			'lang' => 'ru'
    	)
    	 
    	));
    	$router->addRoute('contents/arrangement/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	':lang/arrangement',
    	array(
    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	        			'controller' => 'arrangement',
    	    	    	    	    	    	        			'action' => 'index',
    	    	    	    	    	    	        			'lang' => 'ru'
    	)
    	
    	));
    	$router->addRoute('contents/activities/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	':lang/activities',
    	array(
    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	        			'controller' => 'activities',
    	    	    	    	    	    	    	        			'action' => 'index',
    	    	    	    	    	    	    	        			'lang' => 'ru'
    	)
    	 
    	));
    	$router->addRoute('contents/awards/view', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	':lang/awards/:alias/',
    	array(
    	    	    	    	    	    	    	        	'module' => 'contents',
    	    	    	    	    	    	    	        	'controller' => 'awards',
    	    	    	    	    	    	    	        	'action' => 'view',
    	    	    	    	    	    	    				'alias' => '',
    	    	    	    	    	    	    	        	'lang' => 'ru'
    	)
    	 
    	));
    	$router->addRoute('contents/awards/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	':lang/awards',
    	array(
    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	        			'controller' => 'awards',
    	    	    	    	    	    	        			'action' => 'index',
    	    	    	    	    	    	        			'lang' => 'ru'
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
    	    	    	    	    	    	    	    	    	    	    	        	'lang' => 'ru'
    	)
    	 
    	));
    	$router->addRoute('contents/directions/disciplines/', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	    	':lang/directions/:alias/disciplines',
    	array(
    	    	    	    	    	    	    	    	    	    	        	'module' => 'contents',
    	    	    	    	    	    	    	    	    	    	        	'controller' => 'directions',
    	    	    	    	    	    	    	    	    	    	        	'action' => 'disciplines',
    	    	    	    	    	    	    	    	    	    				'alias' => '',
    	    	    	    	    	    	    	    	    	    	        	'lang' => 'ru'
    	)
    	
    	));
    	$router->addRoute('contents/directions/history/', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	':lang/directions/:alias/history',
    	array(
    	    	    	    	    	    	    	    	    	        	'module' => 'contents',
    	    	    	    	    	    	    	    	    	        	'controller' => 'directions',
    	    	    	    	    	    	    	    	    	        	'action' => 'history',
    	    	    	    	    	    	    	    	    				'alias' => '',
    	    	    	    	    	    	    	    	    	        	'lang' => 'ru'
    	)
    	 
    	));
    	$router->addRoute('contents/directions/staff/', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	    	':lang/directions/:alias/staff',
    	array(
    	    	    	    	    	    	    	    	    	    	        	'module' => 'contents',
    	    	    	    	    	    	    	    	    	    	        	'controller' => 'directions',
    	    	    	    	    	    	    	    	    	    	        	'action' => 'staff',
    	    	    	    	    	    	    	    	    	    				'alias' => '',
    	    	    	    	    	    	    	    	    	    	        	'lang' => 'ru'
    	)
    	
    	));
    	$router->addRoute('contents/directions/view', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	':lang/directions/:alias/',
    	array(
    	    	    	    	    	    	    	    	        	'module' => 'contents',
    	    	    	    	    	    	    	    	        	'controller' => 'directions',
    	    	    	    	    	    	    	    	        	'action' => 'view',
    	    	    	    	    	    	    	    				'alias' => '',
    	    	    	    	    	    	    	    	        	'lang' => 'ru'
    	)
    	
    	));
    	$router->addRoute('contents/directions/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	':lang/directions',
    	array(
    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	        			'controller' => 'directions',
    	    	    	    	    	    	    	        			'action' => 'index',
    	    	    	    	    	    	    	        			'lang' => 'ru'
    	)
    	 
    	));
    	$router->addRoute('contents/lines/staff', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	    	':lang/lines/:alias/staff',
    	array(
    	    	    	    	    	    	    	    	    	    	        	'module' => 'contents',
    	    	    	    	    	    	    	    	    	    	        	'controller' => 'lines',
    	    	    	    	    	    	    	    	    	    	        	'action' => 'staff',
    	    	    	    	    	    	    	    	    	    				'alias' => '',
    	    	    	    	    	    	    	    	    	    	        	'lang' => 'ru'
    	)
    	
    	));
    	$router->addRoute('contents/lines/view', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	':lang/lines/:alias/',
    	array(
    	    	    	    	    	    	    	    	    	        	'module' => 'contents',
    	    	    	    	    	    	    	    	    	        	'controller' => 'lines',
    	    	    	    	    	    	    	    	    	        	'action' => 'view',
    	    	    	    	    	    	    	    	    				'alias' => '',
    	    	    	    	    	    	    	    	    	        	'lang' => 'ru'
    	)
    	 
    	));
    	$router->addRoute('contents/lines/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	':lang/lines',
    	array(
    	    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	    	        			'controller' => 'lines',
    	    	    	    	    	    	    	    	        			'action' => 'index',
    	    	    	    	    	    	    	    	        			'lang' => 'ru'
    	)
    	
    	));
    	$router->addRoute('contents/published/university', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	    	    	':lang/published/university',
    	array(
    	    	    	    	    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	    	    	    	    	        			'controller' => 'published',
    	    	    	    	    	    	    	    	    	    	    	        			'action' => 'university',
    	    	    	    	    	    	    	    	    	    	    	        			'lang' => 'ru'
    	)
    	 
    	));
    	$router->addRoute('contents/published/other', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	    	':lang/published/other',
    	array(
    	    	    	    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	    	    	    	        			'controller' => 'published',
    	    	    	    	    	    	    	    	    	    	        			'action' => 'other',
    	    	    	    	    	    	    	    	    	    	        			'lang' => 'ru'
    	)
    	
    	));
    	$router->addRoute('contents/published/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	':lang/published',
    	array(
    	    	    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	    	    	        			'controller' => 'published',
    	    	    	    	    	    	    	    	    	        			'action' => 'index',
    	    	    	    	    	    	    	    	    	        			'lang' => 'ru'
    	)
    	 
    	));
    	$router->addRoute('contents/shedule/index', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	    	':lang/shedule',
    	array(
    	    	    	    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	    	    	    	        			'controller' => 'shedule',
    	    	    	    	    	    	    	    	    	    	        			'action' => 'index',
    	    	    	    	    	    	    	    	    	    	        			'lang' => 'ru'
    	)
    	
    	));
    	$router->addRoute('contents/shedule/calendar', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	    	    	':lang/shedule/:alias/calendar',
    	array(
    	    	    	    	    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	    	    	    	    	        			'controller' => 'shedule',
    	    	    	    	    	    	    	    	    	    	    	        			'action' => 'calendar',
    																										'alias' => '',
    	    	    	    	    	    	    	    	    	    	    	        			'lang' => 'ru'
    	)
    	 
    	));
    	$router->addRoute('contents/subdividion/staff', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	    	    	    	    	    	':lang/subdividion/:alias/staff',
    	array(
    	    	    	    	    	    	    	    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	    	    	    	    	    	    	    	        			'controller' => 'subdividion',
    	    	    	    	    	    	    	    	    	    	    	    	    	    	        			'action' => 'staff',
    	    	    	    																										'alias' => '',
    	    	    	    	    	    	    	    	    	    	    	    	    	    	        			'lang' => 'ru'
    	)
    	
    	));
    	$router->addRoute('contents/subdividion/view', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	    	    	    	    	':lang/subdividion/:alias',
    	array(
    	    	    	    	    	    	    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	    	    	    	    	    	    	        			'controller' => 'subdividion',
    	    	    	    	    	    	    	    	    	    	    	    	    	        			'action' => 'view',
    	    	    																										'alias' => '',
    	    	    	    	    	    	    	    	    	    	    	    	    	        			'lang' => 'ru'
    	)
    	 
    	));
    	$router->addRoute('contents/subdividion', new Zend_Controller_Router_Route(
    	    	    	    	    	    	    	    	    	    	    	    	    	    	':lang/subdividion',
    	array(
    	    	    	    	    	    	    	    	    	    	    	    	        			'module' => 'contents',
    	    	    	    	    	    	    	    	    	    	    	    	        			'controller' => 'subdividion',
    	    	    	    	    	    	    	    	    	    	    	    	        			'action' => 'index',
    	    																										'lang' => 'ru'
    	)
    	
    	));

    }
}
