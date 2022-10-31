<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCSupportMessagesTableData extends CCTableData
{
	public const i_TABLE_NAME							= 'support_messages';

	public const i_TABLE_FIELD_CAPTION					= 'caption';		//char(32)
	public const i_TABLE_FIELD_EMAIL					= 'email';			//char(32)
	public const i_TABLE_FIELD_MESSAGE					= 'message';		//text(1024)

	public const i_TABLE_FIELD_TIME						= 'time';			//int(10)


	/***************************************************
	 * INTERFACE
	 */

	/*override*/public function i_getTableName():string
	{
		return self::i_TABLE_NAME;
	}

	public function i_getTableFieldCaption():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_CAPTION);
	}
	
	public function i_getTableFieldEmail():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_EMAIL);
	}
	
	public function i_getTableFieldMessage():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_MESSAGE);
	}

	public function i_getTableFieldTime():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_TIME));
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>