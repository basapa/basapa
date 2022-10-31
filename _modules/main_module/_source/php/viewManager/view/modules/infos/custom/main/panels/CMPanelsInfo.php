<?php


namespace basapa_ns;


class CPanelsInfo
{
	private $_fSelectCityPanelInfo_clss;
	private $_fContentControlsAdminPanelInfo_clss;

	
	public function __construct()
	{
		$this->_init();
	}
	
	
	/***************************************************
	 * INTERFACE
	 */

	
	public function getSelectCityPanelInfo()
	{
		return $this->_getSelectCityPanelInfo();
	}


	public function getContentControlsAdminPanelInfo()
	{
		return $this->_getContentControlsAdminPanelInfo();
	}


	/*
	 * INTERFACE
	 ***************************************************/


	private function _init()
	{
	}
	
	
	private function _getSelectCityPanelInfo()
	{
		return isset($this->_fSelectCityPanelInfo_clss) ? $this->_fSelectCityPanelInfo_clss : ($this->_fSelectCityPanelInfo_clss = new CSelectCityPanelInfo());
	}


	private function _getContentControlsAdminPanelInfo()
	{
		return isset($this->_fContentControlsAdminPanelInfo_clss) ? $this->_fContentControlsAdminPanelInfo_clss : ($this->_fContentControlsAdminPanelInfo_clss = new CContentControlsAdminPanelInfo());
	}
}


?>
