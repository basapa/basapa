<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CXMLFilesData
{
	private $_fXMLFileData_clss_arr;

	
	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	/*public function i_getMainXMLFileData():CMXMLFileData
	{
		return $this->_getXMLFileData(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBXMLFileData():CJOBXMLFileData
	{
		return $this->_getXMLFileData(CSiteConst::i_SITE_ID_JOB);
	}
	
	public function i_getXMLFileData(string $aSiteId_str):CCXMLFileData
	{
		return $this->_getXMLFileData($aSiteId_str);
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/
	
	private function _getXMLFileData(string $aSiteId_str)
	{
		if (!isset($this->_fXMLFileData_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMXMLFileData();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBXMLFileData();
				}break;

				default:
					new CException('_getXMLFileData', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fXMLFileData_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fXMLFileData_clss_arr[$aSiteId_str];
	}
}


?>