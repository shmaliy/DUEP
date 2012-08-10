<?php

 

class Media_View_Helper_Actual extends Zend_View_Helper_Abstract

{
    protected $_lang;
    public function Actual()

    {
        $this->_lang = Zend_Registry::get('lang');
         $groupsMapper = new Contents_Model_Mapper_ContentsGroups();
        $this->view->agroup = $groupsMapper->getFrontGroupByAlias ("announcements");
        $this->view->ngroup = $groupsMapper->getFrontGroupByAlias ("news");
        $this->view->egroup = $groupsMapper->getFrontGroupByAlias ("events");
        $this->view->group = $groupsMapper->getFrontGroup();
        
        $catMapper = new Contents_Model_Mapper_ContentsCategories();
        $this->view->acats = $catMapper->getFrontCatsByGroupId($this->view->agroup->id, $this->_lang);
        $this->view->ncats = $catMapper->getFrontCatsByGroupId($this->view->ngroup->id, $this->_lang);
        $this->view->ecats = $catMapper->getFrontCatsByGroupId($this->view->egroup->id, $this->_lang);
        $this->view->cats = $catMapper->getFrontCats();
        $contentsMapper = new Contents_Model_Mapper_Contents();
        $this->view->events = $contentsMapper->getFrontContentsByGroupId($this->view->agroup->id, $this->_lang,'date_created desc');
        $this->view->announcements = $contentsMapper->getFrontContentsByGroupId($this->view->agroup->id, $this->_lang,'date_created desc');
        $this->view->news = $contentsMapper->getFrontContentsByGroupId($this->view->ngroup->id, $this->_lang, 'date_created desc');
        $this->view->actual = $contentsMapper->getFrontContentsByGroupId(array ($this->view->egroup->id, $this->view->agroup->id, $this->view->ngroup->id), $this->_lang,'date_created desc',5);
         
        
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
        $this->view->events->formatDate('date_created', $translatedMonths, 'г.');
        $this->view->news->formatDate('date_created', $translatedMonths, 'г.');
        $this->view->actual->formatDate('date_created', $translatedMonths, 'г.');
        
        
       
        

        return $this->view->render('helpers/actual.php3');

    }

}
?>