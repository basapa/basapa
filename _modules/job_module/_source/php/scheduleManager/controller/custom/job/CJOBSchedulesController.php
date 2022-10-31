<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBSchedulesController extends CCSchedulesController
{
	//IDS...
	private const _SCHEDULE_CONTROLLER_ID_CONTENT_ADDITION	= CCSchedulesController::__SCHEDULE_CONTROLLERS_COUNT;
	//...IDS


	/***************************************************
	 * INTERFACE
	 */

	/*override*/public function i_update():void
	{
		$lGETParamScheduleRequest_str = $this->__getMainData()->i_getGETParamScheduleRequest();
		switch ($lGETParamScheduleRequest_str)
		{
			case CJOBScheduleConst::i_REQUEST_ID_CONTENT_ADDITION:
			{
				$this->__getScheduleController(self::_SCHEDULE_CONTROLLER_ID_CONTENT_ADDITION)->i_update();
			}break;

			default:
				parent::i_update();
			break;
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __generateScheduleController(int $aScheduleControllerId_int):CCScheduleController
	{
		$lScheduleController_clss = null;

		switch ($aScheduleControllerId_int)
		{
			case self::_SCHEDULE_CONTROLLER_ID_CONTENT_ADDITION:
			{
				$lScheduleController_clss = new CJOBContentAdditionScheduleController();
			}break;

			default:
				$lScheduleController_clss = parent::__generateScheduleController($aScheduleControllerId_int);
			break;
		}

		return $lScheduleController_clss;
	}
}


?>