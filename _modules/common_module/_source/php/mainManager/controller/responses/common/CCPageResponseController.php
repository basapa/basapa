<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCPageResponseController
{
	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_update():void
	{
		$this->__update();
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

	protected function __getCookieData()
	{
		$lSiteId_str = $this->__getMainData()->i_getGetParamSiteId();

		return CFileManager::i_getInstance()->i_getFilesData()->i_getCookiesData()->i_getCookieData($lSiteId_str);
	}

	protected function __getHostData()
	{
		return $this->__getMainData()->i_getHostData();
	}

	protected function __getDatabaseData()
	{
		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		return CDatabaseManager::i_getInstance()->i_getDatabasesData()->i_getDatabaseData($lSiteId_str);
	}

	protected function __getDatabaseTablesController()
	{
		return CDatabaseManager::i_getInstance()->i_getDatabaseTablesController();
	}

	/*virtual*/protected function __update():void
	{
		/*if ($this->__getUserData()->isLogged() | need logging)
		{
			$this->__getHostData()->addCookie(CMainConst::COOKIE_EVENT_ID, CEventConst::REGISTRATION_NEED_LOGOUT);
			$this->__getMainData()->setRedirect(CPageConst::PAGE_ID_MAIN);
		}*/

		$this->_validateSupportedGETParams($this->__getSupportedGETParams());

		$this->__getMainData()->i_getHostData()->i_sendResponseHTTPStringCode($this->__getResponseHTTPCode());
	}

	/*virtual*/protected function __getSupportedGETParams():array
	{
		return [CCRequestParamConst::i_GET_PARAM_ID_SITE,
				CCRequestParamConst::i_GET_PARAM_ID_PAGE,
				CCRequestParamConst::i_GET_PARAM_ID_LANG,
				CCRequestParamConst::i_GET_PARAM_ID_LOCATION];
	}

	/*virtual*/protected function __getResponseHTTPCode():int
	{
		return CHostData::i_NATIVE_HTTP_CODE_OK;
	}

	private function _validateSupportedGETParams(array $aGETParamIds_str_arr, bool $aOptThrowIfNotSupported_bl = true):bool
	{
		$lGETParamIds_str_arr = $this->__getMainData()->i_getGETParamIds();

		$lCount_int = CArrayTools::i_count($lGETParamIds_str_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			if (!CArrayTools::i_isInArray($lGETParamIds_str_arr[$i], $aGETParamIds_str_arr))
			{
				if ($aOptThrowIfNotSupported_bl)
				{
					new CException('__validateSupportedGETParams', 'Unsupported GET param id: ' .$lGETParamIds_str_arr[$i]);
				}
				return false;
			}
		}
		return true;
	}
}


?>