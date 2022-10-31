<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CPDOWrapper
{
	static private $_fInstance_clss;

	//DATABASE TYPES (do not modify)...
	public const i_DATABASE_TYPE_MYSQL					= 'mysql';
	//...DATABASE TYPES (do not modify)
	
	//DATABASE ENCODING TYPES (do not modify)...
	public const i_DATABASE_ENCODING_TYPE_UTF8			= 'utf8';
	//...DATABASE ENCODING TYPES (do not modify)

	//DATABASE PARAM IDS (do not modify)...
	private const _DATABASE_PARAM_ID_HOST				= 'host';
	private const _DATABASE_PARAM_ID_DATABASE_NAME		= 'dbname';
	private const _DATABASE_PARAM_ID_DATABASE_ENCODING	= 'charset';
	//...DATABASE PARAM IDS (do not modify)

	//DATABASE PARAM IDS (do not modify)...
	private const _DATABASE_FETCH_MODE_ASSOC			= \PDO::FETCH_ASSOC;
	private const _DATABASE_FETCH_MODE_BOTH				= \PDO::FETCH_BOTH;
	private const _DATABASE_FETCH_MODE_COLUMN			= \PDO::FETCH_COLUMN;
	private const _DATABASE_FETCH_MODE_KEY_PAIR			= \PDO::FETCH_KEY_PAIR;
	//...DATABASE PARAM IDS (do not modify)

	/**@var \PDO*/
	private $_fDatabaseRef_pdo;
	/**@var \PDOStatement*/
	private $_fDatabaseQueryResult_pdos;


	private function __construct()
	{
		//$this->_init();
	}

	/***************************************************
	 * INTERFACE
	 */

	static public function i_getInstance():self
	{
		if (!isset(self::$_fInstance_clss))
		{
			self::$_fInstance_clss = new self();
		}
		return self::$_fInstance_clss;
	}

	public function i_openDatabaseConnection(array $aDatabaseConnectionData_str_arr, string $aOptDatabaseType_str = self::i_DATABASE_TYPE_MYSQL, string $aOptEncodingType_str = self::i_DATABASE_ENCODING_TYPE_UTF8):void
	{
		ignore_user_abort(true);
		
		$lHost_str = $aDatabaseConnectionData_str_arr[0];
		$lUserLogin_str = $aDatabaseConnectionData_str_arr[1];
		$lUserPassword_str = $aDatabaseConnectionData_str_arr[2];
		$lDatabaseName_str = $aDatabaseConnectionData_str_arr[3];

		$lPDOConnectionDataString_str = $aOptDatabaseType_str. ':' .self::_DATABASE_PARAM_ID_HOST. '=' .$lHost_str. ';' .self::_DATABASE_PARAM_ID_DATABASE_NAME. '=' .$lDatabaseName_str. ';' .self::_DATABASE_PARAM_ID_DATABASE_ENCODING. '=' .$aOptEncodingType_str;

		$lParams_a_arr	= [	\PDO::ATTR_ERRMODE				=> \PDO::ERRMODE_EXCEPTION,
							\PDO::ATTR_DEFAULT_FETCH_MODE	=> \PDO::FETCH_ASSOC,
							\PDO::ATTR_EMULATE_PREPARES		=> false];

		$this->_fDatabaseRef_pdo = new \PDO($lPDOConnectionDataString_str, $lUserLogin_str, $lUserPassword_str, $lParams_a_arr);
	}

	public function i_closeDatabaseConnection():void
	{
		ignore_user_abort(false);

		$this->_fDatabaseRef_pdo = null;
	}

	public function i_sendDatabaseQuery(string $aQueryPattern_str):void
	{
		$l_var = $this->_fDatabaseRef_pdo->prepare($aQueryPattern_str);
		if ($l_var === false)
		{
			new CException('i_sendDatabaseQuery', 'Database query preparing failed: ' .$aQueryPattern_str. '; error: ' .$this->_fDatabaseRef_pdo->errorCode());
		}

		$this->_fDatabaseQueryResult_pdos = $l_var;

		if (
				!$this->_fDatabaseQueryResult_pdos->execute()
				&& $this->_fDatabaseRef_pdo->errorCode() !== \PDO::ERR_NONE
		)
		{
			new CException('i_sendDatabaseQuery', 'Database query executing failed: ' .$aQueryPattern_str. '; error: ' .$this->_fDatabaseRef_pdo->errorCode());
		}
	}

	public function i_applyQuote(string $aValue_str):string
	{
		return $this->_fDatabaseRef_pdo->quote($aValue_str);
	}

	public function i_getDatabaseLastInsertId():int
	{
		return CVariableTools::i_toInt($this->_fDatabaseRef_pdo->lastInsertId());
	}

	public function i_clearDatabaseQueryResult():void
	{
		if (isset($this->_fDatabaseQueryResult_pdos))
		{
			$this->_fDatabaseQueryResult_pdos->closeCursor();
			$this->_fDatabaseQueryResult_pdos = null;
		}
	}

	public function i_getDatabaseNextRowAsAssocArray():?array
	{
		$l_var = $this->_fDatabaseQueryResult_pdos->fetch(self::_DATABASE_FETCH_MODE_ASSOC);
		return $l_var !== false ? $l_var : null;
	}

	public function i_getDatabaseAllColumnsAsArray():?array
	{
		$l_var = $this->_fDatabaseQueryResult_pdos->fetchAll(self::_DATABASE_FETCH_MODE_COLUMN);
		return $l_var !== false && CArrayTools::i_count($l_var) > 0  ? $l_var : null;
	}

	public function i_getDatabaseAllRowsAsAssocArray():?array
	{
		$l_var = $this->_fDatabaseQueryResult_pdos->fetchAll();
		return $l_var !== false ? $l_var : null;
	}

	public function i_getDatabaseFirstColumnDataValue():?string
	{
		$l_var = CVariableTools::i_toString($this->_fDatabaseQueryResult_pdos->fetchColumn());
		return $l_var !== false ? $l_var : null;
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getDatabaseLastErrorInfo():array
	{
		return $this->_fDatabaseQueryResult_pdos->errorInfo();
	}
}


?>