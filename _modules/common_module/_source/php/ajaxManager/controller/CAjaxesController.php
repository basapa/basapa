<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:1
*/
namespace basapa_ns;


final class CAjaxesController
{
	private $_fAjaxesController_clss_arr;
	
	
	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_update():void
	{
		$lSiteId_str = $this->_getMainData()->i_getGETParam(CCRequestParamConst::i_GET_PARAM_ID_SITE);

		$this->i_getAjaxesController($lSiteId_str)->i_update();
	}

	/*public function i_getMainAjaxesController():CMAjaxesController
	{
		return $this->_getAjaxesController(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBAjaxesController():CJOBAjaxesController
	{
		return $this->_getAjaxesController(CSiteConst::i_SITE_ID_JOB);
	}
	
	public function i_getAjaxesController(string $aSiteId_str):CCAjaxesController
	{
		return $this->_getAjaxesController($aSiteId_str);
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

	/*private function _getAjaxesData()
	{
		return CAjaxManager::i_getInstance()->i_getAjaxesData();
	}*/

	private function _getAjaxesController(string $aSiteId_str)
	{
		if (!isset($this->_fAjaxesController_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMAjaxesController();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBAjaxesController();
				}break;

				default:
					new CException('_getAjaxesController', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fAjaxesController_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fAjaxesController_clss_arr[$aSiteId_str];
	}
	
	/*private function _getFileUploadingAjaxController()
	{
		return isset($this->_fFileUploadingAjaxController_clss) ? $this->_fFileUploadingAjaxController_clss : ($this->_fFileUploadingAjaxController_clss = new CFileUploadingAjaxController());
	}*/

	/*private function _getCityAjaxController()
	{
		return isset($this->_fCityAjaxController_clss) ? $this->_fCityAjaxController_clss : ($this->_fCityAjaxController_clss = new CCityAjaxController());
	}*/

	/*private function _validateReferer()
	{
		$lHttpReferer_str = $this->_getHostData()->getHttpReferer();

		return $lHttpReferer_str
				&& preg_match('/^' .addcslashes(SITE_FULL_NAME, './'). '/', $lHttpReferer_str);
	}

	private function _validateGetParams()
	{
		$lAjaxData_clss = $this->_getAjaxData();

		return $lAjaxData_clss->getRequest()
				&& $lAjaxData_clss->getAction();
	}

	private function _updateGetParam()
	{
		$lMainData_clss = $this->_getMainData();
		$lAjaxData_clss = $this->_getAjaxData();

		$lAjaxData_clss->setRequest($lMainData_clss->getParam(CParamConst::REQUEST_AJAX));
		$lAjaxData_clss->setAction($lMainData_clss->getParam(CParamConst::ACTION_ID));
	}*/
}


?>