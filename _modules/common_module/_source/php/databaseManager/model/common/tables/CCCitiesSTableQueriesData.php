<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCCitiesSTableQueriesData extends CCSTableQueriesData
{
	//optimization...
	private $_fDataByStringId_clss_arr;
	//...optimization

	//private $_fSelectDataByStates_clss_arr;
	//private $_fSelectDataByStatesAndRegionId_clss_arr;


	/***************************************************
	 * INTERFACE
	 */

	//SELECT...
	/*public function i_addSelectCitiesSDataByStates(CCTableData $aData_clss):void
	{
		if ($this->i_areSelectCitiesSDataByStatesDefined())
		{
			new CException('i_addSelectCitiesSDataByStates', 'Data already exist!');
		}
		$this->_fSelectDataByStates_clss_arr[] = $aData_clss;
	}

	public function i_insertSelectCitiesSDataByStates(string $aKeyValue_str, CCTableData $aData_clss):void
	{
		if (isset($this->_fSelectDataByStates_clss_arr[$aKeyValue_str]))
		{
			new CException('i_insertSelectCitiesSDataByStates', 'Data already exist: key: ' .$aKeyValue_str);
		}
		$this->_fSelectDataByStates_clss_arr[$aKeyValue_str] = $aData_clss;
	}

	public function i_getSelectCitiesSDataByStates():array
	{
		if (!$this->i_areSelectCitiesSDataByStatesDefined())
		{
			new CException('i_getSelectCitiesSDataByStates', 'Data not exist!');
		}
		return $this->_fSelectDataByStates_clss_arr;
	}

	public function i_areSelectCitiesSDataByStatesDefined():bool
	{
		return isset($this->_fSelectDataByStates_clss_arr);
	}

	public function i_addSelectCitiesSDataByStatesAndRegionId(CCTableData $aData_clss):void
	{
		if ($this->i_areSelectCitiesSDataByStatesAndRegionIdDefined())
		{
			new CException('i_addSelectCitiesSDataByStatesAndRegionId', 'Data already exist!');
		}
		$this->_fSelectDataByStatesAndRegionId_clss_arr[] = $aData_clss;
	}

	public function i_insertSelectCitiesSDataByStatesAndRegionId(string $aKeyValue_str, CCTableData $aData_clss):void
	{
		if (isset($this->_fSelectDataByStates_clss_arr[$aKeyValue_str]))
		{
			new CException('i_insertSelectCitiesSDataByStatesAndRegionId', 'Data already exist: key: ' .$aKeyValue_str);
		}
		$this->_fSelectDataByStatesAndRegionId_clss_arr[$aKeyValue_str] = $aData_clss;
	}

	public function i_getSelectCitiesSDataByStatesAndRegionId():array
	{
		if (!$this->i_areSelectCitiesSDataByStatesAndRegionIdDefined())
		{
			new CException('i_getSelectCitiesSDataByStatesAndRegionId', 'Data not exist!');
		}
		return $this->_fSelectDataByStatesAndRegionId_clss_arr;
	}

	public function i_areSelectCitiesSDataByStatesAndRegionIdDefined():bool
	{
		return isset($this->_fSelectDataByStatesAndRegionId_clss_arr);
	}*/
	//...SELECT

	/*public function i_isStringIdSupported(string $aStringId_str):bool
	{
		$lSData_clss_arr = $this->i_getSelectCitiesSDataByStates();//optimization required

		foreach ($lSData_clss_arr as $lSData_clss)
		{
			$lSData_clss = CCCitiesSTableData::i_toClassType($lSData_clss);
			if ($lSData_clss->i_getTableFieldStringId() === $aStringId_str)
			{
				return true;
			}
		}

		return false;
	}*/

	/*public function i_getIdByStringId(string $aStringId_str):int
	{
		$lSData_clss_arr = $this->i_getSelectCitiesSDataByStates();//optimization required

		foreach ($lSData_clss_arr as $lSData_clss)
		{
			$lSData_clss = CCCitiesSTableData::i_toClassType($lSData_clss);
			if ($lSData_clss->i_getTableFieldStringId() === $aStringId_str)
			{
				return $lSData_clss->i_getTableFieldId();
			}
		}

		new CException('i_getIdByStringId', 'ILE!');
		return -1;
	}*/

	public function i_getDataByStringId(string $aStringId_str):CCCitiesSTableData
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
			$lSData_clss = CCCitiesSTableData::i_toClassType($lSData_clss);
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