bsp.i_getNamespace('bsp.modules_ns.infos_ns').i_importJSCSiteDescriptionInfoViewClass = function()
{
	var _ns = bsp.modules_ns.infos_ns;
	//INIT...
	if (_ns.JSCSiteDescriptionInfoView)
	{
		return _ns.JSCSiteDescriptionInfoView;
	}

	//INHERITANCE IMPORT...
	var JSCInfoView = bsp.modules_ns.infos_ns.i_importJSCInfoViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCSiteDescriptionInfoView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCSiteDescriptionInfoView;
	bsp.i_setExtends(_self, JSCInfoView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCSiteDescriptionInfoView();
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
	var JSEventHandler = bsp._unified_ns.controller_ns.events_ns.i_importJSEventHandlerClass();
	var JSCComponentView = bsp.components_ns.i_importJSCComponentViewClass();
	var JSSimpleAjaxRequest = bsp._unified_ns.controller_ns.requests_ns.i_importJSSimpleAjaxRequestClass();
	var JSNativeEventData = bsp._unified_ns.model_ns.events_ns.i_importJSNativeEventDataClass();
	var JSEventData = bsp._unified_ns.model_ns.events_ns.i_importJSEventDataClass();
	var JSURLTools = bsp._unified_ns.controller_ns.tools_ns.i_importJSURLToolsClass();
	var JSMainData = bsp.i_importCMainDataClass();
	//...IMPORTS

	//CONSTS...
	//JS PHP AGREEMENTS...
	_static_public_const.i_INFO_COMPONENT_ID_SUPPORT_BUTTON	= 100;
	//...JS PHP AGREEMENTS
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSCSiteDescriptionInfoView = function()
	{
	};
	//...INIT

	//VARS...
	_private._fSimpleAjaxRequest_clss = null;
	//...VARS

	//PUBLIC...
	//...PUBLIC

	//PROTECTED...
	_override_protected.__initDOMInfo = function()
	{
		_superclass.__initDOMInfo.call(this);

		//var lSupportButtonFormComponent_clss = this.__getInfoComponent(_self.i_INFO_COMPONENT_ID_SUPPORT_BUTTON);
		//lSupportButtonFormComponent_clss.i_addEventListener(JSCComponentView.i_NATIVE_EVENT_ID_CLICK, new CEventHandler(this, this._onSupportButtonComponentClick));
	};
	//...PROTECTED

	//PRIVATE...
	//EVENTS...
	_private._onSupportButtonComponentClick = function(aEvent_obj)
	{
		/*var lNativeEventData_clss = new JSNativeEventData(aEvent_obj);
		lNativeEventData_clss.i_PreventDefault();

		var lMainData_clss = bsp.JSMain.i_getMainData();

		var lRequestStaticURLParams_obj = {};
		lRequestStaticURLParams_obj[JSMainData.i_GET_PARAM_ID_SITE] = lMainData_clss.i_getGETParamSiteId();
		lRequestStaticURLParams_obj[JSMainData.i_GET_PARAM_ID_PAGE] = lMainData_clss.i_getGETParamPageId();
		lRequestStaticURLParams_obj[JSMainData.i_GET_PARAM_ID_LANG] = lMainData_clss.i_getGETParamLangId();

		var lRequestDynamicURLParams_obj = {};
		lRequestDynamicURLParams_obj[JSMainData.i_GET_PARAM_ID_AJAX_REQUEST] = JSSimpleAjaxRequest.i_REQUEST_ID_GET_SUPPORT_FORM;

		var lRequestURL_str = JSURLTools.i_generateURLByParams(lRequestStaticURLParams_obj, lRequestDynamicURLParams_obj, true, true);

		var lSimpleAjaxRequest_clss = this._getSimpleAjaxRequest();
		lSimpleAjaxRequest_clss.i_addEventListener(JSSimpleAjaxRequest.i_EVENT_ID_REQUEST_COMPLETED, new JSEventHandler(this, this._onRequestCompleted));
		lSimpleAjaxRequest_clss.i_sendRequest(lRequestURL_str);*/
	};

	_private._onRequestCompleted = function(aEvent_obj)
	{
		/*var lEventData_clss = new JSEventData(aEvent_obj);

		document.getElementById('dialog_container_id').style = "display:block;";
		document.getElementById('dialog_content_id').innerHTML = lEventData_clss.i_getEventParams()[JSSimpleAjaxRequest.i_EVENT_PARAM_ID_RESPONSE_DATA];

		var lCode_str_arr = bsp.getCodeStringsArray(lEventData_clss.i_getEventParams()[JSSimpleAjaxRequest.i_EVENT_PARAM_ID_RESPONSE_DATA]);

		var lLength_int = lCode_str_arr.length;
		for (var i = 0; i < lLength_int; i++)
		{
			bsp.i_Eval(lCode_str_arr[i]);
		}*/
	};
	//...EVENTS

	_private._getSimpleAjaxRequest = function()
	{
		if (!this._fSimpleAjaxRequest_clss)
		{
			this._fSimpleAjaxRequest_clss = new JSSimpleAjaxRequest();
		}
		return this._fSimpleAjaxRequest_clss;
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCSiteDescriptionInfoView;
};