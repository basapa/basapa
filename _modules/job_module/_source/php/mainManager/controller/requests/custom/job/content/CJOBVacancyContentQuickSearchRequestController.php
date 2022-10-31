<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBVacancyContentQuickSearchRequestController extends CCRequestController
{
	private const _COMPONENT_VALIDATION_PARAMS_SEARCH_TEXT_TEXTFIELD	= [	self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CJOBVacancyContentQuickSearchFormView::i_FORM_COMPONENT_ID_SEARCH_TEXT,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> self::___VALIDATION_COMPONENT_TYPE_TEXTFIELD,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CJOBVacancyContentQuickSearchFormView::i_FILLING_MODE_FIELD_SEARCH_TEXT,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> self::__COMPONENT_VALUE_VALIDATION_PATTERN_TEXT,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CJOBVacancyContentQuickSearchFormMessagesData::i_FORM_MESSAGE_ID_SEARCH_TEXT_ILLEGAL_CHARS,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CJOBVacancyContentQuickSearchFormMessagesData::i_FORM_MESSAGE_ID_SEARCH_TEXT_WRONG_CHARS_COUNT,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID			=> CJOBVacancyContentQuickSearchFormMessagesData::i_FORM_MESSAGE_ID_SEARCH_TEXT_EMPTY_DATA,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT				=> CJOBVacancyContentQuickSearchFormView::i_MIN_CHARS_COUNT_FIELD_SEARCH_TEXT,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT				=> CJOBVacancyContentQuickSearchFormView::i_MAX_CHARS_COUNT_FIELD_SEARCH_TEXT];

	private const _COMPONENT_VALIDATION_PARAMS_SELECT_CITY_COMPOSITE	= [
																			[	self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CJOBVacancyContentQuickSearchFormView::i_FORM_COMPONENT_ID_REGION,
																				self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> self::___VALIDATION_COMPONENT_TYPE_LISTBOX,
																				self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CJOBVacancyContentQuickSearchFormView::i_FILLING_MODE_FIELD_REGION,
																				self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID			=> CJOBVacancyContentQuickSearchFormMessagesData::i_FORM_MESSAGE_ID_REGION_EMPTY_DATA
																			],
																			[	self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CJOBVacancyContentQuickSearchFormView::i_FORM_COMPONENT_ID_CITY,
																				self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> self::___VALIDATION_COMPONENT_TYPE_LISTBOX,
																				self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CJOBVacancyContentQuickSearchFormView::i_FILLING_MODE_FIELD_CITY,
																				self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID			=> CJOBVacancyContentQuickSearchFormMessagesData::i_FORM_MESSAGE_ID_CITY_EMPTY_DATA
																			]
	];

	private const _COMPONENTS_VALIDATIONS_PARAMS	= [	self::_COMPONENT_VALIDATION_PARAMS_SEARCH_TEXT_TEXTFIELD];

	private const _COMPOSITE_COMPONENTS_VALIDATIONS_PARAMS	= [self::_COMPONENT_VALIDATION_PARAMS_SELECT_CITY_COMPOSITE];

	private const _COMPONENT_VALIDATION_PARAMS_HIDDEN_TEXTFIELD	= [];


	/***************************************************
	 * PUBLIC
	 */

	/*
	 * PUBLIC
	 ***************************************************/

	/*override*/protected function __getFormMessagesData():CCFormMessagesData
	{
		$lFormsMessagesData_clss = $this->__getFormsMessagesData();
		$lFormsMessagesData_clss = CJOBFormsMessagesData::i_toClassType($lFormsMessagesData_clss);
		return $lFormsMessagesData_clss->i_getVacancyContentQuickSearchFormMessagesData();
	}

	/*override*/protected function __getComponentsValidationsParams():array
	{
		return self::_COMPONENTS_VALIDATIONS_PARAMS;
	}

	/*override*/protected function __getCompositeComponentsValidationsParams():array
	{
		return self::_COMPOSITE_COMPONENTS_VALIDATIONS_PARAMS;
	}

	/*override*/protected function __getHiddenComponentValidationParams():array
	{
		return self::_COMPONENT_VALIDATION_PARAMS_HIDDEN_TEXTFIELD;
	}

	/*override*/protected function __getEmptyDataFormMessageId():int
	{
		return CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_EMPTY_DATA;
	}

	/*override*/protected function __update():void
	{
		$lComponentFieldId_str = self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID;
		$lSearchTextTextfieldComponentValue_str = $this->__getPOSTRequestStringComponentValue(self::_COMPONENT_VALIDATION_PARAMS_SEARCH_TEXT_TEXTFIELD[$lComponentFieldId_str]);
		$lRegionListboxComponentValue_int = $this->__getPOSTRequestIntegerComponentValue(self::_COMPONENT_VALIDATION_PARAMS_SELECT_CITY_COMPOSITE[CCSelectCityFormCompositeComponentView::i_COMPOSITE_COMPONENT_ID_REGION_LISTBOX][$lComponentFieldId_str]);
		$lCityListboxComponentValue_int = $this->__getPOSTRequestIntegerComponentValue(self::_COMPONENT_VALIDATION_PARAMS_SELECT_CITY_COMPOSITE[CCSelectCityFormCompositeComponentView::i_COMPOSITE_COMPONENT_ID_CITY_LISTBOX][$lComponentFieldId_str]);

		$this->__addFormMessageId(CJOBVacancyContentQuickSearchFormMessagesData::i_FORM_MESSAGE_ID_SUCCESS);

		$lStaticParams_a_arr	= [	CJOBRequestParamConst::i_GET_PARAM_ID_SITE		=> CSiteConst::i_SITE_ID_JOB,
									CJOBRequestParamConst::i_GET_PARAM_ID_PAGE		=> CJOBPageConst::i_PAGE_ID_CONTENTS];

		if ($lRegionListboxComponentValue_int !== CCListboxComponentItem::i_EMPTY_ITEM_VALUE)
		{
			$lJOBMySQLDatabaseTablesController_clss = $this->__getDatabaseTablesController()->i_getJOBMySQLDatabaseTablesController();
			$lMySQLDatabaseRegionsTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseRegionsTableController();
			$lMySQLDatabaseRegionsTableController_clss->___retrieveDataById($lRegionListboxComponentValue_int);

			$lDatabaseData_clss = $this->__getDatabaseData();
			$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);

			$lSData_clss = $lDatabaseData_clss->i_getRegionsTableQueriesData()->___getSelectDataById();
			$lSData_clss = CCRegionsSTableData::i_toClassType($lSData_clss);

			$lStaticParams_a_arr[CJOBRequestParamConst::i_GET_PARAM_ID_OPT_REGION_STRING_ID] = $lSData_clss->i_getTableFieldStringId();
		}

		if ($lCityListboxComponentValue_int !== CCListboxComponentItem::i_EMPTY_ITEM_VALUE)
		{
			$lJOBMySQLDatabaseTablesController_clss = $this->__getDatabaseTablesController()->i_getJOBMySQLDatabaseTablesController();
			$lMySQLDatabaseCitiesTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseCitiesTableController();
			$lMySQLDatabaseCitiesTableController_clss->___retrieveDataById($lCityListboxComponentValue_int);

			$lDatabaseData_clss = $this->__getDatabaseData();
			$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);

			$lSData_clss = $lDatabaseData_clss->i_getCitiesTableQueriesData()->___getSelectDataById();
			$lSData_clss = CCCitiesSTableData::i_toClassType($lSData_clss);

			$lStaticParams_a_arr[CJOBRequestParamConst::i_GET_PARAM_ID_OPT_CITY_STRING_ID] = $lSData_clss->i_getTableFieldStringId();
		}

		$lDynamicParams_a_arr = CArrayTools::i_merge($this->__getMainData()->i_getDynamicGETParams(), [CJOBRequestParamConst::i_GET_PARAM_ID_OPT_SEARCH_TEXT	=> $lSearchTextTextfieldComponentValue_str]);

		$this->__getHostData()->i_sendSimpleRedirect(CURLTools::i_generateURLByParams($lStaticParams_a_arr, $lDynamicParams_a_arr, true, false));
	}
}


?>
