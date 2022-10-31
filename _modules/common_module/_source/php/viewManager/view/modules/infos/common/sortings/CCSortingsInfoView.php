<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCSortingsInfoView
{
	//IDS...
	protected const __SORTING_INFO_VIEWS_COUNT			= 0;
	//...IDS

	private $_fSortingInfoView_clss_arr = [];


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

	protected function __getSortingInfoView(int $aSortingInfoViewId_int)
	{
		return $this->_fSortingInfoView_clss_arr[$aSortingInfoViewId_int] ?? ($this->_fSortingInfoView_clss_arr[$aSortingInfoViewId_int] = $this->__generateSortingInfoView($aSortingInfoViewId_int));
	}

	/*virtual*/protected function __generateSortingInfoView(int $aSortingInfoViewId_int):CCSortingInfoView
	{
		$lSortingInfoView_clss = null;

		switch ($aSortingInfoViewId_int)
		{
			default:
				new CException('__generateSortingInfoView', 'Unsupported sorting info view id: ' .$aSortingInfoViewId_int);
			break;
		}

		return $lSortingInfoView_clss;
	}
}


?>