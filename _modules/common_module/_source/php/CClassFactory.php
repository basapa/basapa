<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:-3
*/
namespace basapa_ns;


final class CClassFactory
{
	static private $_fInstance_clss;

	private $_fClassFactory_clss_arr;


	private function __construct()
	{
		//$this->_init();
	}

	/***************************************************
	 * INTERFACE
	 */

	static public function i_getInstance()
	{
		if (!isset(self::$_fInstance_clss))
		{
			self::$_fInstance_clss = new self();
		}
		return self::$_fInstance_clss;
	}

	/*public function i_getMainClassFactory():CMClassFactory
	{
		return $this->_getClassFactory(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBClassFactory():CJOBClassFactory
	{
		return $this->_getClassFactory(CSiteConst::i_SITE_ID_JOB);
	}
	
	public function i_getClassFactory(string $aOptSiteId_str = ''):CCClassFactory
	{
		$lSiteId_str = !empty($aOptSiteId_str) ? $aOptSiteId_str : CMainManager::i_getInstance()->i_getMainData()->i_getGETParamSiteId();
		
		return $this->_getClassFactory($lSiteId_str);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/
	
	private function _getClassFactory(string $aSiteId_str)
	{
		if (!isset($this->_fClassFactory_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMClassFactory();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBClassFactory();
				}break;

				default:
					new CException('_getClassFactory', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fClassFactory_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fClassFactory_clss_arr[$aSiteId_str];
	}
}


?>