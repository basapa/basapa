<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


final class CCTranslationXMLCheckboxesCompositeComponentNodeParser extends CCTranslationXMLComponentNodeParser
{
	private const _CHILD_NODE_PREFIX_CHECKBOX_			= 'checkbox_';


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected static function __generateXMLNode(string $aNameNode_str, CCXMLNode $aOptParentNode_clss = null):CCXMLNode
	{
		return new CCTranslationXMLCheckboxesCompositeComponentNode($aNameNode_str, $aOptParentNode_clss);
	}

	/*override*/protected static function __parseChildNode(string $aChildNodeName_str, CSimpleXMLElementWrapper $aChildNode_clss, CCXMLNode $aParentNode_clss):void
	{
		$lChildNodePrefix_str = self::_CHILD_NODE_PREFIX_CHECKBOX_;

		$l_str_arr = CStringTools::i_split($aChildNodeName_str, $lChildNodePrefix_str);

		if (CArrayTools::i_count($l_str_arr) === 2)
		{
			if (CStringTools::i_length($l_str_arr[0]) !== 0)
			{
				new CException('__parseChildNode', 'Invalid node name: ' .$aChildNodeName_str);
			}

			$lIndex_int = $l_str_arr[1];

			$aParentNode_clss->i_insertNode(CCTranslationXMLCheckboxComponentNodeParser::i_parseNode($aChildNode_clss, $aParentNode_clss), CCTranslationXMLCheckboxesCompositeComponentNode::i_CHILD_NODE_INITIAL_INDEX_CHECKBOX_ + $lIndex_int);
		}
		else
		{
			switch ($aChildNodeName_str)
			{
				default:
					parent::__parseChildNode($aChildNodeName_str, $aChildNode_clss, $aParentNode_clss);
				break;
			}
		}
	}
}


?>