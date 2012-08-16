<?php

class Comments_Model_Mapper_Contents extends Sunny_DataMapper_MapperAbstract
{
	public function getContentsFromGroup($group = null, $ignoreIds = array())
	{
		$where = array();
		$where[$this->quoteIdentifier("contents_groups_id") . " = ?"] = $group;
		
		if (!empty($ignoreIds)) {
			foreach ($ignoreIds as $id) {
				$where[$this->quoteIdentifier("id") . " != ?"] = $id;
			}
		}
		
		return $this->fetchAll(
			$where, 'ordering asc'
		);
	}
	
	public function getFrontContentsByGroupId ($id, $lang = 'uk', $order = null, $lim = null)
	{
	    if (is_numeric($id)){$id=array($id);};
	    $where = array();
	    foreach ($id as $el):
	    $where[] = $this->quoteInto($this->quoteIdentifier("contents_groups_id") . " = ?" , $el);
	    endforeach;
		return $this->fetchAll(array(
			"(".implode(' or ', $where).")",
			$this->quoteIdentifier("published") . " = ?" => '1',
			$this->quoteIdentifier("sheduled") . " = ?" => '0',
		$this->quoteIdentifier("languages_alias") . " = ?" => $lang,
		),$order,$lim);
	}
	public function getFrontContentsByCatId ($id, $lang = 'uk', $order = null, $lim = null)
	{
		return $this->fetchAll(array(
			$this->quoteIdentifier("contents_categories_id") . " = ?" => $id,
			$this->quoteIdentifier("published") . " = ?" => '1',
			$this->quoteIdentifier("sheduled") . " = ?" => '0',
		    $this->quoteIdentifier("languages_alias") . " = ?" => $lang,
		),$order,$lim);
	}	

	public function getFrontContentByAlias ($alias, $lang = 'uk')
	{
		return $this->fetchRow(array(
		$this->quoteIdentifier("alias") . " = ?" => $alias,
		$this->quoteIdentifier("published") . " = ?" => '1',
		$this->quoteIdentifier("sheduled") . " = ?" => '0',
		$this->quoteIdentifier("languages_alias") . " = ?" => $lang,
		));
	}
}