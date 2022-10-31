<?php
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CMUsersTableData extends CCTableData
{
	public const i_TABLE_NAME							= 'users';

	public const i_TABLE_FIELD_LOGIN					= 'login';								//char(16)
	public const i_TABLE_FIELD_PASSWORD					= 'password';							//char(48)
	public const i_TABLE_FIELD_EMAIL					= 'email';								//char(32)
	//const TABLE_FIELD_LAST_VISIT_TIME					= 'last_visit_time';					//int(10)
	//const TABLE_FIELD_PASSWORD_KEY						= 'password_key';						//char(48)
	//const TABLE_FIELD_PASSWORD_HASH						= 'password_hash';						//char(48)
	//const TABLE_FIELD_IP_ADDRESS						= 'ip_address';							//int(10)

	//const TABLE_FIELD_VERIFICATION_KEY					= 'verification_key';					//char(48)
	//const TABLE_FIELD_VERIFICATION_KEY_RELEASE_TIME		= 'verification_key_release_time';		//int(10)
	//const TABLE_FIELD_VERIFICATION_KEY_EXPIRING_TIME	= 'verification_key_expire_time';		//int(10)


	/***************************************************
	 * INTERFACE
	 */

	public function i_getTableName()
	{
		return CMUserTableData::i_TABLE_NAME;
	}

	public function i_getTableFieldLogin()
	{
		return $this->__getTableFieldValue(CMUserTableData::i_TABLE_FIELD_LOGIN);
	}

	public function i_getTableFieldPassword()
	{
		return $this->__getTableFieldValue(CMUserTableData::i_TABLE_FIELD_PASSWORD);
	}

	public function i_getTableFieldEmail()
	{
		return $this->__getTableFieldValue(CMUserTableData::i_TABLE_FIELD_EMAIL);
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>