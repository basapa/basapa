<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBMySQLDatabaseAdditionTimeFiltersSTableController extends CCMySQLDatabaseTableController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getTableName():string
	{
		return CJOBAdditionTimeFiltersSTableData::i_TABLE_NAME;
	}

	/**@return CJOBAdditionTimeFiltersSTableQueriesData*/
	/*override*/protected function __getTableQueriesData():CCTableQueriesData
	{
		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);
		return $lDatabaseData_clss->i_getAdditionTimeFiltersSTableQueriesData();
	}

	/**@return CJOBAdditionTimeFiltersSTableData*/
	/*override*/protected function __generateTableData(array $aTableData_a_arr):CCTableData
	{
		return new CJOBAdditionTimeFiltersSTableData($aTableData_a_arr);
	}
}


?>
