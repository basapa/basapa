/*CLASS PATTERN VERSION: 1.1*/
bsp.i_getNamespace('bsp').i_importJSMainDataClass = function()
{
	var _ns = bsp;
	//INIT...
	if (_ns.JSMainData)
	{
		return _ns.JSMainData;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSMainData = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSMainData;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		this._initJSMainData();
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
	var JSVariableType = bsp._unified_ns.tools_ns.variables_ns.i_importJSVariableTypeClass();
	//...IMPORTS

	//CONSTS PUBLIC...
	//JS PHP AGREEMENTS...
	_static_public_const.i_GET_PARAM_ID_AJAX_REQUEST					= 'ajax_request_id';

	_static_public_const.i_GET_PARAM_ID_SITE							= "site_id";
	_static_public_const.i_GET_PARAM_ID_PAGE							= "page_id";
	_static_public_const.i_GET_PARAM_ID_SUBPAGE							= "subpage_id";
	_static_public_const.i_GET_PARAM_ID_ACTION							= "action_id";
	_static_public_const.i_GET_PARAM_ID_LANG							= "lang_id";
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
	
	_private._initJSMainData = function()
	{
	};
	//...INIT

	//VARS...
	_private._fGETParams_obj = null;
	//...VARS

	//PUBLIC...
	_public.i_isGETParamSiteIdDefined = function()
	{
		return this._isGETParamDefined(_self.i_GET_PARAM_ID_SITE);
	};

	_public.i_getGETParamSiteId = function()
	{
		return this._getGETParam(_self.i_GET_PARAM_ID_SITE);
	};

	_public.i_isGETParamPageIdDefined = function()
	{
		return this._isGETParamDefined(_self.i_GET_PARAM_ID_PAGE);
	};

	_public.i_getGETParamPageId = function()
	{
		return this._getGETParam(_self.i_GET_PARAM_ID_PAGE);
	};

	_public.i_isGETParamLangIdDefined = function()
	{
		return this._isGETParamDefined(_self.i_GET_PARAM_ID_LANG);
	};

	_public.i_getGETParamLangId = function()
	{
		return this._getGETParam(_self.i_GET_PARAM_ID_LANG);
	};

	_public.i_isGETParamAjaxRequestDefined = function()
	{
		return this._isGETParamDefined(_self.i_GET_PARAM_ID_AJAX_REQUEST);
	};

	_public.i_getGETParamAjaxRequest = function()
	{
		return this._getGETParam(_self.i_GET_PARAM_ID_AJAX_REQUEST);
	};

	_public.i_isGETParamDefined = function(aGETParamId_str)
	{
		return this._isGETParamDefined(aGETParamId_str);
	};

	_public.i_getGETParam = function(aGETParamId_str, aOptThrowExceptionIsNotExist_bl)
	{
		return this._getGETParam(aGETParamId_str, aOptThrowExceptionIsNotExist_bl);
	};

	_public.i_setGETParam = function(aGETParamId_str, aGETParamValue_str, aOptThrowExceptionIsNameExist_bl)
	{
		console.log(aGETParamId_str);

		aOptThrowExceptionIsNameExist_bl = aOptThrowExceptionIsNameExist_bl ? aOptThrowExceptionIsNameExist_bl : true;

		if (
				aOptThrowExceptionIsNameExist_bl
				&& this._isGETParamDefined(aGETParamId_str)
			)
		{
			new JSException('i_setGETParam', 'GET param already exist: ' + aGETParamId_str);
		}
		this._fGETParams_obj[aGETParamId_str] = aGETParamValue_str;
	};

	_public.i_getGETParams = function()
	{
		return this._fGETParams_obj;
	};

	_public.i_setGETParams = function(aGETParams_str_obj)
	{
		this._fGETParams_obj = JSVariableType.i_toObject(aGETParams_str_obj);
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	_private._isGETParamDefined = function(aName_str)
	{
		return this._fGETParams_obj[aName_str] !== undefined;
	};

	_private._getGETParam = function(aGETParamId_str, aOptThrowExceptionIsNotExist_bl)
	{
		if (!this._isGETParamDefined(aGETParamId_str))
		{
			if (aOptThrowExceptionIsNotExist_bl)
			{
				new JSException('i_getGETParam', 'GET param not exist: ' + aGETParamId_str);
			}
			return '';
		}
		return this._fGETParams_obj[aGETParamId_str];
	};
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSMainData;
};