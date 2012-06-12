<?php

class Users_Model_DbTable_UsersReferences extends Sunny_DataMapper_DbTableAbstract
{
	protected $_dependentTables = array(
		'Users_Model_DbTable_Users',
		'Users_Model_DbTable_UsersSroups',
		'Users_Model_DbTable_UsersPermissions'
	);
}