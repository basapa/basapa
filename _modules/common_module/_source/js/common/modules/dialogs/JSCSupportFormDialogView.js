bsp.i_getNamespace('bsp.modules_ns.dialogs_ns').i_importJSCSupportFormDialogViewClass = function()
{
	var _ns = bsp.modules_ns.dialogs_ns;
	//INIT...
	if (_ns.JSCSupportFormDialogView)
	{
		return _ns.JSCSupportFormDialogView;
	}

	//INHERITANCE IMPORT...
	var JSCDialogVieww = bsp.modules_ns.dialogs_ns.i_importJSCDialogViewwClass();
	//...INHERITANCE IMPORT

	_ns.JSCSupportFormDialogView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCSupportFormDialogView;
	bsp.i_setExtends(_self, JSCDialogVieww);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCSupportFormDialogView();
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
	var JSComponentView = bsp.components_ns.i_importJSComponentViewClass();
	var JSFormView = bsp.modules_ns.forms_ns.i_importJSFormViewClass();
	var JSNativeEventData = bsp._unified_ns.model_ns.events_ns.i_importJSNativeEventDataClass();
	var JSSimpleAjaxRequest = bsp._unified_ns.controller_ns.requests_ns.i_importJSSimpleAjaxRequestClass();
	var JSEventData = bsp._unified_ns.model_ns.events_ns.i_importJSEventDataClass();
	var JSURLTools = bsp._unified_ns.controller_ns.tools_ns.i_importJSURLToolsClass();
	var JSMainData = bsp.i_importJSMainDataClass();
	//...IMPORTS
	
	//CONSTS...
	//JS PHP AGREEMENTS...
	_static_public_const.i_DIALOG_MODULE_ID_SUPPORT_FORM	= 0;
	//...JS PHP AGREEMENTS
	//...CONSTS
	
	//STATIC...
	//...STATIC
	
	_private._initJSCSupportFormDialogView = function()
	{
	};
	//...INIT
	
	//VARS...
	_private._fSimpleAjaxRequest_clss = null;
	//...VARS
	
	//PUBLIC...
	//...PUBLIC
	
	//PROTECTED...
	_override_protected.__initDOMDialog = function()
	{
		_superclass.__initDOMDialog.call(this);

		//var lSupportForm_clss = this.__getDialogModule(_self.i_DIALOG_MODULE_ID_SUPPORT_FORM);
		//var lSupportFormSubmitButton_clss = lSupportForm_clss.i_getFormComponent(CFormView.i_FORM_COMPONENT_ID_SUBMIT_BUTTON);
		//lSupportFormSubmitButton_clss.i_addEventListener(CComponentView.i_NATIVE_EVENT_ID_CLICK, new CEventHandler(this, this._onSubmitButtonComponentClick));
	};
	//...PROTECTED
	
	//PRIVATE...
	//EVENTS...
	_private._onSubmitButtonComponentClick = function(aEvent_obj)
	{
		/*var lNativeEventData_clss = new CNativeEventData(aEvent_obj);
		lNativeEventData_clss.i_PreventDefault();

		var lMainData_clss = bsp.CMain.i_getMainData();

		var lRequestStaticURLParams_obj = {};
		lRequestStaticURLParams_obj[CMainData.i_GET_PARAM_ID_SITE] = lMainData_clss.i_getGETParamSiteId();
		lRequestStaticURLParams_obj[CMainData.i_GET_PARAM_ID_PAGE] = lMainData_clss.i_getGETParamPageId();
		lRequestStaticURLParams_obj[CMainData.i_GET_PARAM_ID_LANG] = lMainData_clss.i_getGETParamLangId();

		var lRequestDynamicURLParams_obj = {};
		lRequestDynamicURLParams_obj[CMainData.i_GET_PARAM_ID_AJAX_REQUEST] = CSimpleAjaxRequest.i_REQUEST_ID_SUBMIT_SUPPORT;

		var lRequestURL_str = CURLTools.i_generateURLByParams(lRequestStaticURLParams_obj, lRequestDynamicURLParams_obj, true, true);

		var lSimpleAjaxRequest_clss = this._getSimpleAjaxRequest();
		lSimpleAjaxRequest_clss.i_addEventListener(CSimpleAjaxRequest.i_EVENT_ID_REQUEST_COMPLETED, new CEventHandler(this, this._onRequestCompleted));
		lSimpleAjaxRequest_clss.i_sendRequest(lRequestURL_str);*/
	};

	_private._onRequestCompleted = function(aEvent_obj)
	{
		//var lEventData_clss = new CEventData(aEvent_obj);

		/*document.getElementById('dialog_container_id').style = "display:block;";
		document.getElementById('dialog_content_id').innerHTML = lEventData_clss.i_getEventParams()[CSimpleAjaxRequest.i_EVENT_PARAM_ID_RESPONSE_DATA];

		var lCode_str_arr = bsp.getCodeStringsArray(lEventData_clss.i_getEventParams()[CSimpleAjaxRequest.i_EVENT_PARAM_ID_RESPONSE_DATA]);

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

	return _ns.JSCSupportFormDialogView;
};