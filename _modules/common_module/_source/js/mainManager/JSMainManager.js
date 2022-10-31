/*CLASS PATTERN VERSION: 1.1*/
bsp.i_getNamespace('bsp.main_manager_ns').i_importJSMainManagerClass = function()
{
	var _ns = bsp.main_manager_ns;
	if (_ns.JSMainManager)
	{
		return _ns.JSMainManager;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSMainManager = function()
	{
		___constructor.apply(this, arguments);
	};
	var _self = _ns.JSMainManager;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSMainManager();
	};

	var _static_public_const = _self;
	var _static_private_const = _self;
	var _static_public = _self;
	var _static_private = _self;
	var _public = _prototype;
	var _protected = _prototype;
	var _private = _prototype;
	var _internal = _prototype;
	var _virtual_public = _prototype;
	var _override_public = _prototype;
	var _virtual_protected = _prototype;
	var _override_protected = _prototype;

	//IMPORTS...
	var JSMainData = bsp.main_manager_ns.model_ns.i_importJSMainDataClass();
	//...IMPORTS

	//CONST PUBLIC...
	//...CONST PUBLIC

	//CONST PRIVATE...
	//...CONST PRIVATE

	//STATIC PUBLIC...
	//...STATIC PUBLIC

	//STATIC PRIVATE...
	//...STATIC PRIVATE

	//VARS...
	_private._fMainData_clss = null;
	//...VARS

	_private._initJSMainManager = function()
	{
	};

	//PUBLIC...
	_public.i_getMainData = function()
	{
		return this._fMainData_clss || this._initMainData();
	};

	_public.i_run = function()
	{
		//CSystem::i_getInstance()->i_setAppStartTimeInMSec(CDateTimeTools::i_getCurrentUTimeInMSec());

	//	$this->_setSystemSettings();

		//$this->_updateSiteIdGETParam();

		//$lMainData_clss = $this->_getMainData();
		//__CMain::i_importCustomFiles($lMainData_clss->i_getGETParamSiteId());

		//CClassFactory::i_getInstance();

		//$this->_updateGETParams();
		//$this->_updatePOSTParams();
		//$this->_updateFILESParams();

		this._updateCookieParams();
		//$this->_updateSessionParamsIfRequired();
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	_private._initMainData = function()
	{
		var l_clss = new JSMainData();
		this._fMainData_clss = l_clss;
		return l_clss;
	};

	_private._updateSiteIdGETParam = function()
	{
		/*$lMainData_clss = $this->_getMainData();
		$lHostData_clss = $this->_getHostData();
		$lServerParamRequestURI_str = $lHostData_clss->i_getServerParamRequestURI();

		$lSubdomainName_var = CURLTools::i_getSubdomainName($lServerParamRequestURI_str, false);
		$lSiteId_str = $lSubdomainName_var ?? CSiteConst::i_SITE_ID_DEFAULT;

		$lMainData_clss->i_setGETParam(CCRequestParamConst::i_GET_PARAM_ID_SITE, $lSiteId_str);*/
	};

	_private._updateGETParams = function()
	{
		//this._updateStaticGETParams();
		//this._updateDynamicGETParams();

		//console.log(this._getMainData().i_getGETParams());
	};

	_private._updateStaticGETParams = function()
	{
		/*$lMainData_clss = $this->_getMainData();
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
		}*/
		//...MANDATORY GET PARAMS
	};

	_private._updateDynamicGETParams = function()
	{
		/*foreach (CMainData::i_getNativeGETParams() as $aName_str => $aValue_str)
		{
			$this->_getMainData()->i_setGETParam($aName_str, $aValue_str);
		}*/

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
	};

	_private._updatePOSTParams = function()
	{
		/*$lMainData_clss = $this->_getMainData();

		foreach (CMainData::i_getNativePOSTParams() as $aName_str => $aValue_str)
		{*/
			/*switch ($aName_str)
			{
				default:
					new CException('_updatePOSTParams', 'Unsupported POST param name: ' .$aName_str);
				break;
			}*/

			//$lMainData_clss->i_setPOSTParam($aName_str, $aValue_str);
		//}
	};

	_private._updateFILESParams = function()
	{
		/*$lMainData_clss = $this->_getMainData();

		foreach (CMainData::i_getNativeFILESParams() as $aName_str => $aValue_a_arr)
		{*/
			/*switch ($aName_str)
			{
				default:
					new CException('_updateFILESParams', 'Unsupported FILES param name: ' .$aName_str);
				break;
			}*/

			/*$lMainData_clss->i_setFILESParam($aName_str, $aValue_a_arr);
		}*/
	};

	_private._updateCookieParams = function()
	{
		var lMainData_clss = this._getMainData();
		var lSiteId_str = lMainData_clss.i_getGETParamSiteId();
		var lCookieData_clss = lMainData_clss.i_getCookiesData().i_getCookieData(lSiteId_str);

		for (var lName_str in JSCCookieData.i_getNativeCookieParams())
		{
			var lValue_str = JSCCookieData.i_getNativeCookieParams()[lName_str];

			/*switch ($aName_str)
			{
				case CCCookieData::i_COOKIE_PARAM_ID_EVENT_ID:
				{
					//$this->_getMainData()->getEventsData()->getEventData($lSiteId_str)->addEventId($aValue_str);
					$lCookieData_clss->i_clearCookieParam($aName_str);
				}break;

				case CCCookieData::i_COOKIE_PARAM_ID_USER_ID:
				case CCCookieData::i_COOKIE_PARAM_ID_USER_HASH:
				{
				}break;

				default:
					new CException('_updateCookieParams', 'Unsupported COOKIE name: ' .$aName_str);//common cookie for all domains
				break;
			}*/

			lCookieData_clss.i_setCookieParam(lName_str, lValue_str);
		}
	};

	_private._updateSessionParamsIfRequired = function()
	{
		/*$lSiteId_str = $this->_getMainData()->i_getGETParamSiteId();
		$lSessionData_clss = $this->_getSessionsData()->i_getSessionData($lSiteId_str);
		if (!$lSessionData_clss->i_isSessionLaunched())
		{
			return;
		}

		foreach (CCSessionData::i_getNativeSessionParams() as $aName_str => $aValue_str)
		{*/
			/*switch ($aName_str)
			{
				default:
					new CException('_updateSessionParamsIfRequired', 'Unsupported SESSION name: ' .$aName_str);
				break;
			}*/

			//$lSessionData_clss->i_setSessionParam($aName_str, $aValue_str);
		//}
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSMainManager;
};