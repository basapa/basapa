<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCTranslationXMLComponentNode extends CCXMLNode
{
	public const i_CHILD_NODE_INDEX_CAPTION				= 0;
	public const i_CHILD_NODE_INDEX_DESCRIPTION			= 1;
	public const i_CHILD_NODE_INDEX_HINT				= 2;
	public const i_CHILD_NODE_INDEX_PLACEHOLDER			= 3;
	public const i_CHILD_NODE_INDEX_VALUE				= 4;
	public const i_CHILD_NODE_INDEX_FULL_FILE_NAME		= 5;
	protected const __CHILD_NODES_COUNT					= 6;


	/***************************************************
	 * INTERFACE
	 */

	public function i_getCaption():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_CAPTION)->i_getNodeValue();
	}

	public function i_getDescription():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_DESCRIPTION)->i_getNodeValue();
	}

	public function i_getHint():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_HINT)->i_getNodeValue();
	}

	public function i_isPlaceholderDefined():bool
	{
		return $this->i_isNodeDefined(self::i_CHILD_NODE_INDEX_PLACEHOLDER);
	}

	public function i_getPlaceholder():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_PLACEHOLDER)->i_getNodeValue();
	}

	public function i_getValue():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_VALUE)->i_getNodeValue();
	}

	public function i_getFullFileName():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_FULL_FILE_NAME)->i_getNodeValue();
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>