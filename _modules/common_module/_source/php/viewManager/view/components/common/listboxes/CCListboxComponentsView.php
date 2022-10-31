<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CCListboxComponentsView
{
	private $_fSimpleListboxComponentView_clss;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getSimpleListboxComponentView()
	{
		return $this->_getSimpleListboxComponentView();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getSimpleListboxComponentView()
	{
		return $this->_fSimpleListboxComponentView_clss ?? ($this->_fSimpleListboxComponentView_clss = new CCSimpleListboxComponentView());
	}
}


?>