<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:0
*/
namespace basapa_ns;


final class CViewManager
{
	static private $_fInstance_clss;

	private $_fViewsController_clss;
	private $_fViewsData_clss;
	private $_fModulesView_clss;
	private $_fComponentsView_clss;

	private $_fHeadView_clss;
	private $_fBodyView_clss;


	private function __construct()
	{
		//$this->_init();
	}

	/***************************************************
	 * INTERFACE
	 */

	static public function i_getInstance()
	{
		if (!isset(self::$_fInstance_clss))
		{
			self::$_fInstance_clss = new self();
		}
		return self::$_fInstance_clss;
	}

	public function i_getViewsData()
	{
		return $this->_getViewsData();
	}

	public function i_getModulesView()
	{
		return $this->_getModulesView();
	}

	public function i_getComponentsView()
	{
		return $this->_getComponentsView();
	}

	public function i_update():void
	{
		$this->_getViewsController()->i_update();
	}

	public function i_draw():void
	{
		echo
		'<!DOCTYPE HTML>',
		'<HTML>';
			$this->_getHeadView()->i_draw();
			$this->_getBodyView()->i_draw();
		echo
		'</HTML>';
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getHeadView()
	{
		return isset($this->_fHeadView_clss) ? $this->_fHeadView_clss : ($this->_fHeadView_clss = new CHeadView());
	}

	private function _getBodyView()
	{
		return isset($this->_fBodyView_clss) ? $this->_fBodyView_clss : ($this->_fBodyView_clss = new CBodyView());
	}

	private function _getViewsController()
	{
		return isset($this->_fViewsController_clss) ? $this->_fViewsController_clss : ($this->_fViewsController_clss = new CViewsController());
	}

	private function _getViewsData()
	{
		return isset($this->_fViewsData_clss) ? $this->_fViewsData_clss : ($this->_fViewsData_clss = new CViewsData());
	}

	private function _getModulesView()
	{
		return isset($this->_fModulesView_clss) ? $this->_fModulesView_clss : ($this->_fModulesView_clss = new CModulesView());
	}

	private function _getComponentsView()
	{
		return isset($this->_fComponentsView_clss) ? $this->_fComponentsView_clss : ($this->_fComponentsView_clss = new CComponentsView());
	}
}


?>