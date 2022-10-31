<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCNavigationsInfoView
{
	//IDS...
	private const _NAVIGATION_INFO_VIEW_ID_ADDITIONAL_PAGES		= 0;
	private const _NAVIGATION_INFO_VIEW_ID_CONTENTS				= 1;
	private const _NAVIGATION_INFO_VIEW_ID_PAGES				= 2;
	private const _NAVIGATION_INFO_VIEW_ID_CHAIN				= 3;
	protected const __NAVIGATION_INFO_VIEWS_COUNT				= 4;
	//...IDS

	private $_fNavigationInfoView_clss_arr = [];


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getAdditionalPagesNavigationInfoView()
	{
		return $this->__getNavigationInfoView(self::_NAVIGATION_INFO_VIEW_ID_ADDITIONAL_PAGES);
	}
	
	public function i_getContentsNavigationInfoView()
	{
		return $this->__getNavigationInfoView(self::_NAVIGATION_INFO_VIEW_ID_CONTENTS);
	}
	
	public function i_getPagesNavigationInfoView()
	{
		return $this->__getNavigationInfoView(self::_NAVIGATION_INFO_VIEW_ID_PAGES);
	}

	public function i_getChainNavigationInfoView()
	{
		return $this->__getNavigationInfoView(self::_NAVIGATION_INFO_VIEW_ID_CHAIN);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getNavigationInfoView(int $aNavigationInfoViewId_int)
	{
		return $this->_fNavigationInfoView_clss_arr[$aNavigationInfoViewId_int] ?? ($this->_fNavigationInfoView_clss_arr[$aNavigationInfoViewId_int] = $this->__generateNavigationInfoView($aNavigationInfoViewId_int));
	}

	/*virtual*/protected function __generateNavigationInfoView(int $aNavigationInfoViewId_int):CCNavigationInfoView
	{
		$lNavigationInfoView_clss = null;

		switch ($aNavigationInfoViewId_int)
		{
			case self::_NAVIGATION_INFO_VIEW_ID_ADDITIONAL_PAGES:
			{
				$lNavigationInfoView_clss = $this->__generateAdditionalPagesNavigationInfoView();
			}break;
			
			case self::_NAVIGATION_INFO_VIEW_ID_CONTENTS:
			{
				$lNavigationInfoView_clss = $this->__generateContentsNavigationInfoView();
			}break;

			case self::_NAVIGATION_INFO_VIEW_ID_PAGES:
			{
				$lNavigationInfoView_clss = $this->__generatePagesNavigationInfoView();
			}break;

			case self::_NAVIGATION_INFO_VIEW_ID_CHAIN:
			{
				$lNavigationInfoView_clss = $this->__generateChainNavigationInfoView();
			}break;

			default:
				new CException('__generateNavigationInfoView', 'Unsupported navigation info view id: ' .$aNavigationInfoViewId_int);
			break;
		}

		return $lNavigationInfoView_clss;
	}

	/*virtual*/protected function __generateAdditionalPagesNavigationInfoView()
	{
		return new CCAdditionalPagesNavigationInfoView();
	}
	
	/*virtual*/protected function __generateContentsNavigationInfoView()
	{
		return new CCContentsNavigationInfoView();
	}
	
	/*virtual*/protected function __generatePagesNavigationInfoView()
	{
		return new CCPagesNavigationInfoView();
	}

	/*virtual*/protected function __generateChainNavigationInfoView()
	{
		return new CCChainNavigationInfoView();
	}
}


?>