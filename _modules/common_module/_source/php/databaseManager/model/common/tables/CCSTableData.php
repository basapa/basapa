<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual override*/class CCSTableData extends CCTableData
{
	//DATABASE PHP AGREEMENTS...
	public const i_TABLE_FIELD_NAME						= 'name';		//char(32)
	public const i_TABLE_FIELD_TYPE						= 'type';		//tinyint(3)
	public const i_TABLE_FIELD_STATE					= 'state';		//tinyint(3)
	public const i_TABLE_FIELD_STATUS					= 'status';		//tinyint(3)
	//...DATABASE PHP AGREEMENTS

	//TYPES...
	public const i_CONTENT_TYPE_ID_UNDEFINED			= 0;
	//...TYPES

	//STATES...
	public const i_CONTENT_STATE_ID_UNDEFINED			= 0;
	//public const i_CONTENT_STATE_ID_RESERVED			= 1;
	//public const i_CONTENT_STATE_ID_RESERVED			= 2;
	public const i_CONTENT_STATE_ID_ACTIVATED			= 3;
	public const i_CONTENT_STATE_ID_DEACTIVATED			= 4;

	public const i_SUPPORTED_CONTENT_STATES				= [	self::i_CONTENT_STATE_ID_UNDEFINED,
															self::i_CONTENT_STATE_ID_ACTIVATED,
															self::i_CONTENT_STATE_ID_DEACTIVATED];
	//...STATES

	//STATUSES...
	public const i_CONTENT_STATUS_ID_UNDEFINED			= 0;
	//...STATUSES


	/***************************************************
	 * INTERFACE
	 */

	/**@return CCSTableData*/
	/*virtual*/static public function i_toClassType(&$a_clss)
	{
		return $a_clss;
	}

	public function i_getTableFieldName():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_NAME);
	}

	public function i_getTableFieldType():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_TYPE));
	}

	public function i_getTableFieldState():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_STATE));
	}

	public function i_getTableFieldStatus():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_STATUS));
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>