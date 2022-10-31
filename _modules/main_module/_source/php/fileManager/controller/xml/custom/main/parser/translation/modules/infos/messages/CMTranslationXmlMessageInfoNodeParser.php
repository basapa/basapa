<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMTranslationXmlMessageInfoNodeParser extends CCTranslationXmlMessageInfoNodeParser
{
	public const i_CHILD_NODE_ID_MESSAGE_NAME			= 'message_name';


	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlMessageInfoNode($aNameNode_str, $aOptParentNode_clss);
	}
}


?>