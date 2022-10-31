<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCDatabaseTableController
{
	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}

	protected function __getUserData()
	{
		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();
		return $this->__getMainData()->i_getUserData()->i_getUserData($lSiteId_str);
	}

	protected function __getDatabaseData()
	{
		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();
		return CDatabaseManager::i_getInstance()->i_getDatabasesData()->i_getDatabaseData($lSiteId_str);
	}

	protected function __updateDatabaseInfo(int $aTimeInSec_int):void
	{
		$lSystem_clss = CSystem::i_getInstance();
		$lSystem_clss->i_incAppDatabaseRequestsCount();
		$lSystem_clss->i_addAppDatabaseRequestExecutionTimeInMSec($aTimeInSec_int);
	}
}


?>