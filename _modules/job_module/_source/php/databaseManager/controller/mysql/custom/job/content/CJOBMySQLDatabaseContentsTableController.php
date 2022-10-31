<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


final class CJOBMySQLDatabaseContentTableController extends CCMySQLDatabaseContentTableController
{
	/***************************************************
	 * INTERFACE
	 */
	
	/*public function i_addContentData(array $aTableItemData_a_arr):void
	{
		$this->___addData($aTableItemData_a_arr);
	}

	public function i_retrieveContentDataIdsByGETParams(array $aStates_str_arr):void
	{
		$this->___retrieveDataIdsByGETParams($aStates_str_arr);
	}

	public function i_retrieveContentData(array $aOptTableFields_str_arr = null):void
	{
		$this->___retrieveData($aOptTableFields_str_arr);
	}

	public function i_retrieveContentDataById(int $aId_int, array $aOptTableFields_str_arr = null):void
	{
		$this->___retrieveDataById($aId_int, $aOptTableFields_str_arr);
	}

	public function i_retrieveContentDataByGETParams(array $aStates_str_arr, array $aOptTableFields_str_arr = null):void
	{
		$this->___retrieveDataByGETParams($aStates_str_arr, $aOptTableFields_str_arr);
	}*/

	/*public function i_retrieveContentRandomData(int $aDesireContentDataCount_int, array $aOptTableRows_str_arr = null, array $aOptContentIds_int_arr = null):void
	{
		$this->___retrieveRandomData($aDesireContentDataCount_int, $aOptTableRows_str_arr, $aOptContentIds_int_arr);
	}*/

	/*public function i_retrieveContentDataByCategoryIds(int $aDesireContentDataCount_int, array $aOptTableRows_str_arr = null):void
	{
		$this->_retrieveDataByCategoryIds($aDesireContentDataCount_int, $aOptTableRows_str_arr);
	}*/

	/*public function i_retrieveContentDataCount():void
	{
		$this->___retrieveDataCount();
	}

	public function i_retrieveContentDataCountByGETParams(array $aStates_str_arr):void
	{
		$this->___retrieveDataCountByGETParams($aStates_str_arr);
	}*/

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getTableName():string
	{
		return CJOBContentTableData::i_TABLE_NAME;
	}

	/**@return CJOBContentTableQueriesData*/
	/*override*/protected function __getTableQueriesData():CCTableQueriesData
	{
		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);
		return $lDatabaseData_clss->i_getContentTableQueriesData();
	}

	/**@return CJOBContentTableData*/
	/*override*/protected function __generateTableData(array $aTableData_a_arr):CCTableData
	{
		return new CJOBContentTableData($aTableData_a_arr);
	}

	/*private function _retrieveDataByCategoryIds(int $aDesireContentDataCount_int, array $aOptTableRows_str_arr = null):void
	{
		$lTableRows_str = $this->__convertSelectTableRowsToString($aOptTableRows_str_arr);

		$lCategoryContentDataWithContentCount_clss_arr = CDatabaseManager::i_getInstance()->i_getDatabasesData()->i_getJOBDatabaseData()->i_getContentCategoriesTableQueriesData()->i_getSelectDataWithContentCount();

		$lQuery_str = $this->_generateDataGettingQueryByCategoryIds($lCategoryContentDataWithContentCount_clss_arr, $aDesireContentDataCount_int, $lTableRows_str);

		$this->__sendSelectQuery($lQuery_str, $aOptTableRows_str_arr);

		$lTableQueriesData_clss = $this->__getTableQueriesData();

		$lPDOWrapper_clss = CPDOWrapper::i_getInstance();
		while ($lTableItemData_a_arr = $lPDOWrapper_clss->i_getDatabaseNextRowAsAssocArray())
		{
			$lContentTableData_clss = $this->__generateTableData($lTableItemData_a_arr);

			$lTableQueriesData_clss->i_insertContentDataByCategoryIds($lContentTableData_clss->i_getTableFieldJOBCategoryId(), $lContentTableData_clss);
		}
	}*/

	//QUERIES...
	/*private function _generateDataGettingQueryByCategoryIds(array $aCategoryContentDataWithContentCount_clss_arr, int $aDesireContentDataCount_int, string $aTableRows_str):string
	{
		//sql_cache

		$lQueryParts_str_arr = null;

		$lCount_int = CArrayTools::i_count($aCategoryContentDataWithContentCount_clss_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lCategoryContentDataWithContentCount_clss = $aCategoryContentDataWithContentCount_clss_arr[$i];
			$lCategoryContentDataWithContentCount_clss = CJOBContentCategoriesTableData::i_toClassType($lCategoryContentDataWithContentCount_clss);

			$lQueryParts_str_arr[]	= '(select ' .$aTableRows_str. '
										from ' .$this->__getTableName(). '
										where ' .CCContentTableData::i_TABLE_FIELD_STATE. ' = ' .CCContentTableData::i_CONTENT_STATE_ID_MODERATION_WAITING. '
										and ' .CJOBContentTableData::i_TABLE_FIELD_JOB_CATEGORY_ID. ' = ' .$lCategoryContentDataWithContentCount_clss->i_getTableFieldId(). '
										order by ' .CCContentTableData::i_TABLE_FIELD_ADDITION_TIME. ' desc
										limit 0, ' .$aDesireContentDataCount_int. ')';
		}

		return CArrayTools::i_join($lQueryParts_str_arr, ' union ');
	}*/
	//...QUERIES

	/*override*/protected function __getContentSortingData():array
	{
		$l_a_arr = [];

		$lMainData_clss = $this->__getMainData();

		$lSupportedContentSortingDescriptor_a_arr = [	CCContentTableData::i_TABLE_FIELD_ID			=> CJOBRequestParamConst::i_GET_PARAM_ID_OPT_ID_SORTING,
														CCContentTableData::i_TABLE_FIELD_STATE			=> CJOBRequestParamConst::i_GET_PARAM_ID_OPT_STATE_SORTING,
														CCContentTableData::i_TABLE_FIELD_ADDITION_TIME	=> CJOBRequestParamConst::i_GET_PARAM_ID_OPT_ADDITION_TIME_SORTING,
														CCContentTableData::i_TABLE_FIELD_UPDATING_TIME	=> CJOBRequestParamConst::i_GET_PARAM_ID_OPT_UPDATING_TIME_SORTING,
														CCContentTableData::i_TABLE_FIELD_EXPIRING_TIME	=> CJOBRequestParamConst::i_GET_PARAM_ID_OPT_EXPIRING_TIME_SORTING];

		$lKeys_str_arr = CArrayTools::i_getKeys($lSupportedContentSortingDescriptor_a_arr);
		$lValues_str_arr = CArrayTools::i_getValues($lSupportedContentSortingDescriptor_a_arr);

		$lCount_int = CArrayTools::i_count($lKeys_str_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lTableField_str = $lKeys_str_arr[$i];
			if ($lMainData_clss->i_isGETParamDefined($lValues_str_arr[$i]))
			{
				$l_a_arr[$lTableField_str] = $lMainData_clss->i_getGETParam($lValues_str_arr[$i]);
			}
		}

		if (CArrayTools::i_isEmptyArray($l_a_arr))
		{
			$l_a_arr = parent::__getContentSortingData();
		}

		return $l_a_arr;
	}

	/*override*/protected function __insertContentSearchQueryCommandIfRequired(string $aOptTableName_str = ''):string
	{
		$l_str = '';

		$lMainData_clss = $this->__getMainData();

		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);

		$lGETParamId_str = CJOBRequestParamConst::i_GET_PARAM_ID_OPT_CITY_STRING_ID;
		if ($lMainData_clss->i_isGETParamDefined($lGETParamId_str))
		{
			$lSTableData_clss = $lDatabaseData_clss->i_getCitiesTableQueriesData()->i_getDataByStringId($lMainData_clss->i_getGETParam($lGETParamId_str));
			$lSTableData_clss = CCSTableData::i_toClassType($lSTableData_clss);

			$l_str .= ' and ' .CJOBContentTableData::i_TABLE_FIELD_EMPLOYER_CITY_ID. ' = ' .$lSTableData_clss->i_getTableFieldId();
		}
		else
		{
			$lGETParamId_str = CJOBRequestParamConst::i_GET_PARAM_ID_OPT_REGION_STRING_ID;
			if ($lMainData_clss->i_isGETParamDefined($lGETParamId_str))
			{
				$lIds_int_arr = $lDatabaseData_clss->i_getCitiesTableQueriesData()->i_getIds();

				$l_str .= ' and ' .CJOBContentTableData::i_TABLE_FIELD_EMPLOYER_CITY_ID. ' in (' .CArrayTools::i_join($lIds_int_arr, ','). ')';
			}
		}

		$lGETParamId_str = CJOBRequestParamConst::i_GET_PARAM_ID_OPT_SEARCH_TEXT;
		if ($lMainData_clss->i_isGETParamDefined($lGETParamId_str))
		{
			$l_str .= ' and ('
								.CJOBContentTableData::i_TABLE_FIELD_CAPTION. ' like \'%' .$lMainData_clss->i_getGETParam($lGETParamId_str). '%\'
								or ' .CJOBContentTableData::i_TABLE_FIELD_DESCRIPTION. ' like \'%' .$lMainData_clss->i_getGETParam($lGETParamId_str). '%\'
							)';
		}

		$lGETParamId_str = CJOBRequestParamConst::i_GET_PARAM_ID_OPT_ADDITION_TIME_FILTERS;
		if ($lMainData_clss->i_isGETParamDefined($lGETParamId_str))
		{
			$lTime_int = CDateTimeTools::i_getCurrentUTimeInSec() - CVariableTools::i_toInt($lMainData_clss->i_getGETParam($lGETParamId_str));

			$l_str .= ' and ' .CJOBContentTableData::i_TABLE_FIELD_ADDITION_TIME. ' >= ' .$lTime_int;
		}

		$lGETParamId_str = CJOBRequestParamConst::i_GET_PARAM_ID_OPT_WAGE_FILTERS;
		if ($lMainData_clss->i_isGETParamDefined($lGETParamId_str))
		{
			$l_str .= ' and ' .CJOBContentTableData::i_TABLE_FIELD_WAGE_FROM. ' >= ' .$lMainData_clss->i_getGETParam($lGETParamId_str);
		}

		$lGETParamId_str = CJOBRequestParamConst::i_GET_PARAM_ID_OPT_WORK_EXPERIENCE_FILTERS;
		if ($lMainData_clss->i_isGETParamDefined($lGETParamId_str))
		{
			$lStringId_str = $lMainData_clss->i_getGETParam($lGETParamId_str);
			$lId_int = $lDatabaseData_clss->i_getWorkExperienceFiltersSTableQueriesData()->i_getIdByStringId($lStringId_str);

			$l_str .= ' and ' .CJOBContentTableData::i_TABLE_FIELD_EXPERIENCE_TYPE_ID. ' = ' .$lId_int;
		}

		$lGETParamId_str = CJOBRequestParamConst::i_GET_PARAM_ID_OPT_WORK_SCHEDULE_FILTERS;
		if ($lMainData_clss->i_isGETParamDefined($lGETParamId_str))
		{
			$lStringId_str = $lMainData_clss->i_getGETParam($lGETParamId_str);
			$lId_int = $lDatabaseData_clss->i_getWorkScheduleFiltersSTableQueriesData()->i_getIdByStringId($lStringId_str);

			$l_str .= ' and ' .CJOBContentTableData::i_TABLE_FIELD_SCHEDULE_TYPE_ID. ' = ' .$lId_int;
		}

		return $l_str;
	}
}


?>
