<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CJOBMySQLDatabaseTablesController extends CCMySQLDatabaseTablesController
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_getMySQLDatabaseContentTableController():CJOBMySQLDatabaseContentTableController
	{
		return $this->__getMySQLDatabaseTableController(CJOBDatabaseData::i_TABLE_QUERIES_DATA_ID_CONTENT);
	}

	public function i_getMySQLDatabaseAdditionTimeFiltersSTableController():CJOBMySQLDatabaseAdditionTimeFiltersSTableController
	{
		return $this->__getMySQLDatabaseTableController(CJOBDatabaseData::i_TABLE_QUERIES_DATA_ID_ADDITION_TIME_FILTERS_S);
	}

	public function i_getMySQLDatabaseWageFiltersSTableController():CJOBMySQLDatabaseWageFiltersSTableController
	{
		return $this->__getMySQLDatabaseTableController(CJOBDatabaseData::i_TABLE_QUERIES_DATA_ID_WAGE_FILTERS_S);
	}

	public function i_getMySQLDatabaseWorkExperienceFiltersSTableController():CJOBMySQLDatabaseWorkExperienceFiltersSTableController
	{
		return $this->__getMySQLDatabaseTableController(CJOBDatabaseData::i_TABLE_QUERIES_DATA_ID_WORK_EXPERIENCE_FILTERS_S);
	}

	public function i_getMySQLDatabaseWorkScheduleFiltersSTableController():CJOBMySQLDatabaseWorkScheduleFiltersSTableController
	{
		return $this->__getMySQLDatabaseTableController(CJOBDatabaseData::i_TABLE_QUERIES_DATA_ID_WORK_SCHEDULE_FILTERS_S);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __generateMySQLDatabaseTableController(int $aTableQueriesDataId_int):CCMySQLDatabaseTableController
	{
		$lMySQLDatabaseTableController_clss = null;

		switch ($aTableQueriesDataId_int)
		{
			case CJOBDatabaseData::i_TABLE_QUERIES_DATA_ID_CONTENT:
			{
				$lMySQLDatabaseTableController_clss = new CJOBMySQLDatabaseContentTableController();
			}break;

			case CJOBDatabaseData::i_TABLE_QUERIES_DATA_ID_ADDITION_TIME_FILTERS_S:
			{
				$lMySQLDatabaseTableController_clss = new CJOBMySQLDatabaseAdditionTimeFiltersSTableController();
			}break;

			case CJOBDatabaseData::i_TABLE_QUERIES_DATA_ID_WAGE_FILTERS_S:
			{
				$lMySQLDatabaseTableController_clss = new CJOBMySQLDatabaseWageFiltersSTableController();
			}break;

			case CJOBDatabaseData::i_TABLE_QUERIES_DATA_ID_WORK_EXPERIENCE_FILTERS_S:
			{
				$lMySQLDatabaseTableController_clss = new CJOBMySQLDatabaseWorkExperienceFiltersSTableController();
			}break;

			case CJOBDatabaseData::i_TABLE_QUERIES_DATA_ID_WORK_SCHEDULE_FILTERS_S:
			{
				$lMySQLDatabaseTableController_clss = new CJOBMySQLDatabaseWorkScheduleFiltersSTableController();
			}break;

			default:
				$lMySQLDatabaseTableController_clss = parent::__generateMySQLDatabaseTableController($aTableQueriesDataId_int);
			break;
		}

		return $lMySQLDatabaseTableController_clss;
	}
}


?>