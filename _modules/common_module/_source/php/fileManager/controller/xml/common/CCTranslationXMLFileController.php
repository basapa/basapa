<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


/*virtual*/class CCTranslationXMLFileController extends CCXMLFileController
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_update():void
	{
		$lXMLDocument_clss = new CSimpleXMLElementWrapper();
		$lXMLDocument_clss->i_loadXMLFromFile($this->__getTranslationFullFileName());

		$lTranslationXMLRootNode_clss = $this->__parseRootNode($lXMLDocument_clss);

		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		$this->__getFilesData()->i_getXMLFilesData()->i_getXMLFileData($lSiteId_str)->i_addXMLFileData($lTranslationXMLRootNode_clss);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/**@return CCTranslationXMLRootNode*/
	/*virtual*/protected function __parseRootNode(CSimpleXMLElementWrapper $aXMLDocument_clss):CCXMLNode
	{
		return CCTranslationXMLRootNodeParser::i_parseNode($aXMLDocument_clss, null);
	}

	/*virtual*/protected function __getTranslationFullFileName():string
	{
		return '';
	}
}


?>