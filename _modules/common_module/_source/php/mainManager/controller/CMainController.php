<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:1
*/
namespace basapa_ns;


final class CMainController
{
	private $_fResponsesController_clss;
	private $_fRequestsController_clss;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_update():void
	{
		$lDatabaseTablesController_clss = CDatabaseManager::i_getInstance()->i_getDatabaseTablesController();
		$lDatabaseTablesController_clss->i_openConnection();

		$this->_getRequestsController()->i_update();
		$this->_getResponsesController()->i_update();

		$lDatabaseTablesController_clss->i_closeConnection();
	}

	public function i_getRequestsController()
	{
		return $this->_getRequestsController();
	}

	public function i_getResponsesController()
	{
		return $this->_getResponsesController();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getResponsesController()
	{
		return isset($this->_fResponsesController_clss) ? $this->_fResponsesController_clss : ($this->_fResponsesController_clss = new CResponsesController());
	}
	
	private function _getRequestsController()
	{
		return isset($this->_fRequestsController_clss) ? $this->_fRequestsController_clss : ($this->_fRequestsController_clss = new CRequestsController());
	}
}


?>