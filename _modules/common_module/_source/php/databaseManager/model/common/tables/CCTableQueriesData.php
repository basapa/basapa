<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCTableQueriesData
{
	private $_fInsertData_clss_arr;

	private $_fSelectData_clss_arr;
	private $_fSelectDataCount_int = -1;
	private $_fSelectDataById_clss;

	private $_fUpdateDataById_clss;
	
	
	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	//INSERT...
	/*internal*/public function ___addInsertData(CCTableData $aData_clss):void
	{
		$this->_fInsertData_clss_arr[] = $aData_clss;
	}

	/*internal*/public function ___getInsertData():array
	{
		if (!$this->___areInsertDataDefined())
		{
			new CException('___getInsertData', 'Data not exist!');
		}
		return $this->_fInsertData_clss_arr;
	}

	/*internal*/public function ___areInsertDataDefined():bool
	{
		return isset($this->_fInsertData_clss_arr);
	}
	//...INSERT

	//SELECT...
	/*internal*/public function ___addSelectData(CCTableData $aData_clss):void
	{
		$this->_fSelectData_clss_arr[] = $aData_clss;
	}

	/*internal*/public function ___insertSelectData(string $aKeyValue_str, CCTableData $aData_clss):void
	{
		if (isset($this->_fSelectData_clss_arr[$aKeyValue_str]))
		{
			new CException('___insertSelectData', 'Data already exist: key: ' .$aKeyValue_str);
		}
		$this->_fSelectData_clss_arr[$aKeyValue_str] = $aData_clss;
	}

	/*virtual internal*/public function ___getSelectData():array
	{
		if (!$this->___areSelectDataDefined())
		{
			new CException('___getSelectData', 'Data not exist!');
		}
		return $this->_fSelectData_clss_arr;
	}

	/*virtual internal*/public function ___getSelectDataAsMultiAssociativeArray():array
	{
		if (!$this->___areSelectDataDefined())
		{
			new CException('___getSelectDataAsMultiAssociativeArray', 'Data not exist!');
		}

		$lMultiAssociativeArray_a_arr = [];

		foreach ($this->_fSelectData_clss_arr as $lKey_str => $lData_clss)
		{
			$lData_clss = CCTableData::i_toClassType($lData_clss);

			$lMultiAssociativeArray_a_arr[$lKey_str] = $lData_clss->i_toAssociativeArray();
		}

		return $lMultiAssociativeArray_a_arr;
	}

	/*internal*/public function ___areSelectDataDefined():bool
	{
		return isset($this->_fSelectData_clss_arr);
	}

	/*internal*/public function ___setSelectDataById(CCTableData $aData_clss):void
	{
		if ($this->___isSelectDataByIdDefined())
		{
			new CException('___setSelectDataById', 'Data already exist: table name: ' .$aData_clss->i_getTableName());
		}
		$this->_fSelectDataById_clss = $aData_clss;
	}

	/*virtual internal*/public function ___getSelectDataById():CCTableData
	{
		if (!$this->___isSelectDataByIdDefined())
		{
			new CException('___getSelectDataById', 'Data not exist!');
		}
		return $this->_fSelectDataById_clss;
	}

	/*internal*/public function ___isSelectDataByIdDefined():bool
	{
		return isset($this->_fSelectDataById_clss);
	}

	/*internal*/public function ___setSelectDataCount(int $aDataCount_int):void
	{
		if ($this->___isSelectDataCountDefined())
		{
			new CException('___setSelectDataCount', 'Data already exist: ' .$aDataCount_int);
		}
		$this->_fSelectDataCount_int = $aDataCount_int;
	}

	/*internal*/public function ___getSelectDataCount():int
	{
		return $this->_fSelectDataCount_int;
	}

	/*internal*/public function ___isSelectDataCountDefined():bool
	{
		return $this->_fSelectDataCount_int !== -1;
	}
	//...SELECT
	
	//UPDATE...
	/*internal*/public function ___setUpdateDataById(CCTableData $aData_clss):void
	{
		if ($this->___isUpdateDataByIdDefined())
		{
			new CException('___setUpdateDataById', 'Data already exist: table name: ' .$aData_clss->i_getTableName());
		}
		$this->_fUpdateDataById_clss = $aData_clss;
	}

	/*internal*/public function ___getUpdateDataById():CCTableData
	{
		if (!$this->___isUpdateDataByIdDefined())
		{
			new CException('___getUpdateDataById', 'Data not exist!');
		}
		return $this->_fUpdateDataById_clss;
	}

	/*internal*/public function ___isUpdateDataByIdDefined():bool
	{
		return isset($this->_fUpdateDataById_clss);
	}
	//...UPDATE
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/
}


?>