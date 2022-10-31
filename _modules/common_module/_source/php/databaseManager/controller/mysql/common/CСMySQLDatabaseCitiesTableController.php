<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCMySQLDatabaseCitiesTableController extends CCMySQLDatabaseTableController
{
	public const i_QUERY_PARAM_ID_REGION_ID				= self::___QUERY_PARAM_IDS_COUNT;


	/***************************************************
	 * INTERFACE
	 */

	/*public function i_retrieveCitiesData(array $aOptTableRows_str_arr = null):void
	{
		$this->___retrieveData($aOptTableRows_str_arr);
	}*/

	/*public function getDataByRegionId($aRegionId_int, $aOptTableRows_str_arr = null)
	{
		$aRegionId_int = $this->__validateNumberValue($aRegionId_int);

		$lSelect_str = $this->__getSelectParams($aOptTableRows_str_arr);

		$this->__fQuery_str = 'select ' .$lSelect_str. '
								from ' .CDatabaseConst::TABLE_CITY. '
								where ' .CDatabaseConst::TABLE_CITY_REGION_ID. ' = ' .$aRegionId_int;
		
		return $this->__select();
	}*/

	/*public function i_retrieveCitiesDataByStates(array $aStates_int_arr, array $aOptTableRows_str_arr = null, string $aOptTableFieldAsKey_str = '')
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
				$lTableQueriesData_clss->i_addSelectCitiesSDataByStates($lTableData_clss);
			}
			else
			{
				$lTableQueriesData_clss->i_insertSelectCitiesSDataByStates($lTableData_clss->i_getTableFieldStringValue($aOptTableFieldAsKey_str), $lTableData_clss);
			}
		}
	}*/

	/*public function i_retrieveCitiesDataByStatesAndRegionId(array $aStates_int_arr, int $aRegionId_int, array $aOptTableRows_str_arr = null, string $aOptTableFieldAsKey_str = '')
	{
		$lTableFields_str = $this->__convertSelectTableFieldsToString($aOptTableRows_str_arr);

		$lQuery_str = $this->_generateDataGettingQueryByStatesAndRegionId($aStates_int_arr, $aRegionId_int, $lTableFields_str);

		$this->__sendSelectQuery($lQuery_str);

		$lTableQueriesData_clss = $this->__getTableQueriesData();

		$lPDOWrapper_clss = CPDOWrapper::i_getInstance();
		while ($lTableItemData_a_arr = $lPDOWrapper_clss->i_getDatabaseNextRowAsAssocArray())
		{
			$lTableData_clss = $this->__generateTableData($lTableItemData_a_arr);
			if (empty($aOptTableFieldAsKey_str))
			{
				$lTableQueriesData_clss->i_addSelectCitiesSDataByStatesAndRegionId($lTableData_clss);
			}
			else
			{
				$lTableQueriesData_clss->i_insertSelectCitiesSDataByStatesAndRegionId($lTableData_clss->i_getTableFieldStringValue($aOptTableFieldAsKey_str), $lTableData_clss);
			}
		}
	}*/

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getTableName():string
	{
		return CCCitiesSTableData::i_TABLE_NAME;
	}

	/**@return CCCitiesSTableQueriesData*/
	/*override*/protected function __getTableQueriesData():CCTableQueriesData
	{
		return $this->__getDatabaseData()->i_getCitiesTableQueriesData();
	}

	/**@return CCCitiesSTableData*/
	/*override*/protected function __generateTableData(array $aTableData_a_arr):CCTableData
	{
		return new CCCitiesSTableData($aTableData_a_arr);
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

		$lQueryParamId_int = self::i_QUERY_PARAM_ID_REGION_ID;
		if ($this->__isQueryParamDefined($lQueryParamId_int))
		{
			$lWhere_str .= !empty($lWhere_str) ? ' and ' : '';
			$lWhere_str .= CCCitiesSTableData::i_TABLE_FIELD_REGION_ID. ' = ' .$this->__getQueryParamValue($lQueryParamId_int);
		}

		if (!empty($lWhere_str))
		{
			$lWhere_str = ' where ' .$lWhere_str;
		}

		return parent::__generateDataGettingQuery($aTableFields_str).
				$lWhere_str;
	}
	//...QUERIES


	/*override*//*protected function __generateDataGettingQueryByStates(array $aStates_int_arr, string $aTableRows_str):string
	{
		$lStates_str = CArrayTools::i_join($aStates_int_arr, ',');

		return 'select ' .$aTableRows_str. '
				from ' .$this->__getTableName(). '
				where ' .CCCitiesSTableData::i_TABLE_FIELD_STATE. ' in(' .$lStates_str. ')';
	}*/

	/*private function _generateDataGettingQueryByStatesAndRegionId(array $aStates_int_arr, int $aRegionId_int, string $aTableRows_str):string
	{
		$lStates_str = CArrayTools::i_join($aStates_int_arr, ',');

		return 'select ' .$aTableRows_str. '
				from ' .$this->__getTableName(). '
				where ' .CCCitiesSTableData::i_TABLE_FIELD_STATE. ' in(' .$lStates_str. ')
				and ' .CCCitiesSTableData::i_TABLE_FIELD_REGION_ID. ' = ' .$aRegionId_int;
	}*/
}


?>