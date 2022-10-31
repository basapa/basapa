<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCTranslationXMLRadiobuttonComponentItemsNode extends CCTranslationXMLComponentItemsNode
{
	private const _NODE_ATTR_ID							= 'id';
	private const _NODE_ATTR_VALUE						= 'value';


	/***************************************************
	 * INTERFACE
	 */

	public function i_getItemId($aIndex_int):string
	{
		return $this->i_getNode($aIndex_int)->i_getNodeAttributeValue(self::_NODE_ATTR_ID, true);
	}

	public function i_getItemValueAttr($aIndex_int):string
	{
		return $this->i_getNode($aIndex_int)->i_getNodeAttributeValue(self::_NODE_ATTR_VALUE, true);
	}

	public function i_isItemValueAttrDefined($aIndex_int):bool
	{
		return $this->i_getNode($aIndex_int)->i_isNodeAttributeDefined(self::_NODE_ATTR_VALUE);
	}

	public function i_getItemName($aIndex_int):string
	{
		return $this->i_getNode($aIndex_int)->i_getNodeValue();
	}

	public function i_getItemsCount():int
	{
		return $this->i_getNodesCount();
	}

	public function i_getItemNameByItemId($aItemId_str):string
	{
		$lNodesCount_int = $this->i_getNodesCount();
		for ($i = 0; $i < $lNodesCount_int; $i++)
		{
			if ($this->i_getItemId($i) === $aItemId_str)
			{
				return $this->i_getItemName($i);
			}
		}

		return "----";
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>