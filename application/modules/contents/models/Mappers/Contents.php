<?php

class Contents_Model_Mapper_Contents extends Sunny_DataMapper_MapperAbstract
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
	
	public function getFrontContentsByGroupId ($id, $lang = 'uk', $order = null, $lim = null, $page = null)
	{
	    if (is_numeric($id)){$id=array($id);};
	    $where = array();
	    foreach ($id as $el):
	    $where[] = $this->quoteInto($this->quoteIdentifier("contents_groups_id") . " = ?" , $el);
	    endforeach;
		return $this->fetchPage(array(
			"(".implode(' or ', $where).")",
			$this->quoteIdentifier("published") . " = ?" => '1',
			$this->quoteIdentifier("sheduled") . " = ?" => '0',
		$this->quoteIdentifier("languages_alias") . " = ?" => $lang,
		), $order, $lim, $page);
	}
	
	public function getFrontContentsCountByGroupId($id, $lang = 'uk')
	{
	    if (is_numeric($id)) {
	    	$id = array($id);
		}
		
		if (count($id) == 0) {
			return 0;
		}
		
	    $where = array();
	    foreach ($id as $el) {
	    	$where[] = $this->quoteInto($this->quoteIdentifier("contents_groups_id") . " = ?" , $el);
	    }
	    
		return $this->fetchCount(array(
			"(".implode(' OR ', $where).")",
			$this->quoteIdentifier("published") . " = ?"       => '1',
			$this->quoteIdentifier("sheduled") . " = ?"        => '0',
			$this->quoteIdentifier("languages_alias") . " = ?" => $lang,
		));
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
	public function getFrontContentsByIndex ($lang = 'uk', $order = null)
	{
	    return $this->fetchAll(array(
	    $this->quoteIdentifier("in_presentation") . " = ?" => '1',
	    $this->quoteIdentifier("published") . " = ?" => '1',
	    $this->quoteIdentifier("sheduled") . " = ?" => '0',
	    $this->quoteIdentifier("languages_alias") . " = ?" => $lang,
	    ),$order);
	}
	
}