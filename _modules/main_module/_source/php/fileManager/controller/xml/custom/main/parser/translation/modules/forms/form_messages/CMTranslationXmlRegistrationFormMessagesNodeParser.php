<?php
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


class CMTranslationXmlRegistrationFormMessagesNodeParser extends CMTranslationXmlFormMessagesNodeParser
{
	private const _CHILD_NODE_NAME_USER_ALREADY_EXIST_MESSAGE	= 'user_already_exist_message';
	private const _CHILD_NODE_NAME_LOGIN_DATA_EMPTY_MESSAGE		= 'login_data_empty_message';


	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlRegistrationFormMessagesNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			case CMTranslationXmlRegistrationFormMessagesNodeParser::_CHILD_NODE_NAME_USER_ALREADY_EXIST_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_sxmle, $aChildNodeName_str, $aParentNode_clss), CMTranslationXmlRegistrationFormMessagesNode::i_CHILD_NODE_INDEX_USER_ALREADY_EXIST_MESSAGE);
			}break;

			case CMTranslationXmlRegistrationFormMessagesNodeParser::_CHILD_NODE_NAME_LOGIN_DATA_EMPTY_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_sxmle, $aChildNodeName_str, $aParentNode_clss), CMTranslationXmlRegistrationFormMessagesNode::i_CHILD_NODE_INDEX_LOGIN_DATA_EMPTY_MESSAGE);
			}break;

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}


?>