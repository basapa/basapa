/*CLASS PATTERN VERSION: 1.1*/
bsp.i_getNamespace('bsp._unified_ns.tools_ns.variables_ns').i_importJSVariableToolsClass = function()
{
	var _ns = bsp._unified_ns.controller_ns.tools_ns;
	//INIT...
	if (_ns.JSVariableTools)
	{
		return _ns.JSVariableTools;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSVariableTools = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSVariableTools;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		this._initJSVariableTools();
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
	var JSPageViewsView = bsp.pages_ns.i_importJSPageViewsViewClass();
	var JSMain = bsp.i_importJSMainClass();
	//...IMPORTS

	//CONSTS PUBLIC...
	//...CONSTS PUBLIC

	//CONSTS PRIVATE...
	//...CONSTS PRIVATE

	//CONSTS PROTECTED...
	//...CONSTS PROTECTED

	//STATIC PUBLIC...
	_static_public.i_EncodeURIComponent = function(a_str)
	{
		return encodeURIComponent(a_str);
	};
	
	/*JS PHP AGREEMENTS REQUIRED*/
	_static_public.i_generateURLByParams = function(aStaticParams_obj, aOptDynamicParams_obj, aOptIsFullURL_bl, aOptUseFullAmpSeparator_bl, aOptSiteFullName_str)
	{
		aOptDynamicParams_obj = aOptDynamicParams_obj ? aOptDynamicParams_obj : null;
		aOptIsFullURL_bl = aOptIsFullURL_bl ? aOptIsFullURL_bl : true;
		aOptUseFullAmpSeparator_bl = aOptUseFullAmpSeparator_bl ? aOptUseFullAmpSeparator_bl : true;
		aOptSiteFullName_str = aOptSiteFullName_str ? aOptSiteFullName_str : CMain.i_SITE_FULL_NAME;

		var lURL_str = _static_private._ConvertStaticParamsToURLStaticString(aStaticParams_obj);

		if (aOptDynamicParams_obj !== null)
		{
			lURL_str += _static_private._ConvertDynamicParamsToURLDynamicString(aOptDynamicParams_obj, aOptUseFullAmpSeparator_bl);
		}

		return aOptIsFullURL_bl ? aOptSiteFullName_str + lURL_str : '/' + lURL_str;
	};
	//...STATIC PUBLIC

	//STATIC PRIVATE...
	/*JS PHP AGREEMENTS REQUIRED*/
	_static_private._ConvertStaticParamsToURLStaticString = function(aStaticParams_obj)
	{
		if (aStaticParams_obj === undefined)
		{
			new JSException('_ConvertStaticParamsToURLStaticString', 'Static params must be defined!');
		}

		var lResult_str = _static_private._ConvertStaticParamToURLStaticParam(aStaticParams_obj, CMainData.i_GET_PARAM_ID_SITE, true);
		lResult_str += _static_private._ConvertStaticParamToURLStaticParam(aStaticParams_obj, CMainData.i_GET_PARAM_ID_PAGE, true);

		return lResult_str;
	};

	/*JS PHP AGREEMENTS REQUIRED*/
	_static_private._ConvertDynamicParamsToURLDynamicString = function(aDynamicParams_obj, aOptUseFullAmpSeparator_bl)
	{
		aOptUseFullAmpSeparator_bl = aOptUseFullAmpSeparator_bl ? aOptUseFullAmpSeparator_bl : true;

		if (aDynamicParams_obj === undefined)
		{
			new JSException('_ConvertDynamicParamsToURLDynamicString', 'Dynamic params must be defined!');
		}

		var lResult_str = "";
		var lIndex_int = 0;
		var lAmpSeparator_str = aOptUseFullAmpSeparator_bl ? "&amp;" : "&";

		//http_build_query

		for (var lName_str in aDynamicParams_obj)
		{
			var lValue_str = aDynamicParams_obj[lName_str];

			if (lValue_str === undefined
				|| lValue_str === "")
			{
				continue;
			}

			var lSeparator_str = lIndex_int == 0 ? "?" : lAmpSeparator_str;
			lResult_str += lSeparator_str + lName_str + "=" + lValue_str;

			lIndex_int++;
		}

		return lResult_str;
	};

	/*JS PHP AGREEMENTS REQUIRED*/
	_static_private._ConvertStaticParamToURLStaticParam = function(aStaticParams_obj, aStaticParamName_str, aOptThrowExceptionIfEmptyParam_bl)
	{
		var lStaticParamValue_str = aStaticParams_obj[aStaticParamName_str];

		if (lStaticParamValue_str === undefined
			|| lStaticParamValue_str === "")
		{
			if (aOptThrowExceptionIfEmptyParam_bl)
			{
				new JSException('_ConvertStaticParamToURLStaticParam', 'Param can not be empty!');
			}
			return "";
		}

		if (
				(
					aStaticParamName_str === CMainData.i_GET_PARAM_ID_SITE
					&& lStaticParamValue_str === CMain.i_SITE_ID_REALTY
				)
				||
				(
					aStaticParamName_str === CMainData.i_GET_PARAM_ID_PAGE
					&& lStaticParamValue_str === CPageViewsView.i_PAGE_ID_MAIN
				)
			)
		{
			return "";
		}

		return lStaticParamValue_str + "/";
	};
	//...STATIC PRIVATE

	//STATIC PROTECTED...
	//...STATIC PROTECTED
	
	_private._initJSVariableTools = function()
	{
	};
	//...INIT

	//VARS...
	//...VARS

	//PUBLIC...
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSVariableTools;
};