<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCMySQLDatabaseRegionsTableController extends CCMySQLDatabaseTableController
{
	/***************************************************
	 * INTERFACE
	 */

	/*public function i_retrieveRegionsData(array $aOptTableRows_str_arr = null):void
	{
		$this->___retrieveData($aOptTableRows_str_arr);
	}

	public function i_retrieveRegionsDataByStates(array $aStates_int_arr, array $aOptTableRows_str_arr = null, string $aOptTableFieldAsKey_str = '')
	{
		$lTableFields_str = $this->__convertSelectTableFieldsToString($aOptTableRows_str_arr);

		$lQuery_str = $this->__generateDataGettingQueryByStates($aStates_int_arr, $lTableFields_str);

		$this->__sendSelectQuery($lQuery_str);

		$lTableQueriesData_clss = $this->__getTableQueriesData();

		$lPDOWrapper_clss = CPDOWrapper::i_getInstance();
		while ($lTableItemData_a_arr = $lPDOWrapper_clss->i_getDatabaseNextRowAsAssocArray())
		{
			$lTableData_clss = $this->__generateTableData($lTableItemData_a_arr);
			if (empty($aOptTableFieldAsKey_str))
			{
				$lTableQueriesData_clss->i_addSelectRegionsSDataByStates($lTableData_clss);
			}
			else
			{
				$lTableQueriesData_clss->i_insertSelectRegionsSDataByStates($lTableData_clss->i_getTableFieldStringValue($aOptTableFieldAsKey_str), $lTableData_clss);
			}
		}
	}*/

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getTableName():string
	{
		return CCRegionsSTableData::i_TABLE_NAME;
	}

	/**@return CCRegionsSTableQueriesData*/
	/*override*/protected function __getTableQueriesData():CCTableQueriesData
	{
		return $this->__getDatabaseData()->i_getRegionsTableQueriesData();
	}

	/**@return CCRegionsSTableData*/
	/*override*/protected function __generateTableData(array $aTableData_a_arr):CCTableData
	{
		return new CCRegionsSTableData($aTableData_a_arr);
	}

	//QUERIES...
	/*override*/protected function __generateDataGettingQuery(string $aTableFields_str):string
	{
		//sql_cache

		$lWhere_str = '';

		$lQueryParamId_int = self::i_QUERY_PARAM_ID_STATES;
		if ($this->__isQueryParamDefined($lQueryParamId_int))
		{
			$lStates_str = CArrayTools::i_join($this->__getQueryParamValue($lQueryParamId_int), ',');

			$lWhere_str .= CCRegionsSTableData::i_TABLE_FIELD_STATE. ' in(' .$lStates_str. ')';
		}

		if (!empty($lWhere_str))
		{
			$lWhere_str = ' where ' .$lWhere_str;
		}

		return parent::__generateDataGettingQuery($aTableFields_str).
				$lWhere_str;
	}
	//...QUERIES
}


?>