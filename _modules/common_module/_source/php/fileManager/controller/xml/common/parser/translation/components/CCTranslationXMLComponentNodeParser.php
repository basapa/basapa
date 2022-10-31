<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCTranslationXMLComponentNodeParser extends CCXMLNodeParser
{
	private const _CHILD_NODE_NAME_CAPTION				= 'caption';
	private const _CHILD_NODE_NAME_DESCRIPTION			= 'description';
	private const _CHILD_NODE_NAME_HINT					= 'hint';
	private const _CHILD_NODE_NAME_PLACEHOLDER			= 'placeholder';
	private const _CHILD_NODE_NAME_VALUE				= 'value';
	private const _CHILD_NODE_NAME_FULL_FILE_NAME		= 'full_file_name';


	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual override*/protected static function __parseChildNode(string $aChildNodeName_str, CSimpleXMLElementWrapper $aChildNode_clss, CCXMLNode $aParentNode_clss):void
	{
		switch ($aChildNodeName_str)
		{
			case self::_CHILD_NODE_NAME_CAPTION:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLComponentNode::i_CHILD_NODE_INDEX_CAPTION);
			}break;

			case self::_CHILD_NODE_NAME_DESCRIPTION:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLComponentNode::i_CHILD_NODE_INDEX_DESCRIPTION);
			}break;

			case self::_CHILD_NODE_NAME_HINT:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLComponentNode::i_CHILD_NODE_INDEX_HINT);
			}break;

			case self::_CHILD_NODE_NAME_PLACEHOLDER:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLComponentNode::i_CHILD_NODE_INDEX_PLACEHOLDER);
			}break;

			case self::_CHILD_NODE_NAME_VALUE:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLComponentNode::i_CHILD_NODE_INDEX_VALUE);
			}break;

			case self::_CHILD_NODE_NAME_FULL_FILE_NAME:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLComponentNode::i_CHILD_NODE_INDEX_FULL_FILE_NAME);
			}break;

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_clss, $aParentNode_clss);
			break;
		}
	}
}


?>