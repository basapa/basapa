bsp.i_getNamespace('bsp.components_ns.composite_ns').i_importJSCSelectCityFormCompositeComponentViewClass = function()
{
	var _ns = bsp.components_ns.composite_ns;
	//INIT...
	if (_ns.JSCSelectCityFormCompositeComponentView)
	{
		return _ns.JSCSelectCityFormCompositeComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCCompositeComponentView = bsp.components_ns.composite_ns.i_importJSCCompositeComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCSelectCityFormCompositeComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCSelectCityFormCompositeComponentView;
	bsp.i_setExtends(_self, JSCCompositeComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCSelectCityFormCompositeComponentView();
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
	var JSMainData = bsp.i_importJSMainDataClass();
	var JSURLTools = bsp._unified_ns.tools_ns.urls_ns.i_importJSURLToolsClass();
	var JSEvent = bsp._unified_ns.model_ns.events_ns.i_importJSEventClass();
	var JSEventData = bsp._unified_ns.model_ns.events_ns.i_importJSEventDataClass();
	var JSNativeEventData = bsp._unified_ns.model_ns.events_ns.i_importJSNativeEventDataClass();
	var JSJSONFileTools = bsp._unified_ns.model_ns.tools_ns.files_ns.i_importJSJSONFileToolsClass();
	var JSCSimpleListboxComponentView = bsp.components_ns.listboxes_ns.i_importJSCSimpleListboxComponentViewClass();
	var JSVariableType = bsp._unified_ns.tools_ns.variables_ns.i_importJSVariableTypeClass();
	//...IMPORTS

	//CONSTS...
	//JS PHP AGREEMENTS...
	_static_public_const.i_COMPOSITE_COMPONENT_ID_REGION_LISTBOX	= 'COMPOSITE_COMPONENT_ID_REGION_LISTBOX';
	_static_public_const.i_COMPOSITE_COMPONENT_ID_CITY_LISTBOX		= 'COMPOSITE_COMPONENT_ID_CITY_LISTBOX';
	//...JS PHP AGREEMENTS

	//EVENTS...
	_static_public_const.i_EVENT_ID_SOME_COMPONENT_ACCESSIBILITY_CHANGED	= "some_component_accessibility_changed";
	//...EVENTS
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSCSelectCityFormCompositeComponentView = function()
	{
	};
	//...INIT

	//VARS...
	_private._fSimpleAjaxRequest_clss = null;
	//...VARS

	//PUBLIC...
	_public.i_areAllComponentsEnabled = function()
	{
		var lRegionListboxCompositeComponent_clss = this.__getCompositeComponent(_self.i_COMPOSITE_COMPONENT_ID_REGION_LISTBOX);
		var lCityListboxCompositeComponent_clss = this.__getCompositeComponent(_self.i_COMPOSITE_COMPONENT_ID_CITY_LISTBOX);

		return lRegionListboxCompositeComponent_clss.i_isEnabled()
				&& lCityListboxCompositeComponent_clss.i_isEnabled();
	};
	//...PUBLIC

	//PROTECTED...
	_override_protected.__initDOMComponent = function()
	{
		_superclass.__initDOMComponent.call(this);

		var lRegionListboxCompositeComponent_clss = this.__getCompositeComponent(_self.i_COMPOSITE_COMPONENT_ID_REGION_LISTBOX);
		lRegionListboxCompositeComponent_clss.i_addEventListener(JSCComponentView.i_NATIVE_EVENT_ID_CHANGE, new JSEventHandler(this, this._onRegionListboxComponentChanged));
		lRegionListboxCompositeComponent_clss.i_addEventListener(JSCSimpleListboxComponentView.i_EVENT_ID_ACCESSIBILITY_CHANGED, new JSEventHandler(this, this._onListboxAccessibilityChanged));

		var lCityListboxCompositeComponent_clss = this.__getCompositeComponent(_self.i_COMPOSITE_COMPONENT_ID_CITY_LISTBOX);
		lCityListboxCompositeComponent_clss.i_addEventListener(JSCSimpleListboxComponentView.i_EVENT_ID_ACCESSIBILITY_CHANGED, new JSEventHandler(this, this._onListboxAccessibilityChanged));

		this._validateCityListboxAccessibility();
	};
	//...PROTECTED

	//PRIVATE...
	//EVENTS...
	_private._onRegionListboxComponentChanged = function(aEvent_obj)
	{
		var lCityListboxCompositeComponent_clss = this.__getCompositeComponent(_self.i_COMPOSITE_COMPONENT_ID_CITY_LISTBOX);
		lCityListboxCompositeComponent_clss.i_removeAllItems([0/*JS PHP AGREEMENTS in CCListboxComponentItem*/]);

		this._validateCityListboxAccessibility();

		var lNativeEventData_clss = new JSNativeEventData(aEvent_obj);

		var lRegionId_int = JSVariableType.i_toInt(lNativeEventData_clss.i_getNativeEventObject().target.value);
		if (lRegionId_int === 0/*JS PHP AGREEMENTS in CCListboxComponentItem*/)
		{
			return;
		}

		var lMainData_clss = bsp.main.i_getMainData();

		var lRequestStaticURLParams_obj = {};
		lRequestStaticURLParams_obj[JSMainData.i_GET_PARAM_ID_SITE] = lMainData_clss.i_getGETParamSiteId();
		lRequestStaticURLParams_obj[JSMainData.i_GET_PARAM_ID_PAGE] = lMainData_clss.i_getGETParamPageId();
		lRequestStaticURLParams_obj[JSMainData.i_GET_PARAM_ID_LANG] = lMainData_clss.i_getGETParamLangId();

		var lRequestDynamicURLParams_obj = {};
		lRequestDynamicURLParams_obj[JSMainData.i_GET_PARAM_ID_AJAX_REQUEST] = JSSimpleAjaxRequest.i_REQUEST_ID_GET_CITIES;

		var lRequestURL_str = JSURLTools.i_generateURLByParams(lRequestStaticURLParams_obj, lRequestDynamicURLParams_obj, true, true);

		var lRequestParams_obj = {};
		lRequestParams_obj[JSSimpleAjaxRequest.i_REQUEST_PARAM_ID_FIRST] = lRegionId_int;

		var lSimpleAjaxRequest_clss = this._getSimpleAjaxRequest();
		lSimpleAjaxRequest_clss.i_addEventListener(JSSimpleAjaxRequest.i_EVENT_ID_REQUEST_COMPLETED, new JSEventHandler(this, this._onRequestCompleted));
		lSimpleAjaxRequest_clss.i_sendRequest(lRequestURL_str, lRequestParams_obj);
	};

	_private._onRequestCompleted = function(aEvent_obj)
	{
		var lEventData_clss = new JSEventData(aEvent_obj);
		var lResponseData_str = lEventData_clss.i_getEventParams()[JSSimpleAjaxRequest.i_EVENT_PARAM_ID_RESPONSE_DATA];

		var lCityListboxCompositeComponent_clss = this.__getCompositeComponent(_self.i_COMPOSITE_COMPONENT_ID_CITY_LISTBOX);

		var lJSONData_obj = JSJSONFileTools.i_decodeJSON(lResponseData_str);

		for (var i in lJSONData_obj)
		{
			var l_obj = {};
			l_obj.i_fText_str = lJSONData_obj[i].name;
			l_obj.i_fValue_int = lJSONData_obj[i].id;

			lCityListboxCompositeComponent_clss.i_addItem(l_obj);
		}

		this._validateCityListboxAccessibility();
	};

	_private._onListboxAccessibilityChanged = function(aEvent_obj)
	{
		this.i_dispatchEvent(new JSEvent(_self.i_EVENT_ID_SOME_COMPONENT_ACCESSIBILITY_CHANGED, this));
	};
	//...EVENTS

	_private._validateCityListboxAccessibility = function()
	{
		var lRegionListboxCompositeComponent_clss = this.__getCompositeComponent(_self.i_COMPOSITE_COMPONENT_ID_REGION_LISTBOX);
		var lCityListboxCompositeComponent_clss = this.__getCompositeComponent(_self.i_COMPOSITE_COMPONENT_ID_CITY_LISTBOX);

		lCityListboxCompositeComponent_clss.i_setEnabled(
															lRegionListboxCompositeComponent_clss.i_getSelectedItemValue() !== 0/*JS PHP AGREEMENTS in CCListboxComponentItem*/
															&& lCityListboxCompositeComponent_clss.i_getItemsCount() > 1/*more than default items count*/
														);
	};

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

	return _ns.JSCSelectCityFormCompositeComponentView;
};