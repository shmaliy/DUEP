<?php

class Media_Model_Mapper_MediaRelations extends Sunny_DataMapper_MapperAbstract
{
    public function getContentImgAll ()
    {
        return $this->fetchAll(array(
       // $this->quoteIdentifier("published") . " = ?" => '1',
        ));
    }
}