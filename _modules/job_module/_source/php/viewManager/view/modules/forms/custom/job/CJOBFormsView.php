<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CJOBFormsView extends CCFormsView
{
	//IDS...
	private const _FORM_VIEW_ID_VACANCY_CONTENT_ADDITION			= self::__FORM_VIEWS_COUNT;
	private const _FORM_VIEW_ID_JOB_CONTENT_EDITION					= self::__FORM_VIEWS_COUNT + 1;
	private const _FORM_VIEW_ID_VACANCY_CONTENT_QUICK_SEARCH		= self::__FORM_VIEWS_COUNT + 2;
	private const _FORM_VIEW_ID_VACANCY_CONTENT_MAIN_QUICK_SEARCH	= self::__FORM_VIEWS_COUNT + 3;
	private const _FORM_VIEW_ID_VACANCY_CONTENT_FILTERING			= self::__FORM_VIEWS_COUNT + 4;
	private const _FORM_VIEW_ID_JOB_CONTENT_SEARCH					= self::__FORM_VIEWS_COUNT + 5;
	private const _FORM_VIEW_ID__CONTENT_MANAGEMENT					= self::__FORM_VIEWS_COUNT + 6;
	private const _FORM_VIEW_ID__CONTENT_ADMINISTRATION				= self::__FORM_VIEWS_COUNT + 7;
	//...IDS


	/***************************************************
	 * INTERFACE
	 */

	/**@return CJOBFormsView*/
	static public function i_toClassType(&$a_clss)
	{
		return $a_clss;
	}

	public function i_getVacancyContentAdditionFormView()
	{
		return $this->__getFormView(self::_FORM_VIEW_ID_VACANCY_CONTENT_ADDITION);
	}

	public function i_getContentEditionFormView()
	{
		return $this->__getFormView(self::_FORM_VIEW_ID_JOB_CONTENT_EDITION);
	}
	
	public function i_getVacancyContentQuickSearchFormView()
	{
		return $this->__getFormView(self::_FORM_VIEW_ID_VACANCY_CONTENT_QUICK_SEARCH);
	}

	public function i_getVacancyContentMainQuickSearchFormView()
	{
		return $this->__getFormView(self::_FORM_VIEW_ID_VACANCY_CONTENT_MAIN_QUICK_SEARCH);
	}

	public function i_getVacancyContentFilteringFormView()
	{
		return $this->__getFormView(self::_FORM_VIEW_ID_VACANCY_CONTENT_FILTERING);
	}

	public function i_getContentSearchFormView()
	{
		return $this->__getFormView(self::_FORM_VIEW_ID_JOB_CONTENT_SEARCH);
	}
	
	public function i_getContentManagementFormView()
	{
		return $this->__getFormView(self::_FORM_VIEW_ID__CONTENT_MANAGEMENT);
	}
	
	public function i_getContentAdministrationFormView()
	{
		return $this->__getFormView(self::_FORM_VIEW_ID__CONTENT_ADMINISTRATION);
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __generateFormView(int $aFormViewId_int):CCFormView
	{
		$lFormView_clss = null;

		switch ($aFormViewId_int)
		{
			case self::_FORM_VIEW_ID_VACANCY_CONTENT_ADDITION:
			{
				$lFormView_clss = new CJOBVacancyContentAdditionFormView();
			}break;
			
			/*case self::_FORM_VIEW_ID_JOB_CONTENT_EDITION:
			{
				$lFormView_clss = new CJOBContentEditionFormView();
			}break;*/
			
			case self::_FORM_VIEW_ID_VACANCY_CONTENT_QUICK_SEARCH:
			{
				$lFormView_clss = new CJOBVacancyContentQuickSearchFormView();
			}break;

			case self::_FORM_VIEW_ID_VACANCY_CONTENT_MAIN_QUICK_SEARCH:
			{
				$lFormView_clss = new CJOBVacancyContentMainQuickSearchFormView();
			}break;

			case self::_FORM_VIEW_ID_VACANCY_CONTENT_FILTERING:
			{
				$lFormView_clss = new CJOBVacancyContentFilteringFormView();
			}break;

			case self::_FORM_VIEW_ID_JOB_CONTENT_SEARCH:
			{
				$lFormView_clss = new CJOBContentSearchFormView();
			}break;

			case self::_FORM_VIEW_ID__CONTENT_ADMINISTRATION:
			{
				$lFormView_clss = new CJOBContentsAdministrationFormView();
			}break;

			/*case self::_FORM_VIEW_ID__CONTENT_MANAGEMENT:
			{
				$lFormView_clss = new CJOBRContentManagementFormView();
			}break;
			
			case self::_FORM_VIEW_ID__CONTENT_ADMINISTRATION:
			{
				$lFormView_clss = new CJOBRContentAdministrationFormView();
			}break;*/
			
			default:
				$lFormView_clss = parent::__generateFormView($aFormViewId_int);
			break;
		}

		return $lFormView_clss;
	}
}


?>