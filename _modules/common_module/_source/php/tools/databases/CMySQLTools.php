<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CMySQLTools
{
	//ENCODING TYPES (do not modify)...
	public const i_MYSQL_ENCODING_TYPE_UTF8				= 'utf8';
	//...ENCODING TYPES (do not modify)
	
	private const _MYSQL_ENCODING_TYPES					= [self::i_MYSQL_ENCODING_TYPE_UTF8];


	/***************************************************
	 * INTERFACE
	 */

	static public function i_openMySQLConnection(array $aDatabaseData_str_arr):\mysqli
	{
		ignore_user_abort(true);

		$lDatabaseRef_mysqli = new \mysqli($aDatabaseData_str_arr[0], $aDatabaseData_str_arr[1], $aDatabaseData_str_arr[2], $aDatabaseData_str_arr[3]);
		if (isset($lDatabaseRef_mysqli->connect_error))
		{
			new CException('i_openMySQLConnection', 'Database connection open failed: ' .$lDatabaseRef_mysqli->connect_error);
		}

		self::i_setMySQLEncoding($lDatabaseRef_mysqli, self::i_MYSQL_ENCODING_TYPE_UTF8);

		return $lDatabaseRef_mysqli;
	}

	static public function i_closeMySQLConnection(\mysqli $aDatabaseRef_mysqli):void
	{
		ignore_user_abort(false);

		$aDatabaseRef_mysqli->close();
	}

	/**@return bool|\mysqli*/
	static public function i_sendMySQLQuery(\mysqli &$aDatabaseRef_mysqli, string $aQuery_str)
	{
		if (empty($aQuery_str))
		{
			new CException('i_sendMySQLQuery', 'MySQL query arg invalid!');
		}

		$lResult_var = $aDatabaseRef_mysqli->query($aQuery_str);
		if ($lResult_var === false)
		{
			new CException('i_sendMySQLQuery', 'MySQL query sending failed: ' .$aQuery_str. '; error: ' .$aDatabaseRef_mysqli->error);
		}
		return $lResult_var;
	}

	static public function i_applyMySQLCharsEscaping(\mysqli &$aDatabaseRef_mysqli, string $aValue_str):string
	{
		return $aDatabaseRef_mysqli->real_escape_string($aValue_str);
	}

	static public function i_setMySQLEncoding(\mysqli &$aDatabaseRef_mysqli, string $aEncodingType_str):void
	{
		if (!CArrayTools::i_isInArray($aEncodingType_str, self::_MYSQL_ENCODING_TYPES))
		{
			new CException('i_setMySQLEncoding', 'Unsupported MySQL encoding type: ' .$aEncodingType_str);
		}
		$lResult_var = $aDatabaseRef_mysqli->set_charset($aEncodingType_str);
		if (!$lResult_var)
		{
			new CException('i_setMySQLEncoding', 'MySQL charset not setted!');
		}
	}

	static public function i_getMySQLNextRowAsObject(\mysqli_result &$aResult_mysqli_result):array
	{
		return $aResult_mysqli_result->fetch_assoc();
	}

	static public function i_clearMySQLQueryResult(\mysqli_result &$aResult_mysqli_result):void
	{
		$aResult_mysqli_result->free();
	}

	static public function i_getMySQLInsertId(\mysqli &$aDatabaseRef_mysqli):int
	{
		return $aDatabaseRef_mysqli->insert_id;
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>