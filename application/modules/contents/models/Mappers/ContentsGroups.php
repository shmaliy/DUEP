<?php

class Contents_Model_Mapper_ContentsGroups extends Sunny_DataMapper_MapperAbstract
{
	public function getFrontGroupByAlias ($alias)
	{
		return $this->fetchRow(array(
		$this->quoteIdentifier("alias") . " = ?"=>$alias,
		$this->quoteIdentifier("published") . " = ?" => '1',

		));
	}
	public function getFrontGroup ($lang)
	{
	    return $this->fetchAll(array(
	    $this->quoteIdentifier("published") . " = ?" => '1',
	
	    ));
	}
	
}