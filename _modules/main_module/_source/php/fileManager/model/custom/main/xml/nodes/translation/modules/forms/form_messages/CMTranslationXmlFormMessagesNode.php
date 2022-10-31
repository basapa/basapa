<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMTranslationXmlFormMessagesNode extends CCTranslationXmlFormMessagesNode
{
	/***************************************************
	 * INTERFACE
	 */

	//INTERNAL...
	public function ___getEmptyMandatoryFieldsMessageNode()
	{
		return $this->i_getNode(CMTranslationXmlFormMessagesNode::i_CHILD_NODE_INDEX_EMPTY_MANDATORY_FIELDS_MESSAGE);
	}
	//...INTERNAL

	/*
	 * INTERFACE
	 ***************************************************/
}


?>