<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBWorkScheduleFiltersSTableData extends CCSTableData
{
	public const i_TABLE_NAME							= 'job_work_schedule_filters_s';

	//DATABASE PHP AGREEMENTS...
	public const i_TABLE_FIELD_STRING_ID				= 'string_id';		//char(8)
	//...DATABASE PHP AGREEMENTS

	//VALUES...
	/*private const _VALUE_STRING_ID_ALL					= "ALL";
	private const _VALUE_STRING_ID_FT_SCH				= "FT_SCH";
	private const _VALUE_STRING_ID_PT_SCH				= "PT_SCH";
	private const _VALUE_STRING_ID_S_SCH				= "S_SCH";
	private const _VALUE_STRING_ID_LS_SCH				= "LS_SCH";*/
	//...VALUES


	/***************************************************
	 * INTERFACE
	 */

	/**@return CJOBWorkScheduleFiltersSTableData*/
	static public function i_toClassType(&$a_clss)
	{
		return $a_clss;
	}

	public function i_getTableFieldStringId():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_STRING_ID);
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>