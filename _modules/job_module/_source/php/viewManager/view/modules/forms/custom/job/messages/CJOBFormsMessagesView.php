<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBFormsMessagesView extends CCFormsMessagesView
{
	//IDS...
	private const _FORM_MESSAGES_VIEW_ID_VACANCY_CONTENT_ADDITION			= self::__FORM_MESSAGES_VIEWS_COUNT;
	private const _FORM_MESSAGES_VIEW_ID_VACANCY_CONTENT_QUICK_SEARCH		= self::__FORM_MESSAGES_VIEWS_COUNT + 1;
	private const _FORM_MESSAGES_VIEW_ID_VACANCY_CONTENT_FILTERING			= self::__FORM_MESSAGES_VIEWS_COUNT + 2;
	private const _FORM_MESSAGES_VIEW_ID_VACANCY_CONTENTS_ADMINISTRATION	= self::__FORM_MESSAGES_VIEWS_COUNT + 3;
	/*private const _FORM_MESSAGES_VIEW_ID_JOB_CONTENT_EDITION			= self::__FORM_MESSAGES_VIEWS_COUNT + 1;
	private const _FORM_MESSAGES_VIEW_ID_JOB_CONTENT_SEARCH			= self::__FORM_MESSAGES_VIEWS_COUNT + 3;

	private const _FORM_MESSAGES_VIEW_ID__CONTENT_MANAGEMENT		= self::__FORM_MESSAGES_VIEWS_COUNT + 4;*/
	//...IDS


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __draw():void
	{
		$lPOSTParamRequestId_str = $this->__getMainData()->i_getPOSTParamRequestId();
		switch ($lPOSTParamRequestId_str)
		{
			case CJOBRequestConst::i_REQUEST_ID_VACANCY_CONTENT_ADDITION:
			{
				$this->__generateFormMessagesView(self::_FORM_MESSAGES_VIEW_ID_VACANCY_CONTENT_ADDITION)->i_draw();
			}break;

			case CJOBRequestConst::i_REQUEST_ID_VACANCY_CONTENT_QUICK_SEARCH:
			{
				$this->__generateFormMessagesView(self::_FORM_MESSAGES_VIEW_ID_VACANCY_CONTENT_QUICK_SEARCH)->i_draw();
			}break;

			case CJOBRequestConst::i_REQUEST_ID_VACANCY_CONTENT_FILTERING:
			{
				$this->__generateFormMessagesView(self::_FORM_MESSAGES_VIEW_ID_VACANCY_CONTENT_FILTERING)->i_draw();
			}break;

			case CJOBRequestConst::i_REQUEST_ID_VACANCY_CONTENTS_ADMINISTRATION:
			{
				$this->__generateFormMessagesView(self::_FORM_MESSAGES_VIEW_ID_VACANCY_CONTENTS_ADMINISTRATION)->i_draw();
			}break;

			/*case CJOBRequestConst::i_REQUEST_ID_JOB_CONTENT_EDITION:
			{
				$this->__generateFormMessagesView(self::_FORM_MESSAGES_VIEW_ID_JOB_CONTENT_EDITION)->draw();
			}break;

			case CJOBRequestConst::i_REQUEST_ID_JOB_CONTENT_SEARCH:
			{
				$this->__generateFormMessagesView(self::_FORM_MESSAGES_VIEW_ID_JOB_CONTENT_SEARCH)->draw();
			}break;

			case CJOBRequestConst::i_REQUEST_ID__CONTENT_MANAGEMENT:
			{
				$this->__generateFormMessagesView(self::_FORM_MESSAGES_VIEW_ID__CONTENT_MANAGEMENT)->draw();
			}break;*/
			
			default:
				parent::__draw();
			break;
		}
	}

	/*override*/protected function __generateFormMessagesView(int $aFormMessagesViewId_int):CCFormMessagesView
	{
		$lFormMessagesView_clss = null;

		switch ($aFormMessagesViewId_int)
		{
			case self::_FORM_MESSAGES_VIEW_ID_VACANCY_CONTENT_ADDITION:
			{
				$lFormMessagesView_clss = new CJOBVacancyContentAdditionFormMessagesView();
			}break;

			case self::_FORM_MESSAGES_VIEW_ID_VACANCY_CONTENT_QUICK_SEARCH:
			{
				$lFormMessagesView_clss = new CJOBVacancyContentQuickSearchFormMessagesView();
			}break;

			case self::_FORM_MESSAGES_VIEW_ID_VACANCY_CONTENT_FILTERING:
			{
				$lFormMessagesView_clss = new CJOBVacancyContentFilteringFormMessagesView();
			}break;

			case self::_FORM_MESSAGES_VIEW_ID_VACANCY_CONTENTS_ADMINISTRATION:
			{
				$lFormMessagesView_clss = new CJOBContentsAdministrationFormMessagesView();
			}break;

			/*case self::_FORM_MESSAGES_VIEW_ID_JOB_CONTENT_EDITION:
			{
				$lFormMessagesView_clss = new CJOBContentEditionFormMessagesView();
			}break;

			case self::_FORM_MESSAGES_VIEW_ID_JOB_CONTENT_SEARCH:
			{
				$lFormMessagesView_clss = new CJOBContentSearchFormMessagesView();
			}break;

			case self::_FORM_MESSAGES_VIEW_ID__CONTENT_MANAGEMENT:
			{
				$lFormMessagesView_clss = new CJOBContentManagementFormMessagesView();
			}break;*/
			
			default:
				$lFormMessagesView_clss = parent::__generateFormMessagesView($aFormMessagesViewId_int);
			break;
		}

		return $lFormMessagesView_clss;
	}
}


?>