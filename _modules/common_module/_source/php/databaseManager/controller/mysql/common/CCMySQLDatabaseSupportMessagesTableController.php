<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCMySQLDatabaseSupportMessagesTableController extends CCMySQLDatabaseTableController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getTableName():string
	{
		return CCSupportMessagesTableData::i_TABLE_NAME;
	}
	
	/*override*/protected function __getTableQueriesData():CCTableQueriesData
	{
		$lSiteId_str = CMainManager::i_getInstance()->i_getMainData()->i_getGetParam(CCRequestParamConst::i_GET_PARAM_ID_SITE);
		return CDatabaseManager::i_getInstance()->i_getDatabasesData()->i_getDatabaseData($lSiteId_str)->i_getSupportMessagesTableQueriesData();
	}

	/*override*/protected function __generateContentTableData(array $aTableData_a_arr):CCTableData
	{
		return new CCSupportMessagesTableData($aTableData_a_arr);
	}
}


?>