<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:0
*/
namespace basapa_ns;


final class CDatabaseManager
{
	static private $_fInstance_clss;

	private $_fMySQLDatabaseTablesController_clss;
	private $_fDatabasesData_clss;


	private function __construct()
	{
		//$this->_init();
	}

	/***************************************************
	 * INTERFACE
	 */

	static public function i_getInstance()
	{
		if (!isset(self::$_fInstance_clss))
		{
			self::$_fInstance_clss = new self();
		}
		return self::$_fInstance_clss;
	}

	public function i_getDatabaseTablesController()
	{
		return $this->_getMySQLDatabaseTablesController();
	}

	public function i_getDatabasesData()
	{
		return $this->_getDatabasesData();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getMySQLDatabaseTablesController()
	{
		return isset($this->_fMySQLDatabaseTablesController_clss) ? $this->_fMySQLDatabaseTablesController_clss : ($this->_fMySQLDatabaseTablesController_clss = new CMySQLDatabaseTablesController());
	}

	private function _getDatabasesData()
	{
		return isset($this->_fDatabasesData_clss) ? $this->_fDatabasesData_clss : ($this->_fDatabasesData_clss = new CDatabasesData());
	}
}


?>