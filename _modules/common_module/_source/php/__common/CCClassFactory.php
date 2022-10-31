<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:-1
*/
namespace basapa_ns;


/*abstract*/class CCClassFactory
{
	public function __construct()
	{
		//$this->__init();
	}

	/***************************************************
	 * INTERFACE
	 */

	/**@return CCHtaccesConst*/
	public function i_getHtaccesConstNSClassName():string
	{
		return $this->_getNSClassName($this->__getHtaccesConstClassName());
	}

	/**@return CCRequestParamConst*/
	public function i_getRequestParamConstNSClassName():string
	{
		return $this->_getNSClassName($this->i_getRequestParamConstClassName());
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/
	
	/*virtual*/protected function __getHtaccesConstClassName():string
	{
		return 'CCHtaccesConst';
	}
	
	/*virtual*/protected function i_getRequestParamConstClassName():string
	{
		return 'CCRequestParamConst';
	}
	
	private function _getNSClassName(string $aClassName_str):string
	{
		return __NAMESPACE__ . '\\' .$aClassName_str;
	}
}


?>