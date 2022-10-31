<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CCTableComponentsView
{
	private $_fSimpleTableComponentView_clss;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getSimpleTableComponentView()
	{
		return $this->_getSimpleTableComponentView();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getSimpleTableComponentView()
	{
		return $this->_fSimpleTableComponentView_clss ?? ($this->_fSimpleTableComponentView_clss = new CCSimpleTableComponentView());
	}
}


?>