<?php

class Users_Model_DbTable_UsersGroups extends Sunny_DataMapper_DbTableAbstract
{
	public function getAllByIdArray(array $idArray = array())
	{
		$select = $this->select();
		$select->from($this->_name);
		
		$where = array();
		foreach ($idArray as $id) {
			$where[] = $this->getAdapter()->quoteInto($this->getAdapter()->quoteIdentifier('id') . ' = ?', $id);
		}
		
		$select->where(implode(' ' . Zend_Db_Select::SQL_OR . '', $where));
		
		$stmt = $this->_db->query($select);
		$data = $stmt->fetchAll(Zend_Db::FETCH_ASSOC);
		return $data;
	}
}