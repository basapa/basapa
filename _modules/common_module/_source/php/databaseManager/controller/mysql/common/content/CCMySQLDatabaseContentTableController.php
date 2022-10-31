<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


/*abstract*/class CCMySQLDatabaseContentTableController extends CCMySQLDatabaseTableController
{
	//CONTENT SORTING VALUES (do not modify)...
	public const i_CONTENT_SORTING_VALUE_DEC			= 'desc';
	public const i_CONTENT_SORTING_VALUE_INC			= 'asc';
	//...CONTENT SORTING VALUES (do not modify)


	/***************************************************
	 * INTERFACE
	 */

	/*internal*/public function ___retrieveDataIdsByGETParams(array $aStates_str_arr):void
	{
		$lTableFields_str = $this->__convertSelectTableFieldsToString();

		$lQuery_str = $this->__generateDataGettingQueryByGETParams($lTableFields_str, $aStates_str_arr);

		$this->__sendSelectQuery($lQuery_str);

		$lTableQueriesData_clss = $this->__getTableQueriesData();

		$lPDOWrapper_clss = CPDOWrapper::i_getInstance();
		$lTableQueriesData_clss->___setSelectContentDataIdsByGETParams($lPDOWrapper_clss->i_getDatabaseAllColumnsAsArray());
	}

	/*internal*/public function ___retrieveDataByGETParams(array $aStates_int_arr, array $aOptTableRows_str_arr = null):void
	{
		$lTableRows_str = $this->__convertSelectTableFieldsToString($aOptTableRows_str_arr);

		$lQuery_str = $this->__generateDataGettingQueryByGETParams($lTableRows_str, $aStates_int_arr);

		$this->__sendSelectQuery($lQuery_str);

		$lTableQueriesData_clss = $this->__getTableQueriesData();

		$lPDOWrapper_clss = CPDOWrapper::i_getInstance();
		while ($lTableItemData_a_arr = $lPDOWrapper_clss->i_getDatabaseNextRowAsAssocArray())
		{
			$lTableQueriesData_clss->___addSelectContentDataByGETParams($this->__generateTableData($lTableItemData_a_arr));
		}
	}

	/*internal*/public function ___retrieveRandomData(int $aDesireContentDataCount_int, array $aOptTableRows_str_arr = null, array $aOptContentIds_int_arr = null):void
	{
		/*$lTableRows_str = $this->__convertSelectTableRowsToString($aOptTableRows_str_arr);

		if (isset($aOptContentIds_int_arr))
		{
			$lQuery_str = $this->__generateDataGettingQueryByIds($aOptContentIds_int_arr, $lTableRows_str);
		}
		else
		{
			$lTotalContentDataCount_int = 1;//CDatabaseManager::i_getInstance()->i_getDatabasesData()->i_getJOBDatabaseData()->i_getContentTableQueriesData()->i_getContentDataCount();

			$lQuery_str = $this->__generateRandomDataGettingQuery($lTotalContentDataCount_int, $aDesireContentDataCount_int, $lTableRows_str);
		}

		$this->__sendSelectQuery($lQuery_str, $aOptTableRows_str_arr);

		$lTableQueriesData_clss = $this->__getTableQueriesData();

		$lPDOWrapper_clss = CPDOWrapper::i_getInstance();
		while ($lTableItemData_a_arr = $lPDOWrapper_clss->i_getDatabaseNextRowAsAssocArray())
		{
			$lTableQueriesData_clss->___addSelectRandomData($this->__generateTableData($lTableItemData_a_arr));
		}*/
	}

	/*internal*/public function ___retrieveDataByType(int $aType_int, array $aOptTableRows_str_arr = null):void
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
	}
	
	/*internal*/public function ___retrieveDataByState(int $aState_int, array $aOptTableRows_str_arr = null):void
	{
		$lTableFields_str = $this->__convertSelectTableFieldsToString($aOptTableRows_str_arr);

		$lQuery_str = $this->__generateDataGettingQueryByState($aState_int, $lTableFields_str);

		$this->__sendSelectQuery($lQuery_str);

		$lTableQueriesData_clss = $this->__getTableQueriesData();

		$lPDOWrapper_clss = CPDOWrapper::i_getInstance();
		while ($lTableItemData_a_arr = $lPDOWrapper_clss->i_getDatabaseNextRowAsAssocArray())
		{
			$lTableQueriesData_clss->___addSelectContentDataByState($this->__generateTableData($lTableItemData_a_arr));
		}
	}

	/*internal*/public function ___retrieveDataCountByGETParams(array $aStates_int_arr):void
	{
		$lQuery_str = $this->__generateDataCountQueryByGETParams($aStates_int_arr);

		$this->__sendSelectQuery($lQuery_str);

		$lTableQueriesData_clss = $this->__getTableQueriesData();

		$lPDOWrapper_clss = CPDOWrapper::i_getInstance();
		$lTableDataCount_int = CVariableTools::i_toInt($lPDOWrapper_clss->i_getDatabaseFirstColumnDataValue());
		$lTableQueriesData_clss->___setSelectContentDataCountByGETParams($lTableDataCount_int);
	}

	/*internal*/public function ___updateDataStatesByIds(array $aIds_int_arr, array $aStates_int_arr):void
	{
		$lQuery_str = $this->__generateDataStatesUpdatingQueryByIds($aIds_int_arr, $aStates_int_arr);

		$this->__sendUpdateQuery($lQuery_str);
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

	/*
	 * INTERFACE
	 ***************************************************/

	/**@return CCContentTableQueriesData*/
	/*abstract*/protected function __getTableQueriesData():CCTableQueriesData
	{
		new CAbstractException('__getTableQueriesData');
		return null;
	}

	/**@return CCContentTableData*/
	/*abstract*/protected function __generateTableData(array $aTableData_a_arr):CCTableData
	{
		new CAbstractException('__generateTableData');
		return null;
	}

	//QUERIES...
	/*virtual*/protected function __generateDataCountQueryByGETParams(array $aStates_int_arr):string
	{
		//sql_cache

		$lStates_str = CArrayTools::i_join($aStates_int_arr, ",");

		return 'select count(*) as count
				from ' .$this->__getTableName(). '
				where ' .CCContentTableData::i_TABLE_FIELD_STATE. ' in (' .$lStates_str. ')
				' .$this->__insertContentSearchQueryCommandIfRequired();

		/*return 'select count(*) as count
				from ' .$this->__getTableName(). '
				where ' .CCContentTableData::i_TABLE_FIELD_STATE. ' = ' .CCContentTableData::i_CONTENT_STATE_ID_MODERATION_WAITING. '
				' .$this->__insertContentSearchQueryCommandIfRequired();*/
	}

	/*virtual*/protected function __generateDataGettingQueryByGETParams(string $aTableRows_str, array $aStates_int_arr):string
	{
		//sql_cache

		$lStates_str = CArrayTools::i_join($aStates_int_arr, ",");

		$lContentPageIndex_int = CVariableTools::i_toInt($lMainData_clss = $this->__getMainData()->i_getGETParam(CCRequestParamConst::i_GET_PARAM_ID_OPT_CONTENT_PAGE_INDEX, false));
		$lMaxContentsDisplayCountOnPage_int = $this->__getUserData()->i_getMaxContentsDisplayCountOnPage();

		return 'select ' .$aTableRows_str. '
				from ' .$this->__getTableName(). '
				where ' .CCContentTableData::i_TABLE_FIELD_STATE. ' in (' .$lStates_str. ')
				' .$this->__insertContentSearchQueryCommandIfRequired(). '
				' .$this->__insertContentSortingQueryCommand(). '
				limit ' .$lContentPageIndex_int * $lMaxContentsDisplayCountOnPage_int. ', ' .$lMaxContentsDisplayCountOnPage_int;
	}

	/*virtual*/protected function __generateRandomDataGettingQuery(int $aTotalContentDataCount_int, int $aDesireContentDataCount_int, string $aTableRows_str):string
	{
		//sql_cache

		/*$lRandom_int_arr = null;

		while (CArrayTools::i_count($lRandom_int_arr, true) < $aDesireContentDataCount_int)
		{
			$lRandom_int = CMathTools::i_randomInt(0, $aTotalContentDataCount_int - 1);

			if (
					!isset($lRandom_int_arr)
					|| !CArrayTools::i_isInArray($lRandom_int, $lRandom_int_arr)
				)
			{
				$lRandom_int_arr[] = $lRandom_int;
			}
		}

		$lQueryParts_str_arr = null;*/
/*
		return 'SELECT * FROM avt_avatars f
		JOIN ( SELECT RAND() * (SELECT MAX(id) FROM avt_avatars) AS max_id ) AS m
		WHERE f.id >= m.max_id
		ORDER BY f.id ASC
		LIMIT ' .$aDesireContentDataCount_int;*/

		/*$lCount_int = CArrayTools::i_count($lRandom_int_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lQueryParts_str_arr[]	= '(select ' .$aTableRows_str. '
										from ' .$this->__getTableName(). '
										where ' .CCContentTableData::i_TABLE_FIELD_ID. ' >= ' .$lRandom_int_arr[$i]. '
										and ' .CCContentTableData::i_TABLE_FIELD_STATE. ' = ' .CCContentTableData::i_CONTENT_STATE_ID_UNDEFINED. '
										limit 0,1)';
		}

		return CArrayTools::i_join($lQueryParts_str_arr, ' union ');*/

		return 'select ' .$aTableRows_str. '
				from ' .$this->__getTableName(). '
				where ' .CCContentTableData::i_TABLE_FIELD_ID. '
				in
				(
					select ' .CCContentTableData::i_TABLE_FIELD_ID. '
					from
					(
						select ' .CCContentTableData::i_TABLE_FIELD_ID. '
						from ' .$this->__getTableName(). '
						order by rand()
						limit ' .$aDesireContentDataCount_int. '
					) _sub_query
				)';
	}

	/*virtual*/protected function __generateDataGettingQueryByIds(array $aIds_int_arr, string $aTableRows_str, array $aStates_str_arr):string
	{
		$lStates_str = CArrayTools::i_join($aStates_str_arr, ",");

		$lIds_str = '';

		$lCount_int = CArrayTools::i_count($aIds_int_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lId_int = $aIds_int_arr[$i];

			$lIds_str .= empty($lIds_str) ? '' : ' or ';
			$lIds_str .= CCContentTableData::i_TABLE_FIELD_ID. ' = ' .$lId_int;
		}

		return 'select ' .$aTableRows_str. '
				from ' .$this->__getTableName(). '
				where ' .CCContentTableData::i_TABLE_FIELD_STATE. ' in (' .$lStates_str. ')
				and (' .$lIds_str. ')
				limit ' .$lCount_int;
	}

	/*virtual*/protected function __generateDataGettingQueryByType(int $aType_int, string $aTableRows_str):string
	{
		//sql_cache
		
		return 'select ' .$aTableRows_str. '
				from ' .$this->__getTableName(). '
				where ' .CCContentTableData::i_TABLE_FIELD_TYPE. ' = ' .$aType_int;
	}

	/*virtual*/protected function __generateDataGettingQueryByState(int $aState_int, string $aTableRows_str):string
	{
		//sql_cache
		
		return 'select ' .$aTableRows_str. '
				from ' .$this->__getTableName(). '
				where ' .CCContentTableData::i_TABLE_FIELD_STATE. ' = ' .$aState_int;
	}

	/*virtual*/protected function __generateDataStatesUpdatingQueryByIds(array $aIds_int_arr, array $aStates_int_arr):string
	{
		$lIdsCount_int = CArrayTools::i_count($aIds_int_arr);

		if ($lIdsCount_int !== CArrayTools::i_count($aStates_int_arr))
		{
			new CException('__generateDataStatesUpdatingQueryByIds', 'ILE!');
		}

		$l_str = '';

		for ($i = 0; $i < $lIdsCount_int; $i++)
		{
			$lState_int = $aStates_int_arr[$i];
			if ($lState_int !== CCListboxComponentItem::i_EMPTY_ITEM_VALUE)
			{
				$l_str .= ' when ' .$aIds_int_arr[$i]. ' then ' .$lState_int;
			}
		}

		return 'update ' .$this->__getTableName(). '
				set ' .CCContentTableData::i_TABLE_FIELD_STATE. ' = case ' .CCContentTableData::i_TABLE_FIELD_ID.
				$l_str. ' 
				else ' .CCContentTableData::i_TABLE_FIELD_STATE. ' end';
	}
	//...QUERIES

	/*virtual*/protected function __insertContentSearchQueryCommandIfRequired(string $aOptTableName_str = ''):string
	{
		return '';
	}

	/*virtual*/protected function __getContentSortingData():array
	{
		return [CCContentTableData::i_TABLE_FIELD_ID => self::i_CONTENT_SORTING_VALUE_DEC];
	}

	protected function __insertContentSortingQueryCommand(string $aOptTableName_str = ''):string
	{
		$lContentSortingData_a_arr = $this->__getContentSortingData();

		$lTablePrefix_str = $aOptTableName_str !== '' ? $aOptTableName_str. '.' : '';

		$lSortData_str = '';

		$lKeys_str_arr = CArrayTools::i_getKeys($lContentSortingData_a_arr);
		$lValues_str_arr = CArrayTools::i_getValues($lContentSortingData_a_arr);

		$lCount_int = CArrayTools::i_count($lKeys_str_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lSortData_str .= $i > 0 ? ',' : '';
			$lSortData_str .= $lTablePrefix_str . $lKeys_str_arr[$i]. ' ' .$lValues_str_arr[$i];
		}

		return ' order by ' .$lSortData_str;
	}

	/*protected function __insertContentLimitQueryCommand(int $aRequiredContentCount_int, bool $aOptUseContentPageIndex_bl = true):string
	{
		$lContentPageCurrentIndex_int = $aOptUseContentPageIndex_bl ? CVariableTools::i_toInt($this->__getMainData()->i_getGETParam(CCRequestParamConst::i_GET_PARAM_ID_OPT_CONTENT_PAGE_INDEX, false)) : 0;

		return ' limit ' .$aRequiredContentCount_int * $lContentPageCurrentIndex_int. ',' .$aRequiredContentCount_int;
	}*/
}


?>