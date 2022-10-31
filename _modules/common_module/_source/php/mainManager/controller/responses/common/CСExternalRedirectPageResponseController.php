<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCExternalRedirectPageResponseController extends CCPageResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getResponseHTTPCode():int
	{
		return CHostData::i_NATIVE_HTTP_CODE_NOT_FOUND;
	}

	/*override*/protected function __update():void
	{
		parent::__update();

		$lContentId_int = CVariableTools::i_toInt($this->__getMainData()->i_getGETParam(CCRequestParamConst::i_GET_PARAM_ID_OPT_ID, true));

		$lJOBMySQLDatabaseTablesController_clss = $this->__getDatabaseTablesController()->i_getJOBMySQLDatabaseTablesController();
		$lMySQLDatabaseContentTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseContentTableController();
		$lMySQLDatabaseContentTableController_clss->___retrieveDataById($lContentId_int, [CJOBContentTableData::i_TABLE_FIELD_EXTERNAL_SOURCE_ID]);

		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);

		$lRedirectURL_str = $lDatabaseData_clss->i_getContentTableQueriesData()->___getSelectDataById()->i_getTableFieldExternalSourceId();

		$this->__getHostData()->i_setJSRedirect($lRedirectURL_str, 30000/*empiric value*/);
	}

	/*override*/protected function __getSupportedGETParams():array
	{
		$lSupportedGETParams_str_arr = parent::__getSupportedGETParams();
		$lSupportedGETParams_str_arr = CArrayTools::i_merge($lSupportedGETParams_str_arr, [CJOBRequestParamConst::i_GET_PARAM_ID_OPT_ID]);
		return $lSupportedGETParams_str_arr;
	}
}


?>