<?php

class Staff_Model_Mapper_Staff extends Sunny_DataMapper_MapperAbstract
{
	public function getAdminPageTeachers($order = null, $count = null, $page = null)
	{
		$rowset = $this->getDbTable()->adminGetStaff(0 , $order, $count, $page);
		return $this->_rowsetToCollection($rowset);
	}
	
	public function getAdminTotalTeachers()
	{
		return $this->getDbTable()->adminGetStaffTotal(0);
	}
	
	public function getAdminPageStudents($order = null, $count = null, $page = null)
	{
		$rowset = $this->getDbTable()->adminGetStaff(1 , $order, $count, $page);
		return $this->_rowsetToCollection($rowset);
	}
	
	public function getAdminTotalStudents()
	{
		return $this->getDbTable()->adminGetStaffTotal(1);
	}
	public function getAllUser ()
	{
	    return $this->fetchAll(array(
	    $this->quoteIdentifier("published") . " = ?" => '1',
	    ));
	}
}