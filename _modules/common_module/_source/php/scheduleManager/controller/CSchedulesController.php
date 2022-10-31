<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CSchedulesController
{
	private $_fSchedulesController_clss_arr;


	/*/public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_update():void
	{
		if (!CMainManager::i_getInstance()->i_getMainData()->i_getHostData()->i_isServerRemoteAddrAsLocahost())
		{
			new CException('i_update', 'Access private logic from outside call!', CException::i_EXCEPTION_TYPE_CRITICAL_ERROR);
		}

		$lSiteId_str = $this->_getMainData()->i_getGETParam(CCRequestParamConst::i_GET_PARAM_ID_SITE);

		$this->i_getSchedulesController($lSiteId_str)->i_update();
	}

	/*public function i_getMainSchedulesController():CMSchedulesController
	{
		return $this->_getSchedulesController(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBSchedulesController():CJOBSchedulesController
	{
		return $this->_getSchedulesController(CSiteConst::i_SITE_ID_JOB);
	}

	public function i_getSchedulesController(string $aSiteId_str):CCSchedulesController
	{
		return $this->_getSchedulesController($aSiteId_str);
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}

	private function _getSchedulesData()
	{
		return CScheduleManager::i_getInstance()->i_getSchedulesData();
	}

	private function _getSchedulesController(string $aSiteId_str)
	{
		if (!isset($this->_fSchedulesController_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMSchedulesController();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBSchedulesController();
				}break;

				default:
					new CException('_getSchedulesController', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}

			$this->_fSchedulesController_clss_arr[$aSiteId_str] = $l_clss;
		}

		return $this->_fSchedulesController_clss_arr[$aSiteId_str];
	}
}


?>