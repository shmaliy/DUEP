<?php

class Contents_Model_Mapper_ContentsCategories extends Sunny_DataMapper_MapperAbstract
{
	public function getFrontCatsByGroupId ($id)
	{
		return $this->fetchAll(array(
			$this->quoteIdentifier("contents_groups_id") . " = ?"       => $id,
			$this->quoteIdentifier("contents_categories_id") . " != ?" => '0',
		));
	}
}