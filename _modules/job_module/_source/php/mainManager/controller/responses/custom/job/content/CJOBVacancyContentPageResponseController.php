<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBVacancyContentPageResponseController extends CCPageResponseController
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

		$lJOBMySQLDatabaseTablesController_clss = $this->__getDatabaseTablesController()->i_getJOBMySQLDatabaseTablesController();
		$lMySQLDatabaseCitiesTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseCitiesTableController();
		$lMySQLDatabaseCitiesTableController_clss->i_retrieveCitiesDataByStates([CCSTableData::i_CONTENT_STATE_ID_ACTIVATED]);

		$lMySQLDatabaseCurrenciesTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseCurrenciesTableController();
		$lMySQLDatabaseCurrenciesTableController_clss->i_retrieveCurrenciesData();

		$lMySQLDatabaseContentTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseContentTableController();

		/*$lContentId_int = CVariableTools::i_toInt($this->__getMainData()->i_getGETParam(CCRequestParamConst::i_GET_PARAM_ID_OPT_CONTENT_ID, false));
		if ($lContentId_int > 0)
		{
			$lMySQLDatabaseContentTableController_clss->i_retrieveContentDataById($lContentId_int);
		}*/

		//$lMySQLDatabaseContentTableController_clss->i_retrieveContentDataCount();
		//$lMySQLDatabaseContentTableController_clss->i_retrieveContentRandomData(3);
	}

	/*override*/protected function __getSupportedGETParams():array
	{
		$lSupportedGETParams_str_arr = parent::__getSupportedGETParams();
		$lSupportedGETParams_str_arr = CArrayTools::i_merge($lSupportedGETParams_str_arr, [CJOBRequestParamConst::i_GET_PARAM_ID_OPT_ACTION, CJOBRequestParamConst::i_GET_PARAM_ID_OPT_CONTENT_ID]);
		return $lSupportedGETParams_str_arr;
	}
}


?>