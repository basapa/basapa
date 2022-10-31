<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CCPaymentComponentsView
{
	private $_fRobokassaPaymentComponentView_clss;

	
	/*public function __construct()
	{
		$this->_init();
	}*/
	
	/***************************************************
	 * INTERFACE
	 */

	public function i_getRobokassaPaymentComponentView()
	{
		return $this->_getRobokassaPaymentComponentView();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getRobokassaPaymentComponentView()
	{
		return $this->_fRobokassaPaymentComponentView_clss ?? ($this->_fRobokassaPaymentComponentView_clss = new CCRobokassaPaymentComponentView());
	}
}


?>