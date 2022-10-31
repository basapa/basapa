<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CSchedulesData
{
	private $_fScheduleData_clss_arr;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	/*public function i_getMainScheduleData():CMScheduleData
	{
		return $this->_getScheduleData(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBScheduleData():CJOBScheduleData
	{
		return $this->_getScheduleData(CSiteConst::i_SITE_ID_JOB);
	}
	
	public function i_getScheduleData(string $aSiteId_str):CCScheduleData
	{
		return $this->_getScheduleData($aSiteId_str);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/
	
	private function _getScheduleData(string $aSiteId_str)
	{
		if (!isset($this->_fScheduleData_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMScheduleData();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBScheduleData();
				}break;

				default:
					new CException('_getScheduleData', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fScheduleData_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fScheduleData_clss_arr[$aSiteId_str];
	}
}


?>