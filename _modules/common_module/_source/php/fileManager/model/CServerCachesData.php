<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CServerCachesData
{
	private $_fServerCacheData_clss_arr;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	/*public function i_getMainServerCacheData():CMServerCacheData
	{
		return $this->_getServerCacheData(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBServerCacheData():CJOBServerCacheData
	{
		return $this->_getServerCacheData(CSiteConst::i_SITE_ID_JOB);
	}

	public function i_getServerCacheData(string $aSiteId_str):CCServerCacheData
	{
		return $this->_getServerCacheData($aSiteId_str);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/
	
	private function _getServerCacheData(string $aSiteId_str)
	{
		if (!isset($this->_fServerCacheData_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMServerCacheData();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBServerCacheData();
				}break;

				default:
					new CException('_getServerCacheData', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fServerCacheData_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fServerCacheData_clss_arr[$aSiteId_str];
	}
}


?>