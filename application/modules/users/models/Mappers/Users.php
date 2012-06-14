<?php

class Users_Model_Mapper_Users extends Sunny_DataMapper_MapperAbstract
{
	public function test()
	{
		return 'ok';
	}
	
	public function getUserGroups($usersCollection = array())
	{
		$users = array();
		
		// get users identifiers
		$usersReferencesMapper = new Users_Model_Mapper_UsersReferences();
		foreach ($users as $user) {
			
		}
		// get groups identifiers
		// get groups
		// store result
	}
}