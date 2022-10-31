<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCMetaView
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
		$lPageId_str = $this->__getMainData()->i_getGETParamPageId();

		$lPageTranslationData_clss = $this->__getTranslationXMLPageNode($lPageId_str. '_page');

		$lMetaDescription_str = $lPageTranslationData_clss->i_getMetaDescription();
		$lMetaKeywords_str = $lPageTranslationData_clss->i_getMetaKeywords();

		echo
		'<meta name="description" content="' .$lMetaDescription_str. '">',
		'<meta name="keywords" content="' .$lMetaKeywords_str. '">';
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