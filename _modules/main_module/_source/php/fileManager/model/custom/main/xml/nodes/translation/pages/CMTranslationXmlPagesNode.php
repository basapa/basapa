<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMTranslationXmlPagesNode extends CCTranslationXmlPagesNode
{
	public const i_CHILD_NODE_INDEX_MAIN_PAGE			= 0;
	public const i_CHILD_NODE_INDEX_PAYMENT_PAGE		= 1;

	
	/***************************************************
	 * INTERFACE
	 */

	//INTERNAL...
	public function ___getMainPageNode()
	{
		return $this->i_getNode(CMTranslationXmlPagesNode::i_CHILD_NODE_INDEX_MAIN_PAGE);
	}
	
	public function ___getPaymentPageNode()
	{
		return $this->i_getNode(CMTranslationXmlPagesNode::i_CHILD_NODE_INDEX_PAYMENT_PAGE);
	}
	//...INTERNAL

	public function i_getMainPageTranslationData()
	{
		return $this->___getMainPageNode();
	}

	public function i_getPaymentPageTranslationData()
	{
		return $this->___getPaymentPageNode();
	}
	
	/*
	 * INTERFACE
	 ***************************************************/
}


?>