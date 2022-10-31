<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:1
*/
namespace basapa_ns;


final class CMySQLDatabaseTablesController
{
	private $_fIsConnectionOpened_bl = false;

	private $_fMySQLDatabaseTablesController_clss_arr;

	
	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_openConnection():void
	{
		$this->_openConnection();
	}

	public function i_closeConnection():void
	{
		$this->_closeConnection();
	}

	/*public function i_getMainMySQLDatabaseTablesController():CMMySQLDatabaseTablesController
	{
		return $this->_getMySQLDatabaseTablesController(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBMySQLDatabaseTablesController():CJOBMySQLDatabaseTablesController
	{
		return $this->_getMySQLDatabaseTablesController(CSiteConst::i_SITE_ID_JOB);
	}

	public function i_getMySQLDatabaseTablesController(string $aSiteId_str):CCMySQLDatabaseTablesController
	{
		return $this->_getMySQLDatabaseTablesController($aSiteId_str);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _openConnection():void
	{
		if ($this->_fIsConnectionOpened_bl)
		{
			new CException('_openConnection', 'Database connection already opened!');
		}

		$this->_fIsConnectionOpened_bl = true;

		if (DATABASE_TYPE !== DATABASE_TYPE_MYSQL)
		{
			new CException('_openConnection', 'Database type is invalid: ' .DATABASE_TYPE);
		}

		CPDOWrapper::i_getInstance()->i_openDatabaseConnection(CDatabasesConst::$i_DATABASES_DATA[SERVER_TYPE]);
	}

	private function _closeConnection():void
	{
		if (!$this->_fIsConnectionOpened_bl)
		{
			new CException('_closeConnection', 'Database connection already closed!');
		}

		$this->_fIsConnectionOpened_bl = false;

		CPDOWrapper::i_getInstance()->i_closeDatabaseConnection();
	}
	
	private function _getMySQLDatabaseTablesController(string $aSiteId_str)
	{
		if (!isset($this->_fMySQLDatabaseTablesController_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMMySQLDatabaseTablesController();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBMySQLDatabaseTablesController();
				}break;

				default:
					new CException('_getMySQLDatabaseTablesController', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}

			$this->_fMySQLDatabaseTablesController_clss_arr[$aSiteId_str] = $l_clss;
		}

		return $this->_fMySQLDatabaseTablesController_clss_arr[$aSiteId_str];
	}
}


?>