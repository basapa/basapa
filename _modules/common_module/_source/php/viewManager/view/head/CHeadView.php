<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


final class CHeadView
{
	private $_fFaviconsView_clss;
	private $_fJavascriptsView_clss;
	private $_fStylesView_clss;
	private $_fMetasView_clss;
	private $_fTitlesView_clss;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_draw()
	{
		echo
		'<head>';
			$this->_getMetasView()->i_draw();
			$this->_getTitlesView()->i_draw();
			$this->_getFaviconsView()->i_draw();
			$this->_getStylesView()->i_draw();
			$this->_getJavascriptsView()->i_draw();
		echo
		'</head>';
	}
	
	/*
	 * INTERFACE
	 ***************************************************/
	
	/*private function _init():void
	{
	}*/

	private function _getFaviconsView()
	{
		return $this->_fFaviconsView_clss ?? ($this->_fFaviconsView_clss = new CFaviconsView());
	}

	private function _getJavascriptsView()
	{
		return $this->_fJavascriptsView_clss ?? ($this->_fJavascriptsView_clss = new CJavascriptsView());
	}

	private function _getStylesView()
	{
		return $this->_fStylesView_clss ?? ($this->_fStylesView_clss = new CStylesView());
	}

	private function _getMetasView()
	{
		return $this->_fMetasView_clss ?? ($this->_fMetasView_clss = new CMetasView());
	}

	private function _getTitlesView()
	{
		return $this->_fTitlesView_clss ?? ($this->_fTitlesView_clss = new CTitlesView());
	}
}


?>