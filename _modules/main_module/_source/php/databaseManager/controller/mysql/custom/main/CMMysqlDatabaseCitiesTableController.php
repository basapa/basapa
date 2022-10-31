<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CMMysqlDatabaseCitiesTableController extends CCMysqlDatabaseTableController
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

	protected function __getTableName()
	{
		return CMUserTableData::i_TABLE_NAME;
	}
}


?>