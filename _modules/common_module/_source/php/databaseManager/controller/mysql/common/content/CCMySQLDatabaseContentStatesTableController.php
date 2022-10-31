<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCMySQLDatabaseContentStatesTableController extends CCMySQLDatabaseTableController//----deteting required
{
	/***************************************************
	 * INTERFACE
	 */

	/*internal*//*public function ___retrieveDataByGETParams(array $aStates_str_arr, array $aOptTableRows_str_arr = null):void
	{
		$lTableRows_str = $this->__convertSelectTableFieldsToString($aOptTableRows_str_arr);

		$lQuery_str = $this->__generateDataGettingQueryByGETParams($lTableRows_str, $aStates_str_arr);

		$this->__sendSelectQuery($lQuery_str);

		$lTableQueriesData_clss = $this->__getTableQueriesData();

		$lPDOWrapper_clss = CPDOWrapper::i_getInstance();
		while ($lTableItemData_a_arr = $lPDOWrapper_clss->i_getDatabaseNextRowAsAssocArray())
		{
			$lTableQueriesData_clss->___addSelectContentDataByGETParams($this->__generateTableData($lTableItemData_a_arr));
		}
	}*/

	/*internal*//*public function ___retrieveDataByType(int $aType_int, array $aOptTableRows_str_arr = null):void
	{
		$lTableFields_str = $this->__convertSelectTableFieldsToString($aOptTableRows_str_arr);

		$lQuery_str = $this->__generateDataGettingQueryByType($aType_int, $lTableFields_str);

		$this->__sendSelectQuery($lQuery_str);

		$lTableQueriesData_clss = $this->__getTableQueriesData();

		$lPDOWrapper_clss = CPDOWrapper::i_getInstance();
		while ($lTableItemData_a_arr = $lPDOWrapper_clss->i_getDatabaseNextRowAsAssocArray())
		{
			$lTableQueriesData_clss->___addSelectContentDataByType($this->__generateTableData($lTableItemData_a_arr));
		}
	}*/

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getTableName():string
	{
		return CCContentStatesSTableData::i_TABLE_NAME;
	}

	/**@return CCContentStatesSTableQueriesData*/
	/*override*/protected function __getTableQueriesData():CCTableQueriesData
	{
		$lDatabaseData_clss = $this->__getDatabaseData();
		return $lDatabaseData_clss->i_getStatesTableQueriesData();
	}

	/**@return CCContentStatesSTableData*/
	/*override*/protected function __generateTableData(array $aTableData_a_arr):CCTableData
	{
		return new CCContentStatesSTableData($aTableData_a_arr);
	}
}


?>