<?php

class Contents_Model_Mapper_Contents extends Sunny_DataMapper_MapperAbstract
{
	public function getFrontContentsByGroupId ($id, $order = null, $lim = null)
	{
		return $this->fetchAll(array(
			$this->quoteIdentifier("contents_groups_id") . " = ?"       => $id,
			$this->quoteIdentifier("published") . " = ?" => '1',
			$this->quoteIdentifier("sheduled") . " = ?" => '0',
		),$order,$lim);
	}
	public function getFrontContentsByCatId ($id, $order = null, $lim = null)
	{
		return $this->fetchAll(array(
			$this->quoteIdentifier("contents_categories_id") . " = ?" => $id,
			$this->quoteIdentifier("published") . " = ?" => '1',
			$this->quoteIdentifier("sheduled") . " = ?" => '0',
		),$order,$lim);
	}	
}