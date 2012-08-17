<?php

class Contents_Model_Mapper_ContentsCategories extends Sunny_DataMapper_MapperAbstract
{
	public function getFrontCatsByGroupId ($id, $lang= 'uk')
	{
	   
		return $this->fetchAll(array(
			$this->quoteIdentifier("contents_groups_id") . " = ?"       => $id,
			$this->quoteIdentifier("contents_categories_id") . " != ?" => '0',
			$this->quoteIdentifier("published") . " = ?" => '1',
		    $this->quoteIdentifier("language") . " = ?" => $lang,

		));
	}
	public function getFrontCats ($lang = 'uk')
	{
	    
	    return $this->fetchAll(array(
	    $this->quoteIdentifier("published") . " = ?" => '1',
	    $this->quoteIdentifier("language") . " = ?" => $lang,
	
	    ));
	}
	public function getFrontCatsByAlias ($cat)
	{
	    return $this->fetchRow(array(
	    $this->quoteIdentifier("alias") . " = ?"=>$cat,
	    $this->quoteIdentifier("published") . " = ?" => '1',
	
	    ));
	}
}