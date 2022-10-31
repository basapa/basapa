<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


final class CJOBTranslationJSONFileController extends CCTranslationJSONFileController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*//*protected function __parseRootNode(CSimpleJSONElementWrapper $aJSONDocument_clss):CCJSONNode
	{
		return CJOBTranslationJSONRootNodeParser::i_parseNode($aJSONDocument_clss, null);
	}*/

	/*override*//*protected function __getTranslationFullFileName():string
	{
		$lLangId_str = $this->__getMainData()->i_getGETParamLangId();

		$lFullDirectoryName_str = CStringTools::i_replace(CJOBFileConst::i_INTERNALS_TRANSLATIONS_DIRECTORY_NAME, $lLangId_str, CStringTools::i_REPLACING_PATTERN_LANG_ID);

		return CFileSystemTools::i_concatAsFullFileName($lFullDirectoryName_str, CJOBFileConst::i_TRANSLATIONS_JSON_FILE_NAME);
	}*/
}


?>