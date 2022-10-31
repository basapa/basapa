<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CCRadiobuttonComponentsView
{
	private $_fSimpleRadiobuttonComponentView_clss;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getSimpleRadiobuttonComponentView()
	{
		return $this->_getSimpleRadiobuttonComponentView();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getSimpleRadiobuttonComponentView()
	{
		return $this->_fSimpleRadiobuttonComponentView_clss ?? ($this->_fSimpleRadiobuttonComponentView_clss = new CCSimpleRadiobuttonComponentView());
	}
}


?>