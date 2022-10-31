<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCPanelsInfoView
{
	//IDS...
	protected const __PANEL_INFO_VIEWS_COUNT				= 0;
	//...IDS

	private $_fPanelInfoView_clss_arr = [];


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getPanelInfoView(int $aPanelInfoViewId_int)
	{
		return $this->_fPanelInfoView_clss_arr[$aPanelInfoViewId_int] ?? ($this->_fPanelInfoView_clss_arr[$aPanelInfoViewId_int] = $this->__generatePanelInfoView($aPanelInfoViewId_int));
	}

	/*virtual*/protected function __generatePanelInfoView(int $aPanelInfoViewId_int):CCPanelInfoView
	{
		$lPanelInfoView_clss = null;

		switch ($aPanelInfoViewId_int)
		{
			default:
				new CException('__generatePanelInfoView', 'Unsupported panel info view id: ' .$aPanelInfoViewId_int);
			break;
		}

		return $lPanelInfoView_clss;
	}
}


?>