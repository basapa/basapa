<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCTableData
{
	//DATABASE PHP AGREEMENTS...
	public const i_TABLE_FIELD_ID						= 'id';		//int(10)/bigint(20)
	//...DATABASE PHP AGREEMENTS

	private $_fTableData_a_arr;


	public function __construct(array $aOptTableData_a_arr = null)
	{
		$this->__init($aOptTableData_a_arr);
	}

	/***************************************************
	 * INTERFACE
	 */

	/**@return CCTableData*/
	static public function i_toClassType(&$a_clss)
	{
		return $a_clss;
	}

	static public function i_isTableDataValueNotSetted($aTableDataValue_var):bool
	{
		if (CVariableTools::i_isString($aTableDataValue_var))
		{
			return CVariableTools::i_isStringEmpty($aTableDataValue_var);
		}
		else
		{
			return $aTableDataValue_var === 0;
		}
	}

	public function i_initEx(CCTableData $aTableData_clss):void
	{
		$this->__init($aTableData_clss->i_getTableData());
	}

	/*virtual*/public function i_getTableName():string
	{
		new CAbstractException('getTableName');
		return '';
	}

	public function i_setTableData(array $aTableData_a_arr):void
	{
		$this->_fTableData_a_arr = $aTableData_a_arr;
	}

	public function i_getTableData():array
	{
		return $this->_fTableData_a_arr;
	}

	public function i_getTableFieldStringValue(string $aTableFieldName_str):string
	{
		return CVariableTools::i_toString($this->__getTableFieldStringValue($aTableFieldName_str));
	}

	public function i_isTableFieldDefined(string $aTableFieldName_str):bool
	{
		return isset($this->_fTableData_a_arr[$aTableFieldName_str]);
	}

	public function i_getTableFieldId():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_ID));
	}

	public function i_toAssociativeArray():array
	{
		return $this->_fTableData_a_arr;
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*/protected function __init(array $aOptTableData_a_arr):void
	{
		$this->i_setTableData($aOptTableData_a_arr);
	}

	protected function __getTableFieldStringValue(string $aTableFieldName_str)
	{
		if (!$this->i_isTableFieldDefined($aTableFieldName_str))
		{
			new CException('__getTableFieldStringValue', 'Table field not defined: ' .$aTableFieldName_str);
		}
		return $this->_fTableData_a_arr[$aTableFieldName_str];
	}
}


?>