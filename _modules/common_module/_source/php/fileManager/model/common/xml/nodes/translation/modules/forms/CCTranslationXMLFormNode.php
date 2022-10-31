<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCTranslationXMLFormNode extends CCXMLNode
{
	public const i_CHILD_NODE_INDEX_ABOUT_MANDATORY_FIELDS_NOTE_TEXT	= 0;
	public const i_CHILD_NODE_INDEX_FORM_NAME							= 1;
	public const i_CHILD_NODE_INDEX_FORM_MESSAGES						= 2;
	public const i_CHILD_NODE_INDEX_SUBMIT_BUTTON						= 3;
	protected const __CHILD_NODES_COUNT									= 4;

	
	/***************************************************
	 * INTERFACE
	 */

	public function i_getFormName():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_FORM_NAME)->i_getNodeValue();
	}

	/**@return CCTranslationXMLTextComponentNode*/
	public function i_getAboutMandatoryFieldsNoteTextTranslationData():CCXMLNode
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_ABOUT_MANDATORY_FIELDS_NOTE_TEXT);
	}

	/**@return CCTranslationXMLFormMessagesNode*/
	public function i_getFormMessagesData():CCXMLNode
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_FORM_MESSAGES);
	}

	/**@return CCTranslationXMLButtonComponentNode*/
	public function i_getSubmitButtonTranslationData():CCXMLNode
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_SUBMIT_BUTTON);
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>