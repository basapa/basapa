<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMTranslationXmlFileController extends CCXmlFileController
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_parseXmlFile($aFileName_str, $aNecessaryNodesFullNames_str_arr)
	{
		$lXmlDocument_sxmle = $this->__loadFile($aFileName_str);

		return CMTranslationXmlRootNodeParser::i_parseNode($lXmlDocument_sxmle, null, $aNecessaryNodesFullNames_str_arr);
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>