<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMTranslationXmlFormsNode extends CCTranslationXmlFormsNode
{
	public const i_CHILD_NODE_INDEX_LOGIN_FORM			= 0;
	public const i_CHILD_NODE_INDEX_AUTHORIZATION_FORM	= 1;
	public const i_CHILD_NODE_INDEX_REGISTRATION_FORM	= 2;
	public const i_CHILD_NODE_INDEX_PAYMENT_FORM		= 3;

	
	/***************************************************
	 * INTERFACE
	 */

	//INTERNAL...
	public function ___getLoginFormNode()
	{
		return $this->i_getNode(CMTranslationXmlFormsNode::i_CHILD_NODE_INDEX_LOGIN_FORM);
	}

	public function ___getAuthorizationFormNode()
	{
		return $this->i_getNode(CMTranslationXmlFormsNode::i_CHILD_NODE_INDEX_AUTHORIZATION_FORM);
	}

	public function ___getRegistrationFormNode()
	{
		return $this->i_getNode(CMTranslationXmlFormsNode::i_CHILD_NODE_INDEX_REGISTRATION_FORM);
	}
	
	public function ___getPaymentFormNode()
	{
		return $this->i_getNode(CMTranslationXmlFormsNode::i_CHILD_NODE_INDEX_PAYMENT_FORM);
	}
	//...INTERNAL

	public function i_getLoginFormTranslationData()
	{
		return $this->___getLoginFormNode();
	}

	public function i_getAuthorizationFormTranslationData()
	{
		return $this->___getAuthorizationFormNode();
	}

	public function i_getRegistrationFormTranslationData()
	{
		return $this->___getRegistrationFormNode();
	}
	
	public function i_getPaymentFormTranslationData()
	{
		return $this->___getPaymentFormNode();
	}
	
	/*
	 * INTERFACE
	 ***************************************************/
}


?>