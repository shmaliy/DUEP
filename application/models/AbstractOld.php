<?php

/**
 * Database result row model
 */
class Application_Model_Abstract
{
	/**
	 * Internal data container
	 * 
	 * @var array
	 */
	protected $_fields = array();
	
	/**
	 * Lowercase first character in string (some hosting providers hasn't it)
	 * 
	 * @param string $str
	 * @return string
	 */
	protected function _lcfirst($str)
	{
		$str = (string) $str;
		$str = str_split($str);
		$str[0] = strtolower($str[0]);
		$str = implode($str);
		return $str;
	}
	
	/**
	 * Constructor
	 * 
	 * @param array $options Setup options for row model (field names)
	 */
	public function __construct($options = null)
	{
		if (is_array($options)) {
			$this->setOptions($options);
		}
	}
	
	/**
	 * Set new value for field (class variable acess type)
	 * 
	 * @param string $name
	 * @param mixed $value
	 * @throws Exception
	 */
	public function __set($name, $value = null)
	{
		if (!array_key_exists($name, $this->_fields)) {
			// If field name not found - error
			throw new Exception("Invalid set property name '$name'", 500);
		}

		$this->_fields[$name] = $value;
		return $this;
	}
	
	/**
	 * Get specified field value (class variable acess type)
	 * 
	 * @param string $name
	 * @throws Exception
	 * @return mixed
	 */
	public function __get($name)
	{
		if (!array_key_exists($name, $this->_fields)) {
			// If field name not found - error
			throw new Exception("Invalid get property name '$name'", 500);
		}
		
		return $this->_fields[$name];
	}
	
	/**
	 * Get or set field value (class method acess type)
	 * 
	 * @param string $name
	 * @param array $arguments (used only first element of array)
	 * @throws Exception
	 */
	public function __call($name, $arguments)
	{
		$normalized = substr(strtolower($name), 0, 3);
		switch ($normalized) {
			case 'set':
				return $this->__set($this->_lcfirst(substr($name, 3)), $arguments[0]);
			case 'get':
				return $this->__get($this->_lcfirst(substr($name, 3)));
			default:
				// If field name not found - error
				throw new Exception("Invalid property or method name '$name'", 500);
		}
	}
	
	/**
	 * Setup options
	 * 
	 * @param array $options
	 */
	public function setOptions(array $options)
	{
		$methods = get_class_methods($this);
		
		if (isset($options['fields']) && is_array($options['fields'])) {
			$this->_fields = $options['fields'];
			unset($options['fields']);
		}
		
		foreach ($options as $key => $value) {
			$method = 'set' . ucfirst($key);
			
			if (in_array($method, $methods)) {
				$this->$method($value);
			} else if (array_key_exists($key, $this->_fields)) {
				$this->_fields[$key] = $value;
			}
		}
		
		return $this;		
	}
	
	/**
	 * Returns array representation of row
	 * 
	 * @return array
	 */
	public function toArray()
	{
		return (array) $this->_fields;
	}
}