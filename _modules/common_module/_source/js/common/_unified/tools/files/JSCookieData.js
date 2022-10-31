bsp.i_getNamespace('bsp._unified_ns.tools_ns.files_ns').i_importJSCookieDataClass = function()
{
	var _ns = bsp._unified_ns.tools_ns.files_ns;
	//INIT...
	if (_ns.JSCookieData)
	{
		return _ns.JSCookieData;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSCookieData = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCookieData;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		this._initJSCookieData();
	};

	var _static_public = _self;
	var _static_private = _self;
	var _static_public_const = _self;
	var _static_private_const = _self;
	var _public = _prototype;
	var _protected = _prototype;
	var _private = _prototype;
	var _internal = _prototype;
	var _virtual_protected = _prototype;
	var _override_protected = _prototype;

	//IMPORTS...
	var JSException = bsp._unified_ns.controller_ns.exceptions_ns.i_importJSExceptionClass();
	var JSURLTools = bsp._unified_ns.tools_ns.urls_ns.i_importJSURLToolsClass();
	//...IMPORTS

	//CONSTS...
	//_static_private_const._COOKIE_LIFE_TIME_NONE				= 0;
	//...CONSTS
	
	//STATIC...
	_static_public.i_getNativeCookieParams = function()
	{
		return document.cookie;
	};
	//...STATIC
	
	_private._initJSCookieData = function()
	{
	};
	//...INIT

	//VARS...
	_private._fCookieParams_a_arr = null;
	//...VARS

	//PUBLIC...
	_public.i_getCookieParams = function()
	{
		return this._fCookieParams_a_arr;
	};

	_public.i_isCookieParamDefined = function(aCookieParamId_str)
	{
		return this._fCookieParams_a_arr[aCookieParamId_str] !== undefined;
	};

	_public.i_getCookieParam = function(aCookieParamId_str)
	{
		if (!this.i_isCookieParamDefined($aCookieParamId_str))
		{
			new JSException('i_getCookieParamValue', 'Cookie param id not exist: ' + aCookieParamId_str);
		}

		return this._fCookieParams_a_arr[aCookieParamId_str];
	};

	_public.i_setCookieParam = function(aCookieParamId_str, aCookieParamValue_str, aOptCookieLifeTime_int)
	{
		if (this.i_isCookieParamDefined(aCookieParamId_str))
		{
			new JSException('i_setCookieParam', 'Cookie param already exist: ' + aCookieParamId_str);
		}

		this._fCookieParams_a_arr[aCookieParamId_str] = aCookieParamValue_str;

		this._setCookieParam(aCookieParamId_str, aCookieParamValue_str,  aOptCookieLifeTime_int, '/', 'SITE_NAME');
	};

	_public.i_clearCookieParam = function(aCookieParamId_str)
	{
		if (!this.i_isCookieParamDefined(aCookieParamId_str))
		{
			new JSException('i_clearCookieParam', 'Cookie param not exist: ' + aCookieParamId_str);
		}

		this._fCookieParams_a_arr[aCookieParamId_str] = null;

		this._setCookieParam(aCookieParamId_str, '', -1, '/', 'SITE_NAME');
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
		var lCookieParam_str = aCookieParamId_str + "=" + CURLTools.i_encodeURIComponent(aCookieParamValue_str);

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
			//lCookieParam_str += "; domain=" + aOptCookieParamPath_str;
		}

		document.cookie = lCookieParam_str;
	};
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSCookieData;
};