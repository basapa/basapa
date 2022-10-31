<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBContentsAdministrationPageResponseController extends CCPageResponseController
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

		/*$lGETParamId_str = CJOBRequestParamConst::i_GET_PARAM_ID_OPT_REGION_STRING_ID;
		if (!$lMainData_clss->i_isGETParamDefined($lGETParamId_str))
		{
			$lStaticParams_a_arr = [CJOBRequestParamConst::i_GET_PARAM_ID_SITE	=> CSiteConst::i_SITE_ID_JOB];

			$this->__getHostData()->i_sendSimpleRedirect(CURLTools::i_generateURLByParams($lStaticParams_a_arr));
		}*/

		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);

		$lJOBMySQLDatabaseTablesController_clss = $this->__getDatabaseTablesController()->i_getJOBMySQLDatabaseTablesController();

		/*$lMySQLDatabaseAdditionTimeFiltersSTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseWageFiltersSTableController();
		$lMySQLDatabaseAdditionTimeFiltersSTableController_clss->___retrieveData();

		$lMySQLDatabaseAdditionTimeFiltersSTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseWorkExperienceFiltersSTableController();
		$lMySQLDatabaseAdditionTimeFiltersSTableController_clss->___retrieveData();

		$lMySQLDatabaseAdditionTimeFiltersSTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseWorkScheduleFiltersSTableController();
		$lMySQLDatabaseAdditionTimeFiltersSTableController_clss->___retrieveData();*/

		/*$this->_validateSupportedGETParamsValues();

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
		);*/

		$lMySQLDatabaseContentTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseContentTableController();
		$lMySQLDatabaseContentTableController_clss->___retrieveDataByGETParams(CCContentTableData::i_ADMINISTRATION_CONTENT_STATES);
		$lMySQLDatabaseContentTableController_clss->___retrieveDataCountByGETParams(CCContentTableData::i_ADMINISTRATION_CONTENT_STATES);

		//$lMySQLDatabaseContentTableController_clss->___retrieveDataIdsByGETParams(CCContentTableData::i_ADMINISTRATION_CONTENT_STATES);

		/*$lContentTableQueriesData_clss = $lDatabaseData_clss->i_getContentTableQueriesData();
		if ($lContentTableQueriesData_clss->___areSelectContentDataIdsByGETParamsDefined())
		{
			$lMySQLDatabaseContentTableController_clss->___retrieveDataCountByGETParams([CCContentTableData::i_CONTENT_STATE_ID_MODERATION_WAITING]);
			$lMySQLDatabaseContentTableController_clss->___retrieveDataByGETParams([CCContentTableData::i_CONTENT_STATE_ID_MODERATION_WAITING]);
		}*/
	}

	/*override*/protected function __getSupportedGETParams():array
	{
		$lSupportedGETParams_str_arr = parent::__getSupportedGETParams();
		$lSupportedGETParams_str_arr = CArrayTools::i_merge($lSupportedGETParams_str_arr, [	CJOBRequestParamConst::i_GET_PARAM_ID_OPT_CONTENT_PAGE_INDEX,
																							//CJOBRequestParamConst::i_GET_PARAM_ID_OPT_REGION_STRING_ID,
																							//CJOBRequestParamConst::i_GET_PARAM_ID_OPT_CITY_STRING_ID,
																							CJOBRequestParamConst::i_GET_PARAM_ID_OPT_ID_SORTING,
																							CJOBRequestParamConst::i_GET_PARAM_ID_OPT_STATE_SORTING,
																							CJOBRequestParamConst::i_GET_PARAM_ID_OPT_ADDITION_TIME_SORTING,
																							CJOBRequestParamConst::i_GET_PARAM_ID_OPT_UPDATING_TIME_SORTING,
																							CJOBRequestParamConst::i_GET_PARAM_ID_OPT_EXPIRING_TIME_SORTING]);
		return $lSupportedGETParams_str_arr;
	}
}


?>