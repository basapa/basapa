<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:1
*/
namespace basapa_ns;


final class CViewsController
{
	private $_fViewsController_clss_arr;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_update():void
	{
		$lSiteId_str = $this->_getMainData()->i_getGETParamSiteId();
		
		$this->i_getViewsController($lSiteId_str)->i_update();
	}

	/*public function i_getMainViewsController():CMViewsController
	{
		return $this->_getViewsController(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBViewsController():CJOBViewsController
	{
		return $this->_getViewsController(CSiteConst::i_SITE_ID_JOB);
	}

	public function i_getViewsController(string $aSiteId_str):CCViewsController
	{
		return $this->_getViewsController($aSiteId_str);
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
	
	private function _getViewsController(string $aSiteId_str)
	{
		if (!isset($this->_fViewsController_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMViewsController();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBViewsController();
				}break;

				default:
					new CException('_getViewsController', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fViewsController_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fViewsController_clss_arr[$aSiteId_str];
	}
}


?>