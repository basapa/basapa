<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:1
*/
namespace basapa_ns;


final class CModulesView
{
	private $_fFormsView_clss;
	private $_fInfosView_clss;
	private $_fFormsMessagesView_clss;
	private $_fDialogsView_clss;
	private $_fBannersView_clss;

	
	/*public function __construct()
	{
		$this->_init();
	}*/
	
	/***************************************************
	 * INTERFACE
	 */

	public function i_getFormsView()
	{
		return $this->_getFormsView();
	}
	
	public function i_getInfosView()
	{
		return $this->_getInfosView();
	}

	public function i_getFormsMessagesView()
	{
		return $this->_getFormsMessagesView();
	}

	public function i_getDialogsView()
	{
		return $this->_getDialogsView();
	}
/*
	public function getBannersView()
	{
		return $this->_getBannersView();
	}*/
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getFormsView()
	{
		return $this->_fFormsView_clss ?? ($this->_fFormsView_clss = new CFormsView());
	}

	private function _getInfosView()
	{
		return $this->_fInfosView_clss ?? ($this->_fInfosView_clss = new CInfosView());
	}

	private function _getFormsMessagesView()
	{
		return $this->_fFormsMessagesView_clss ?? ($this->_fFormsMessagesView_clss = new CFormsMessagesView());
	}

	private function _getDialogsView()
	{
		return $this->_fDialogsView_clss ?? ($this->_fDialogsView_clss = new CDialogsView());
	}
/*
	private function _getBannersView()
	{
		return isset($this->_fBannersView_clss) ? $this->_fBannersView_clss : ($this->_fBannersView_clss = new CBannersView());
	}*/
}


?>