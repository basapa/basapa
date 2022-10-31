<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CJSONFilesController
{
	//private $_fDatabaseXMLFileController_clss;
	//private $_fSitemapXMLFileController_clss;
	//private $_fPageDescriptorXMLFileController_clss;
	private $_fJSONFilesController_clss_arr;

	//private $_fPatternJSONFilesController_clss;

	
	/*public function __construct()
	{
		$this->_init();
	}*/
	
	/***************************************************
	 * INTERFACE
	 */

	/*public function getDatabaseJSONFileController()
	{
		return $this->_getDatabaseJSONFileController();
	}
	
	public function getSitemapJSONFileController()
	{
		return $this->_getSitemapJSONFileController();
	}

	public function getPageDescriptorJSONFileController()
	{
		return $this->_getPageDescriptorJSONFileController();
	}*/

	public function i_update():void
	{
		$lSiteId_str = $this->_getMainData()->i_getGETParamSiteId();

		$this->i_getJSONFilesController($lSiteId_str)->i_getTranslationJSONFileController()->i_update();
	}

	/*public function i_getMainJSONFilesController():CMJSONFilesController
	{
		return $this->_getJSONFilesController(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBJSONFilesController():CJOBJSONFilesController
	{
		return $this->_getJSONFilesController(CSiteConst::i_SITE_ID_JOB);
	}

	public function i_getJSONFilesController(string $aSiteId_int):CCJSONFilesController
	{
		return $this->_getJSONFilesController($aSiteId_int);
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
	private function _getDatabaseJSONFileController()
	{
		return isset($this->_fDatabaseJSONFileController_clss) ? $this->_fDatabaseJSONFileController_clss : ($this->_fDatabaseJSONFileController_clss = new CDatabaseJSONFileController());
	}
	
	private function _getSitemapJSONFileController()
	{
		return isset($this->_fSitemapJSONFileController_clss) ? $this->_fSitemapJSONFileController_clss : ($this->_fSitemapJSONFileController_clss = new CSitemapJSONFileController());
	}

	private function _getPageDescriptorJSONFileController()
	{
		return isset($this->_fPageDescriptorJSONFileController_clss) ? $this->_fPageDescriptorJSONFileController_clss : ($this->_fPageDescriptorJSONFileController_clss = new CPageDescriptorJSONFileController());
	}*/
	
	private function _getJSONFilesController(string $aSiteId_str)
	{
		if (!isset($this->_fJSONFilesController_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMJSONFilesController();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBJSONFilesController();
				}break;

				default:
					new CException('_getJSONFilesController', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fJSONFilesController_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fJSONFilesController_clss_arr[$aSiteId_str];
	}
}


?>