<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


final class CJOBFormsMessagesController extends CCFormsMessagesController
{
	//IDS...
	private const _FORM_MESSAGES_CONTROLLER_ID_VACANCY_CONTENT_ADDITION			= self::__FORM_MESSAGES_CONTROLLERS_COUNT;
	private const _FORM_MESSAGES_CONTROLLER_ID_VACANCY_CONTENT_QUICK_SEARCH		= self::__FORM_MESSAGES_CONTROLLERS_COUNT + 1;
	private const _FORM_MESSAGES_CONTROLLER_ID_VACANCY_CONTENT_FILTERING		= self::__FORM_MESSAGES_CONTROLLERS_COUNT + 2;
	private const _FORM_MESSAGES_CONTROLLER_ID_VACANCY_CONTENTS_ADMINISTRATION	= self::__FORM_MESSAGES_CONTROLLERS_COUNT + 3;
	//...IDS


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __update():void
	{
		$lPOSTParamRequestId_str = $this->__getMainData()->i_getPOSTParamRequestId();
		switch ($lPOSTParamRequestId_str)
		{
			case CJOBRequestConst::i_REQUEST_ID_VACANCY_CONTENT_ADDITION:
			{
				$this->__getFormMessagesController(self::_FORM_MESSAGES_CONTROLLER_ID_VACANCY_CONTENT_ADDITION)->i_update();
			}break;

			case CJOBRequestConst::i_REQUEST_ID_VACANCY_CONTENT_QUICK_SEARCH:
			{
				$this->__getFormMessagesController(self::_FORM_MESSAGES_CONTROLLER_ID_VACANCY_CONTENT_QUICK_SEARCH)->i_update();
			}break;

			case CJOBRequestConst::i_REQUEST_ID_VACANCY_CONTENT_FILTERING:
			{
				$this->__getFormMessagesController(self::_FORM_MESSAGES_CONTROLLER_ID_VACANCY_CONTENT_FILTERING)->i_update();
			}break;

			case CJOBRequestConst::i_REQUEST_ID_VACANCY_CONTENTS_ADMINISTRATION:
			{
				$this->__getFormMessagesController(self::_FORM_MESSAGES_CONTROLLER_ID_VACANCY_CONTENTS_ADMINISTRATION)->i_update();
			}break;

			default:
				parent::__update();
			break;
		}
	}

	/*override*/protected function __generateFormMessagesController(int $aFormMessagesControllerId_int):CCFormMessagesController
	{
		$lFormMessagesController_clss = null;

		switch ($aFormMessagesControllerId_int)
		{
			case self::_FORM_MESSAGES_CONTROLLER_ID_VACANCY_CONTENT_ADDITION:
			{
				$lFormMessagesController_clss = new CJOBVacancyContentAdditionFormMessagesController();
			}break;

			case self::_FORM_MESSAGES_CONTROLLER_ID_VACANCY_CONTENT_QUICK_SEARCH:
			{
				$lFormMessagesController_clss = new CJOBVacancyContentQuickSearchFormMessagesController();
			}break;

			case self::_FORM_MESSAGES_CONTROLLER_ID_VACANCY_CONTENT_FILTERING:
			{
				$lFormMessagesController_clss = new CJOBVacancyContentFilteringFormMessagesController();
			}break;

			case self::_FORM_MESSAGES_CONTROLLER_ID_VACANCY_CONTENTS_ADMINISTRATION:
			{
				$lFormMessagesController_clss = new CJOBVacancyContentsAdministrationFormMessagesController();
			}break;

			default:
				$lFormMessagesController_clss = parent::__generateFormMessagesController($aFormMessagesControllerId_int);
			break;
		}

		return $lFormMessagesController_clss;
	}
}


?>