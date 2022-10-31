<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CSessionsData
{
	private $_fSessionData_clss_arr;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	/*public function i_getMainSessionData():CMSessionData
	{
		return $this->_getSessionData(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBSessionData():CJOBSessionData
	{
		return $this->_getSessionData(CSiteConst::i_SITE_ID_JOB);
	}

	public function i_getSessionData(string $aSiteId_str):CCSessionData
	{
		return $this->_getSessionData($aSiteId_str);
	}

	/*
	 * INTERFACE
	 ***************************************************/
	
	/*private function _init():void
	{
	}*/
	
	private function _getSessionData(string $aSiteId_str)
	{
		if (!isset($this->_fSessionData_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMSessionData();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBSessionData();
				}break;

				default:
					new CException('_getSessionData', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fSessionData_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fSessionData_clss_arr[$aSiteId_str];
	}
}


?>