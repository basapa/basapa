<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CCButtonComponentsView
{
	private $_fSubmitButtonComponentView_clss;
	private $_fLinkButtonComponentView_clss;
	private $_fFileButtonComponentView_clss;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getSubmitButtonComponentView()
	{
		return $this->_getSubmitButtonComponentView();
	}

	public function i_getLinkButtonComponentView()
	{
		return $this->_getLinkButtonComponentView();
	}

	public function i_getFileButtonComponentView()
	{
		return $this->_getFileButtonComponentView();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getSubmitButtonComponentView()
	{
		return $this->_fSubmitButtonComponentView_clss ?? ($this->_fSubmitButtonComponentView_clss = new CCSubmitButtonComponentView());
	}

	private function _getLinkButtonComponentView()
	{
		return $this->_fLinkButtonComponentView_clss ?? ($this->_fLinkButtonComponentView_clss = new CCLinkButtonComponentView());
	}

	private function _getFileButtonComponentView()
	{
		return $this->_fFileButtonComponentView_clss ?? ($this->_fFileButtonComponentView_clss = new CCFileButtonComponentView());
	}
}


?>