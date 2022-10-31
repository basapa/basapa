/*CLASS PATTERN VERSION: 1.1*/
bsp.i_getNamespace('bsp.file_manager_ns.model_ns.common_ns').i_importJSCCookieDataClass = function()
{
	var _ns = bsp.file_manager_ns.model_ns.common_ns;
	if (_ns.JSCCookieData)
	{
		return _ns.JSCCookieData;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSCCookieData = function()
	{
		___constructor.apply(this, arguments);
	};
	var _self = _ns.JSCCookieData;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCCookieData();
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
	var JSException = bsp._unified_ns.controller_ns.exceptions_ns.i_importJSExceptionClass();
	var JSURLTools = bsp._unified_ns.model_ns.tools_ns.urls_ns.i_importJSURLToolsClass();
	var JSFilesData = bsp.file_manager_ns.model_ns.i_importJSFilesDataClass();
	var JSSiteData = bsp.main_manager_ns.model_ns.i_importJSSiteDataClass();
	//...IMPORTS

	//CONST PUBLIC...
	_static_public_const.i_COOKIE_PARAM_ID_USER_ID					= 'bsp_user_id';
	_static_public_const.i_COOKIE_PARAM_ID_USER_HASH				= 'bsp_user_hash';
	_static_public_const.i_COOKIE_PARAM_ID_SESSION_ID				= 'bsp_sid';
	_static_public_const.i_COOKIE_PARAM_ID_EVENT_ID					= 'bsp_event_id';
	_static_public_const.i_COOKIE_PARAM_ID_BROWSER_INFO				= 'bsp_browser_info';
	_static_public_const.i_COOKIE_PARAM_ID_ANTI_SPAM				= 'bsp_anti_spam';
	//...CONST PUBLIC

	//CONST PRIVATE...
	//...CONST PRIVATE

	//STATIC PUBLIC...
	_static_public.i_getNativeCookieParams = function()
	{
		var l_a_arr = [];

		var cookies = document.cookie.split(/;/);
		for (var i = 0, len = cookies.length; i < len; i++)
		{
			var cookie = cookies[i].split(/=/);
			l_a_arr[cookie[0]] = cookie[1];
		}

		return l_a_arr;
	};
	//...STATIC PUBLIC

	//STATIC PRIVATE...
	//...STATIC PRIVATE

	//VARS...
	_private._fCookieParams_a_arr = null;
	//...VARS

	_private._initJSCCookieData = function()
	{
	};

	//PUBLIC...
	_public.i_getCookieParams = function()
	{
		return this._fCookieParams_a_arr;
	};

	_public.i_isCookieParamDefined = function(aCookieParamId_str)
	{
		return this._fCookieParams_a_arr[aCookieParamId_str]!== undefined;
	};

	_public.i_getCookieParam = function(aCookieParamId_str, aOptThrowIfNotExist_bl/*true*/)
	{
		aOptThrowIfNotExist_bl = aOptThrowIfNotExist_bl === undefined ? true : aOptThrowIfNotExist_bl;

		if (!this.i_isCookieParamDefined(aCookieParamId_str))
		{
			if (aOptThrowIfNotExist_bl)
			{
				new JSException('i_getCookieParamValue', 'Cookie param id not exist: ' + aCookieParamId_str);
			}
		}

		return this._fCookieParams_a_arr[aCookieParamId_str];
	};

	_public.i_setCookieParam = function(aCookieParamId_str, aCookieParamValue_str, aOptCookieLifeTime_int, aOptThrowIfExist_bl)
	{
		aOptCookieLifeTime_int = aOptCookieLifeTime_int === undefined ? JSFilesData.i_LIFE_TIME_NONE : aOptCookieLifeTime_int;
		aOptThrowIfExist_bl = aOptThrowIfExist_bl === undefined ? true : aOptThrowIfExist_bl;

		if (
				this.i_isCookieParamDefined(aOptCookieLifeTime_int)
				&& aOptThrowIfExist_bl
			)
		{
			new JSException('i_setCookieParam', 'Cookie param already exist: ' .aCookieParamId_str);
		}

		this._fCookieParams_a_arr[aCookieParamId_str] = aCookieParamValue_str;

		this._setCookieParam(aCookieParamId_str, aCookieParamValue_str,  aOptCookieLifeTime_int, '/', CSiteData.i_SITE_NAME);
	};

	_public.i_clearCookieParam = function(aCookieParamId_str, aOptThrowIfNotExist_bl)
	{
		aOptThrowIfNotExist_bl = aOptThrowIfNotExist_bl === undefined ? true : aOptThrowIfNotExist_bl;

		if (
				!this.i_isCookieParamDefined(aCookieParamId_str)
				&& aOptThrowIfNotExist_bl
			)
		{
			new JSException('i_clearCookieParam', 'Cookie param not exist: ' .aCookieParamId_str);
		}

		this._fCookieParams_a_arr[aCookieParamId_str] = null;

		this._setCookieParam(aCookieParamId_str, '', -1, '/', JSSiteData.i_SITE_NAME);
	};

	_public.i_clearCookieParams = function()
	{
		for (var lName_str in this._fCookieParams_a_arr)
		{
			this.i_clearCookieParam(lName_str);
		}
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	_private._setCookieParam = function(aCookieParamId_str, aCookieParamValue_str, aOptCookieParamLifeTime_int, aOptCookieParamPath_str, aOptCookieParamDomain_str)
	{
		var lCookieParam_str = aCookieParamId_str + "=" + JSURLTools.i_encodeURIComponent(aCookieParamValue_str);

		if (aOptCookieParamLifeTime_int !== undefined)
		{
			lCookieParam_str += "; max-age=" + String(aOptCookieParamLifeTime_int);
		}

		if (aOptCookieParamPath_str !== undefined)
		{
			lCookieParam_str += "; path=" + aOptCookieParamPath_str;
		}

		if (aOptCookieParamDomain_str !== undefined)
		{
			lCookieParam_str += "; domain=" + aOptCookieParamPath_str;
		}

		document.cookie = lCookieParam_str;
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCCookieData;
};