/*CLASS PATTERN VERSION: 1.1*/
bsp.i_getNamespace('bsp.main_manager_ns.model_ns').i_importJSMainDataClass = function()
{
	var _ns = bsp.main_manager_ns.model_ns;
	if (_ns.JSMainData)
	{
		return _ns.JSMainData;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSMainData = function()
	{
		___constructor.apply(this, arguments);
	};
	var _self = _ns.JSMainData;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSMainData();
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
	var JSHostData = bsp.main_manager_ns.model_ns.i_importJSHostDataClass();
	var JSSiteData = bsp.main_manager_ns.model_ns.i_importJSSiteDataClass();
	var JSCRequestParamConst = bsp.main_manager_ns.model_ns.common_ns.i_importJSCRequestParamConstClass();
	var JSArrayTools = bsp._unified_ns.tools_ns.variables_ns.i_importJSArrayToolsClass();
	//...IMPORTS

	//CONST PUBLIC...
	//JS PHP AGREEMENTS...
	_static_public_const.i_SITE_ID_MAIN							= 'main';
	_static_public_const.i_SITE_ID_REALTY						= 'avatar';
	//...JS PHP AGREEMENTS

	_static_public_const.i_SITE_ID_DEFAULT						= _self.i_SITE_ID_REALTY;

	_static_public_const.i_SUPPORTED_SITE_IDS					= [	_self.i_SITE_ID_MAIN,
																	_self.i_SITE_ID_REALTY];
	//...CONST PUBLIC

	//CONST PRIVATE...
	//...CONST PRIVATE

	//STATIC PUBLIC...
	_static_public.i_getNativePOSTParams = function()
	{
		return $_POST;
	};

	_static_public.i_getNativeGETParams = function()
	{
		return $_GET;
	};

	_static_public.i_getNativeFILESParams = function()
	{
		return $_FILES;
	};
	//...STATIC PUBLIC

	//STATIC PRIVATE...
	//...STATIC PRIVATE

	//VARS...
	_private._fHostData_clss = null;
	_private._fSiteData_clss = null;

	_private._fGETParams_a_arr = null;
	_private._fPOSTParams_a_arr = null;
	_private._fFILESParams_a_arr = null;
	//...VARS

	_private._initJSMainData = function()
	{
	};

	//PUBLIC...
	_public.i_getHostData = function()
	{
		return this._fHostData_clss || this._initHostData();
	};
	
	_public.i_getSiteData = function()
	{
		return this._fSiteData_clss || this._initSiteData();
	};

	//GET PARAMS...
	_public.i_isGETParamSiteIdDefined = function()
	{
		return this.i_isGETParamDefined(JSCRequestParamConst.i_GET_PARAM_ID_SITE);
	};

	_public.i_getGETParamSiteId = function()
	{
		return this.i_getGETParam(JSCRequestParamConst.i_GET_PARAM_ID_SITE);
	};

	_public.i_isGETParamPageIdDefined = function()
	{
		return this.i_isGETParamDefined(JSCRequestParamConst.i_GET_PARAM_ID_PAGE);
	};

	_public.i_getGETParamPageId = function()
	{
		return this.i_getGETParam(JSCRequestParamConst.i_GET_PARAM_ID_PAGE);
	};

	_public.i_isGETParamLangIdDefined = function()
	{
		return this.i_isGETParamDefined(JSCRequestParamConst.i_GET_PARAM_ID_LANG);
	};

	_public.i_getGETParamLangId = function()
	{
		return this.i_getGETParam(JSCRequestParamConst.i_GET_PARAM_ID_LANG);
	};

	_public.i_isGETParamAjaxRequestDefined = function()
	{
		return this.i_isGETParamDefined(JSCRequestParamConst.i_GET_PARAM_ID_AJAX_REQUEST);
	};

	_public.i_getGETParamAjaxRequest = function()
	{
		return this.i_getGETParam(JSCRequestParamConst.i_GET_PARAM_ID_AJAX_REQUEST);
	};

	_public.i_isGETParamScheduleRequestDefined = function()
	{
		return this.i_isGETParamDefined(JSCRequestParamConst.i_GET_PARAM_ID_SCHEDULE_REQUEST);
	};

	_public.i_getGETParamScheduleRequest = function()
	{
		return this.i_getGETParam(JSCRequestParamConst.i_GET_PARAM_ID_SCHEDULE_REQUEST);
	};

	_public.i_isGETParamDefined = function(aGETParamId_str)
	{
		return this._fGETParams_a_arr[aGETParamId_str] !== undefined;
	};

	_public.i_getGETParam = function(aGETParamId_str, aOptThrowIfNotExist_bl)
	{
		aOptThrowIfNotExist_bl = aOptThrowIfNotExist_bl === undefined ? true : aOptThrowIfNotExist_bl;
		
		if (!this.i_isGETParamDefined(aGETParamId_str))
		{
			if (aOptThrowIfNotExist_bl)
			{
				new CException('i_getGETParam', 'GET param not exist: ' + aGETParamId_str);
			}

			//return CClassFactory::i_getInstance()->i_getClassFactory()->i_getRequestParamConstNSClassName()::i_GET_PARAMS_UNDEFINED_VALUES()[$aGETParamId_str];
		}
		return this._fGETParams_a_arr[aGETParamId_str];
	};

	_public.i_setGETParam = function(aGETParamId_str, aGETParamValue_str, aOptThrowIfExist_bl)
	{
		aOptThrowIfExist_bl = aOptThrowIfExist_bl === undefined ? true : aOptThrowIfExist_bl;
		
		if (
				aOptThrowIfExist_bl
				&& this.i_isGETParamDefined(aGETParamId_str)
			)
		{
			new CException('i_setGETParam', 'GET param already exist: ' + aGETParamId_str);
		}
		this._fGETParams_a_arr[aGETParamId_str] = aGETParamValue_str;
	};

	_public.i_getGETParams = function()
	{
		return this._fGETParams_a_arr;
	};

	_public.i_getGETParamIds = function()
	{
		return CArrayTools.i_getKeys(this._fGETParams_a_arr);
	};

	_public.i_setGETParams = function(aGETParams_a_arr)
	{
		this._fGETParams_a_arr = aGETParams_a_arr;
	};
	//...GET PARAMS

	//POST PARAMS...
	_public.i_isPOSTParamRequestIdDefined = function()
	{
		return this.i_isPOSTParamDefined(JSCRequestParamConst.i_POST_PARAM_ID_REQUEST);
	};

	_public.i_getPOSTParamRequestId = function()
	{
		return this.i_getPOSTParam(JSCRequestParamConst.i_POST_PARAM_ID_REQUEST);
	};

	_public.i_isPOSTParamDefined = function(aPOSTParamId_str)
	{
		return this._fPOSTParams_a_arr[aPOSTParamId_str] !== undefined;
	};

	_public.i_getPOSTParam = function(aPOSTParamId_str)
	{
		if (!this.i_isPOSTParamDefined(aPOSTParamId_str))
		{
			new CException('i_getPOSTParam', 'POST param not exist: ' + aPOSTParamId_str);
		}
		return this._fPOSTParams_a_arr[aPOSTParamId_str];
	};

	_public.i_setPOSTParam = function(aPOSTParamId_str, aPOSTParamValue_str, aOptThrowIfExist_bl)
	{
		aOptThrowIfExist_bl = aOptThrowIfExist_bl === undefined ? true : aOptThrowIfExist_bl;

		if (
				aOptThrowIfExist_bl
				&& this.i_isPostParamDefined($aPOSTParamId_str)
			)
		{
			new CException('i_setPOSTParam', 'POST param already exist: ' + aPOSTParamId_str);
		}
		this._fPOSTParams_a_arr[aPOSTParamId_str] = aPOSTParamValue_str;
	};

	_public.i_getPOSTParams = function()
	{
		return this._fPOSTParams_a_arr;
	};

	_public.i_setPOSTParams = function(aPOSTParams_a_arr)
	{
		this._fPOSTParams_a_arr = aPOSTParams_a_arr;
	};
	//...POST PARAMS

	//FILES PARAMS...
	_public.i_isFILESParamDefined = function(aName_str)
	{
		return this._fFILESParams_a_arr[aName_str] !== undefined;
	};

	_public.i_getFILESParam = function(aFILESParamId_str)
	{
		if (!this.i_isFILESParamDefined(aFILESParamId_str))
		{
			new CException('i_getFILESParam', 'FILES param not exist: ' + aFILESParamId_str);
		}
		return this._fFILESParams_a_arr[aFILESParamId_str];
	};

	_public.i_setFILESParam = function(aFILESParamId_str, aFILESParamValue_a_arr, aOptThrowIfExist_bl)
	{
		aOptThrowIfExist_bl = aOptThrowIfExist_bl === undefined ? true : aOptThrowIfExist_bl;

		if (
				aOptThrowIfExist_bl
				&& this.i_isFILESParamDefined(aFILESParamId_str)
			)
		{
			new CException('i_setFILESParam', 'FILES param already exist: ' + aFILESParamId_str);
		}
		this._fFILESParams_a_arr[aFILESParamId_str] = aFILESParamValue_a_arr;
	};

	_public.i_getFILESParams = function()
	{
		return this._fFILESParams_a_arr;
	};

	_public.i_setFILESParams = function(aFILESParams_a_arr)
	{
		this._fFILESParams_a_arr = aFILESParams_a_arr;
	};
	//...FILES PARAMS
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	_private._initHostData = function()
	{
		var l_clss = new JSHostData();
		this._fHostData_clss = l_clss;
		return l_clss;
	};
	
	_private._initSiteData = function()
	{
		var l_clss = new JSSiteData();
		this._fSiteData_clss = l_clss;
		return l_clss;
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSMainData;
};