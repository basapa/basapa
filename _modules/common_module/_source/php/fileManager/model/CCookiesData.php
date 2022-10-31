<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCookiesData
{
	private $_fCookieData_clss_arr;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	/*public function i_getMainCookieData():CMCookieData
	{
		return $this->_getCookieData(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBCookieData():CJOBCookieData
	{
		return $this->_getCookieData(CSiteConst::i_SITE_ID_JOB);
	}

	public function i_getCookieData(string $aSiteId_str):CCCookieData
	{
		return $this->_getCookieData($aSiteId_str);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/
	
	private function _getCookieData(string $aSiteId_str)
	{
		if (!isset($this->_fCookieData_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMCookieData();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBCookieData();
				}break;

				default:
					new CException('_getCookieData', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fCookieData_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fCookieData_clss_arr[$aSiteId_str];
	}
}


?>