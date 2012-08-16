<?php

class Contents_Model_Mapper_Comments extends Sunny_DataMapper_MapperAbstract
{
	
	public function getFrontCommentsByAlias ($alias)
	{
		return $this->fetchAll(array(
		$this->quoteIdentifier("contents_alias") . " = ?" => $alias,
		$this->quoteIdentifier("published") . " = ?" => '1',
		));
	}
}