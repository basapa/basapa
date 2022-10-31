/*CLASS PATTERN VERSION: 1.1*/
bsp.i_getNamespace('bsp._unified_ns.tools_ns.urls_ns').i_importJSURLToolsClass = function()
{
	var _ns = bsp._unified_ns.tools_ns.urls_ns;
	//INIT...
	if (_ns.JSURLTools)
	{
		return _ns.JSURLTools;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSURLTools = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSURLTools;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		this._initJSURLTools();
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
	var JSMain = bsp.i_importJSMainClass();
	var JSCPagesView = bsp.pages_ns.i_importJSCPagesViewClass();
	//...IMPORTS

	//CONSTS PUBLIC...
	//...CONSTS PUBLIC

	//CONSTS PRIVATE...
	//...CONSTS PRIVATE

	//CONSTS PROTECTED...
	//...CONSTS PROTECTED

	//STATIC PUBLIC...
	_static_public.i_encodeURIComponent = function(a_str)
	{
		return encodeURIComponent(a_str);
	};
	
	_static_public.i_decodeURIComponent = function(a_str)
	{
		return decodeURIComponent(a_str);
	};
	
	/*JS PHP AGREEMENTS REQUIRED*/
	_static_public.i_generateURLByParams = function(aStaticParams_obj, aOptDynamicParams_obj, aOptIsFullURL_bl, aOptUseFullAmpSeparator_bl, aOptSiteFullName_str)
	{
		aOptDynamicParams_obj = aOptDynamicParams_obj ? aOptDynamicParams_obj : null;
		aOptIsFullURL_bl = aOptIsFullURL_bl ? aOptIsFullURL_bl : true;
		aOptUseFullAmpSeparator_bl = aOptUseFullAmpSeparator_bl ? aOptUseFullAmpSeparator_bl : true;
		aOptSiteFullName_str = aOptSiteFullName_str ? aOptSiteFullName_str : CMain.i_SITE_FULL_NAME;

		var lURL_str = _static_private._convertStaticParamsToURLStaticString(aStaticParams_obj);

		if (aOptDynamicParams_obj !== null)
		{
			lURL_str += _static_private._convertDynamicParamsToURLDynamicString(aOptDynamicParams_obj, aOptUseFullAmpSeparator_bl);
		}

		return aOptIsFullURL_bl ? aOptSiteFullName_str + lURL_str : '/' + lURL_str;
	};
	//...STATIC PUBLIC

	//STATIC PRIVATE...
	/*JS PHP AGREEMENTS REQUIRED*/
	_static_private._convertStaticParamsToURLStaticString = function(aStaticParams_obj, aOptStaticURLNonMandatoriesParamsSequence_str_arr)
	{
		if (aStaticParams_obj === undefined)
		{
			new JSException('_convertStaticParamsToURLStaticString', 'Static params must be defined!');
		}

		//mandatories params...
		var lResult_str = _static_private._convertStaticParamToURLStaticParam(aStaticParams_obj, CMainData.i_GET_PARAM_ID_SITE);
		lResult_str += _static_private._convertStaticParamToURLStaticParam(aStaticParams_obj, CMainData.i_GET_PARAM_ID_PAGE);
		//...mandatories params
		
		if (aOptStaticURLNonMandatoriesParamsSequence_str_arr === undefined)
		{
			//do not change sequence...
			lResult_str += _static_private._convertStaticParamToURLStaticParam(aStaticParams_obj, CMainData.i_GET_PARAM_ID_SUBPAGE, false);
			lResult_str += _static_private._convertStaticParamToURLStaticParam(aStaticParams_obj, CMainData.i_GET_PARAM_ID_CATEGORY, false);
			lResult_str += _static_private._convertStaticParamToURLStaticParam(aStaticParams_obj, CMainData.i_GET_PARAM_ID_SUBCATEGORY, false);
			//...do not change sequence
		}
		else
		{
			var lCount_int = aOptStaticURLNonMandatoriesParamsSequence_str_arr.length;
			for (var i = 0; i < $lCount_int; i++)
			{
				lResult_str += _static_private._convertStaticParamToURLStaticParam(aStaticParams_obj, aOptStaticURLNonMandatoriesParamsSequence_str_arr[i], false);
			}
		}

		return lResult_str;
	};

	/*JS PHP AGREEMENTS REQUIRED*/
	_static_private._convertDynamicParamsToURLDynamicString = function(aDynamicParams_obj, aOptUseFullAmpSeparator_bl)
	{
		aOptUseFullAmpSeparator_bl = aOptUseFullAmpSeparator_bl ? aOptUseFullAmpSeparator_bl : true;

		if (aDynamicParams_obj === undefined)
		{
			new JSException('_convertDynamicParamsToURLDynamicString', 'Dynamic params must be defined!');
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
	_static_private._convertStaticParamToURLStaticParam = function(aStaticParams_obj, aStaticParamName_str, aOptThrowExceptionIfEmptyParam_bl)
	{
		var lStaticParamValue_str = aStaticParams_obj[aStaticParamName_str];

		if (lStaticParamValue_str === undefined
			|| lStaticParamValue_str === "")
		{
			if (aOptThrowExceptionIfEmptyParam_bl)
			{
				new JSException('_convertStaticParamToURLStaticParam', 'Param can not be empty!');
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
					&& lStaticParamValue_str === CCPagesView.i_PAGE_ID_MAIN
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
	
	_private._initJSURLTools = function()
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

	return _ns.JSURLTools;
};