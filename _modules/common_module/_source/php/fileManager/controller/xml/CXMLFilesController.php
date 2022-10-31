<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CXMLFilesController
{
	//private $_fDatabaseXMLFileController_clss;
	//private $_fSitemapXMLFileController_clss;
	//private $_fPageDescriptorXMLFileController_clss;
	private $_fXMLFilesController_clss_arr;

	//private $_fPatternXMLFilesController_clss;

	
	/*public function __construct()
	{
		$this->_init();
	}*/
	
	/***************************************************
	 * INTERFACE
	 */

	/*public function getDatabaseXMLFileController()
	{
		return $this->_getDatabaseXMLFileController();
	}
	
	public function getSitemapXMLFileController()
	{
		return $this->_getSitemapXMLFileController();
	}

	public function getPageDescriptorXMLFileController()
	{
		return $this->_getPageDescriptorXMLFileController();
	}*/

	public function i_update():void
	{
		$lSiteId_str = $this->_getMainData()->i_getGETParamSiteId();

		$this->i_getXMLFilesController($lSiteId_str)->i_getTranslationXMLFileController()->i_update();
	}

	/*public function i_getMainXMLFilesController():CMXMLFilesController
	{
		return $this->_getXMLFilesController(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBXMLFilesController():CJOBXMLFilesController
	{
		return $this->_getXMLFilesController(CSiteConst::i_SITE_ID_JOB);
	}

	public function i_getXMLFilesController(string $aSiteId_int):CCXMLFilesController
	{
		return $this->_getXMLFilesController($aSiteId_int);
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
/*
	private function _getDatabaseXMLFileController()
	{
		return isset($this->_fDatabaseXMLFileController_clss) ? $this->_fDatabaseXMLFileController_clss : ($this->_fDatabaseXMLFileController_clss = new CDatabaseXMLFileController());
	}
	
	private function _getSitemapXMLFileController()
	{
		return isset($this->_fSitemapXMLFileController_clss) ? $this->_fSitemapXMLFileController_clss : ($this->_fSitemapXMLFileController_clss = new CSitemapXMLFileController());
	}

	private function _getPageDescriptorXMLFileController()
	{
		return isset($this->_fPageDescriptorXMLFileController_clss) ? $this->_fPageDescriptorXMLFileController_clss : ($this->_fPageDescriptorXMLFileController_clss = new CPageDescriptorXMLFileController());
	}*/
	
	private function _getXMLFilesController(string $aSiteId_str)
	{
		if (!isset($this->_fXMLFilesController_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMXMLFilesController();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBXMLFilesController();
				}break;

				default:
					new CException('_getXMLFilesController', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fXMLFilesController_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fXMLFilesController_clss_arr[$aSiteId_str];
	}
}


?>