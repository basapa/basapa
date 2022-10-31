<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CCTextareaComponentsView
{
	private $_fSimpleTextareaComponentView_clss;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getSimpleTextareaComponentView()
	{
		return $this->_getSimpleTextareaComponentView();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getSimpleTextareaComponentView()
	{
		return $this->_fSimpleTextareaComponentView_clss ?? ($this->_fSimpleTextareaComponentView_clss = new CCSimpleTextareaComponentView());
	}
}


?>