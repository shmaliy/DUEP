<?php

class Users_Model_DbTable_UsersSroups extends Sunny_DataMapper_DbTableAbstract
{
	protected $_referenceMap = array(
		'UsersGroups_2_UsersReferences' => array(
			self::COLUMNS => 'id',
			self::REF_TABLE_CLASS => 'Users_Model_DbTable_UsersReferences',
			self::REF_COLUMNS => 'users_groups_id',
			self::ON_DELETE => self::CASCADE,
			self::ON_UPDATE => self::CASCADE
		),
		'UsersGroups_2_UsersGroups' => array(
			self::COLUMNS => 'id',
			self::REF_TABLE_CLASS => 'Users_Model_DbTable_UsersSroups',
			self::REF_COLUMNS => 'users_groups_id',
			self::ON_DELETE => self::CASCADE,
			self::ON_UPDATE => self::CASCADE
		)
	);
}