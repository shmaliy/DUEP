<?php

class Structure_Model_Mapper_Structure extends Sunny_DataMapper_MapperAbstract
{
	public function getFrontGroupByAlias ($alias)
	{
		return $this->fetchRow(array(
		$this->quoteIdentifier("alias") . " = ?"=>$alias,
		$this->quoteIdentifier("published") . " = ?" => '1',

		));
	}
	public function getFrontGroup ($lang = 'uk')
	{
	    return $this->fetchAll(array(
	    $this->quoteIdentifier("published") . " = ?" => '1',
	
	    ));
	}
	
}