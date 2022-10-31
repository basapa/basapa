<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCUsersTableData extends CCContentTableData
{
	public const i_TABLE_NAME							= 'c_users';

	public const i_TABLE_FIELD_LOGIN					= 'login';				//char(16)
	public const i_TABLE_FIELD_PASSWORD					= 'password';			//char(48)
	public const i_TABLE_FIELD_EMAIL					= 'email';				//char(32)
	public const i_TABLE_FIELD_LAST_VISIT_TIME			= 'last_visit_time';	//int(10)
	public const i_TABLE_FIELD_PASSWORD_KEY				= 'password_key';		//char(48)
	public const i_TABLE_FIELD_PASSWORD_HASH			= 'password_hash';		//char(48)
	public const i_TABLE_FIELD_LAST_IP_ADDRESS			= 'last_ip_address';	//int(10)

	//public const TABLE_FIELD_VERIFICATION_KEY					= 'verification_key';					//char(48)
	//public const TABLE_FIELD_VERIFICATION_KEY_RELEASE_TIAVTE	= 'verification_key_release_time';		//int(10)
	//public const TABLE_FIELD_VERIFICATION_KEY_EXPIRING_TIAVTE	= 'verification_key_expire_time';		//int(10)


	/***************************************************
	 * INTERFACE
	 */

	/*override*/public function i_getTableName():string
	{
		return self::i_TABLE_NAME;
	}

	public function i_getTableFieldLogin():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_LOGIN);
	}

	public function i_getTableFieldPassword():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_PASSWORD);
	}

	public function i_getTableFieldEmail():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_EMAIL);
	}

	public function i_getTableFieldLastVisitTime():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_LAST_VISIT_TIME));
	}

	public function i_getTableFieldPasswordKey():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_PASSWORD_KEY);
	}

	public function i_getTableFieldPasswordHash():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_PASSWORD_HASH);
	}

	public function i_getTableFieldLastIPAddress():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_LAST_IP_ADDRESS));
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>