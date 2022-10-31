<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBWorkScheduleFiltersSTableQueriesData extends CCSTableQueriesData
{
	/***************************************************
	 * INTERFACE
	 */

	//SELECT...
	public function i_getWorkScheduleFiltersSData():array
	{
		return $this->___getSelectData();
	}
	//...SELECT

	public function i_isStringIdSupported(string $aStringId_str):bool
	{
		$lFiltersSData_clss_arr = $this->i_getWorkScheduleFiltersSData();

		$lCount_int = CArrayTools::i_count($lFiltersSData_clss_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lFilterSData_clss = CJOBWorkScheduleFiltersSTableData::i_toClassType($lFiltersSData_clss_arr[$i]);
			if ($lFilterSData_clss->i_getTableFieldStringId() === $aStringId_str)
			{
				return true;
			}
		}

		return false;
	}

	public function i_getIdByStringId(string $aStringId_str):int
	{
		$lFiltersSData_clss_arr = $this->i_getWorkScheduleFiltersSData();

		$lCount_int = CArrayTools::i_count($lFiltersSData_clss_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lFilterSData_clss = CJOBWorkScheduleFiltersSTableData::i_toClassType($lFiltersSData_clss_arr[$i]);
			if ($lFilterSData_clss->i_getTableFieldStringId() === $aStringId_str)
			{
				return $lFilterSData_clss->i_getTableFieldId();
			}
		}

		new CException('i_getIdByStringId', 'ILE!');
		return -1;
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>