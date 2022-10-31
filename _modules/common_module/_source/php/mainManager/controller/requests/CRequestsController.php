<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CRequestsController
{
	private $_fRequestsController_clss_arr;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_update():void
	{
		if (!$this->_getMainData()->i_isPOSTParamRequestIdDefined())
		{
			return;
		}

		$lSiteId_str = $this->_getMainData()->i_getGETParamSiteId();

		$this->i_getRequestsController($lSiteId_str)->i_update();
	}

	/*public function i_getMainRequestsController():CMRequestsController
	{
		return $this->_getRequestsController(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBRequestsController():CJOBRequestsController
	{
		return $this->_getRequestsController(CSiteConst::i_SITE_ID_JOB);
	}

	public function i_getRequestsController(string $aSiteId_str):CCRequestsController
	{
		return $this->_getRequestsController($aSiteId_str);
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
	
	private function _getRequestsController(string $aSiteId_str)
	{
		if (!isset($this->_fRequestsController_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMRequestsController();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBRequestsController();
				}break;

				default:
					new CException('_getRequestsController', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fRequestsController_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fRequestsController_clss_arr[$aSiteId_str];
	}
}


?>