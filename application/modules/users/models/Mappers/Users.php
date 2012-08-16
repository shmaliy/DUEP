<?php

class Users_Model_Mapper_Users extends Sunny_DataMapper_MapperAbstract
{
	public function getUsersGroupsByIdArray(array $idArray = array())
	{
		// Preformat argument
		$idArray = array_values($idArray);
		$idArray = array_unique($idArray);
		
		// If empty - do nothing
		if (empty($idArray)) {
			return array();
		}
		
		// get users groups identifiers
		$usersReferencesMapper = new Users_Model_Mapper_UsersReferences();
		$usersGrouupsIdArray   = $usersReferencesMapper->getUsersGroupsIdArrayByUsersIdArray($idArray);

		// Get users groups rows
		$usersGroupsMapper = new Users_Model_Mapper_UsersGroups();
		return $usersGroupsMapper->fetchAll($usersGrouupsIdArray);
		return $usersGrouupsIdArray;
		// get groups
		// store result
	}
	public function getAllUser ()
	{
	    return $this->fetchAll(array(
	    $this->quoteIdentifier("published") . " = ?" => '1',
	    ));
	}
}