<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBMySQLDatabaseWorkExperienceFiltersSTableController extends CCMySQLDatabaseTableController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getTableName():string
	{
		return CJOBWorkExperienceFiltersSTableData::i_TABLE_NAME;
	}

	/**@return CJOBWorkExperienceFiltersSTableQueriesData*/
	/*override*/protected function __getTableQueriesData():CCTableQueriesData
	{
		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);
		return $lDatabaseData_clss->i_getWorkExperienceFiltersSTableQueriesData();
	}

	/**@return CJOBWorkExperienceFiltersSTableData*/
	/*override*/protected function __generateTableData(array $aTableData_a_arr):CCTableData
	{
		return new CJOBWorkExperienceFiltersSTableData($aTableData_a_arr);
	}
}


?>
