<?php
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


class CMTranslationXmlRegistrationFormNodeParser extends CMTranslationXmlFormNodeParser
{
	public const i_NODE_NAME							= 'registration_form';

	private const _CHILD_NODE_ID_LOGIN_TEXTFIELD			= 'login_textfield';
	private const _CHILD_NODE_ID_PASSWORD_TEXTFIELD			= 'password_textfield';
	private const _CHILD_NODE_ID_REPEAT_PASSWORD_TEXTFIELD	= 'repeat_password_textfield';
	private const _CHILD_NODE_ID_EMAIL_TEXTFIELD			= 'email_textfield';


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlRegistrationFormNode($aNameNode_str, $aOptParentNode_clss);
	}*/

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			/*case CMTranslationXmlRegistrationFormNodeParser::__CHILD_NODE_ID_FORM_MESSAGES:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlRegistrationFormMessagesNodeParser::parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlRegistrationFormNode::i_CHILD_NODE_INDEX_FORM_MESSAGES);
			}break;*/

			case CMTranslationXmlRegistrationFormNodeParser::_CHILD_NODE_ID_LOGIN_TEXTFIELD:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlTextfieldComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlRegistrationFormNode::i_CHILD_NODE_INDEX_LOGIN_TEXTFIELD);
			}break;

			case CMTranslationXmlRegistrationFormNodeParser::_CHILD_NODE_ID_PASSWORD_TEXTFIELD:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlTextfieldComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlRegistrationFormNode::i_CHILD_NODE_INDEX_PASSWORD_TEXTFIELD);
			}break;

			case CMTranslationXmlRegistrationFormNodeParser::_CHILD_NODE_ID_REPEAT_PASSWORD_TEXTFIELD:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlTextfieldComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlRegistrationFormNode::i_CHILD_NODE_INDEX_REPEAT_PASSWORD_TEXTFIELD);
			}break;

			case CMTranslationXmlRegistrationFormNodeParser::_CHILD_NODE_ID_EMAIL_TEXTFIELD:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlTextfieldComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlRegistrationFormNode::i_CHILD_NODE_INDEX_EMAIL_TEXTFIELD);
			}break;

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}


?>