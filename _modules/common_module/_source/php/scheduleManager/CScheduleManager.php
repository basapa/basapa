<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:0
*/
namespace basapa_ns;


final class CScheduleManager
{
	static private $_fInstance_clss;

	private $_fSchedulesController_clss;
	private $_fSchedulesData_clss;


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

	public function i_getSchedulesController()
	{
		return $this->_getSchedulesController();
	}

	public function i_getSchedulesData()
	{
		return $this->_getSchedulesData();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getSchedulesController()
	{
		return isset($this->_fSchedulesController_clss) ? $this->_fSchedulesController_clss : ($this->_fSchedulesController_clss = new CSchedulesController());
	}

	private function _getSchedulesData()
	{
		return isset($this->_fSchedulesData_clss) ? $this->_fSchedulesData_clss : ($this->_fSchedulesData_clss = new CSchedulesData());
	}
}


?>
