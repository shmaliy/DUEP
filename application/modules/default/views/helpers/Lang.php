<?php

 

class Zend_View_Helper_Lang extends Zend_View_Helper_Abstract

{

    protected $_lang;
    public function Lang()

    {

        $this->_lang = Zend_Registry::get('lang');
         $langsMapper = new Contents_Model_Mapper_Languages();
        $this->view->langs = $langsMapper->getAllLang ();
        return $this->view->render('helpers/lang.php3');
        
    }

}
?>