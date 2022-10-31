<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual override*/class CCSTableQueriesData extends CCTableQueriesData
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_getIds():array
	{
		$lIds_int_arr = [];

		$lSData_clss_arr = $this->___getSelectData();

		foreach ($lSData_clss_arr as $lSData_clss)
		{
			$lSData_clss = CCCitiesSTableData::i_toClassType($lSData_clss);

			$lIds_int_arr[] = $lSData_clss->i_getTableFieldId();
		}

		return $lIds_int_arr;
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>