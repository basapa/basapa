<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CCTextfieldComponentsView
{
	private $_fSimpleTextfieldComponentView_clss;
	private $_fSecureTextfieldComponentView_clss;
	private $_fHiddenTextfieldComponentView_clss;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getSimpleTextfieldComponentView()
	{
		return $this->_getSimpleTextfieldComponentView();
	}

	public function i_getSecureTextfieldComponentView()
	{
		return $this->_getSecureTextfieldComponentView();
	}

	public function i_getHiddenTextfieldComponentView()
	{
		return $this->_getHiddenTextfieldComponentView();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getSimpleTextfieldComponentView()
	{
		return $this->_fSimpleTextfieldComponentView_clss ?? ($this->_fSimpleTextfieldComponentView_clss = new CCSimpleTextfieldComponentView());
	}

	private function _getSecureTextfieldComponentView()
	{
		return $this->_fSecureTextfieldComponentView_clss ?? ($this->_fSecureTextfieldComponentView_clss = new CCSecureTextfieldComponentView());
	}

	private function _getHiddenTextfieldComponentView()
	{
		return $this->_fHiddenTextfieldComponentView_clss ?? ($this->_fHiddenTextfieldComponentView_clss = new CCHiddenTextfieldComponentView());
	}
}


?>