<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CViewsData
{
	private $_fViewData_clss_arr;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	/*public function i_getMainViewData():CMViewData
	{
		return $this->_getViewData(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBViewData():CJOBViewData
	{
		return $this->_getViewData(CSiteConst::i_SITE_ID_JOB);
	}
	
	public function i_getViewData(string $aSiteId_str):CCViewData
	{
		return $this->_getViewData($aSiteId_str);
	}
	
	/*
	 * INTERFACE
	 ***************************************************/
	 
	/*private function _init():void
	{
	}*/
	
	private function _getViewData(string $aSiteId_str)
	{
		if (!isset($this->_fViewData_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMViewData();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBViewData();
				}break;

				default:
					new CException('_getViewData', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fViewData_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fViewData_clss_arr[$aSiteId_str];
	}
}


?>