<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


/*abstract*/class CCPageResponsesController
{
	private $_fPageResponseController_clss_arr = [];


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_update():void
	{
		$lPageId_str = $this->__getMainData()->i_getGETParamPageId();

		$this->__getPageResponseController($lPageId_str)->i_update();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}

	protected function __getPageResponseController(string $aPageId_str)
	{
		return $this->_fPageResponseController_clss_arr[$aPageId_str] ?? ($this->_fPageResponseController_clss_arr[$aPageId_str] = $this->__generatePageResponseController($aPageId_str));
	}

	/*virtual*/protected function __generatePageResponseController(string $aPageId_str):CCPageResponseController
	{
		$lPageResponseController_clss = null;

		switch ($aPageId_str)
		{
			case CCPageConst::i_PAGE_ID_ACCESS_ERROR:
			{
				$lPageResponseController_clss = new CCAccessErrorPageResponseController();
			}break;

			case CCPageConst::i_PAGE_ID_ACCESS_PROHIBITION:
			{
				$lPageResponseController_clss = new CCAccessProhibitionPageResponseController();
			}break;

			case CCPageConst::i_PAGE_ID_ACCESS_REQUIREMENT:
			{
				$lPageResponseController_clss = new CCAccessRequirementPageResponseController();
			}break;

			case CCPageConst::i_PAGE_ID_ACCESS_RESTRICTION:
			{
				$lPageResponseController_clss = new CCAccessRestrictionPageResponseController();
			}break;

			case CCPageConst::i_PAGE_ID_DEBUG:
			{
				$lPageResponseController_clss = new CCDebugPageResponseController();
			}break;

			case CCPageConst::i_PAGE_ID_ERROR_403:
			{
				$lPageResponseController_clss = new CCError403PageResponseController();
			}break;

			case CCPageConst::i_PAGE_ID_ERROR_404:
			{
				$lPageResponseController_clss = new CCError404PageResponseController();
			}break;

			case CCPageConst::i_PAGE_ID_MAIN:
			{
				$lPageResponseController_clss = $this->__generateMainPageResponseController();
			}break;

			case CCPageConst::i_PAGE_ID_PAYMENT:
			{
				$lPageResponseController_clss = new CCPaymentPageResponseController();
			}break;

			case CCPageConst::i_PAGE_ID_SUPPORT:
			{
				$lPageResponseController_clss = new CCSupportPageResponseController();
			}break;

			case CCPageConst::i_PAGE_ID_USER_REGISTRATION:
			{
				$lPageResponseController_clss = new CCUserRegistrationPageResponseController();
			}break;

			case CCPageConst::i_PAGE_ID_USER_AUTHORIZATION:
			{
				$lPageResponseController_clss = new CCUserAuthorizationResponseController();
			}break;

			case CCPageConst::i_PAGE_ID_EXTERNAL_REDIRECT:
			{
				$lPageResponseController_clss = new CCExternalRedirectPageResponseController();
			}break;

			default:
				new CException('__generatePageResponseController', 'Unsupported page id: ' .$aPageId_str);
			break;
		}

		return $lPageResponseController_clss;
	}

	//MAIN PAGE...
	/*virtual*/protected function __generateMainPageResponseController():CCPageResponseController
	{
		return new CCPageResponseController();
	}
	//...MAIN PAGE
}


?>