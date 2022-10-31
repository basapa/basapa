<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


/*virtual*/class CCTranslationJSONFileController extends CCJSONFileController
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_update():void
	{
		$lJSONDocument_str = CFileTools::i_getFileAllContentAsString($this->__getTranslationFullFileName());

		$lTranslationJSONRootNode_clss = $this->__parseRootNode($lJSONDocument_str);

		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		$this->__getFilesData()->i_getJSONFilesData()->i_getJSONFileData($lSiteId_str)->i_addJSONFileData($lTranslationJSONRootNode_clss);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/**@return CCTranslationJSONRootNode*/
	/*virtual*/protected function __parseRootNode(string $aJSONDocument_str):CCJSONNode
	{
		return CCTranslationJSONRootNodeParser::i_parseNode($aJSONDocument_str);
	}

	/*virtual*/protected function __getTranslationFullFileName():string
	{
		return '';
	}
}


?>