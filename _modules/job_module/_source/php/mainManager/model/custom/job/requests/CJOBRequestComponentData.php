<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CJOBRequestComponentData// extends CCComponentFilledData
{
	private $_fComponentId_str							= '';
	private $_fComponentValue_str						= '';
	private $_fComponentIsValid_bl						= false;
	private $_fComponentFillingMode_int					= -1;


	/***************************************************
	 * INTERFACE
	 */
	
	//ID...
	public function i_setComponentId(string $aComponentId_str)
	{
		$this->_fComponentId_str = $aComponentId_str;
	}
	
	public function i_getComponentId():string
	{
		return $this->_fComponentId_str;
	}
	//...ID
	
	//VALUE...
	public function i_setComponentValue(string $aComponentValue_str)
	{
		$this->_fComponentValue_str = $aComponentValue_str;
	}
	
	public function i_getComponentValue():string
	{
		return $this->_fComponentValue_str;
	}
	//...VALUE
	
	//IS VALID...
	public function i_setComponentValid(bool $aComponentIsValid_bl)
	{
		$this->_fComponentIsValid_bl = $aComponentIsValid_bl;
	}
	
	public function i_isComponentValid():bool
	{
		return $this->_fComponentIsValid_bl;
	}
	//...IS VALID
	
	//FILLING MODE...
	public function i_setComponentFillingMode(int $aComponentFillingMode_int)
	{
		$this->_fComponentFillingMode_int = $aComponentFillingMode_int;
	}
	
	public function i_getComponentFillingMode():int
	{
		return $this->_fComponentFillingMode_int;
	}
	//...FILLING MODE
	
	/*
	 * INTERFACE
	 ***************************************************/
}


?>