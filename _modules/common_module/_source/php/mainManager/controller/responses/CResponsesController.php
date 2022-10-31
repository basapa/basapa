<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CResponsesController
{
	private $_fPageResponsesController_clss_arr;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_update():void
	{
		$lSiteId_str = $this->_getMainData()->i_getGETParamSiteId();
		
		$this->i_getPageResponsesController($lSiteId_str)->i_update();
	}

	/*public function i_getMainPageResponsesController():CMPageResponsesController
	{
		return $this->_getPageResponsesController(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBPageResponsesController():CJOBPageResponsesController
	{
		return $this->_getPageResponsesController(CSiteConst::i_SITE_ID_JOB);
	}

	public function i_getPageResponsesController(string $aSiteId_str):CCPageResponsesController
	{
		return $this->_getPageResponsesController($aSiteId_str);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}
	
	private function _getPageResponsesController(string $aSiteId_str)
	{
		if (!isset($this->_fPageResponsesController_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMPageResponsesController();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBPageResponsesController();
				}break;

				default:
					new CException('_getPageResponsesController', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fPageResponsesController_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fPageResponsesController_clss_arr[$aSiteId_str];
	}
	

/*
	protected function __getDatabaseData()
	{
		return CDatabaseData::getInstance();
	}

	protected function __getUserData()
	{
		return CUserData::getInstance();
	}

	protected function __getHostData()
	{
		return CHostData::getInstance();
	}

	protected function __getCustomDatabaseData()
	{
		new CAbstractException('__getCustomDatabaseData');
	}

	protected function __getAvailableCommonPages()
	{
		return CPageConst::$AVAILABLE_COMMON_PAGES;
	}

	protected function __getErrorPages()
	{
		return CPageConst::$ERROR_PAGES;
	}

	private function _getCustomResponsesController()
	{
		return isset($this->_fCustomResponsesController_clss) ? $this->_fCustomResponsesController_clss : ($this->_fCustomResponsesController_clss = new CCustomResponsesController());
	}
*/
	/*private function _updateUserData()
	{
		$lPageId_str = $this->__getMainData()->getParam(CParamConst::PAGE_ID);
		$lErrorPages_str_arr = $this->__getErrorPages();*/
		/*if (in_array($lPageId_str, $lErrorPages_str_arr))
		{
			return;
		}*/

		/*$lHostData_clss = $this->__getHostData();
		$lCookieParamValueUserId_int = $lHostData_clss->getCookieParamValue(CMainConst::COOKIE_USER_ID);
		$lCookieParamValueUserHash_str = $lHostData_clss->getCookieParamValue(CMainConst::COOKIE_USER_HASH);
		if (empty($lCookieParamValueUserId_int)
			|| empty($lCookieParamValueUserHash_str))
		{
			new CException('_updateUserData', 'Cookie data must be not empty!');
		}

		if ($lHostData_clss->isSessionNameDefined())
		{
			$lHostData_clss->startSession();

			$lSessionParamValueUserId_int = $lHostData_clss->getSessionParamValue(CMainConst::SESSION_USER_ID);
			$lSessionParamValueUserHash_str = $lHostData_clss->getSessionParamValue(CMainConst::SESSION_USER_HASH);

			if ($lCookieParamValueUserId_int !== $lSessionParamValueUserId_int
				|| $lCookieParamValueUserHash_str !== $lSessionParamValueUserHash_str)
			{
				new CException('_updateUserData', 'Cookies and sessions data must be equal!');
			}
		}
		else
		{
			//CPageResponseControllerBase::getUserResponseController()->getDataById($lCookieParamValueUserId_int);

			$lUserData_arr = $this->__getDatabaseData()->getUserData(CDatabaseData::TYPE_USER_DATA_BY_ID);
			if (!isset($lUserData_arr))
			{
				new CException('_updateUserData', 'User data must be defined!');
			}

			$lUserHash_str = $lUserData_arr[CDatabaseConst::TABLE_USER_HASH];
			$lUserId_str = $lUserData_arr[CDatabaseConst::TABLE_USER_ID];
			$lUserLogin_str = $lUserData_arr[CDatabaseConst::TABLE_USER_LOGIN];
			$lUserType_str = $lUserData_arr[CDatabaseConst::TABLE_USER_TYPE];
			$lUserState_str = $lUserData_arr[CDatabaseConst::TABLE_USER_STATE];

			if ($lCookieParamValueUserId_int !== $lUserId_str
				|| $lCookieParamValueUserHash_str !== $lUserHash_str)
			{
				new CException('_updateUserData', 'User data and cookies must be equal!');
			}

			$lHostData_clss->startSession();
			$lHostData_clss->insertSessionParam(CMainConst::SESSION_USER_ID, $lUserId_str);
			$lHostData_clss->insertSessionParam(CMainConst::SESSION_USER_HASH, $lUserHash_str);
			$lHostData_clss->insertSessionParam(CMainConst::SESSION_USER_LOGIN, $lUserLogin_str);
			$lHostData_clss->insertSessionParam(CMainConst::SESSION_USER_TYPE, $lUserType_str);
			$lHostData_clss->insertSessionParam(CMainConst::SESSION_USER_STATE, $lUserState_str);
		}

		$lUserData_clss = $this->__getUserData();
		$lUserData_obj_arr	= array(CMainConst::SESSION_USER_ID		=> $lHostData_clss->getSessionParamValue(CMainConst::SESSION_USER_ID),
			CMainConst::SESSION_USER_HASH	=> $lHostData_clss->getSessionParamValue(CMainConst::SESSION_USER_HASH),
			CMainConst::SESSION_USER_LOGIN	=> $lHostData_clss->getSessionParamValue(CMainConst::SESSION_USER_LOGIN),
			CMainConst::SESSION_USER_TYPE	=> $lHostData_clss->getSessionParamValue(CMainConst::SESSION_USER_TYPE),
			CMainConst::SESSION_USER_STATE	=> $lHostData_clss->getSessionParamValue(CMainConst::SESSION_USER_STATE));
		$lUserData_clss->updateData($lUserData_obj_arr);

		if ($lUserData_clss->isAccessDenied())
		{
			new CException('_updateUserData', 'User is banned!');
		}
	}*/

	//private function _validateUserAgentInfo()
	//{
		/*$lHostData_clss = $this->__getHostData();
		$lHostData_clss->validateBotUserAgent();

		if (!$lHostData_clss->getCookie(CMainConst::COOKIE_BROWSER_INFO))
		{
			$lBrowserInfo_str = $lHostData_clss->getBrowserUserAgent();
			$lHostData_clss->addCookie(CMainConst::COOKIE_BROWSER_INFO, $lBrowserInfo_str);

			if ($lBrowserInfo_str == CHostData::USER_AGENT_UNSUPPORTED)
			{
				throw new Exception('Access limited', CMainConst::ERROR_TYPE_ACCESS_LIMITED);
			}
		}*/
	//}
/*
	private function _setAntiSpamCookieIfRequired()
	{
		$lHostData_clss = $this->__getHostData();
		$lCookieParamValueAntiSpam_str = $lHostData_clss->getCookieParamValue(CMainConst::COOKIE_ANTI_SPAM);
		if (empty($lCookieParamValueAntiSpam_str))
		{
			$lHostData_clss->setCookieParam(CMainConst::COOKIE_ANTI_SPAM, CTools::generateSecureKey());
		}
	}
*/
	/*protected function __update()
	{
		$lPageId_str = $this->__getMainData()->getParam(CParamConst::PAGE_ID);
*/
		/*$lAvailableCommonPages_str_arr = $this->__getAvailableCommonPages();
		if (!in_array($lPageId_str, $lAvailableCommonPages_str_arr))
		{
			throw new Exception('Page not available: ' .$lPageId_str, CMainConst::ERROR_TYPE_404);
		}*/
/*
		switch ($lPageId_str)
		{
			case CPageConst::PAGE_ID_MAIN:
			{
				$this->_getMainResponseController()->update();
			}break;

			case CPageConst::PAGE_ID_USER:
			{
				$this->_getUserResponseController()->update();
			}break;

			case CPageConst::PAGE_ID_ADMIN:
			{
				$this->_getAdminResponseController()->update();
			}break;

			case CPageConst::PAGE_ID_AUTHORIZATION:
			{
				$this->_getAuthorizationResponseController()->update();
			}break;

			case CPageConst::PAGE_ID_REGISTRATION:
			{
				$this->_getRegistrationResponseController()->update();
			}break;

			case CPageConst::PAGE_ID_SELECT_CITY:
			{
				$this->_getSelectCityResponseController()->update();
			}break;

			case CPageConst::PAGE_ID_SITEMAP:
			{
				$this->_getSitemapResponseController()->update();
			}break;

			case CPageConst::PAGE_ID_VERIFICATION:
			{
				$this->_getVerificationResponseController()->update();
			}break;

			case CPageConst::PAGE_ID_RECOVERY_PASSWORD:
			{
				$this->_getRecoveryPasswordResponseController()->update();
			}break;

			case CPageConst::PAGE_ID_PROMOTION:
			{
				$this->_getPromotionResponseController()->update();
			}break;

			case CPageConst::PAGE_ID_RULES:
			{
				$this->_getRulesResponseController()->update();
			}break;

			case CPageConst::PAGE_ID_SUPPORT:
			{
				$this->_getSupportResponseController()->update();
			}break;

			case CPageConst::PAGE_ID_REQUIREMENTS:
			{
				$this->_getRequirementsResponseController()->update();
			}break;

			case CPageConst::PAGE_ID_ADD_ADVERT:
			{
				$this->_getAddAdvertResponseController()->update();
			}break;

			case CPageConst::PAGE_ID_ACCESS_PROHIBITION:
			{
				$this->_getAccessProhibitionResponseController()->update();
			}break;

			case CPageConst::PAGE_ID_ACCESS_RESTRICTION:
			{
				$this->_getAccessRestrictionResponseController()->update();
			}break;

			case CPageConst::PAGE_ID_ACCESS_REQUIREMENT:
			{
				$this->_getAccessRequirementResponseController()->update();
			}break;

			case CPageConst::PAGE_ID_ACCESS_ERROR:
			{
				$this->_getAccessErrorResponseController()->update();
			}break;

			case CPageConst::PAGE_ID_ERROR_404:
			{
				$this->_getError404ResponseController()->update();
			}break;

			case CPageConst::PAGE_ID_ERROR_403:
			{
				$this->_getError403ResponseController()->update();
			}break;

			case CPageConst::PAGE_ID_DEBUG:
			{
				$this->_getDebugResponseController()->update();
			}break;

			default:
				new CException('__update', 'Unsupported common page: ' .$lPageId_str);
				break;
		}
	}*/
}


?>