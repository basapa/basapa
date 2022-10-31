<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCXMLNodeParser
{
	/***************************************************
	 * INTERFACE
	 */

	static public function i_parseNode(CSimpleXMLElementWrapper $aNode_clss, CCXMLNode $aOptParentNode_clss = null):CCXMLNode
	{
		$lNode_clss = static::__generateXMLNode($aNode_clss->i_getXMLNodeName(), $aOptParentNode_clss);
		$lNode_clss->i_setNodeAttributes($aNode_clss->i_getXMLNodeAttributes());
		$lNode_clss->i_setNativeNode($aNode_clss);

		$lNodeChilds_sxmle = $aNode_clss->i_getXMLNodeChildsAsSimpleXMLElement()->i_getNativeSimpleXMLElement();
		foreach ($lNodeChilds_sxmle as $lChildNode_sxmle)
		{
			$lChildNodeName_str = CXMLFileTools::i_getNodeName($lChildNode_sxmle);

			static::__parseChildNode($lChildNodeName_str, new CSimpleXMLElementWrapper($lChildNode_sxmle), $lNode_clss);
		}

		return $lNode_clss;
	}

	static public function i_parseSimpleNode(CSimpleXMLElementWrapper $aNode_clss, string $aNodeName_str, CCXMLNode $aOptParentNode_clss = null):CCXMLNode
	{
		$lNode_clss = new CCXMLNode($aNodeName_str, $aOptParentNode_clss);
		$lNode_clss->i_setNodeValue($aNode_clss->i_getXMLNodeValue());
		$lNode_clss->i_setNodeAttributes($aNode_clss->i_getXMLNodeAttributes());
		$lNode_clss->i_setNativeNode($aNode_clss);
		return $lNode_clss;
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*/protected static function __generateXMLNode(string $aNameNode_str, CCXMLNode $aOptParentNode_clss = null):?CCXMLNode
	{
		return null;
	}

	/*virtual*/protected static function __parseChildNode(string $aChildNodeName_str, CSimpleXMLElementWrapper $aChildNode_clss, CCXMLNode $aParentNode_clss):void
	{
	}
}


?>