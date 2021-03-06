<?php

/*
* Bootstrap->__construct()
* Module_Bootstrap->__construct()
* Bootstrap->run()
*/

class Media_Bootstrap extends Zend_Application_Module_Bootstrap
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
        //$router->setGlobalParam('lang', 'uk');
    
        // Override default route
       
    $router->addRoute('media/file/view', new Zend_Controller_Router_Route(
        		':lang/file/:alias/',
    array(
        	    	'module' => 'media',
        	        'controller' => 'file',
        	        'action' => 'view',
        			'alias' => '',
        	        'lang' => ''
    )
    ));
     
    $router->addRoute('media/file/index', new Zend_Controller_Router_Route(
        	    ':lang/file/',
    array(
        	        'module' => 'media',
        	        'controller' => 'file',
        	        'action' => 'index',
        	        'lang' => ''
    )
    ));
     

     
    $router->addRoute('media/photo-gallery/view', new Zend_Controller_Router_Route(
                		':lang/photo/:cat/:alias/',
    array(
                	    	'module' => 'media',
                	        'controller' => 'photo-gallery',
                	        'action' => 'view',
                			'alias' => '',
        					'cat' => '',
                	        'lang' => ''
    )
    ));
    $router->addRoute('media/photo-gallery/cat', new Zend_Controller_Router_Route(
                    		':lang/photo/:cat/',
    array(
                    	    	'module' => 'media',
                    	        'controller' => 'photo-gallery',
                    	        'action' => 'cat',
            					'cat' => '',
                    	        'lang' => ''
    )
    ));
    
    $router->addRoute('media/photo-gallery/index', new Zend_Controller_Router_Route(
            	    ':lang/photo/',
    array(
            	        'module' => 'media',
            	        'controller' => 'photo-gallery',
            	        'action' => 'index',
            	        'lang' => ''
    )
    ));
    $router->addRoute('media/video-gallery/view', new Zend_Controller_Router_Route(
                		':lang/video/:alias/',
    array(
                	    	'module' => 'media',
                	        'controller' => 'video-gallery',
                	        'action' => 'view',
                			'alias' => '',
                	        'lang' => ''
    )
    ));
    $router->addRoute('media/video-gallery/cat', new Zend_Controller_Router_Route(
                        		':lang/video/:cat/',
    array(
                        	    	'module' => 'media',
                        	        'controller' => 'video-gallery',
                        	        'action' => 'cat',
                					'cat' => '',
                        	        'lang' => ''
    )
    ));
    
    $router->addRoute('media/video-gallery/index', new Zend_Controller_Router_Route(
                	    ':lang/video/',
    array(
                	        'module' => 'media',
                	        'controller' => 'video-gallery',
                	        'action' => 'index',
                	        'lang' => ''
    )
    ));
    
    
    /*  Макс, шо за каша в роутерах???? 
     * иди в опу все нормально */
    
    $router->addRoute(
        'admin/media', 
    	new Zend_Controller_Router_Route(
        	'media/:controller/:action/*',
    		array(
        		'module' => 'media'
    		)
    	)
    );
    
    }
}
