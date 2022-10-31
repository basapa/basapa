<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCTranslationXMLFormMessagesNode extends CCXMLNode
{
	public const i_CHILD_NODE_INDEX_ERROR_MESSAGES_CAPTION			= 0;
	public const i_CHILD_NODE_INDEX_EMPTY_MANDATORY_FIELDS_MESSAGE	= 1;
	public const i_CHILD_NODE_INDEX_FAILED_MESSAGE					= 2;
	public const i_CHILD_NODE_INDEX_SUCCESS_MESSAGE					= 3;
	public const i_CHILD_NODE_INDEX_SUCCESS_MESSAGES_CAPTION		= 4;
	public const i_CHILD_NODE_INDEX_WARNING_MESSAGES_CAPTION		= 5;
	protected const __CHILD_NODES_COUNT								= 6;


	/***************************************************
	 * INTERFACE
	 */

	public function i_getErrorMessagesCaption():string
	{
		return $this->i_getNode(CCTranslationXMLFormMessagesNode::i_CHILD_NODE_INDEX_ERROR_MESSAGES_CAPTION)->i_getNodeValue();
	}

	public function i_getEmptyMandatoryFieldsMessage():string
	{
		return $this->i_getNode(CCTranslationXMLFormMessagesNode::i_CHILD_NODE_INDEX_EMPTY_MANDATORY_FIELDS_MESSAGE)->i_getNodeValue();
	}

	public function i_getFailedMessage():string
	{
		return $this->i_getNode(CCTranslationXMLFormMessagesNode::i_CHILD_NODE_INDEX_FAILED_MESSAGE)->i_getNodeValue();
	}

	public function i_getSuccessMessage():string
	{
		return $this->i_getNode(CCTranslationXMLFormMessagesNode::i_CHILD_NODE_INDEX_SUCCESS_MESSAGE)->i_getNodeValue();
	}

	public function i_getSuccessMessagesCaption():string
	{
		return $this->i_getNode(CCTranslationXMLFormMessagesNode::i_CHILD_NODE_INDEX_SUCCESS_MESSAGES_CAPTION)->i_getNodeValue();
	}

	public function i_getWarningMessagesCaption():string
	{
		return $this->i_getNode(CCTranslationXMLFormMessagesNode::i_CHILD_NODE_INDEX_WARNING_MESSAGES_CAPTION)->i_getNodeValue();
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>