<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:0
*/
namespace basapa_ns;


final class CMainManager
{
	static private $_fInstance_clss;

	private $_fMainController_clss;
	private $_fMainData_clss;


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

	public function i_getMainData()
	{
		return $this->_getMainData();
	}

	public function i_getMainController()
	{
		return $this->_getMainController();
	}

	public function i_run():void
	{
		try
		{
			CSystem::i_getInstance()->i_setAppStartTimeInMSec(CDateTimeTools::i_getCurrentUTimeInMSec());

			if (SOURCES_EXECUTION_MODE === SOURCES_EXECUTION_MODE_DEBUG)
			{
				CLogFile::i_writeContentInLogFile('START PAGE: ' .$this->_getHostData()->i_getCurrentURL());
			}

			$this->_setSystemSettings();

			$this->_updateSiteIdGETParam();

			$lMainData_clss = $this->_getMainData();
			__CEntry::i_importCustomFiles($lMainData_clss->i_getGETParamSiteId());

			CClassFactory::i_getInstance();

			$this->_updateGETParams();
			$this->_updatePOSTParams();
			$this->_updateFILESParams();

			$this->_updateCookieParamsIfRequired();
			$this->_updateSessionParamsIfRequired();

			if ($lMainData_clss->i_isGETParamAjaxRequestDefined())
			{
				$this->_getAjaxManager()->i_getAjaxesController()->i_update();
			}
			else if ($lMainData_clss->i_isGETParamScheduleRequestDefined())
			{
				$this->_getScheduleManager()->i_getSchedulesController()->i_update();
			}
			else
			{
				$this->_getMainController()->i_update();

				$this->_getFileManager()->i_getXMLFilesController()->i_update();

				$lViewManager_clss = $this->_getViewManager();
				$lViewManager_clss->i_update();
				$lViewManager_clss->i_draw();
			}

			if (SOURCES_EXECUTION_MODE === SOURCES_EXECUTION_MODE_DEBUG)
			{
				CLogFile::i_writeContentInLogFile('STOP PAGE');
				CLogFile::i_writeContentInLogFile('==========');
			}
		}
		catch (\Exception $aException_clss)
		{
			$this->_processException($aException_clss);
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getMainController()
	{
		return isset($this->_fMainController_clss) ? $this->_fMainController_clss : ($this->_fMainController_clss = new CMainController());
	}

	private function _getMainData()
	{
		return isset($this->_fMainData_clss) ? $this->_fMainData_clss : ($this->_fMainData_clss = new CMainData());
	}

	private function _getHostData()
	{
		return $this->_getMainData()->i_getHostData();
	}

	private function _getCookiesData()
	{
		return CFileManager::i_getInstance()->i_getFilesData()->i_getCookiesData();
	}

	private function _getSessionsData()
	{
		return CFileManager::i_getInstance()->i_getFilesData()->i_getSessionsData();
	}

	private function _getViewManager()
	{
		return CViewManager::i_getInstance();
	}

	private function _getAjaxManager()
	{
		return CAjaxManager::i_getInstance();
	}

	private function _getScheduleManager()
	{
		return CScheduleManager::i_getInstance();
	}

	private function _getFileManager()
	{
		return CFileManager::i_getInstance();
	}

	private function _getHtaccessManager()
	{
		return CHtaccessManager::i_getInstance();
	}
	
	private function _setSystemSettings():void
	{
		$lSystem_clss = CSystem::i_getInstance();
		$lSystem_clss->i_setAppPHPScriptEncoding(CMainConst::i_DEFAULT_ENCODING_TYPE);
		$lSystem_clss->i_setAppPHPScriptMaxExecutionTime(CDateTimeTools::i_TIME_UNIT_VALUE_HALF_MINUTES);

		$lParams_a_arr	= [	CSystem::i_APP_PARAM_ID_SESSION_NAME		=> CCCookieData::i_COOKIE_PARAM_ID_SESSION_ID,
							CSystem::i_APP_PARAM_ID_SESSION_SAVE_PATH	=> '../sessions/' .PROJECT_NAME,
							CSystem::i_APP_PARAM_ID_SESSION_LIFE_TIME	=> CVariableTools::i_toString(CFilesConst::i_LIFE_TIME_HALF_HOUR),
							CSystem::i_APP_PARAM_ID_COOKIE_DOMAIN		=> SITE_NAME,
							CSystem::i_APP_PARAM_ID_COOKIE_SAVE_PATH	=> '/',
							CSystem::i_APP_PARAM_ID_COOKIE_LIFE_TIME	=> CVariableTools::i_toString(CFilesConst::i_LIFE_TIME_NONE),
							CSystem::i_APP_PARAM_ID_TIME_ZONE			=> CSystem::i_TIME_ZONE_ASIA_NOVOSIBIRSK];
		CSystem::i_setAppParams($lParams_a_arr);

		//header('Expires: Mon, 01 Jul 2000 00:00:00 GMT');
		header('Cache-Control: public, proxy-revalidate, must-revalidate, max-age=0');//----
		//header('Last-Modified: ' .gmdate("D, d M Y H:i:s \G\M\T", CTime::getInstance()->getCurrentTimeInSec() - mt_rand(2000, 10000)));
	}

	private function _updateSiteIdGETParam():void
	{
		$lMainData_clss = $this->_getMainData();
		$lHostData_clss = $this->_getHostData();
		$lServerParamRequestURI_str = $lHostData_clss->i_getServerParamRequestURI();

		$lSubdomainName_var = CURLTools::i_getSubdomainName($lServerParamRequestURI_str, false);
		$lSiteId_str = $lSubdomainName_var ?? CSiteConst::i_SITE_ID_DEFAULT;

		$lMainData_clss->i_setGETParam(CCRequestParamConst::i_GET_PARAM_ID_SITE, $lSiteId_str);
	}

	private function _updateGETParams():void
	{
		$this->_updateStaticGETParams();
		$this->_updateDynamicGETParams();

		//var_dump($this->_getMainData()->i_getGETParams());
	}

	private function _updateStaticGETParams():void
	{
		$lMainData_clss = $this->_getMainData();
		$lHostData_clss = $this->_getHostData();
		$lServerParamRequestURI_str = $lHostData_clss->i_getServerParamRequestURI();
		
		$lStaticURL_str = CURLTools::i_getStaticURLString($lServerParamRequestURI_str);
		$lStaticURL_str = CStringTools::i_trim($lStaticURL_str, '/');
		
		$lStaticURLValues_str_arr = !empty($lStaticURL_str) ? CStringTools::i_split($lStaticURL_str, '/') : [];

		$lSiteId_str = $this->_getMainData()->i_getGETParamSiteId();

		$lStaticURLParamIds_str_arr = $this->_getHtaccessManager()->i_getHtaccessesController()->i_getHtaccessesController($lSiteId_str)->i_getURLRewritingHtaccessController()->i_determineStaticGETParamIdsStruct($lStaticURLValues_str_arr);
		
		$lStaticURLParamsCount_int = CArrayTools::i_count($lStaticURLParamIds_str_arr);
		for ($i = 0; $i < $lStaticURLParamsCount_int; $i++)
		{
			$lMainData_clss->i_setGETParam($lStaticURLParamIds_str_arr[$i], $lStaticURLValues_str_arr[$i]);
		}

		//MANDATORY GET PARAMS...
		if (!$lMainData_clss->i_isGETParamPageIdDefined())
		{
			$lMainData_clss->i_setGETParam(CCRequestParamConst::i_GET_PARAM_ID_PAGE, CCPageConst::i_PAGE_ID_DEFAULT);
		}

		if (!$lMainData_clss->i_isGETParamLangIdDefined())
		{
			$lMainData_clss->i_setGETParam(CCRequestParamConst::i_GET_PARAM_ID_LANG, CCLangConst::i_LANG_ID_DEFAULT);
		}

		if (!$lMainData_clss->i_isGETParamLocationIdDefined())
		{
			$lMainData_clss->i_setGETParam(CCRequestParamConst::i_GET_PARAM_ID_LOCATION, CCLocationConst::i_LOCATION_ID_DEFAULT);//deprecated
		}
		//...MANDATORY GET PARAMS
	}

	private function _updateDynamicGETParams():void
	{
		foreach (CMainData::i_getNativeGETParams() as $lName_str => $lValue_str)
		{
			$this->_getMainData()->i_setGETParam($lName_str, $lValue_str);
		}

		//if (!$this->_getMainData()->getParam(CParamConst::SITE))
		//{
		/*$lRequest_str = $this->_getMainData()->param(CParamConst::REQUEST);
		if ($lRequest_str && in_array($lRequest_str, CRequestConst::$COMMON_REQUESTS))
		{
			$this->_getMainData()->setParam(CParamConst::SITE, CSiteConst::SITE_MAIN);
		}*/
		//}

		/*if (empty($_GET) && $this->_getHostData()->getRequestUri() != '/')
		{
			new CException(CException::ERROR_TYPE_UNSUPPORTED_VALUE, '_updateGETParams', $_GET, CMainConst::ERROR_TYPE_404);
		}*/

		//$this->_setSiteParamByRequest();
	}

	private function _updatePOSTParams():void
	{
		//var_dump(CMainData::i_getNativePOSTParams());

		$lMainData_clss = $this->_getMainData();

		foreach (CMainData::i_getNativePOSTParams() as $lName_str => $lValue_var)
		{
			/*switch ($aName_str)
			{
				default:
					new CException('_updatePOSTParams', 'Unsupported POST param name: ' .$aName_str);
				break;
			}*/

			$lMainData_clss->i_setPOSTParam($lName_str, $lValue_var);
		}
	}

	private function _updateFILESParams():void
	{
		$lMainData_clss = $this->_getMainData();

		foreach (CMainData::i_getNativeFILESParams() as $lName_str => $lValue_str)
		{
			/*switch ($aName_str)
			{
				default:
					new CException('_updateFILESParams', 'Unsupported FILES param name: ' .$aName_str);
				break;
			}*/

			$lMainData_clss->i_setFILESParam($lName_str, $lValue_str);
		}
	}

	private function _updateCookieParamsIfRequired():void
	{
		$lSiteId_str = $this->_getMainData()->i_getGETParamSiteId();
		$lCookieData_clss = $this->_getCookiesData()->i_getCookieData($lSiteId_str);

		if (!$lCookieData_clss->i_isCookieAvailable())
		{
			return;
		}

		/*foreach ($lCookieData_clss->i_getCookieParams() as $lName_str => $lValue_str)
		{
			switch ($lName_str)
			{
				case CCCookieData::i_COOKIE_PARAM_ID_EVENT_ID:
				{
					//$this->_getMainData()->getEventsData()->getEventData($lSiteId_str)->addEventId($aValue_str);
					$lCookieData_clss->i_clearCookieParam($lName_str);
				}break;

				case CCCookieData::i_COOKIE_PARAM_ID_USER_ID:
				case CCCookieData::i_COOKIE_PARAM_ID_USER_HASH:
				{
				}break;

				default:
					new CException('_updateCookieParams', 'Unsupported cookie name: ' .$lName_str);
				break;
			}
		}*/
	}

	private function _updateSessionParamsIfRequired():void
	{
		$lSiteId_str = $this->_getMainData()->i_getGETParamSiteId();
		$lSessionData_clss = $this->_getSessionsData()->i_getSessionData($lSiteId_str);

		if (!$lSessionData_clss->i_isSessionAvailable())
		{
			return;
		}

		$lSessionData_clss->i_startSession();

		/*foreach ($lSessionData_clss->i_getSessionParams() as $lName_str => $lValue_str)
		{
			switch ($lName_str)
			{
				default:
					new CException('_updateSessionParamsIfRequired', 'Unsupported session name: ' .$lName_str);
				break;
			}
		}*/
	}

	private function _setSiteParamByRequest():void
	{
		/*$lRequest_str = $this->_getMainData()->getParam(CParamConst::REQUEST_AJAX);
		if ($lRequest_str && in_array($lRequest_str, CAjaxConst::$CUSTOM_JOB_REQUESTS))
		{
			$this->_getMainData()->setParam(CParamConst::SITE, CSiteConst::SITE_JOB);
		}

		$lRequest_str = $this->_getMainData()->getParam(CParamConst::REQUEST_SCHEDULE);
		if ($lRequest_str && in_array($lRequest_str, CScheduleConst::$CUSTOM_JOB_REQUESTS))
		{
			$this->_getMainData()->setParam(CParamConst::SITE, CSiteConst::SITE_JOB);
		}*/
	}

	private function _processException(\Exception $aException_clss):void
	{
		$lMainData_clss = $this->_getMainData();
		$lHostData_clss = $lMainData_clss->i_getHostData();

		//CLog::i_addMessage('URL: ' .$lHostData_clss->i_getCurrentURL());
		//CLog::i_addMessage('USER AGENT: ' .$lHostData_clss->i_getServerParamValueHttpUserAgent());
		//CLog::i_addMessage('REQUEST URI: ' .$lHostData_clss->i_getServerParamValueRequestUri());

		$lError_str = '<br>File: [' .$aException_clss->getFile(). ']<br>Line: [' .$aException_clss->getLine(). ']<br>Message: [' .$aException_clss->getMessage(). ']';

		//CLog::i_addMessage($lError_str);
		//CLog::i_addSeparator();
		//CLog::i_addEmptyString();

		if (SOURCES_EXECUTION_MODE === SOURCES_EXECUTION_MODE_DEBUG)
		{
			$lStackTrace_str = $lError_str. '<br>Trace: ' .$aException_clss->getTraceAsString();

			CLogFile::i_writeContentInLogFile($lStackTrace_str);

			echo $lStackTrace_str;
		}
		else //if (SOURCES_EXECUTION_MODE == SOURCES_EXECUTION_MODE_RELEASE)
		{
			if (CVariableTools::i_isClassInstance($aException_clss, 'CException'))
			{
				$aException_clss = CException::i_toClassType($aException_clss);

				$lExceptionType_int = $aException_clss->i_getExceptionType();
				switch ($lExceptionType_int)
				{
					case CException::i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR:
					case CException::i_EXCEPTION_TYPE_EXTERNAL_LOGIC_ERROR:
					{
						exit;
					}break;

					case CException::i_EXCEPTION_TYPE_UNSUPPORTED_PAGE:
					{
						$lStaticParams_a_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE	=> CSiteConst::i_SITE_ID_JOB,
													CCRequestParamConst::i_GET_PARAM_ID_PAGE	=> CCPageConst::i_PAGE_ID_ERROR_404];
						$lHostData_clss->i_sendRedirect($lStaticParams_a_arr, null, CHostData::i_REDIRECT_TYPE_404);
					}break;

					default:
						$lStaticParams_a_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE	=> CSiteConst::i_SITE_ID_JOB,
													CCRequestParamConst::i_GET_PARAM_ID_PAGE	=> CCPageConst::i_PAGE_ID_UNKNOWN_ERROR];
						$lHostData_clss->i_sendRedirect($lStaticParams_a_arr, null, CHostData::i_REDIRECT_TYPE_500);
					break;
				}
			}
		}
	}
}


?>