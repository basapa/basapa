<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


/*virtual*/class CCInfosView
{
	//IDS...
	private const _INFO_VIEW_ID_DEBUG					= 0;
	private const _INFO_VIEW_ID_ERROR_403				= 1;
	private const _INFO_VIEW_ID_ERROR_404				= 2;
	private const _INFO_VIEW_ID_ACCESS_ERROR			= 3;
	private const _INFO_VIEW_ID_ACCESS_PROHIBITION		= 4;
	private const _INFO_VIEW_ID_ACCESS_REQUIREMENT		= 5;
	private const _INFO_VIEW_ID_ACCESS_RESTRICTION		= 6;
	private const _INFO_VIEW_ID_SITE_CAPTION			= 7;
	private const _INFO_VIEW_ID_SITE_COPYRIGHT			= 8;
	private const _INFO_VIEW_ID_SITE_DESCRIPTION		= 9;
	private const _INFO_VIEW_ID_SITE_DONATION			= 10;
	private const _INFO_VIEW_ID_EXTERNAL_REDIRECT		= 11;
	protected const __INFO_VIEWS_COUNT					= 12;
	//...IDS

	private $_fInfoView_clss_arr = [];
	
	private $_fNavigationsInfoView_clss;
	private $_fPanelsInfoView_clss;
	private $_fSortingsInfoView_clss;


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getNavigationsInfoView()
	{
		return $this->_getNavigationsInfoView();
	}
	
	public function i_getPanelsInfoView()
	{
		return $this->_getPanelsInfoView();
	}

	public function i_getSortingsInfoView()
	{
		return $this->_getSortingsInfoView();
	}

	public function i_getDebugInfoView()
	{
		return $this->__getInfoView(self::_INFO_VIEW_ID_DEBUG);
	}

	public function i_getError403InfoView()
	{
		return $this->__getInfoView(self::_INFO_VIEW_ID_ERROR_403);
	}

	public function i_getError404InfoView()
	{
		return $this->__getInfoView(self::_INFO_VIEW_ID_ERROR_404);
	}

	public function i_getAccessErrorInfoView()
	{
		return $this->__getInfoView(self::_INFO_VIEW_ID_ACCESS_ERROR);
	}

	public function i_getAccessProhibitionInfoView()
	{
		return $this->__getInfoView(self::_INFO_VIEW_ID_ACCESS_PROHIBITION);
	}

	public function i_getAccessRequirementInfoView()
	{
		return $this->__getInfoView(self::_INFO_VIEW_ID_ACCESS_REQUIREMENT);
	}

	public function i_getAccessRestrictionInfoView()
	{
		return $this->__getInfoView(self::_INFO_VIEW_ID_ACCESS_RESTRICTION);
	}

	public function i_getSiteCaptionInfoView()
	{
		return $this->__getInfoView(self::_INFO_VIEW_ID_SITE_CAPTION);
	}

	public function i_getSiteCopyrightInfoView()
	{
		return $this->__getInfoView(self::_INFO_VIEW_ID_SITE_COPYRIGHT);
	}

	public function i_getSiteDescriptionInfoView()
	{
		return $this->__getInfoView(self::_INFO_VIEW_ID_SITE_DESCRIPTION);
	}

	public function i_getSiteDonationInfoView()
	{
		return $this->__getInfoView(self::_INFO_VIEW_ID_SITE_DONATION);
	}

	public function i_getExternalRedirectInfoView()
	{
		return $this->__getInfoView(self::_INFO_VIEW_ID_EXTERNAL_REDIRECT);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getInfoView(int $aInfoViewId_int)
	{
		return $this->_fInfoView_clss_arr[$aInfoViewId_int] ?? ($this->_fInfoView_clss_arr[$aInfoViewId_int] = $this->__generateInfoView($aInfoViewId_int));
	}

	/*virtual*/protected function __generateInfoView(int $aInfoViewId_int):CCInfoView
	{
		$lInfoView_clss = null;

		switch ($aInfoViewId_int)
		{
			case self::_INFO_VIEW_ID_DEBUG:
			{
				$lInfoView_clss = new CCDebugInfoView();
			}break;

			case self::_INFO_VIEW_ID_ERROR_403:
			{
				$lInfoView_clss = new CCError403InfoView();
			}break;

			case self::_INFO_VIEW_ID_ERROR_404:
			{
				$lInfoView_clss = new CCError404InfoView();
			}break;

			case self::_INFO_VIEW_ID_ACCESS_ERROR:
			{
				$lInfoView_clss = new CCAccessErrorInfoView();
			}break;

			case self::_INFO_VIEW_ID_ACCESS_PROHIBITION:
			{
				$lInfoView_clss = new CCAccessProhibitionInfoView();
			}break;

			case self::_INFO_VIEW_ID_ACCESS_REQUIREMENT:
			{
				$lInfoView_clss = new CCAccessRequirementInfoView();
			}break;

			case self::_INFO_VIEW_ID_ACCESS_RESTRICTION:
			{
				$lInfoView_clss = new CCAccessRestrictionInfoView();
			}break;

			case self::_INFO_VIEW_ID_SITE_CAPTION:
			{
				$lInfoView_clss = new CCSiteCaptionInfoView();
			}break;

			case self::_INFO_VIEW_ID_SITE_COPYRIGHT:
			{
				$lInfoView_clss = new CCSiteCopyrightInfoView();
			}break;

			case self::_INFO_VIEW_ID_SITE_DESCRIPTION:
			{
				$lInfoView_clss = new CCSiteDescriptionInfoView();
			}break;

			case self::_INFO_VIEW_ID_SITE_DONATION:
			{
				$lInfoView_clss = new CCSiteDonationInfoView();
			}break;

			case self::_INFO_VIEW_ID_EXTERNAL_REDIRECT:
			{
				$lInfoView_clss = new CCExternalRedirectInfoView();
			}break;

			default:
				new CException('__generateInfoView', 'Unsupported info view id: ' .$aInfoViewId_int);
			break;
		}

		return $lInfoView_clss;
	}

	private function _getNavigationsInfoView()
	{
		return $this->_fNavigationsInfoView_clss ?? ($this->_fNavigationsInfoView_clss = $this->__generateNavigationsInfoView());
	}
	
	private function _getPanelsInfoView()
	{
		return $this->_fPanelsInfoView_clss ?? ($this->_fPanelsInfoView_clss = $this->__generatePanelsInfoView());
	}

	private function _getSortingsInfoView()
	{
		return $this->_fSortingsInfoView_clss ?? ($this->_fSortingsInfoView_clss = $this->__generateSortingsInfoView());
	}

	/*virtual*/protected function __generateNavigationsInfoView()
	{
		return new CCNavigationsInfoView();
	}
	
	/*virtual*/protected function __generatePanelsInfoView()
	{
		return new CCPanelsInfoView();
	}

	/*virtual*/protected function __generateSortingsInfoView()
	{
		return new CCSortingsInfoView();
	}
}


?>