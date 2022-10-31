<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


/*virtual*/class CCPagesSectionsView
{
	private $_fPageSectionView_clss_arr = [];


	/*public function __construct()
	{
		$this->_init();
	}*/
	
	/***************************************************
	 * INTERFACE
	 */

	public function i_getPageSectionView(string $aPageId_str)
	{
		return $this->__getPageSectionView($aPageId_str);
	}

	/*
	 * INTERFACE
	 ***************************************************/
	
	/*private function _init():void
	{
	}*/

	protected function __getPageSectionView(string $aPageId_str)
	{
		return $this->_fPageSectionView_clss_arr[$aPageId_str] ?? ($this->_fPageSectionView_clss_arr[$aPageId_str] = $this->__generatePageSectionView($aPageId_str));
	}

	/*virtual*/protected function __generatePageSectionView(string $aPageId_str):CCPageSectionView
	{
		$lPageSectionView_clss = null;

		switch ($aPageId_str)
		{
			case CCPageConst::i_PAGE_ID_ACCESS_ERROR:
			{
				$lPageSectionView_clss = new CCAccessErrorPageSectionView();
			}break;

			case CCPageConst::i_PAGE_ID_ACCESS_PROHIBITION:
			{
				$lPageSectionView_clss = new CCAccessProhibitionPageSectionView();
			}break;

			case CCPageConst::i_PAGE_ID_ACCESS_REQUIREMENT:
			{
				$lPageSectionView_clss = new CCAccessRequirementPageSectionView();
			}break;

			case CCPageConst::i_PAGE_ID_ACCESS_RESTRICTION:
			{
				$lPageSectionView_clss = new CCAccessRestrictionPageSectionView();
			}break;

			case CCPageConst::i_PAGE_ID_DEBUG:
			{
				$lPageSectionView_clss = new CCDebugPageSectionView();
			}break;

			case CCPageConst::i_PAGE_ID_ERROR_403:
			{
				$lPageSectionView_clss = new CCError403PageSectionView();
			}break;

			case CCPageConst::i_PAGE_ID_ERROR_404:
			{
				$lPageSectionView_clss = new CCError404PageSectionView();
			}break;

			case CCPageConst::i_PAGE_ID_MAIN:
			{
				$lPageSectionView_clss = $this->__generateMainPageSectionView();
			}break;

			case CCPageConst::i_PAGE_ID_PAYMENT:
			{
				$lPageSectionView_clss = new CCPaymentPageSectionView();
			}break;

			case CCPageConst::i_PAGE_ID_SUPPORT:
			{
				$lPageSectionView_clss = new CCSupportPageSectionView();
			}break;

			case CCPageConst::i_PAGE_ID_USER_REGISTRATION:
			{
				$lPageSectionView_clss = new CCUserRegistrationPageSectionView();
			}break;

			case CCPageConst::i_PAGE_ID_USER_AUTHORIZATION:
			{
				$lPageSectionView_clss = new CCUserAuthorizationPageSectionView();
			}break;

			case CCPageConst::i_PAGE_ID_EXTERNAL_REDIRECT:
			{
				$lPageSectionView_clss = new CCExternalRedirectPageSectionView();
			}break;

			default:
				new CException('__generatePageSectionView', 'Unsupported page id: ' .$aPageId_str);
			break;
		}

		return $lPageSectionView_clss;
	}

	//MAIN PAGE...
	/*virtual*/protected function __generateMainPageSectionView():CCMainPageSectionView
	{
		return new CCMainPageSectionView();
	}
	//...MAIN PAGE
}


?>