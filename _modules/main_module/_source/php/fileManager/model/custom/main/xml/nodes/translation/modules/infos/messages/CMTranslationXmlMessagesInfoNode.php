<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMTranslationXmlMessagesInfoNode extends CCTranslationXmlMessagesInfoNode
{
	public const i_CHILD_NODE_INDEX_ACCESS_REQUIREMENT_MESSAGE	= 0;
	public const i_CHILD_NODE_INDEX_ACCESS_RESTRICTION_MESSAGE	= 1;
	public const i_CHILD_NODE_INDEX_ACCESS_ERROR_MESSAGE		= 2;
	public const i_CHILD_NODE_INDEX_ACCESS_PROHIBITION_MESSAGE	= 3;
	public const i_CHILD_NODE_INDEX_ERROR_403_MESSAGE			= 4;
	public const i_CHILD_NODE_INDEX_ERROR_404_MESSAGE			= 5;

	
	/***************************************************
	 * INTERFACE
	 */

	//INTERNAL...
	public function ___getAccessRequirementMessageNode()
	{
		return $this->i_getNode(CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ACCESS_REQUIREMENT_MESSAGE);
	}

	public function ___getAccessRestrictionMessageNode()
	{
		return $this->i_getNode(CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ACCESS_RESTRICTION_MESSAGE);
	}

	public function ___getAccessErrorMessageNode()
	{
		return $this->i_getNode(CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ACCESS_ERROR_MESSAGE);
	}

	public function ___getAccessProhibitionMessageNode()
	{
		return $this->i_getNode(CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ACCESS_PROHIBITION_MESSAGE);
	}

	public function ___getError403MessageNode()
	{
		return $this->i_getNode(CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ERROR_403_MESSAGE);
	}

	public function ___getError404MessageNode()
	{
		return $this->i_getNode(CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ERROR_404_MESSAGE);
	}
	//...INTERNAL

	public function i_getAccessRequirementMessageTranslationData()
	{
		return $this->___getAccessRequirementMessageNode();
	}

	public function i_getAccessRestrictionMessageTranslationData()
	{
		return $this->___getAccessRestrictionMessageNode();
	}

	public function i_getAccessErrorMessageTranslationData()
	{
		return $this->___getAccessErrorMessageNode();
	}

	public function i_getAccessProhibitionMessageTranslationData()
	{
		return $this->___getAccessProhibitionMessageNode();
	}

	public function i_getError403MessageTranslationData()
	{
		return $this->___getError403MessageNode();
	}

	public function i_getError404MessageTranslationData()
	{
		return $this->___getError404MessageNode();
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>