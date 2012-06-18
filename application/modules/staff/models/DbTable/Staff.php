<?php

class Staff_Model_DbTable_Staff extends Sunny_DataMapper_DbTableAbstract
{
	public function adminGetStaff($mode, $order, $count, $page)
	{
		$select = $this->createSelectPage(null, $order, $count, $page);
		$select->where($this->quoteIdentifier('mode') . ' = ?', $mode, 'INTEGER');
		
		return $this->fetchAll($select);
	}
	
	public function adminGetStaffTotal($mode)
	{
		$where = $this->quoteInto($this->quoteIdentifier('mode') . ' = ?', $mode, 'INTEGER');
		return $this->fetchCount($where);
	}
}