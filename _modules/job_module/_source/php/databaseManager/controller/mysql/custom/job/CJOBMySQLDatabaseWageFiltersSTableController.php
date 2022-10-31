<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBMySQLDatabaseWageFiltersSTableController extends CCMySQLDatabaseTableController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getTableName():string
	{
		return CJOBWageFiltersSTableData::i_TABLE_NAME;
	}

	/**@return CJOBWageFiltersSTableQueriesData*/
	/*override*/protected function __getTableQueriesData():CCTableQueriesData
	{
		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);
		return $lDatabaseData_clss->i_getWageFiltersSTableQueriesData();
	}

	/**@return CJOBWageFiltersSTableData*/
	/*override*/protected function __generateTableData(array $aTableData_a_arr):CCTableData
	{
		return new CJOBWageFiltersSTableData($aTableData_a_arr);
	}
}


?>
