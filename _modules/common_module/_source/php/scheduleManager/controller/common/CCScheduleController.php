<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*abstract*/class CCScheduleController
{
	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	/*abstract*/public function i_update():void
	{
		new CAbstractException('i_update');
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

	protected function __getSchedulesData()
	{
		return CScheduleManager::i_getInstance()->i_getSchedulesData();
	}
}


?>