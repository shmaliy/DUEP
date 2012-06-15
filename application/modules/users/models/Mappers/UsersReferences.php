<?php

class Users_Model_Mapper_UsersReferences extends Sunny_DataMapper_MapperAbstract
{
	public function getUsersGroupsIdArrayByUsersIdArray(array $idArray = array())
	{
		// Preformat argument
		$idArray = array_values($idArray);
		$idArray = array_unique($idArray);
		
		// If empty - do nothing
		if (empty($idArray)) {
			return array();
		}
		
		// Return array of identifiers
		return $this->getDbTable()->getUsersGroupsIdArrayByUsersIdArray($idArray);
	}
}