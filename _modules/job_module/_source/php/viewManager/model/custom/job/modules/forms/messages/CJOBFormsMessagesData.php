<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


/*override*/class CJOBFormsMessagesData extends CCFormsMessagesData
{
	//IDS...
	private const _FORM_MESSAGES_DATA_ID_VACANCY_CONTENT_ADDITION			= self::__FORM_MESSAGES_DATAS_COUNT;
	private const _FORM_MESSAGES_DATA_ID_VACANCY_CONTENT_QUICK_SEARCH		= self::__FORM_MESSAGES_DATAS_COUNT + 1;
	private const _FORM_MESSAGES_DATA_ID_VACANCY_CONTENT_FILTERING			= self::__FORM_MESSAGES_DATAS_COUNT + 2;
	private const _FORM_MESSAGES_DATA_ID_VACANCY_CONTENTS_ADMINISTRATION	= self::__FORM_MESSAGES_DATAS_COUNT + 3;
	//...IDS
	//...IDS


	/***************************************************
	 * INTERFACE
	 */

	/**@return CJOBFormsMessagesData*/
	static public function i_toClassType(&$a_clss)
	{
		return $a_clss;
	}

	public function i_getVacancyContentAdditionFormMessagesData()
	{
		return $this->__getFormMessagesData(self::_FORM_MESSAGES_DATA_ID_VACANCY_CONTENT_ADDITION);
	}

	public function i_getVacancyContentQuickSearchFormMessagesData()
	{
		return $this->__getFormMessagesData(self::_FORM_MESSAGES_DATA_ID_VACANCY_CONTENT_QUICK_SEARCH);
	}

	public function i_getVacancyContentFilteringFormMessagesData()
	{
		return $this->__getFormMessagesData(self::_FORM_MESSAGES_DATA_ID_VACANCY_CONTENT_FILTERING);
	}

	public function i_getVacancyContentsAdministrationFormMessagesData()
	{
		return $this->__getFormMessagesData(self::_FORM_MESSAGES_DATA_ID_VACANCY_CONTENTS_ADMINISTRATION);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __generateFormMessagesData(int $aFormMessagesDataId_int):CCFormMessagesData
	{
		$lFormMessagesData_clss = null;

		switch ($aFormMessagesDataId_int)
		{
			case self::_FORM_MESSAGES_DATA_ID_VACANCY_CONTENT_ADDITION:
			{
				$lFormMessagesData_clss = new CJOBVacancyContentAdditionFormMessagesData();
			}break;

			case self::_FORM_MESSAGES_DATA_ID_VACANCY_CONTENT_QUICK_SEARCH:
			{
				$lFormMessagesData_clss = new CJOBVacancyContentQuickSearchFormMessagesData();
			}break;

			case self::_FORM_MESSAGES_DATA_ID_VACANCY_CONTENT_FILTERING:
			{
				$lFormMessagesData_clss = new CJOBVacancyContentFilteringFormMessagesData();
			}break;

			case self::_FORM_MESSAGES_DATA_ID_VACANCY_CONTENTS_ADMINISTRATION:
			{
				$lFormMessagesData_clss = new CJOBVacancyContentsAdministrationFormMessagesData();
			}break;

			default:
				$lFormMessagesData_clss = parent::__generateFormMessagesData($aFormMessagesDataId_int);
			break;
		}

		return $lFormMessagesData_clss;
	}
}


?>