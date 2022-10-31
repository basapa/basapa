<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:97
*/
namespace basapa_ns;


final class CDatabasesData
{
	private $_fDatabaseData_clss_arr;


	/*public function __construct()
	{
		$this->_init();
	}*/
	
	/***************************************************
	 * INTERFACE
	 */

	/*public function i_getMainDatabaseData():CMDatabaseData
	{
		return $this->_getDatabaseData(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBDatabaseData():CJOBDatabaseData
	{
		return $this->_getDatabaseData(CSiteConst::i_SITE_ID_JOB);
	}

	public function i_getDatabaseData(string $aSiteId_str):CCDatabaseData
	{
		return $this->_getDatabaseData($aSiteId_str);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/
	
	private function _getDatabaseData(string $aSiteId_str)
	{
		if (!isset($this->_fDatabaseData_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMDatabaseData();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBDatabaseData();
				}break;

				default:
					new CException('_getDatabaseData', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fDatabaseData_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fDatabaseData_clss_arr[$aSiteId_str];
	}
}


?>