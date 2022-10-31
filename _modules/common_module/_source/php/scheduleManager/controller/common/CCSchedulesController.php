<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*abstract*/class CCSchedulesController
{
	//IDS...
	protected const __SCHEDULE_CONTROLLERS_COUNT			= 0;
	//...IDS

	private $_fScheduleController_clss_arr = [];


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	/*virtual*/public function i_update():void
	{
		$lGETParamScheduleRequest_str = $this->__getMainData()->i_getGETParamScheduleRequest();
		switch ($lGETParamScheduleRequest_str)
		{
			default:
				new CException('i_update', 'Unsupported GET param schedule request id: ' .$lGETParamScheduleRequest_str);
			break;
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}

	protected function __getScheduleController(int $aScheduleControllerId_int)
	{
		return $this->_fScheduleController_clss_arr[$aScheduleControllerId_int] ??  ($this->_fScheduleController_clss_arr[$aScheduleControllerId_int] = $this->__generateScheduleController($aScheduleControllerId_int));
	}

	/*virtual*/protected function __generateScheduleController(int $aScheduleControllerId_int):CCScheduleController
	{
		$lScheduleController_clss = null;

		switch ($aScheduleControllerId_int)
		{
			default:
				new CException('__generateScheduleController', 'Unsupported schedule controller id: ' .$lScheduleController_clss);
			break;
		}

		return $lScheduleController_clss;
	}
}


?>