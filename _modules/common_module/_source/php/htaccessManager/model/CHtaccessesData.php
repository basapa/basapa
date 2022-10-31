<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CHtaccessesData
{
	private $_fHtaccessData_clss_arr;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */
	
	/*public function i_getMainHtaccessData():CMHtaccessData
	{
		return $this->_getHtaccessData(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBHtaccessData():CJOBHtaccessData
	{
		return $this->_getHtaccessData(CSiteConst::i_SITE_ID_JOB);
	}
	
	public function i_getHtaccessData(string $aSiteId_str):CCHtaccessData
	{
		return $this->_getHtaccessData($aSiteId_str);
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getHtaccessData(string $aSiteId_str)
	{
		if (!isset($this->_fHtaccessData_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMHtaccessData();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBHtaccessData();
				}break;

				default:
					new CException('_getHtaccessData', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fHtaccessData_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fHtaccessData_clss_arr[$aSiteId_str];
	}
}


?>