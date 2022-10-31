<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCTranslationXMLRootNode extends CCXMLNode
{
	private $_fTranslationXMLPagesNativeNode_clss;
	private $_fTranslationXMLFormsNativeNode_clss;
	private $_fTranslationXMLInfosNativeNode_clss;
	private $_fTranslationXMLNavigationsInfoNativeNode_clss;
	private $_fTranslationXMLFilteringsInfoNativeNode_clss;
	private $_fTranslationXMLSearchsInfoNativeNode_clss;
	private $_fTranslationXMLSortingsInfoNativeNode_clss;
	private $_fTranslationXMLPanelsInfoNativeNode_clss;

	/***************************************************
	 * INTERFACE
	 */

	public function i_getTranslationXMLPagesNativeNode():CSimpleXMLElementWrapper
	{
		return $this->_fTranslationXMLPagesNativeNode_clss ?? ($this->_fTranslationXMLPagesNativeNode_clss = $this->i_getNativeNode()->i_getXMLChildNodeByNodeName('pages'));
	}

	public function i_getTranslationXMLFormsNativeNode():CSimpleXMLElementWrapper
	{
		return $this->_fTranslationXMLFormsNativeNode_clss ?? ($this->_fTranslationXMLFormsNativeNode_clss = $this->i_getNativeNode()->i_getXMLChildNodeByNodeName('forms'));
	}

	public function i_getTranslationXMLInfosNativeNode():CSimpleXMLElementWrapper
	{
		return $this->_fTranslationXMLInfosNativeNode_clss ?? ($this->_fTranslationXMLInfosNativeNode_clss = $this->i_getNativeNode()->i_getXMLChildNodeByNodeName('infos'));
	}

	public function i_getTranslationXMLNavigationsInfoNativeNode():CSimpleXMLElementWrapper
	{
		return $this->_fTranslationXMLNavigationsInfoNativeNode_clss ?? ($this->_fTranslationXMLNavigationsInfoNativeNode_clss = $this->i_getTranslationXMLInfosNativeNode()->i_getXMLChildNodeByNodeName('navigations'));
	}

	public function i_getTranslationXMLSortingsInfoNativeNode():CSimpleXMLElementWrapper
	{
		return $this->_fTranslationXMLSortingsInfoNativeNode_clss ?? ($this->_fTranslationXMLSortingsInfoNativeNode_clss = $this->i_getTranslationXMLInfosNativeNode()->i_getXMLChildNodeByNodeName('sortings'));
	}

	public function i_getTranslationXMLPanelsInfoNativeNode():CSimpleXMLElementWrapper
	{
		return $this->_fTranslationXMLPanelsInfoNativeNode_clss ?? ($this->_fTranslationXMLPanelsInfoNativeNode_clss = $this->i_getTranslationXMLInfosNativeNode()->i_getXMLChildNodeByNodeName('panels'));
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>