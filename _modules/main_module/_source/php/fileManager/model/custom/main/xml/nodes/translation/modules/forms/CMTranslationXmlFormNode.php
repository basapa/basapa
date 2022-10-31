<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMTranslationXmlFormNode extends CCTranslationXmlFormNode
{
	/***************************************************
	 * INTERFACE
	 */

	//INTERNAL...
	public function ___getFormNameNode()
	{
		return $this->i_getNode(CMTranslationXmlFormNode::i_CHILD_NODE_INDEX_FORM_NAME);
	}

	public function ___getFormMessagesNode()
	{
		return $this->i_getNode(CMTranslationXmlFormNode::i_CHILD_NODE_INDEX_FORM_MESSAGES);
	}

	public function ___getSubmitButtonNode()
	{
		return $this->i_getNode(CMTranslationXmlFormNode::i_CHILD_NODE_INDEX_SUBMIT_BUTTON);
	}
	//...INTERNAL
	
	/*
	 * INTERFACE
	 ***************************************************/
}


?>