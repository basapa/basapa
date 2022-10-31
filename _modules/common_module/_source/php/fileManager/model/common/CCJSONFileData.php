<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCJSONFileData
{
	public const i_JSON_FILE_TYPE_TRANSLATION			= 0;

	private $_fJSONFileData_clss_arr;
	
	
	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getTranslationJSONFileData():CCTranslationJSONRootNode
	{
		return $this->__getJSONFileData();
	}

	public function i_addJSONFileData(/*$aJSONFileType_int, */CCTranslationJSONRootNode $aJSONFileData_clss):void
	{
		$this->_fJSONFileData_clss_arr/*[$aJSONFileType_int]*/ = $aJSONFileData_clss;
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getJSONFileData(/*$aJSONFileType_int*/)
	{
		if (!isset($this->_fJSONFileData_clss_arr/*[$aJSONFileType_int]*/))
		{
			//new CException('getJSONFileData', 'Invalid JSON file type: ' .$aJSONFileType_int);
		}
		return $this->_fJSONFileData_clss_arr/*[$aJSONFileType_int]*/;
	}
}


?>