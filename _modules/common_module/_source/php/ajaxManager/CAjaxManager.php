<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:0
*/
namespace basapa_ns;


final class CAjaxManager
{
	static private $_fInstance_clss;

	private $_fAjaxesController_clss;
	private $_fAjaxesData_clss;


	private function __construct()
	{
		//$this->_init();
	}

	/***************************************************
	 * INTERFACE
	 */

	static public function i_getInstance():self
	{
		if (!isset(self::$_fInstance_clss))
		{
			self::$_fInstance_clss = new self();
		}
		return self::$_fInstance_clss;
	}

	public function i_getAjaxesController()
	{
		return $this->_getAjaxesController();
	}

	public function i_getAjaxesData()
	{
		return $this->_getAjaxesData();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getAjaxesController()
	{
		return isset($this->_fAjaxesController_clss) ? $this->_fAjaxesController_clss : ($this->_fAjaxesController_clss = new CAjaxesController());
	}

	private function _getAjaxesData()
	{
		return isset($this->_fAjaxesData_clss) ? $this->_fAjaxesData_clss : ($this->_fAjaxesData_clss = new CAjaxesData());
	}
}


?>