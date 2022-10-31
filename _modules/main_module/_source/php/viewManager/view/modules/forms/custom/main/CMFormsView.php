<?php
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


class CMFormsView
{
	private $_fRegistrationFormView_clss;
	private $_fPaymentFormView_clss;

	
	public function __construct()
	{
		$this->_init();
	}

	/***************************************************
	 * INTERFACE
	 */
	
	public function getRegistrationFormView()
	{
		return $this->_getRegistrationFormView();
	}
	
	public function getPaymentFormView()
	{
		return $this->_getPaymentFormView();
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	private function _init()
	{
	}

	private function _getRegistrationFormView()
	{
		return isset($this->_fRegistrationFormView_clss) ? $this->_fRegistrationFormView_clss : ($this->_fRegistrationFormView_clss = new CMRegistrationFormView());
	}
	
	private function _getPaymentFormView()
	{
		return isset($this->_fPaymentFormView_clss) ? $this->_fPaymentFormView_clss : ($this->_fPaymentFormView_clss = new CMPaymentFormView());
	}
}


?>