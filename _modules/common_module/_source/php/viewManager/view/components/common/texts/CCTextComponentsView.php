<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CCTextComponentsView
{
	private $_fSimpleTextComponentView_clss;
	private $_fLinkTextComponentView_clss;
	private $_fCaptionTextComponentView_clss;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getSimpleTextComponentView()
	{
		return $this->_getSimpleTextComponentView();
	}

	public function i_getLinkTextComponentView()
	{
		return $this->_getLinkTextComponentView();
	}

	public function i_getCaptionTextComponentView()
	{
		return $this->_getCaptionTextComponentView();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getSimpleTextComponentView()
	{
		return $this->_fSimpleTextComponentView_clss ?? ($this->_fSimpleTextComponentView_clss = new CCSimpleTextComponentView());
	}

	private function _getLinkTextComponentView()
	{
		return $this->_fLinkTextComponentView_clss ?? ($this->_fLinkTextComponentView_clss = new CCLinkTextComponentView());
	}

	private function _getCaptionTextComponentView()
	{
		return $this->_fCaptionTextComponentView_clss ?? ($this->_fCaptionTextComponentView_clss = new CCCaptionTextComponentView());
	}
}


?>