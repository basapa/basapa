<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBWageFiltersSTableQueriesData extends CCSTableQueriesData
{
	/***************************************************
	 * INTERFACE
	 */

	//SELECT...
	public function i_getWageFiltersSData():array
	{
		return $this->___getSelectData();
	}
	//...SELECT

	public function i_isValueSupported(string $aValue_str):bool
	{
		$lFiltersSData_clss_arr = $this->i_getWageFiltersSData();

		$lCount_int = CArrayTools::i_count($lFiltersSData_clss_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lFilterSData_clss = CJOBWageFiltersSTableData::i_toClassType($lFiltersSData_clss_arr[$i]);
			if (CVariableTools::i_toString($lFilterSData_clss->i_getTableFieldValue()) === $aValue_str)
			{
				return true;
			}
		}

		return false;
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>