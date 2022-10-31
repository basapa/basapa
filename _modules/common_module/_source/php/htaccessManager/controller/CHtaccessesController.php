<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:1
*/
namespace basapa_ns;


final class CHtaccessesController
{
	private $_fHtaccessesController_clss_arr;
	
	
	/*public function __construct()
	{
		$this->_init();
	}*/
	
	/***************************************************
	 * INTERFACE
	 */

	/*public function i_getMainHtaccessesController():CMHtaccessesController
	{
		return $this->_getHtaccessesController(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBHtaccessesController():CJOBHtaccessesController
	{
		return $this->_getHtaccessesController(CSiteConst::i_SITE_ID_JOB);
	}
	
	public function i_getHtaccessesController(string $aSiteId_str):CCHtaccessesController
	{
		return $this->_getHtaccessesController($aSiteId_str);
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/
	
	private function _getHtaccessesController(string $aSiteId_str)
	{
		if (!isset($this->_fHtaccessesController_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMHtaccessesController();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBHtaccessesController();
				}break;

				default:
					new CException('_getHtaccessesController', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fHtaccessesController_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fHtaccessesController_clss_arr[$aSiteId_str];
	}
}


?>