/*
IMPORT_PRIORITY:-100
*/
/*CLASS PATTERN VERSION: 1.1*/
bsp.i_getNamespace('bsp').i_importJSMainClass = function()
{
	var _ns = bsp;
	//INIT...
	if (_ns.JSMain)
	{
		return _ns.JSMain;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSMain = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSMain;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		this._initJSMain();
	};

	var _static_public = _self;
	var _static_private = _self;
	var _static_public_const = _self;
	var _static_private_const = _self;
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
	var JSMainData = bsp.i_importJSMainDataClass();
	var JSJOBSiteView = bsp.job_ns.i_importJSJOBSiteViewClass();
	var JSCookieData = bsp._unified_ns.tools_ns.files_ns.i_importJSCookieDataClass();
	var JSURLTools = bsp._unified_ns.tools_ns.urls_ns.i_importJSURLToolsClass();
	//...IMPORTS

	//CONSTS PUBLIC...
	//JS PHP AGREEMENTS...
	_static_public_const.i_SITE_ID_MAIN					= "main";
	_static_public_const.i_SITE_ID_JOB					= "job";

	_static_public_const.i_SITE_FULL_NAME				= "http://" + window.location.hostname + "/";
	//...JS PHP AGREEMENTS
	//...CONSTS PUBLIC

	//CONSTS PRIVATE...
	//...CONSTS PRIVATE

	//CONSTS PROTECTED...
	//...CONSTS PROTECTED

	//STATIC PUBLIC...
	//...STATIC PUBLIC

	//STATIC PRIVATE...
	//...STATIC PRIVATE

	//STATIC PROTECTED...
	//...STATIC PROTECTED

	//STATIC VARS...
	_static_private._fInstance_clss = null;
	//...STATIC VARS

	_private._initJSMain = function()
	{
		if (_static_private._fInstance_clss)
		{
			new CException('_initJSMain', 'Instance already exist!');
		}
		_static_private._fInstance_clss = this;

		this._fSiteView_clss_arr = [];

		this._updateCookieParams();
	};
	//...INIT

	//VARS...
	_private._fMainData_clss = null;
	_private._fSiteView_clss_arr = null;
	//...VARS

	//PUBLIC...
	_public.i_getSiteView = function($aSiteId_str)
	{
		return this._getSiteView($aSiteId_str);
	};

	_public.i_getJobSiteView = function()
	{
		return this._getSiteView(_self._i_SITE_ID_JOB);
	};

	_public.i_getMainData = function()
	{
		return this._getMainData();
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	_private._getSiteView = function(aSiteId_str)
	{
		return this._fSiteView_clss_arr[aSiteId_str] || this._initSiteView(aSiteId_str);
	};

	_private._initSiteView = function(aSiteId_str)
	{
		var l_clss = this._generateSiteView(aSiteId_str);
		this._fSiteView_clss_arr[aSiteId_str] = l_clss;
		return l_clss;
	};

	_private._generateSiteView = function(aSiteId_str)
	{
		var l_clss;

		switch (aSiteId_str)
		{
			/*case _self.i_SITE_ID_MAIN:
			{
				l_clss = new JSMSite();
			}break;*/

			case _self.i_SITE_ID_JOB:
			{
				l_clss = new JSJOBSiteView();
			}break;

			default:
				new JSException('_generateSiteView', 'Unsupported site id: ' + aSiteId_str);
			break;
		}

		return l_clss;
	};

	_private._getMainData = function()
	{
		return this._fMainData_clss || (this._fMainData_clss = new JSMainData());
	};

	_private._updateCookieParams = function()
	{
		var lNativeCookieParams_str_arr = JSCookieData.i_getNativeCookieParams().split(";");

		var lCount_int = lNativeCookieParams_str_arr.length;
		for (var i = 0; i < lCount_int; i++)
		{
			if (lNativeCookieParams_str_arr[i] === "")
			{
				continue;
			}

			var lCookieParam_str = lNativeCookieParams_str_arr[i].trim();
			var lCookieParamParts_str_arr = lCookieParam_str.split("=");

			var lCookieParamName_str = lCookieParamParts_str_arr[0];
			var lCookieParamValue_str = JSURLTools.i_decodeURIComponent(lCookieParamParts_str_arr[1].trim());

			//$lCookieData_clss->i_setCookieParam(lCookieParamName_str, lCookieParamValue_str);
		}
	};
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSMain;
};