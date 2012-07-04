<?php

class Contents_Form_Abstract extends Zend_Form
{
	protected $_contentsCategoriesOptions = array();
	protected $_entityId;
	
	protected function _treeToSelect($data, $array = array(), $level = 0)
	{
		if (null === $data) {
			return array();
		}
		
		foreach ($data as $branch) {
			if ($this->_entityId != $branch->id) {
				if($level > 0) {
					$branch->title = str_repeat('—', $level) . $branch->title;
				}
		
				$array[$branch->id] = $branch->title;
				if($branch->getExtendChilds()->count() > 0) {
					$array = $this->_treeToSelect($branch->getExtendChilds(), $array, $level+1);
				}
			}
		}
		
		return $array;
	}
	
	public function setEntityId($id)
	{
		$this->_entityId = $id;
	}
	
	public function getContentsCategoriesOptions()
	{
		$return = $this->_treeToSelect($this->_contentsCategoriesOptions);
		return array_merge(array("0" => 'Нет'), $return);
	}
	
	public function setContentsCategoriesOptions(Sunny_DataMapper_CollectionAbstract $tree = null)
	{
		$this->_contentsCategoriesOptions = $tree;
	}
}