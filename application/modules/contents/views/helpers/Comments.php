<?php

 

class Contents_View_Helper_Comments extends Zend_View_Helper_Abstract

{
    protected $_lang;
    public function Comments($alias)

    {
      $this->_lang = Zend_Registry::get('lang');
      
        


        $commentsMapper = new Contents_Model_Mapper_Comments();
        $this->view->comment = $commentsMapper->getFrontCommentsByAlias($alias);
       
        
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

        $this->view->comment->formatDate('created', $translatedMonths, 'г.');
      

        return $this->view->render('helpers/comments.php3');

    }
     

}
?>