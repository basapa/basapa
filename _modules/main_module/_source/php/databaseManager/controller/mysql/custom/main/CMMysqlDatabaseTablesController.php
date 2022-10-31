<?php
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


final class CMMysqlDatabaseTablesController
{
	private $_fMysqlDatabaseUsersTableController_clss;
	private $_fMysqlDatabaseCitiesTableController_clss;
	private $_fMysqlDatabaseRegionsTableController_clss;
	private $_fMysqlDatabaseCountriesTableController_clss;


	public function __construct()
	{
		$this->_init();
	}

	/***************************************************
	 * INTERFACE
	 */

	public function i_getMysqlDatabaseUsersTableController()
	{
		return $this->_getMysqlDatabaseUsersTableController();
	}

	public function i_getMysqlDatabaseCitiesTableController()
	{
		return $this->_getMysqlDatabaseCitiesTableController();
	}

	public function i_getMysqlDatabaseRegionsTableController()
	{
		return $this->_getMysqlDatabaseRegionsTableController();
	}

	public function i_getMysqlDatabaseCountriesTableController()
	{
		return $this->_getMysqlDatabaseCountriesTableController();
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	private function _init()
	{
	}

	private function _getMysqlDatabaseUsersTableController()
	{
		return isset($this->_fMysqlDatabaseUsersTableController_clss) ?  $this->_fMysqlDatabaseUsersTableController_clss : ($this->_fMysqlDatabaseUsersTableController_clss = new CMMysqlDatabaseUsersTableController());
	}

	private function _getMysqlDatabaseCitiesTableController()
	{
		return isset($this->_fMysqlDatabaseCitiesTableController_clss) ?  $this->_fMysqlDatabaseCitiesTableController_clss : ($this->_fMysqlDatabaseCitiesTableController_clss = new CMMysqlDatabaseCitiesTableController());
	}

	private function _getMysqlDatabaseRegionsTableController()
	{
		return isset($this->_fMysqlDatabaseRegionsTableController_clss) ?  $this->_fMysqlDatabaseRegionsTableController_clss : ($this->_fMysqlDatabaseRegionsTableController_clss = new CMMysqlDatabaseRegionsTableController());
	}

	private function _getMysqlDatabaseCountriesTableController()
	{
		return isset($this->_fMysqlDatabaseCountriesTableController_clss) ?  $this->_fMysqlDatabaseCountriesTableController_clss : ($this->_fMysqlDatabaseCountriesTableController_clss = new CMMysqlDatabaseCountriesTableController());
	}
}


?>