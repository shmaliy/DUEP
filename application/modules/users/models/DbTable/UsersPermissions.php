<?php

class Users_Model_DbTable_UsersPermissions extends Sunny_DataMapper_DbTableAbstract
{
	protected $_referenceMap = array(
		'UsersPermissions_2_UsersReferences' => array(
			self::COLUMNS => 'id',
			self::REF_TABLE_CLASS => 'Users_Model_DbTable_UsersReferences',
			self::REF_COLUMNS => 'users_permissions_id',
			self::ON_DELETE => self::CASCADE,
			self::ON_UPDATE => self::CASCADE
		)
	);	
}