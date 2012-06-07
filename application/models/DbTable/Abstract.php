<?php

/**
 * Zend_Db_Table extension class with authomatic setup table name
 * @author jenya
 *
 */
class Application_Model_DbTable_Abstract extends Zend_Db_Table_Abstract
{
	/**
	 * Override default _setupTableName method
	 * 
	 * (non-PHPdoc)
	 * @see Zend_Db_Table_Abstract::_setupTableName()
	 */
	protected function _setupTableName()
	{
		if (!$this->_name) {
			$this->_name = $this->_formatInflectedTableName(get_class($this));
		}
		
		parent::_setupTableName();
	}
	
	/**
	 * Convert child class name to database table name
	 * 
	 * @param string $name
	 * @return string
	 */
	protected function _formatInflectedTableName($name)
	{
		$name = explode('_', $name);
		$name = end($name);
		
		$filter = new Zend_Filter_Word_CamelCaseToUnderscore();		
		return strtolower($filter->filter($name));
	}
}