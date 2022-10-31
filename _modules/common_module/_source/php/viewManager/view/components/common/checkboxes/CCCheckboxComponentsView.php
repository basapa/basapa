<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CCCheckboxComponentsView
{
	private $_fSimpleCheckboxComponentView_clss;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getSimpleCheckboxComponentView()
	{
		return $this->_getSimpleCheckboxComponentView();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getSimpleCheckboxComponentView()
	{
		return $this->_fSimpleCheckboxComponentView_clss ?? ($this->_fSimpleCheckboxComponentView_clss = new CCSimpleCheckboxComponentView());
	}
}


?>