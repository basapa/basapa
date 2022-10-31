<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*abstract*/class CCMySQLDatabaseTableController extends CCDatabaseTableController
{
	public const i_QUERY_PARAM_ID_STATES				= 0;
	protected const ___QUERY_PARAM_IDS_COUNT			= 1;

	private $_fQueryParams_a_arr;


	/***************************************************
	 * INTERFACE
	 */

	/*internal*/public function ___addData(array $aTableData_a_arr):void
	{
		$lTableItemsData_str = $this->__convertInsertTableDataToString($aTableData_a_arr);

		$lQuery_str = $this->__generateDataAdditionQuery($lTableItemsData_str);

		$this->__sendInsertQuery($lQuery_str);

		$aTableData_a_arr[CCTableData::i_TABLE_FIELD_ID] = $this->___getLastInsertId();

		$lTableQueriesData_clss = $this->__getTableQueriesData();
		$lTableQueriesData_clss->___addInsertData($this->__generateTableData($aTableData_a_arr));
	}

	/*internal*/public function ___retrieveData(array $aOptQueryParams_a_arr = null, array $aOptTableFields_str_arr = null, string $aOptTableFieldAsKey_str = ''):void
	{
		$this->_fQueryParams_a_arr = $aOptQueryParams_a_arr;

		$lTableFields_str = $this->__convertSelectTableFieldsToString($aOptTableFields_str_arr);

		$lQuery_str = $this->__generateDataGettingQuery($lTableFields_str);

		$this->__sendSelectQuery($lQuery_str);

		$lTableQueriesData_clss = $this->__getTableQueriesData();

		$lPDOWrapper_clss = CPDOWrapper::i_getInstance();
		while ($lTableItemData_a_arr = $lPDOWrapper_clss->i_getDatabaseNextRowAsAssocArray())
		{
			$lTableData_clss = $this->__generateTableData($lTableItemData_a_arr);

			if (empty($aOptTableFieldAsKey_str))
			{
				$lTableQueriesData_clss->___addSelectData($lTableData_clss);
			}
			else
			{
				$lTableQueriesData_clss->___insertSelectData($lTableData_clss->i_getTableFieldStringValue($aOptTableFieldAsKey_str), $lTableData_clss);
			}
		}
	}

	/*internal*/public function ___retrieveDataById(int $aId_int, array $aOptTableFields_str_arr = null):void
	{
		$lTableFields_str = $this->__convertSelectTableFieldsToString($aOptTableFields_str_arr);

		$lQuery_str = $this->__generateDataGettingQueryById($aId_int, $lTableFields_str);

		$this->__sendSelectQuery($lQuery_str);

		$lTableQueriesData_clss = $this->__getTableQueriesData();

		$lPDOWrapper_clss = CPDOWrapper::i_getInstance();
		$lTableItemData_a_arr = $lPDOWrapper_clss->i_getDatabaseNextRowAsAssocArray();
		$lTableQueriesData_clss->___setSelectDataById($this->__generateTableData($lTableItemData_a_arr));
	}

	/*internal*/public function ___updateDataById(int $aId_int, array $aTableFields_str_arr):void
	{
		$lTableRows_str = $this->__convertUpdateTableDataToString($aTableFields_str_arr);

		$lQuery_str = $this->__generateDataUpdatingQueryById($aId_int, $lTableRows_str);

		$this->__sendUpdateQuery($lQuery_str);
		
		$lTableQueriesData_clss = $this->__getTableQueriesData();

		$lPDOWrapper_clss = CPDOWrapper::i_getInstance();
		$lTableItemData_a_arr = $lPDOWrapper_clss->i_getDatabaseNextRowAsAssocArray();
		$lTableQueriesData_clss->___setUpdateDataById($this->__generateTableData($lTableItemData_a_arr));
	}

	/*internal*/public function ___retrieveDataCount(array $OptaStates_str_arr = null):void
	{
		$lQuery_str = $this->__generateDataCountQuery($OptaStates_str_arr);

		$this->__sendSelectQuery($lQuery_str);

		$lTableQueriesData_clss = $this->__getTableQueriesData();

		$lPDOWrapper_clss = CPDOWrapper::i_getInstance();
		$lTableDataCount_int = CVariableTools::i_toInt($lPDOWrapper_clss->i_getDatabaseFirstColumnDataValue());
		$lTableQueriesData_clss->___setSelectDataCount($lTableDataCount_int);
	}





	/*
		public function ___getDataByReleaseTimeRange($aMaxTime_int, $aMinTime_int, $aOptTableRows_str_arr = null)
		{
			$lSelect_str = $this->__getSelectParams($aOptTableRows_str_arr);

			$this->__fQuery_str = 'select ' .$lSelect_str. '
									from ' .$this->__getTableName(). '
									where ' .CDatabaseConst::COMMON_TABLE_RELEASE_TIME. ' > ' .$aMinTime_int .'
									and ' .CDatabaseConst::COMMON_TABLE_RELEASE_TIME. ' <= ' .$aMaxTime_int. '
									and ' .CDatabaseConst::COMMON_TABLE_STATE. ' != ' .CControlParamConst::STATE_DELETED. '
									and ' .CDatabaseConst::COMMON_TABLE_STATE. ' != ' .CControlParamConst::STATE_DELETION_WAITING. '
									and ' .CDatabaseConst::COMMON_TABLE_STATE. ' != ' .CControlParamConst::STATE_BANNED;

			return $aOptQueryStrReturnMode_bl ? $this->__select() : $this->__fQuery_str;
		}




		public function ___getDataByIds($aIds_int_arr, $aOptTableRows_str_arr = null, $aOptDataIndexAsDatabaseId_bl = false)
		{
			$lCount_int = count($aIds_int_arr);
			for ($i = 0; $i < $lCount_int; $i++)
			{
				$lId_int = $aIds_int_arr[$i];

				$this->__fQuery_str .= empty($this->__fQuery_str) ? ' and ' : ' or ';
				$this->__fQuery_str .= CDatabaseConst::COMMON_TABLE_ID. ' = ' .$lId_int;
			}

			$lSelect_str = $this->__getSelectParams($aOptTableRows_str_arr);

			$this->__fQuery_str = 'select ' .$lSelect_str. '
									from ' .$this->__getTableName(). '
									where ' .CDatabaseConst::COMMON_TABLE_STATE. ' != ' .CControlParamConst::STATE_UNKNOWN. '
									' .$this->__fQuery_str. '
									limit 0,10';

			return $aOptQueryStrReturnMode_bl ? $this->__select($aOptDataIndexAsDatabaseId_bl) : $this->__fQuery_str;
		}



		public function ___getDataByStates($aStates_int_arr, $aOptTableRows_str_arr = null, $aOptDataIndexAsDatabaseId_bl = false)
		{
			$lStatesQueryPart_str = '';

			$lCount_int = count($aStates_int_arr);
			for ($i = 0; $i < $lCount_int; $i++)
			{
				$lState_int = $this->__validateNumberValue($aStates_int_arr[$i]);

				$lStatesQueryPart_str .= $i != 0 ? ' or ' : '';
				$lStatesQueryPart_str .= CDatabaseConst::COMMON_TABLE_STATE. ' = ' .$lState_int;
			}

			$lSelect_str = $this->__getSelectParams($aOptTableRows_str_arr);

			$this->__fQuery_str = 'select sql_calc_found_rows ' .$lSelect_str. '
									from ' .$this->__getTableName(). '
									where ' .$lStatesQueryPart_str. '
									order by ' .CDatabaseConst::COMMON_TABLE_NAME. ' asc';

			return $aOptQueryStrReturnMode_bl ? $this->__select($aOptDataIndexAsDatabaseId_bl) : $this->__fQuery_str;
		}


		public function ___setDeletionWaitingStateByExpireTime()
		{
			$lCurrentTime_int = CSystem::time();

			$this->__fQuery_str = 'update ' .$this->__getTableName(). '
									set ' .CDatabaseConst::COMMON_TABLE_STATE. ' = ' .CControlParamConst::STATE_DELETION_WAITING. ',
										' .CDatabaseConst::COMMON_TABLE_STATE_UPDATING_TIME. ' = ' .$lCurrentTime_int. '
									where ' .CDatabaseConst::COMMON_TABLE_EXPIRING_TIME. ' <= ' .$lCurrentTime_int. '
									and ' .CDatabaseConst::COMMON_TABLE_STATE. ' != ' .CControlParamConst::STATE_DELETED. '
									and ' .CDatabaseConst::COMMON_TABLE_STATE. ' != ' .CControlParamConst::STATE_UNKNOWN;

			return $this->__update();
		}


		public function ___updateDatasStates($aIds_int_arr, $aStates_int_arr)
		{
			$lIds_str = '';

			$lCount_int = count($aIds_int_arr);
			for ($i = 0; $i < $lCount_int; $i++)
			{
				$lState_int = $aStates_int_arr[$i];
				$lId_int = $aIds_int_arr[$i];

				$lIds_str .= empty($lIds_str) ? $lId_int : ',' .$lId_int;
				$lState_str = $this->__validateStringValue($lState_int);

				$this->__fQuery_str .= ' when ' .CDatabaseConst::COMMON_TABLE_ID. ' = ' .$lId_int. ' then ' .$lState_str;
			}

			if (!empty($this->__fQuery_str))
			{
				$this->__fQuery_str = 'update ' .$this->__getTableName(). '
										set ' .CDatabaseConst::COMMON_TABLE_STATE_UPDATING_TIME. ' = ' .CSystem::time(). ',
										' .CDatabaseConst::COMMON_TABLE_PREV_STATE. ' = ' .CDatabaseConst::COMMON_TABLE_STATE. ',
										' .CDatabaseConst::COMMON_TABLE_STATE. ' = case ' .$this->__fQuery_str. '
										end where ' .CDatabaseConst::COMMON_TABLE_ID. ' in(' .$lIds_str. ')';
			}

			return $this->__update();
		}


		public function ___updateDatasStatesByUserId($aUserId_int, $aIds_int_arr, $aStates_int_arr)
		{
			$lIds_str = '';

			$lCount_int = count($aIds_int_arr);
			for ($i = 0; $i < $lCount_int; $i++)
			{
				$lState_int = $aStates_int_arr[$i];
				$lId_int = $aIds_int_arr[$i];

				$lIds_str .= empty($lIds_str) ? $lId_int : ',' .$lId_int;
				$lState_str = $this->__validateStringValue($lState_int);

				$this->__fQuery_str .= ' when ' .CDatabaseConst::COMMON_TABLE_ID. ' = ' .$lId_int. ' then ' .$lState_str;
			}

			if (!empty($this->__fQuery_str))
			{
				$this->__fQuery_str = 'update ' .$this->__getTableName(). '
										set ' .CDatabaseConst::COMMON_TABLE_STATE_UPDATING_TIME. ' = ' .CSystem::time(). ',
										' .CDatabaseConst::COMMON_TABLE_PREV_STATE. ' = ' .CDatabaseConst::COMMON_TABLE_STATE. ',
										' .CDatabaseConst::COMMON_TABLE_STATE. ' = case ' .$this->__fQuery_str. '
										end where ' .CDatabaseConst::COMMON_TABLE_ID. ' in(' .$lIds_str. ')
										and ' .CDatabaseConst::COMMON_TABLE_USER_ID. ' = ' .$aUserId_int;
			}

			return $this->__update();
		}


		public function ___updateStateByUserId($aUserId_int, $aState_int)
		{
			$this->__fQuery_str = 'update ' .$this->__getTableName(). '
									set ' .CDatabaseConst::COMMON_TABLE_PREV_STATE. ' = ' .CDatabaseConst::COMMON_TABLE_STATE. '
									' .CDatabaseConst::COMMON_TABLE_STATE. ' = ' .$aState_int. '
									where ' .CDatabaseConst::COMMON_TABLE_STATE. ' < ' .$aState_int. '
									and ' .CDatabaseConst::COMMON_TABLE_USER_ID. ' = ' .$aUserId_int;

			return $this->__update();
		}
	*/
	/*internal*/public function ___getLastSelectDataCount():int
	{
		new CAbstractException('___getLastSelectDataCount');
		return -1;

		/*$lQuery_str = 'select found_rows()';

		$lTableItemsData_obj_arr_arr = $this->__sendSelectQuery($lQuery_str);

		return isset($lTableItemsData_obj_arr_arr) ? CStringTools::i_join($lTableItemsData_obj_arr_arr[0], ',') : 0;*/
	}

	/*internal*/public function ___getLastInsertId():int
	{
		return CPDOWrapper::i_getInstance()->i_getDatabaseLastInsertId();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*abstract*/protected function __getTableName():string
	{
		new CAbstractException('__getTableName');
		return '';
	}

	/*abstract*/protected function __getTableQueriesData():CCTableQueriesData
	{
		new CAbstractException('__getTableQueriesData');
		return null;
	}

	/*abstract*/protected function __generateTableData(array $aTableData_a_arr):CCTableData
	{
		new CAbstractException('__generateTableData');
		return null;
	}

	//QUERIES...
	/*virtual*/protected function __generateDataAdditionQuery(string $aTableItemsData_str):string
	{
		return 'insert into ' .$this->__getTableName(). '
				set ' .$aTableItemsData_str;
	}

	/*virtual*/protected function __generateDataGettingQuery(string $aTableFields_str):string
	{
		//sql_cache
		
		return 'select ' .$aTableFields_str. '
				from ' .$this->__getTableName();
	}
	
	/*virtual*/protected function __generateDataGettingQueryById(int $aId_int, string $aTableFields_str):string
	{
		//sql_cache
		
		return 'select ' .$aTableFields_str. '
				from ' .$this->__getTableName(). '
				where ' .CCTableData::i_TABLE_FIELD_ID. ' = ' .$aId_int. '
				limit 0,1';
	}

	/*virtual*//*protected function __generateDataGettingQueryByStates(array $aStates_int_arr, string $aTableFields_str):string
	{
		new CException('__generateDataGettingQueryByStates', 'Must be overrided!');
	}*/

	/*virtual*/protected function __generateDataUpdatingQueryById(int $aId_int, string $aTableFields_str):string
	{
		return 'update ' .$this->__getTableName(). '
				set ' .$aTableFields_str. '
				where ' .CCContentTableData::i_TABLE_FIELD_ID. ' = ' .$aId_int;
	}

	/*virtual*/protected function __generateDataCountQuery(array $OptaStates_str_arr = null):string
	{
		//sql_cache
		
		return 'select count(*) as count
				from ' .$this->__getTableName();
	}
	//...QUERIES

	//QUERIES COMMANDS...
	protected function __sendDeleteQuery(string $aQuery_str):void
	{
		new CException('__sendDeleteQuery', 'Not implemented yet!');
	}

	protected function __sendUpdateQuery(string $aQuery_str):void
	{
		$this->_sendQuery($aQuery_str);
	}

	protected function __sendSelectQuery(string $aQuery_str):void
	{
		$this->_sendQuery($aQuery_str);
	}

	protected function __sendInsertQuery(string $aQuery_str):void
	{
		$this->_sendQuery($aQuery_str);
	}
	//...QUERIES COMMANDS

	protected function __convertSelectTableFieldsToString(array $aOptTableFields_str_arr = null, string $aOptTableName_str = ''):string
	{
		$lResult_str = '';

		if (isset($aOptTableFields_str_arr))
		{
			foreach ($aOptTableFields_str_arr as $lTableField_str)
			{
				$lSeparator_str = empty($lResult_str) ? '' : ',';
				$lResult_str .= empty($aOptTableName_str) ? $lSeparator_str . $lTableField_str : $lSeparator_str . $aOptTableName_str. '.' .$lTableField_str;
			}
		}
		else
		{
			$lResult_str = empty($aOptTableName_str) ? '*' : $aOptTableName_str. '.*';
		}

		return $lResult_str;
	}

	protected function __convertInsertTableDataToString(array $aTableItemData_a_arr):string
	{
		$lResult_str = '';

		if (!isset($aTableItemData_a_arr))
		{
			new CException('__convertInsertTableDataToString', 'ILE!', CException::i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR);
		}

		foreach ($aTableItemData_a_arr as $lTableRowName_str => $lTableRowValue_obj)
		{
			$lResult_str .= empty($lResult_str) ? '' : ',';
			$lResult_str .= $lTableRowName_str. ' = :' .$lTableRowName_str;
		}

		return $lResult_str;
	}

	protected function __convertUpdateTableDataToString(array $aTableItemData_a_arr):string
	{
		return $this->__convertInsertTableDataToString($aTableItemData_a_arr);
	}

	protected function __convertUpdateTableDataToAssocArray(array $aTableItemData_a_arr):array
	{
		$lResult_str_arr = [];

		if (!isset($aTableItemData_a_arr))
		{
			new CException('__convertUpdateTableDataToAssocArray', 'ILE!', CException::i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR);
		}

		foreach ($aTableItemData_a_arr as $lTableKey_str => $lTableItemData_a_arr)
		{
			$lResult_str_arr[$lTableKey_str] = $this->__convertInsertTableDataToString($lTableItemData_a_arr);
		}

		return $lResult_str_arr;
	}

	protected function __applyStringValueQuote(string $aValue_str):string
	{
		return CPDOWrapper::i_getInstance()->i_applyQuote($aValue_str);
	}

	private function _sendQuery(string $aQuery_str):void
	{
		if (SOURCES_EXECUTION_MODE === SOURCES_EXECUTION_MODE_DEBUG)
		{
			CLogFile::i_writeContentInLogFile('QUERY [' .$this->__getTableName(). ']: ' .$aQuery_str);
		}

		$lSystem_clss = CSystem::i_getInstance();
		$lAppExecutionTimeInMSec_int = $lSystem_clss->i_getAppExecutionTimeInMSec();

		$lPDOWrapper_clss = CPDOWrapper::i_getInstance();
		$lPDOWrapper_clss->i_clearDatabaseQueryResult();
		$lPDOWrapper_clss->i_sendDatabaseQuery($aQuery_str);

		$lQueryExecutionTimeInMSec_int = $lSystem_clss->i_getAppExecutionTimeInMSec() - $lAppExecutionTimeInMSec_int;

		if (SOURCES_EXECUTION_MODE === SOURCES_EXECUTION_MODE_DEBUG)
		{
			CLogFile::i_writeContentInLogFile('QUERY EXECUTION TIME: ' .CVariableTools::i_toString(CMathTools::i_round($lQueryExecutionTimeInMSec_int/ 1000, 5)));
		}

		$this->__updateDatabaseInfo($lQueryExecutionTimeInMSec_int);
	}

	//QUERY PARAMS...
	protected function __isQueryParamDefined(int $aQueryParamId_int):bool
	{
		return isset($this->_fQueryParams_a_arr)
				&& isset($this->_fQueryParams_a_arr[$aQueryParamId_int]);
	}

	protected function __getQueryParamValue(int $aQueryParamId_int)
	{
		return $this->_fQueryParams_a_arr[$aQueryParamId_int];
	}
	//...QUERY PARAMS
}


?>