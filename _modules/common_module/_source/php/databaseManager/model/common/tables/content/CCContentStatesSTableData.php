<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCContentStatesSTableData extends CCSTableData
{
	public const i_TABLE_NAME							= 'c_states_s';

	//DATABASE PHP AGREEMENTS...
	public const i_TABLE_FIELD_STRING_ID				= 'string_id';				//char(32)
	public const i_TABLE_FIELD_MODERATION_WAITING		= 'moderation_waiting';		//tinyint(3)
	public const i_TABLE_FIELD_RE_MODERATION_WAITING	= 're_moderation_waiting';	//tinyint(3)
	public const i_TABLE_FIELD_ACTIVATED				= 'activated';				//tinyint(3)
	public const i_TABLE_FIELD_DEACTIVATED				= 'deactivated';			//tinyint(3)
	public const i_TABLE_FIELD_BLOCKED					= 'blocked';				//tinyint(3)
	public const i_TABLE_FIELD_DELETED					= 'deleted';				//tinyint(3)
	public const i_TABLE_FIELD_DELETION_WAITING			= 'deletion_waiting';		//tinyint(3)
	public const i_TABLE_FIELD_BANNED					= 'banned';					//tinyint(3)
	//...DATABASE PHP AGREEMENTS


	/***************************************************
	 * INTERFACE
	 */

	/**@return CCContentStatesSTableData*/
	static public function i_toClassType(&$a_clss)
	{
		return $a_clss;
	}

	public function i_getTableFieldStringId():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_STRING_ID);
	}

	public function i_getTableFieldModerationWaiting():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_MODERATION_WAITING);
	}

	public function i_getTableFieldReModerationWaiting():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_RE_MODERATION_WAITING);
	}

	public function i_getTableFieldActivated():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_ACTIVATED);
	}

	public function i_getTableFieldDeactivated():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_DEACTIVATED);
	}

	public function i_getTableFieldBlocked():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_BLOCKED);
	}

	public function i_getTableFieldDeleted():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_DELETED);
	}

	public function i_getTableFieldDeletionWaiting():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_DELETION_WAITING);
	}

	public function i_getTableFieldBanned():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_BANNED);
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>