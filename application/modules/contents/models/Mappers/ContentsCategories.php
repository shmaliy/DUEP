<?php

class Contents_Model_Mapper_ContentsCategories extends Sunny_DataMapper_MapperAbstract
{
	public function getFrontCatsByGroupId ($id, $lang)
	{
		return $this->fetchAll(array(
			$this->quoteIdentifier("contents_groups_id") . " = ?"       => $id,
			$this->quoteIdentifier("contents_categories_id") . " != ?" => '0',
			$this->quoteIdentifier("published") . " = ?" => '1',
		    $this->quoteIdentifier("language") . " = ?" => $lang,

		));
	}
}