<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMTranslationXmlInfosNode extends CCTranslationXmlInfosNode
{
	public const i_CHILD_NODE_INDEX_MESSAGES			= 0;

	
	/***************************************************
	 * INTERFACE
	 */

	//INTERNAL...
	public function ___getMessagesTranslationNode()
	{
		return $this->i_getNode(CMTranslationXmlInfosNode::i_CHILD_NODE_INDEX_MESSAGES);
	}
	//...INTERNAL

	public function i_getMessagesTranslationData()
	{
		return $this->___getMessagesTranslationNode();
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>