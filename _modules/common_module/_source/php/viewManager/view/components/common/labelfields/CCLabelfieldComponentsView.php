<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CCLabelfieldComponentsView
{
	private $_fSimpleLabelfieldComponentView_clss;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getSimpleLabelfieldComponentView()
	{
		return $this->_getSimpleLabelfieldComponentView();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getSimpleLabelfieldComponentView()
	{
		return $this->_fSimpleLabelfieldComponentView_clss ?? ($this->_fSimpleLabelfieldComponentView_clss = new CCSimpleLabelfieldComponentView());
	}
}


?>