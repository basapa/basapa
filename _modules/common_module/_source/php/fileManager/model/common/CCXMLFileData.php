<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCXMLFileData
{
	public const i_XML_FILE_TYPE_TRANSLATION			= 0;

	private $_fXMLFileData_clss_arr;
	
	
	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getTranslationXMLFileData():CCTranslationXMLRootNode
	{
		return $this->__getXMLFileData();
	}

	public function i_addXMLFileData(/*$aXMLFileType_int, */CCTranslationXMLRootNode $aXMLFileData_clss):void
	{
		$this->_fXMLFileData_clss_arr/*[$aXMLFileType_int]*/ = $aXMLFileData_clss;
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getXMLFileData(/*$aXMLFileType_int*/)
	{
		if (!isset($this->_fXMLFileData_clss_arr/*[$aXMLFileType_int]*/))
		{
			//new CException('getXMLFileData', 'Invalid XML file type: ' .$aXMLFileType_int);
		}
		return $this->_fXMLFileData_clss_arr/*[$aXMLFileType_int]*/;
	}
}


?>