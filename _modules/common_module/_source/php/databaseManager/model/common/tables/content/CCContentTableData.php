<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCContentTableData extends CCTableData
{
	//DATABASE PHP TRANSLATIONS AGREEMENTS...
	public const i_TABLE_FIELD_ADDITION_TIME			= 'addition_time';			//int(10)
	public const i_TABLE_FIELD_UPDATING_TIME			= 'updating_time';			//int(10)
	public const i_TABLE_FIELD_EXPIRING_TIME			= 'expiring_time';			//int(10)
	public const i_TABLE_FIELD_TYPE						= 'type';					//tinyint(3)
	public const i_TABLE_FIELD_PREV_TYPE				= 'prev_type';				//tinyint(3)
	public const i_TABLE_FIELD_STATE					= 'state';					//tinyint(3)
	public const i_TABLE_FIELD_PREV_STATE				= 'prev_state';				//tinyint(3)
	public const i_TABLE_FIELD_STATUS					= 'status';					//tinyint(3)
	public const i_TABLE_FIELD_PREV_STATUS				= 'prev_status';			//tinyint(3)
	public const i_TABLE_FIELD_STATE_EXPIRING_TIME		= 'state_expiring_time';	//int(10)
	public const i_TABLE_FIELD_STATE_UPDATING_TIME		= 'state_updating_time';	//int(10)
	public const i_TABLE_FIELD_STATUS_EXPIRING_TIME		= 'status_expiring_time';	//int(10)
	public const i_TABLE_FIELD_STATUS_UPDATING_TIME		= 'status_updating_time';	//int(10)
	public const i_TABLE_FIELD_USER_ID					= 'user_id';				//int(10)	//Note: the field is optional for users table

	//TYPES...
	public const i_CONTENT_TYPE_ID_UNDEFINED			= 0;
	//...TYPES

	//STATES...
	public const i_CONTENT_STATE_ID_UNDEFINED				= 0;
	public const i_CONTENT_STATE_ID_MODERATION_WAITING		= 1;
	//public const i_CONTENT_STATE_ID_RESERVED				= 2;
	public const i_CONTENT_STATE_ID_ACTIVATED				= 3;
	public const i_CONTENT_STATE_ID_DEACTIVATED				= 4;
	public const i_CONTENT_STATE_ID_BLOCKED					= 5;
	public const i_CONTENT_STATE_ID_DELETED					= 6;

	public const i_SUPPORTED_CONTENT_STATES				= [	self::i_CONTENT_STATE_ID_UNDEFINED,
															self::i_CONTENT_STATE_ID_MODERATION_WAITING,
															self::i_CONTENT_STATE_ID_ACTIVATED,
															self::i_CONTENT_STATE_ID_DEACTIVATED,
															self::i_CONTENT_STATE_ID_BLOCKED,
															self::i_CONTENT_STATE_ID_DELETED];

	public const i_SUPPORTED_CONTENT_STATES_TRANSITIONS	= [	self::i_CONTENT_STATE_ID_UNDEFINED				=> [self::i_CONTENT_STATE_ID_MODERATION_WAITING],
															self::i_CONTENT_STATE_ID_MODERATION_WAITING		=> [self::i_CONTENT_STATE_ID_ACTIVATED, self::i_CONTENT_STATE_ID_DEACTIVATED],
															self::i_CONTENT_STATE_ID_ACTIVATED				=> [self::i_CONTENT_STATE_ID_DEACTIVATED, self::i_CONTENT_STATE_ID_BLOCKED],
															self::i_CONTENT_STATE_ID_DEACTIVATED			=> [self::i_CONTENT_STATE_ID_ACTIVATED, self::i_CONTENT_STATE_ID_DELETED],
															self::i_CONTENT_STATE_ID_BLOCKED				=> [self::i_CONTENT_STATE_ID_MODERATION_WAITING, self::i_CONTENT_STATE_ID_DELETED],
															self::i_CONTENT_STATE_ID_DELETED				=> []];

	public const i_ADMINISTRATION_CONTENT_STATES		= [	self::i_CONTENT_STATE_ID_MODERATION_WAITING,
															self::i_CONTENT_STATE_ID_ACTIVATED,
															self::i_CONTENT_STATE_ID_DEACTIVATED,
															self::i_CONTENT_STATE_ID_BLOCKED,
															self::i_CONTENT_STATE_ID_DELETED];
	//...STATES

	//STATUSES...
	public const i_CONTENT_STATUS_ID_UNDEFINED			= 0;
	//...STATUSES
	//...DATABASE PHP TRANSLATIONS AGREEMENTS


	/***************************************************
	 * INTERFACE
	 */

	public function i_getTableFieldAdditionTime():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_ADDITION_TIME));
	}

	public function i_getTableFieldUpdatingTime():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_UPDATING_TIME));
	}

	public function i_getTableFieldExpiringTime():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_EXPIRING_TIME));
	}

	public function i_getTableFieldType():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_TYPE));
	}

	public function i_getTableFieldPrevType():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_PREV_TYPE));
	}

	public function i_getTableFieldState():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_STATE));
	}

	public function i_getTableFieldPrevState():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_PREV_STATE));
	}

	public function i_getTableFieldStatus():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_STATUS));
	}

	public function i_getTableFieldPrevStatus():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_PREV_STATUS));
	}

	public function i_getTableFieldStateExpitingTime():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_STATE_EXPIRING_TIME));
	}

	public function i_getTableFieldStateUpdatingTime():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_STATE_UPDATING_TIME));
	}

	public function i_getTableFieldStatusExpitingTime():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_STATUS_EXPIRING_TIME));
	}

	public function i_getTableFieldStatusUpdatingTime():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_STATUS_UPDATING_TIME));
	}

	public function i_getTableFieldUserId():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_USER_ID));
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>