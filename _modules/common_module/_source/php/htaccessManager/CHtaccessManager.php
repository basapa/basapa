<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:0
*/
namespace basapa_ns;


final class CHtaccessManager
{
	static private $_fInstance_clss;

	private $_fHtaccessesController_clss;
	private $_fHtaccessesData_clss;


	private function __construct()
	{
		//$this->_init();
	}

	/***************************************************
	 * INTERFACE
	 */

	static public function i_getInstance()
	{
		if (!isset(self::$_fInstance_clss))
		{
			self::$_fInstance_clss = new self();
		}
		return self::$_fInstance_clss;
	}

	public function i_getHtaccessesController()
	{
		return $this->_getHtaccessesController();
	}

	public function i_getHtaccessesData()
	{
		return $this->_getHtaccessesData();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getHtaccessesController()
	{
		return $this->_fHtaccessesController_clss ?? ($this->_fHtaccessesController_clss = new CHtaccessesController());
	}

	private function _getHtaccessesData()
	{
		return $this->_fHtaccessesData_clss ?? ($this->_fHtaccessesData_clss = new CHtaccessesData());
	}
}


?>