<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMTranslationXmlRootNode extends CCTranslationXmlRootNode
{
	public const i_CHILD_NODE_ID_PAGES					= 0;
	public const i_CHILD_NODE_ID_FORMS					= 1;
	public const i_CHILD_NODE_ID_INFOS					= 2;


	/***************************************************
	 * INTERFACE
	 */

	//INTERNAL...
	public function ___getPagesNode()
	{
		return $this->i_getNode(CMTranslationXmlRootNode::i_CHILD_NODE_ID_PAGES);
	}

	public function ___getFormsNode()
	{
		return $this->i_getNode(CMTranslationXmlRootNode::i_CHILD_NODE_ID_FORMS);
	}

	public function ___getInfosNode()
	{
		return $this->i_getNode(CMTranslationXmlRootNode::i_CHILD_NODE_ID_INFOS);
	}
	//...INTERNAL

	public function i_getPagesTranslationData()
	{
		return $this->___getPagesNode();
	}

	public function i_getFormsTranslationData()
	{
		return $this->___getFormsNode();
	}

	public function i_getInfosTranslationData()
	{
		return $this->___getInfosNode();
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>