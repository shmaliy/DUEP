<?php

class Users_Model_DbTable_Users extends Sunny_DataMapper_DbTableAbstract
{
	protected $_referenceMap = array(
		'Users_2_UsersReferences' => array(
			self::COLUMNS => 'id',
			self::REF_TABLE_CLASS => 'Users_Model_DbTable_UsersReferences',			
			self::REF_COLUMNS => 'users_id',
			self::ON_DELETE => self::CASCADE,
			self::ON_UPDATE => self::CASCADE
		)
	);
	
	
}