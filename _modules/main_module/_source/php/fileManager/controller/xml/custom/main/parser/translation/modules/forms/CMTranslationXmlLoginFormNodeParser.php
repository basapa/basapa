<?php
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


class CMTranslationXmlLoginFormNodeParser extends CMTranslationXmlFormNodeParser
{
	public const i_NODE_NAME							= 'login_form';

	private const _CHILD_NODE_ID_LOGIN_TEXTFIELD		= 'login_textfield';
	private const _CHILD_NODE_ID_PASSWORD_TEXTFIELD		= 'password_textfield';
	private const _CHILD_NODE_ID_REMEMBER_ME_CHECKBOX	= 'remember_me_checkbox';
	private const _CHILD_NODE_ID_REGISTRATION_TEXT		= 'registration_text';
	private const _CHILD_NODE_ID_RECOVERY_PASSWORD_TEXT	= 'recovery_password_text';


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlLoginFormNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			case CmTranslationXmlLoginFormNodeParser::_CHILD_NODE_ID_LOGIN_TEXTFIELD:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlTextfieldComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlLoginFormNode::i_CHILD_NODE_INDEX_LOGIN_TEXTFIELD);
			}break;

			case CmTranslationXmlLoginFormNodeParser::_CHILD_NODE_ID_PASSWORD_TEXTFIELD:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlTextfieldComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlLoginFormNode::i_CHILD_NODE_INDEX_PASSWORD_TEXTFIELD);
			}break;

			case CmTranslationXmlLoginFormNodeParser::_CHILD_NODE_ID_REMEMBER_ME_CHECKBOX:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlCheckboxComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlLoginFormNode::i_CHILD_NODE_INDEX_REMEMBER_ME_CHECKBOX);
			}break;

			case CmTranslationXmlLoginFormNodeParser::_CHILD_NODE_ID_REGISTRATION_TEXT:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlTextComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlLoginFormNode::i_CHILD_NODE_INDEX_REGISTRATION_TEXT);
			}break;

			case CmTranslationXmlLoginFormNodeParser::_CHILD_NODE_ID_RECOVERY_PASSWORD_TEXT:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlTextComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlLoginFormNode::i_CHILD_NODE_INDEX_RECOVERY_PASSWORD_TEXT);
			}break;

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}


?>