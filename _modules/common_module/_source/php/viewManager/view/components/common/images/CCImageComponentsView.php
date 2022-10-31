<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CCImageComponentsView
{
	private $_fSimpleImageComponentView_clss;
	private $_fLinkImageComponentView_clss;
	private $_fFileImageComponentView_clss;

	
	/*public function __construct()
	{
		$this->_init();
	}*/
	
	/***************************************************
	 * INTERFACE
	 */

	public function i_getSimpleImageComponentView()
	{
		return $this->_getSimpleImageComponentView();
	}

	public function i_getLinkImageComponentView()
	{
		return $this->_getLinkImageComponentView();
	}

	public function i_getFileImageComponentView()
	{
		return $this->_getFileImageComponentView();
	}

	/*
	 * INTERFACE
	 ***************************************************/
	
	/*private function _init():void
	{
	}*/

	private function _getSimpleImageComponentView()
	{
		return $this->_fSimpleImageComponentView_clss ?? ($this->_fSimpleImageComponentView_clss = new CCSimpleImageComponentView());
	}

	private function _getLinkImageComponentView()
	{
		return $this->_fLinkImageComponentView_clss ?? ($this->_fLinkImageComponentView_clss = new CCLinkImageComponentView());
	}

	private function _getFileImageComponentView()
	{
		return $this->_fFileImageComponentView_clss ?? ($this->_fFileImageComponentView_clss = new CCFileImageComponentView());
	}
}


?>