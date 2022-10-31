<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCTranslationXMLPageNode extends CCXMLNode
{
	public const i_CHILD_NODE_INDEX_META_DESCRIPTION	= 0;
	public const i_CHILD_NODE_INDEX_META_KEYWORDS		= 1;
	public const i_CHILD_NODE_INDEX_TITLE				= 2;
	protected const __CHILD_NODES_COUNT					= 3;


	/***************************************************
	 * INTERFACE
	 */

	public function i_getMetaDescription():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_META_DESCRIPTION)->i_getNodeValue();
	}

	public function i_getMetaKeywords():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_META_KEYWORDS)->i_getNodeValue();
	}

	public function i_getTitle():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_TITLE)->i_getNodeValue();
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>