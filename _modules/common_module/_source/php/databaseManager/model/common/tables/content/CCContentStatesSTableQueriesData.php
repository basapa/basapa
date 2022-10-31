<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCContentStatesSTableQueriesData extends CCSTableQueriesData
{
	//optimization...
	private $_fDataByStringId_clss_arr;
	//...optimization

	//private $_fSelectDataByStates_clss_arr;


	/***************************************************
	 * INTERFACE
	 */

	//SELECT...
	/*public function i_addSelectRegionsSDataByStates(CCTableData $aData_clss):void
	{
		if ($this->i_areSelectRegionsSDataByStatesDefined())
		{
			new CException('i_addSelectRegionsSDataByStates', 'Data already exist!');
		}
		$this->_fSelectDataByStates_clss_arr[] = $aData_clss;
	}

	public function i_insertSelectRegionsSDataByStates(string $aKeyValue_str, CCTableData $aData_clss):void
	{
		if (isset($this->_fSelectDataByStates_clss_arr[$aKeyValue_str]))
		{
			new CException('i_insertSelectRegionsSDataByStates', 'Data already exist: key: ' .$aKeyValue_str);
		}
		$this->_fSelectDataByStates_clss_arr[$aKeyValue_str] = $aData_clss;
	}

	public function i_getSelectRegionsSDataByStates():array
	{
		if (!$this->i_areSelectRegionsSDataByStatesDefined())
		{
			new CException('i_getSelectRegionsSDataByStates', 'Data not exist!');
		}
		return $this->_fSelectDataByStates_clss_arr;
	}

	public function i_areSelectRegionsSDataByStatesDefined():bool
	{
		return isset($this->_fSelectDataByStates_clss_arr);
	}*/
	//...SELECT

	/*public function i_isStringIdSupported(string $aStringId_str):bool
	{
		$lSData_clss_arr = $this->i_getSelectRegionsSDataByStates();//optimization required

		foreach ($lSData_clss_arr as $lSData_clss)
		{
			$lSData_clss = CCRegionsSTableData::i_toClassType($lSData_clss);
			if ($lSData_clss->i_getTableFieldStringId() === $aStringId_str)
			{
				return true;
			}
		}

		return false;
	}*/

	public function i_getDataByStringId(string $aStringId_str):CCContentStatesSTableData
	{
		if (
				isset($this->_fDataByStringId_clss_arr)
				&& isset($this->_fDataByStringId_clss_arr[$aStringId_str])
			)
		{
			return $this->_fDataByStringId_clss_arr[$aStringId_str];
		}

		$lSData_clss_arr = $this->___getSelectData();

		foreach ($lSData_clss_arr as $lSData_clss)
		{
			$lSData_clss = CCContentStatesSTableData::i_toClassType($lSData_clss);
			if ($lSData_clss->i_getTableFieldStringId() === $aStringId_str)
			{
				$this->_fDataByStringId_clss_arr[$aStringId_str] = $lSData_clss;
				return $lSData_clss;
			}
		}

		new CException('i_getDataByStringId', 'ILE!');
		return null;
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>