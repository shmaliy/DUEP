<?php

class Contents_Model_Mapper_Languages extends Sunny_DataMapper_MapperAbstract
{
	public function getDefaultLanguage()
	{
		$item = $this->fetchRow(array(
			$this->quoteIdentifier("default") . " = 1",
		));
		return $item->alias;
	}
	
	
	/*public function getFrontContentsByGroupId ($id, $lang = 'ru', $order = null, $lim = null)
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
		$this->quoteIdentifier("language") . " = ?" => $lang,
		),$order,$lim);
	}
	public function getFrontContentsByCatId ($id, $lang = 'ru', $order = null, $lim = null)
	{
		return $this->fetchAll(array(
			$this->quoteIdentifier("contents_categories_id") . " = ?" => $id,
			$this->quoteIdentifier("published") . " = ?" => '1',
			$this->quoteIdentifier("sheduled") . " = ?" => '0',
		    $this->quoteIdentifier("language") . " = ?" => $lang,
		),$order,$lim);
	}	

	public function getFrontContentByAlias ($alias, $lang = 'ru')
	{
		return $this->fetchrow(array(
		$this->quoteIdentifier("alias") . " = ?" => $alias,
		$this->quoteIdentifier("published") . " = ?" => '1',
		$this->quoteIdentifier("sheduled") . " = ?" => '0',
		$this->quoteIdentifier("language") . " = ?" => $lang,
		));
	}*/
}