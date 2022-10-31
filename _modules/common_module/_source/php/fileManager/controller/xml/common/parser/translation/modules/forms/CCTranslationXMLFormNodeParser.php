<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCTranslationXMLFormNodeParser extends CCXMLNodeParser
{
	private const __CHILD_NODE_ID_FORM_MESSAGES						= 'form_messages';

	private const _CHILD_NODE_ID_FORM_NAME							= 'form_name';
	private const _CHILD_NODE_ID_SUBMIT_BUTTON						= 'submit_button';
	private const _CHILD_NODE_ID_ABOUT_MANDATORY_FIELDS_NOTE_TEXT	= 'about_mandatory_fields_note_text';

	
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected static function __generateXMLNode(string $aNameNode_str, CCXMLNode $aOptParentNode_clss = null):CCXMLNode
	{
		return new CCTranslationXMLFormNode($aNameNode_str, $aOptParentNode_clss);
	}

	/*override*/protected static function __parseChildNode(string $aChildNodeName_str, CSimpleXMLElementWrapper $aChildNode_clss, CCXMLNode $aParentNode_clss):void
	{
		switch ($aChildNodeName_str)
		{
			case CCTranslationXMLFormNodeParser::__CHILD_NODE_ID_FORM_MESSAGES:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXMLFormMessagesNodeParser::i_parseNode($aChildNode_clss, $aParentNode_clss), CCTranslationXMLFormNode::i_CHILD_NODE_INDEX_FORM_MESSAGES);
			}break;

			case self::_CHILD_NODE_ID_FORM_NAME:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLFormNode::i_CHILD_NODE_INDEX_FORM_NAME);
			}break;

			case self::_CHILD_NODE_ID_SUBMIT_BUTTON:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXMLButtonComponentNodeParser::i_parseNode($aChildNode_clss, $aParentNode_clss), CCTranslationXMLFormNode::i_CHILD_NODE_INDEX_SUBMIT_BUTTON);
			}break;

			case self::_CHILD_NODE_ID_ABOUT_MANDATORY_FIELDS_NOTE_TEXT:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXMLTextComponentNodeParser::i_parseNode($aChildNode_clss, $aParentNode_clss), CCTranslationXMLFormNode::i_CHILD_NODE_INDEX_ABOUT_MANDATORY_FIELDS_NOTE_TEXT);
			}break;

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_clss, $aParentNode_clss);
			break;
		}
	}
}


?>