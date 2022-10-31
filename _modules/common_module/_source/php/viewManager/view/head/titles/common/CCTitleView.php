<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCTitleView
{
	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_draw():void
	{
		$lPageId_str = $this->__getMainData()->i_getGETParam(CCRequestParamConst::i_GET_PARAM_ID_PAGE);

		$lPageTranslationData_clss = $this->__getTranslationXMLPageNode($lPageId_str. '_page');

		$lTitle_str = $lPageTranslationData_clss->i_getTitle();

		echo
		'<title>' .$lTitle_str. '</title>';
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}

	protected function __getXMLFileData()
	{
		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		return CFileManager::i_getInstance()->i_getFilesData()->i_getXMLFilesData()->i_getXMLFileData($lSiteId_str);
	}

	//TRANSLATIONS...
	/**@return CCTranslationXMLPageNode*/
	protected function __getTranslationXMLPageNode(string $aPageNodeName_str):CCXMLNode
	{
		return CCTranslationXMLPageNodeParser::i_parseNode($this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getTranslationXMLPagesNativeNode()->i_getXMLChildNodeByNodeName($aPageNodeName_str));
	}
	//...TRANSLATIONS
}


?>