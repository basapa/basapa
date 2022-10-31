<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CAjaxesData
{
	private $_fAjaxData_clss_arr;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	/*public function i_getMainAjaxData():CMAjaxData
	{
		return $this->_getAjaxData(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBAjaxData():CJOBAjaxData
	{
		return $this->_getAjaxData(CSiteConst::i_SITE_ID_JOB);
	}
	
	public function i_getAjaxData(string $aSiteId_str):CCAjaxData
	{
		return $this->_getAjaxData($aSiteId_str);
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getAjaxData(string $aSiteId_str)
	{
		if (!isset($this->_fAjaxData_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMAjaxData();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBAjaxData();
				}break;

				default:
					new CException('_getAjaxData', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fAjaxData_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fAjaxData_clss_arr[$aSiteId_str];
	}
}


?>