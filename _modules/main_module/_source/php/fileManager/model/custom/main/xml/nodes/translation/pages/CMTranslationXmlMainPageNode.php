<?php
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


class CMTranslationXmlMainPageNode extends CMTranslationXmlPageNode
{
	/*indexes updating required for classes descendents*/
	public const i_CHILD_NODE_INDEX_TITLE				= 0;
	public const i_CHILD_NODE_INDEX_META_KEYWORDS		= 1;
	public const i_CHILD_NODE_INDEX_META_DESCRIPTION	= 2;
	public const i_COMMON_CHILD_NODES_COUNT				= 3;


	/***************************************************
	 * INTERFACE
	 */

	//INTERNAL...
	public function ___getTitleNode()
	{
		return $this->i_getNode(CMTranslationXmlMainPageNode::i_CHILD_NODE_INDEX_TITLE);
	}

	public function ___getMetaKeywordsNode()
	{
		return $this->i_getNode(CMTranslationXmlMainPageNode::i_CHILD_NODE_INDEX_META_KEYWORDS);
	}

	public function ___getMetaDescriptionNode()
	{
		return $this->i_getNode(CMTranslationXmlMainPageNode::i_CHILD_NODE_INDEX_META_DESCRIPTION);
	}
	//...INTERNAL

	public function i_getTitle()
	{
		return $this->___getTitleNode()->i_getNodeValue();
	}

	public function i_getMetaKeywords()
	{
		return $this->___getMetaKeywordsNode()->i_getNodeValue();
	}

	public function i_getMetaDescription()
	{
		return $this->___getMetaDescriptionNode()->i_getNodeValue();
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>