<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBVacancyContentsPageResponseController extends CCPageResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __update():void
	{
		parent::__update();

		$lMainData_clss = $this->__getMainData();

		$lGETParamId_str = CJOBRequestParamConst::i_GET_PARAM_ID_OPT_REGION_STRING_ID;
		if (!$lMainData_clss->i_isGETParamDefined($lGETParamId_str))
		{
			$lStaticParams_a_arr = [CJOBRequestParamConst::i_GET_PARAM_ID_SITE	=> CSiteConst::i_SITE_ID_JOB];

			$this->__getHostData()->i_sendSimpleRedirect(CURLTools::i_generateURLByParams($lStaticParams_a_arr));
		}

		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);

		$lJOBMySQLDatabaseTablesController_clss = $this->__getDatabaseTablesController()->i_getJOBMySQLDatabaseTablesController();

		$lMySQLDatabaseAdditionTimeFiltersSTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseAdditionTimeFiltersSTableController();
		$lMySQLDatabaseAdditionTimeFiltersSTableController_clss->___retrieveData();

		$lMySQLDatabaseAdditionTimeFiltersSTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseWageFiltersSTableController();
		$lMySQLDatabaseAdditionTimeFiltersSTableController_clss->___retrieveData();

		$lMySQLDatabaseAdditionTimeFiltersSTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseWorkExperienceFiltersSTableController();
		$lMySQLDatabaseAdditionTimeFiltersSTableController_clss->___retrieveData();

		$lMySQLDatabaseAdditionTimeFiltersSTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseWorkScheduleFiltersSTableController();
		$lMySQLDatabaseAdditionTimeFiltersSTableController_clss->___retrieveData();

		$this->_validateSupportedGETParamsValues();

		$lMySQLDatabaseRegionsTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseRegionsTableController();
		$lMySQLDatabaseRegionsTableController_clss->___retrieveData(
																		[
																			CCMySQLDatabaseRegionsTableController::i_QUERY_PARAM_ID_STATES	=> [CCSTableData::i_CONTENT_STATE_ID_ACTIVATED]
																		],
																		null,
																		CCCitiesSTableData::i_TABLE_FIELD_ID
																	);

		$lRegionId_int = $lDatabaseData_clss->i_getRegionsTableQueriesData()->i_getDataByStringId($lMainData_clss->i_getGETParam($lGETParamId_str))->i_getTableFieldId();

		$lMySQLDatabaseCitiesTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseCitiesTableController();
		$lMySQLDatabaseCitiesTableController_clss->___retrieveData(
																		[
																			CCMySQLDatabaseCitiesTableController::i_QUERY_PARAM_ID_STATES		=> [CCSTableData::i_CONTENT_STATE_ID_ACTIVATED],
																			CCMySQLDatabaseCitiesTableController::i_QUERY_PARAM_ID_REGION_ID	=> $lRegionId_int
																		],
																		null,
																		CCCitiesSTableData::i_TABLE_FIELD_ID
																	);

		$lMySQLDatabaseContentTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseContentTableController();
		$lMySQLDatabaseContentTableController_clss->___retrieveDataByGETParams([CCContentTableData::i_CONTENT_STATE_ID_ACTIVATED]);
		$lMySQLDatabaseContentTableController_clss->___retrieveDataCountByGETParams([CCContentTableData::i_CONTENT_STATE_ID_ACTIVATED]);

		/*$lMySQLDatabaseContentTableController_clss->___retrieveDataIdsByGETParams([CCContentTableData::i_CONTENT_STATE_ID_MODERATION_WAITING]);

		$lContentTableQueriesData_clss = $lDatabaseData_clss->i_getContentTableQueriesData();
		if ($lContentTableQueriesData_clss->___areSelectContentDataIdsByGETParamsDefined())
		{
			$lMySQLDatabaseContentTableController_clss->___retrieveDataCountByGETParams([CCContentTableData::i_CONTENT_STATE_ID_MODERATION_WAITING]);
			$lMySQLDatabaseContentTableController_clss->___retrieveDataByGETParams([CCContentTableData::i_CONTENT_STATE_ID_MODERATION_WAITING]);
		}*/

		$this->__getCookieData()->i_setCookieParam(CCCookieData::i_COOKIE_PARAM_ID_PREV_URL, $this->__getHostData()->i_getCurrentURL(), CFilesConst::i_LIFE_TIME_NONE, false);
	}

	/*override*/protected function __getSupportedGETParams():array
	{
		$lSupportedGETParams_str_arr = parent::__getSupportedGETParams();
		$lSupportedGETParams_str_arr = CArrayTools::i_merge($lSupportedGETParams_str_arr, [	CJOBRequestParamConst::i_GET_PARAM_ID_OPT_CONTENT_PAGE_INDEX,
																							CJOBRequestParamConst::i_GET_PARAM_ID_OPT_SEARCH_TEXT,
																							CJOBRequestParamConst::i_GET_PARAM_ID_OPT_REGION_STRING_ID,
																							CJOBRequestParamConst::i_GET_PARAM_ID_OPT_CITY_STRING_ID,
																							CJOBRequestParamConst::i_GET_PARAM_ID_OPT_ADDITION_TIME_FILTERS,
																							CJOBRequestParamConst::i_GET_PARAM_ID_OPT_WAGE_FILTERS,
																							CJOBRequestParamConst::i_GET_PARAM_ID_OPT_WORK_EXPERIENCE_FILTERS,
																							CJOBRequestParamConst::i_GET_PARAM_ID_OPT_WORK_SCHEDULE_FILTERS]);
		return $lSupportedGETParams_str_arr;
	}

	private function _validateSupportedGETParamsValues():void
	{
		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);

		$lMainData_clss = $this->__getMainData();

		$lGETParamId_str = CJOBRequestParamConst::i_GET_PARAM_ID_OPT_ADDITION_TIME_FILTERS;
		if ($lMainData_clss->i_isGETParamDefined($lGETParamId_str))
		{
			$lAdditionTimeValue_str = $lMainData_clss->i_getGETParam($lGETParamId_str);
			if (!$lDatabaseData_clss->i_getAdditionTimeFiltersSTableQueriesData()->i_isValueSupported($lAdditionTimeValue_str))
			{
				$this->_sendSimpleRedirect($lGETParamId_str);
			}
		}

		$lGETParamId_str = CJOBRequestParamConst::i_GET_PARAM_ID_OPT_WAGE_FILTERS;
		if ($lMainData_clss->i_isGETParamDefined($lGETParamId_str))
		{
			$lWageValue_str = $lMainData_clss->i_getGETParam($lGETParamId_str);
			if (!$lDatabaseData_clss->i_getWageFiltersSTableQueriesData()->i_isValueSupported($lWageValue_str))
			{
				$this->_sendSimpleRedirect($lGETParamId_str);
			}
		}

		$lGETParamId_str = CJOBRequestParamConst::i_GET_PARAM_ID_OPT_WORK_EXPERIENCE_FILTERS;
		if ($lMainData_clss->i_isGETParamDefined($lGETParamId_str))
		{
			$lWorkExperienceStringId_str = $lMainData_clss->i_getGETParam($lGETParamId_str);
			if (!$lDatabaseData_clss->i_getWorkExperienceFiltersSTableQueriesData()->i_isStringIdSupported($lWorkExperienceStringId_str))
			{
				$this->_sendSimpleRedirect($lGETParamId_str);
			}
		}

		$lGETParamId_str = CJOBRequestParamConst::i_GET_PARAM_ID_OPT_WORK_SCHEDULE_FILTERS;
		if ($lMainData_clss->i_isGETParamDefined($lGETParamId_str))
		{
			$lWorkScheduleStringId_str = $lMainData_clss->i_getGETParam($lGETParamId_str);
			if (!$lDatabaseData_clss->i_getWorkScheduleFiltersSTableQueriesData()->i_isStringIdSupported($lWorkScheduleStringId_str))
			{
				$this->_sendSimpleRedirect($lGETParamId_str);
			}
		}
	}

	private function _sendSimpleRedirect(string $aIgnoreDynamicGETParamId_str):void
	{
		$lDynamicGETParamIds_a_arr = [	CJOBRequestParamConst::i_GET_PARAM_ID_OPT_ADDITION_TIME_FILTERS,
										CJOBRequestParamConst::i_GET_PARAM_ID_OPT_WAGE_FILTERS,
										CJOBRequestParamConst::i_GET_PARAM_ID_OPT_WORK_EXPERIENCE_FILTERS,
										CJOBRequestParamConst::i_GET_PARAM_ID_OPT_WORK_SCHEDULE_FILTERS];

		$lMainData_clss = $this->__getMainData();

		$lStaticParams_a_arr	= [	CJOBRequestParamConst::i_GET_PARAM_ID_SITE		=> CSiteConst::i_SITE_ID_JOB,
									CJOBRequestParamConst::i_GET_PARAM_ID_PAGE		=> CJOBPageConst::i_PAGE_ID_CONTENTS];

		$lCount_int = CArrayTools::i_count($lDynamicGETParamIds_a_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lDynamicGETParamId_str = $lDynamicGETParamIds_a_arr[$i];
			if ($lDynamicGETParamId_str !== $aIgnoreDynamicGETParamId_str)
			{
				$lDynamicParams_a_arr[$lDynamicGETParamId_str] = $lMainData_clss->i_getGETParam($lDynamicGETParamId_str, false);
			}
		}

		$this->__getHostData()->i_sendSimpleRedirect(CURLTools::i_generateURLByParams($lStaticParams_a_arr, $lDynamicParams_a_arr, true, false));
	}
}


?>