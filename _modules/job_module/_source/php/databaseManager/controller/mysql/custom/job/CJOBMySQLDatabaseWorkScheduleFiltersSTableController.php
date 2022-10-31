<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBMySQLDatabaseWorkScheduleFiltersSTableController extends CCMySQLDatabaseTableController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getTableName():string
	{
		return CJOBWorkScheduleFiltersSTableData::i_TABLE_NAME;
	}

	/**@return CJOBWorkScheduleFiltersSTableQueriesData*/
	/*override*/protected function __getTableQueriesData():CCTableQueriesData
	{
		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);
		return $lDatabaseData_clss->i_getWorkScheduleFiltersSTableQueriesData();
	}

	/**@return CJOBWorkScheduleFiltersSTableData*/
	/*override*/protected function __generateTableData(array $aTableData_a_arr):CCTableData
	{
		return new CJOBWorkScheduleFiltersSTableData($aTableData_a_arr);
	}
}


?>
