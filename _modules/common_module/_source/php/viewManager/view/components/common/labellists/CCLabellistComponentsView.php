<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CCLabellistComponentsView
{
	private $_fSimpleLabellistComponentView_clss;
	private $_fVSimpleLabellistComponentView_clss;
	private $_fTabLabellistComponentView_clss;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getSimpleLabellistComponentView()
	{
		return $this->_getSimpleLabellistComponentView();
	}

	public function i_getVSimpleLabellistComponentView()
	{
		return $this->_getVSimpleLabellistComponentView();
	}

	public function i_getTabLabellistComponentView()
	{
		return $this->_getTabLabellistComponentView();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getSimpleLabellistComponentView()
	{
		return $this->_fSimpleLabellistComponentView_clss ?? ($this->_fSimpleLabellistComponentView_clss = new CCSimpleLabellistComponentView());
	}

	private function _getVSimpleLabellistComponentView()
	{
		return $this->_fVSimpleLabellistComponentView_clss ?? ($this->_fVSimpleLabellistComponentView_clss = new CCVSimpleLabellistComponentView());
	}

	private function _getTabLabellistComponentView()
	{
		return $this->_fTabLabellistComponentView_clss ?? ($this->_fTabLabellistComponentView_clss = new CCTabLabellistComponentView());
	}
}


?>