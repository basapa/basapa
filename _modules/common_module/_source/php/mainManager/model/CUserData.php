<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CUserData
{
	private $_fUserData_clss_arr;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */
	
	/*public function i_getMainUserData():CMUserData
	{
		return $this->_getUserData(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBUserData():CJOBUserData
	{
		return $this->_getUserData(CSiteConst::i_SITE_ID_JOB);
	}
	
	public function i_getUserData(string $aSiteId_str):CCUserData
	{
		return $this->_getUserData($aSiteId_str);
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/
	
	private function _getUserData(string $aSiteId_str)
	{
		if (!isset($this->_fUserData_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMUserData();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBUserData();
				}break;

				default:
					new CException('_getUserData', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fUserData_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fUserData_clss_arr[$aSiteId_str];
	}
}


?>