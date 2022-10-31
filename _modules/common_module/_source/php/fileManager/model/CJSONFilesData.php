<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJSONFilesData
{
	private $_fJSONFileData_clss_arr;

	
	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	/*public function i_getMainJSONFileData():CMJSONFileData
	{
		return $this->_getJSONFileData(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBJSONFileData():CJOBJSONFileData
	{
		return $this->_getJSONFileData(CSiteConst::i_SITE_ID_JOB);
	}
	
	public function i_getJSONFileData(string $aSiteId_str):CCJSONFileData
	{
		return $this->_getJSONFileData($aSiteId_str);
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/
	
	private function _getJSONFileData(string $aSiteId_str)
	{
		if (!isset($this->_fJSONFileData_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMJSONFileData();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBJSONFileData();
				}break;

				default:
					new CException('_getJSONFileData', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fJSONFileData_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fJSONFileData_clss_arr[$aSiteId_str];
	}
}


?>