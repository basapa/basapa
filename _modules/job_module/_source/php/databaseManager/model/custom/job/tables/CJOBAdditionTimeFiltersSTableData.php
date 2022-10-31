<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBAdditionTimeFiltersSTableData extends CCSTableData
{
	public const i_TABLE_NAME							= 'job_addition_time_filters_s';

	//DATABASE PHP AGREEMENTS...
	public const i_TABLE_FIELD_VALUE					= 'value';		//int(10)
	//...DATABASE PHP AGREEMENTS


	/***************************************************
	 * INTERFACE
	 */

	/**@return CJOBAdditionTimeFiltersSTableData*/
	static public function i_toClassType(&$a_clss)
	{
		return $a_clss;
	}

	public function i_getTableFieldValue():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_VALUE));
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>