<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual override*/class CCContentTableQueriesData extends CCTableQueriesData
{
	private $_fSelectContentDataIdsByGETParams_int_arr;
	private $_fSelectContentDataByGETParams_clss_arr;
	private $_fSelectContentDataByType_clss_arr;
	private $_fSelectContentDataByState_clss_arr;
	private $_fSelectContentDataCountByGETParams_int = -1;


	/***************************************************
	 * INTERFACE
	 */

	//SELECT...
	/*internal*/public function ___setSelectContentDataIdsByGETParams(?array $aIds_int_arr):void
	{
		$this->_fSelectContentDataIdsByGETParams_int_arr = $aIds_int_arr;
	}

	/*internal*/public function ___getSelectContentDataIdsByGETParams():array
	{
		if (!$this->___areSelectContentDataIdsByGETParamsDefined())
		{
			new CException('___getSelectContentDataIdsByGETParams', 'Content Data ids not exist!');
		}
		return $this->_fSelectContentDataIdsByGETParams_int_arr;
	}

	/*internal*/public function ___areSelectContentDataIdsByGETParamsDefined():bool
	{
		return isset($this->_fSelectContentDataIdsByGETParams_int_arr);
	}

	/*internal*/public function ___addSelectContentDataByGETParams(CCContentTableData $aData_clss):void
	{
		$this->_fSelectContentDataByGETParams_clss_arr[] = $aData_clss;
	}

	/*internal*/public function ___getSelectContentDataByGETParams():array
	{
		if (!$this->___areSelectContentDataByGETParamsDefined())
		{
			new CException('___getSelectContentDataByGETParams', 'Content Data not exist!');
		}
		return $this->_fSelectContentDataByGETParams_clss_arr;
	}

	/*internal*/public function ___areSelectContentDataByGETParamsDefined():bool
	{
		return isset($this->_fSelectContentDataByGETParams_clss_arr);
	}

	/*internal*/public function ___addSelectContentDataByType(CCContentTableData $aData_clss):void
	{
		$this->_fSelectContentDataByType_clss_arr[] = $aData_clss;
	}

	/*internal*/public function ___getSelectContentDataByType():array
	{
		if (!$this->___areSelectContentDataByTypeDefined())
		{
			new CException('___getSelectContentDataByType', 'Content Data not exist!');
		}
		return $this->_fSelectContentDataByType_clss_arr;
	}

	/*internal*/public function ___areSelectContentDataByTypeDefined():bool
	{
		return isset($this->_fSelectContentDataByType_clss_arr);
	}

	/*internal*/public function ___addSelectContentDataByState(CCContentTableData $aData_clss):void
	{
		$this->_fSelectContentDataByState_clss_arr[] = $aData_clss;
	}

	/*internal*/public function ___getSelectContentDataByState():array
	{
		if (!$this->___areSelectContentDataByStateDefined())
		{
			new CException('___getSelectContentDataByState', 'Content Data not exist!');
		}
		return $this->_fSelectContentDataByState_clss_arr;
	}

	/*internal*/public function ___areSelectContentDataByStateDefined():bool
	{
		return isset($this->_fSelectContentDataByState_clss_arr);
	}

	/*internal*/public function ___setSelectContentDataCountByGETParams(int $aDataCount_int):void
	{
		if ($this->___isSelectContentDataCountByGETParamsDefined())
		{
			new CException('___setSelectContentDataCountByGETParams', 'Content Data already exist: ' .$aDataCount_int);
		}
		$this->_fSelectContentDataCountByGETParams_int = $aDataCount_int;
	}

	/*internal*/public function ___getSelectContentDataCountByGETParams():int
	{
		return $this->_fSelectContentDataCountByGETParams_int;
	}

	/*internal*/public function ___isSelectContentDataCountByGETParamsDefined():bool
	{
		return $this->_fSelectContentDataCountByGETParams_int !== -1;
	}
	//...SELECT

	/*
	 * INTERFACE
	 ***************************************************/
}


?>