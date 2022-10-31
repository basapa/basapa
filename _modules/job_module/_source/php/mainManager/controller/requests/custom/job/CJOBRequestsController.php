<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CJOBRequestsController extends CCRequestsController
{
	//IDS...
	private const _REQUEST_CONTROLLER_ID_VACANCY_CONTENT_ADDITION			= self::__REQUEST_CONTROLLERS_COUNT;
	private const _REQUEST_CONTROLLER_ID_VACANCY_CONTENT_QUICK_SEARCH		= self::__REQUEST_CONTROLLERS_COUNT + 1;
	private const _REQUEST_CONTROLLER_ID_VACANCY_CONTENT_FILTERING			= self::__REQUEST_CONTROLLERS_COUNT + 2;
	private const _REQUEST_CONTROLLER_ID_VACANCY_CONTENTS_ADMINISTRATION	= self::__REQUEST_CONTROLLERS_COUNT + 3;
	//...IDS


	/***************************************************
	 * INTERFACE
	 */

	public function i_update():void
	{
		$lPostParamRequestId_str = $this->__getMainData()->i_getPOSTParamRequestId();
		switch ($lPostParamRequestId_str)
		{
			case CJOBRequestConst::i_REQUEST_ID_VACANCY_CONTENT_ADDITION:
			{
				$this->__getRequestController(self::_REQUEST_CONTROLLER_ID_VACANCY_CONTENT_ADDITION)->i_update();
			}break;

			case CJOBRequestConst::i_REQUEST_ID_VACANCY_CONTENT_QUICK_SEARCH:
			{
				$this->__getRequestController(self::_REQUEST_CONTROLLER_ID_VACANCY_CONTENT_QUICK_SEARCH)->i_update();
			}break;

			case CJOBRequestConst::i_REQUEST_ID_VACANCY_CONTENT_FILTERING:
			{
				$this->__getRequestController(self::_REQUEST_CONTROLLER_ID_VACANCY_CONTENT_FILTERING)->i_update();
			}break;

			case CJOBRequestConst::i_REQUEST_ID_VACANCY_CONTENTS_ADMINISTRATION:
			{
				$this->__getRequestController(self::_REQUEST_CONTROLLER_ID_VACANCY_CONTENTS_ADMINISTRATION)->i_update();
			}break;

			default:
				parent::i_update();
			break;
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __generateRequestController(int $aRequestControllerId_int):CCRequestController
	{
		$lRequestController_clss = null;

		switch ($aRequestControllerId_int)
		{
			case self::_REQUEST_CONTROLLER_ID_VACANCY_CONTENT_ADDITION:
			{
				$lRequestController_clss = new CJOBVacancyContentAdditionRequestController();
			}break;

			case self::_REQUEST_CONTROLLER_ID_VACANCY_CONTENT_QUICK_SEARCH:
			{
				$lRequestController_clss = new CJOBVacancyContentQuickSearchRequestController();
			}break;

			case self::_REQUEST_CONTROLLER_ID_VACANCY_CONTENT_FILTERING:
			{
				$lRequestController_clss = new CJOBVacancyContentFilteringRequestController();
			}break;

			case self::_REQUEST_CONTROLLER_ID_VACANCY_CONTENTS_ADMINISTRATION:
			{
				$lRequestController_clss = new CJOBVacancyContentsAdministrationRequestController();
			}break;

			default:
				$lRequestController_clss = parent::__generateRequestController($aRequestControllerId_int);
			break;
		}

		return $lRequestController_clss;
	}
}


?>