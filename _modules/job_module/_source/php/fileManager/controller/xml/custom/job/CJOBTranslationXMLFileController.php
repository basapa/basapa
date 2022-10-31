<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


final class CJOBTranslationXMLFileController extends CCTranslationXMLFileController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __parseRootNode(CSimpleXMLElementWrapper $aXMLDocument_clss):CCXMLNode
	{
		return CJOBTranslationXMLRootNodeParser::i_parseNode($aXMLDocument_clss, null);
	}

	/*override*/protected function __getTranslationFullFileName():string
	{
		$lLangId_str = $this->__getMainData()->i_getGETParamLangId();

		$lFullDirectoryName_str = CStringTools::i_replace(CJOBFileConst::i_INTERNALS_TRANSLATIONS_DIRECTORY_NAME, $lLangId_str, CStringTools::i_REPLACING_PATTERN_LANG_ID);

		return CFileSystemTools::i_concatAsFullFileName($lFullDirectoryName_str, CJOBFileConst::i_TRANSLATIONS_XML_FILE_NAME);
	}
}


?>