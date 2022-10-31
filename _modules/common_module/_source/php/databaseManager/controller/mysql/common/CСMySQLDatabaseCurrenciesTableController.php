<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCMySQLDatabaseCurrenciesTableController extends CCMySQLDatabaseTableController
{
	/***************************************************
	 * INTERFACE
	 */

	/*public function getDataByRegionId($aRegionId_int, $aOptTableRows_str_arr = null)
	{
		$aRegionId_int = $this->__validateNumberValue($aRegionId_int);

		$lSelect_str = $this->__getSelectParams($aOptTableRows_str_arr);

		$this->__fQuery_str = 'select ' .$lSelect_str. '
								from ' .CDatabaseConst::TABLE_CITY. '
								where ' .CDatabaseConst::TABLE_CITY_REGION_ID. ' = ' .$aRegionId_int;
		
		return $this->__select();
	}*/

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getTableName():string
	{
		return CCCurrenciesSTableData::i_TABLE_NAME;
	}

	/**@return CCCurrenciesSTableQueriesData*/
	/*override*/protected function __getTableQueriesData():CCTableQueriesData
	{
		return $this->__getDatabaseData()->i_getCurrenciesTableQueriesData();
	}

	/**@return CCCurrenciesSTableData*/
	/*override*/protected function __generateTableData(array $aTableData_a_arr):CCTableData
	{
		return new CCCurrenciesSTableData($aTableData_a_arr);
	}
}


?>