<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBDatabaseData extends CCDatabaseData
{
	public const i_TABLE_QUERIES_DATA_ID_CONTENT					= self::__TABLE_QUERIES_DATAS_COUNT;
	public const i_TABLE_QUERIES_DATA_ID_ADDITION_TIME_FILTERS_S	= self::__TABLE_QUERIES_DATAS_COUNT + 1;
	public const i_TABLE_QUERIES_DATA_ID_WAGE_FILTERS_S				= self::__TABLE_QUERIES_DATAS_COUNT + 2;
	public const i_TABLE_QUERIES_DATA_ID_WORK_EXPERIENCE_FILTERS_S	= self::__TABLE_QUERIES_DATAS_COUNT + 3;
	public const i_TABLE_QUERIES_DATA_ID_WORK_SCHEDULE_FILTERS_S	= self::__TABLE_QUERIES_DATAS_COUNT + 4;


	/***************************************************
	 * INTERFACE
	 */

	/**@return CJOBDatabaseData*/
	static public function i_toClassType(&$a_clss)
	{
		return $a_clss;
	}

	public function i_getContentTableQueriesData():CJOBContentTableQueriesData
	{
		return $this->__getTableQueriesData(self::i_TABLE_QUERIES_DATA_ID_CONTENT);
	}

	public function i_getAdditionTimeFiltersSTableQueriesData():CJOBAdditionTimeFiltersSTableQueriesData
	{
		return $this->__getTableQueriesData(self::i_TABLE_QUERIES_DATA_ID_ADDITION_TIME_FILTERS_S);
	}

	public function i_getWageFiltersSTableQueriesData():CJOBWageFiltersSTableQueriesData
	{
		return $this->__getTableQueriesData(self::i_TABLE_QUERIES_DATA_ID_WAGE_FILTERS_S);
	}

	public function i_getWorkExperienceFiltersSTableQueriesData():CJOBWorkExperienceFiltersSTableQueriesData
	{
		return $this->__getTableQueriesData(self::i_TABLE_QUERIES_DATA_ID_WORK_EXPERIENCE_FILTERS_S);
	}

	public function i_getWorkScheduleFiltersSTableQueriesData():CJOBWorkScheduleFiltersSTableQueriesData
	{
		return $this->__getTableQueriesData(self::i_TABLE_QUERIES_DATA_ID_WORK_SCHEDULE_FILTERS_S);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __generateTableQueriesData(int $aTableQueriesDataId_int):CCTableQueriesData
	{
		$lTableQueriesData_clss = null;

		switch ($aTableQueriesDataId_int)
		{
			case self::i_TABLE_QUERIES_DATA_ID_CONTENT:
			{
				$lTableQueriesData_clss = new CJOBContentTableQueriesData();
			}break;

			case self::i_TABLE_QUERIES_DATA_ID_ADDITION_TIME_FILTERS_S:
			{
				$lTableQueriesData_clss = new CJOBAdditionTimeFiltersSTableQueriesData();
			}break;

			case self::i_TABLE_QUERIES_DATA_ID_WAGE_FILTERS_S:
			{
				$lTableQueriesData_clss = new CJOBWageFiltersSTableQueriesData();
			}break;

			case self::i_TABLE_QUERIES_DATA_ID_WORK_EXPERIENCE_FILTERS_S:
			{
				$lTableQueriesData_clss = new CJOBWorkExperienceFiltersSTableQueriesData();
			}break;

			case self::i_TABLE_QUERIES_DATA_ID_WORK_SCHEDULE_FILTERS_S:
			{
				$lTableQueriesData_clss = new CJOBWorkScheduleFiltersSTableQueriesData();
			}break;

			default:
				$lTableQueriesData_clss = parent::__generateTableQueriesData($aTableQueriesDataId_int);
			break;
		}

		return $lTableQueriesData_clss;
	}
}


?>