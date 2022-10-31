<?php


namespace basapa_ns;


class CMPageResponsesController
{
	private $_fUserResponseController_clss;
	private $_fPaymentResponseController_clss;
	//static private $_fCityResponseController_clss;
	//static private $_fRegionResponseController_clss;
	//static private $_fCountryResponseController_clss;

	public function __construct()
	{
		$this->__init();
	}

	/***************************************************
	 * INTERFACE
	 */

	public function i_getUserResponseController()
	{
		return $this->_getUserResponseController();
	}
	
	public function i_getPaymentResponseController()
	{
		return $this->_getPaymentResponseController();
	}
	
	/*static public function getCityResponseController()
	{
		//return self::_getCityResponseController();
	}

	static public function getRegionResponseController()
	{
		//return self::_getRegionResponseController();
	}

	static public function getCountryResponseController()
	{
		//return self::_getCountryResponseController();
	}*/

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __init()
	{
	}

	private function _getUserResponseController()
	{
		return isset($this->_fUserResponseController_clss) ? $this->_fUserResponseController_clss : ($this->_fUserResponseController_clss = new CMUserResponseController());
	}
	
	private function _getPaymentResponseController()
	{
		return isset($this->_fPaymentResponseController_clss) ? $this->_fPaymentResponseController_clss : ($this->_fPaymentResponseController_clss = new CMPaymentResponseController());
	}
/*
	static private function _getCityResponseController()
	{
		//return isset(self::$_fCityResponseController_clss) ? self::$_fCityResponseController_clss : (self::$_fCityResponseController_clss = new CMCityResponseController());
	}

	static private function _getRegionResponseController()
	{
		//return isset(self::$_fRegionResponseController_clss) ? self::$_fRegionResponseController_clss : (self::$_fRegionResponseController_clss = new CMRegionResponseController());
	}

	static private function _getCountryResponseController()
	{
		//return isset(self::$_fCountryResponseController_clss) ? self::$_fCountryResponseController_clss : (self::$_fCountryResponseController_clss = new CMCountryResponseController());
	}*/
}


?>