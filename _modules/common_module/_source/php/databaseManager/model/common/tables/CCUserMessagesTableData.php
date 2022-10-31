<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCUserMessagesTableData extends CCTableData
{
	public const i_TABLE_NAME							= 'user_messages';

	public const i_TABLE_FIELD_USER_NAME				= 'user_name';		//char(32)
	public const i_TABLE_FIELD_MESSAGE					= 'message';		//text(1024)

	public const i_TABLE_FIELD_ADDITING_TIME			= 'additing_time';	//int(10)


	/***************************************************
	 * INTERFACE
	 */

	/*override*/public function i_getTableName():string
	{
		return self::i_TABLE_NAME;
	}

	public function i_getTableFieldUserName():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_USER_NAME);
	}

	public function i_getTableFieldMessage():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_MESSAGE);
	}

	public function i_getTableFieldAdditingTime():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_ADDITING_TIME));
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>