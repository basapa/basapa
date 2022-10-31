<?php
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


class CMTranslationXmlAuthorizationFormNodeParser extends CMTranslationXmlFormNodeParser
{
	public const i_NODE_NAME							= 'authorization_form';

	private const _CHILD_NODE_ID_LOGIN_TEXTFIELD		= 'login_textfield';
	private const _CHILD_NODE_ID_PASSWORD_TEXTFIELD		= 'password_textfield';
	private const _CHILD_NODE_ID_REMEMBER_ME_CHECKBOX	= 'remember_me_checkbox';


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlAuthorizationFormNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			case CMTranslationXmlLoginFormNodeParser::_CHILD_NODE_ID_LOGIN_TEXTFIELD:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlTextfieldComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlAuthorizationFormNode::i_CHILD_NODE_INDEX_LOGIN_TEXTFIELD);
			}break;

			case CMTranslationXmlLoginFormNodeParser::_CHILD_NODE_ID_PASSWORD_TEXTFIELD:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlTextfieldComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlAuthorizationFormNode::i_CHILD_NODE_INDEX_PASSWORD_TEXTFIELD);
			}break;

			case CMTranslationXmlLoginFormNodeParser::_CHILD_NODE_ID_REMEMBER_ME_CHECKBOX:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlCheckboxComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlAuthorizationFormNode::i_CHILD_NODE_INDEX_REMEMBER_ME_CHECKBOX);
			}break;

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}


?>