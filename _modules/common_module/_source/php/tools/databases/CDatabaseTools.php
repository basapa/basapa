<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CDatabaseTools
{
	//DATABASE TYPES (do not modify)...
	public const i_DATABASE_TYPE_MYSQL					= 'mysql';
	//...DATABASE TYPES (do not modify)
	
	//ENCODING TYPES (do not modify)...
	public const i_DATABASE_ENCODING_TYPE_UTF8			= 'utf8';
	//...ENCODING TYPES (do not modify)
	
	
	/***************************************************
	 * INTERFACE
	 */

	static public function i_openDatabaseConnection(array $aDatabaseData_str_arr):\PDO
	{
		ignore_user_abort(true);
		
		$host = $aDatabaseData_str_arr[0];
		$db = $aDatabaseData_str_arr[1];
		$user = $aDatabaseData_str_arr[2];
		$pass = $aDatabaseData_str_arr[3];
		$charset = self::i_DATABASE_ENCODING_TYPE_UTF8;

		$dsn = self::i_DATABASE_TYPE_MYSQL. ':host=$host;dbname=$db;charset=$charset';//---- as robokassa
		$opt = [\PDO::ATTR_ERRMODE				=> \PDO::ERRMODE_EXCEPTION,
				\PDO::ATTR_DEFAULT_FETCH_MODE	=> \PDO::FETCH_ASSOC,
				\PDO::ATTR_EMULATE_PREPARES		=> false];
				
		$lDatabaseRef_pdo = new \PDO($dsn, $user, $pass, $opt);
		
		return $lDatabaseRef_pdo;
	}

	static public function i_closeDatabaseConnection(\PDO $aDatabaseRef_pdo):void
	{
		ignore_user_abort(false);

		$aDatabaseRef_pdo = null;
	}

	/*static public function i_sendDatabaseQuery(\PDO &$aDatabaseRef_pdo, string $aQuery_str):void
	{
		if (empty($aQuery_str))
		{
			new CException('i_sendDatabaseQuery', 'Database query arg invalid!');
		}

		$lResult_var = $aDatabaseRef_pdo->query($aQuery_str);
		if (!$lResult_var)
		{
			new CException('i_sendDatabaseQuery', 'Database query sending failed: ' .$aQuery_str. '; error: ' .$aDatabaseRef_pdo->error);
		}
		return $lResult_var;
	}*/

	/*static public function i_getDatabaseNextRowAsObject(\PDOStatement &$aResult_pdos):array
	{
		return $aResult_pdos->fetch_assoc();
	}*/

	static public function i_clearDatabaseQueryResult(\PDOStatement &$aResult_pdos):void
	{
		$aResult_pdos = null;
	}

	/*static public function i_getDatabaseInsertId(\PDO &$aDatabaseRef_pdo):int
	{
		return $aDatabaseRef_pdo->insert_id;
	}*/

	/*
	 * INTERFACE
	 ***************************************************/
}


?>