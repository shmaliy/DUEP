<?php

class Users_Model_DbTable_UsersReferences extends Sunny_DataMapper_DbTableAbstract
{
	protected $_dependentTables = array(
		'Users_Model_DbTable_Users',
		'Users_Model_DbTable_UsersSroups',
		'Users_Model_DbTable_UsersPermissions'
	);
	
	public function getUsersGroupsIdArrayByUsersIdArray(array $idArray = array())
	{
		$select = $this->select();
		$select->from($this->_name, array('users_groups_id'));
		$select->distinct();
		
		$where = array();
		foreach ($idArray as $id) {
			$where[] = $this->getAdapter()->quoteInto($this->getAdapter()->quoteIdentifier('users_id') . ' = ?', $id);
		}
		
		$select->where(implode(' ' . Zend_Db_Select::SQL_OR . '', $where));
		
        $stmt = $this->_db->query($select);
        $data = $stmt->fetchAll(Zend_Db::FETCH_COLUMN);
        return $data;
	}
}