bsp.i_getNamespace('bsp.components_ns.buttons_ns').i_importJSCSubmitButtonComponentViewClass = function()
{
	var _ns = bsp.components_ns.buttons_ns;
	//INIT...
	if (_ns.JSCSubmitButtonComponentView)
	{
		return _ns.JSCSubmitButtonComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCButtonComponentView = bsp.components_ns.buttons_ns.i_importJSCButtonComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCSubmitButtonComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCSubmitButtonComponentView;
	bsp.i_setExtends(_self, JSCButtonComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCSubmitButtonComponentView();
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
	var JSObject = bsp._unified_ns.view_ns.i_importJSObjectClass();
	var JSDOMObject = bsp._unified_ns.view_ns.i_importJSDOMObjectClass();
	var JSDOMTools = bsp._unified_ns.tools_ns.i_importJSDOMToolsClass();
	var JSNativeEventData = bsp._unified_ns.model_ns.events_ns.i_importJSNativeEventDataClass();
	//var CEventHandler = bsp._unified_ns.controller_ns.events_ns.i_importCEventHandlerClass();
	//var CComponentView = bsp.components_ns.i_importCComponentViewClass();
	//...IMPORTS

	//CONSTS...
	//ATTRS...
	_static_public_const.i_COMPONENT_ATTR_ELEMENT_BLOCKING_ID	= "COMPONENT_ATTR_ELEMENT_BLOCKING_ID";
	//...ATTRS
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSCSubmitButtonComponentView = function()
	{
	};
	//...INIT

	//VARS...
	_private._fComponentElementBlocking_clss = null;
	_private._fComponentElementName_clss = null;
	//...VARS

	//PUBLIC...
	_public.i_getDOMComponentElementBlocking = function()
	{
		return this._fComponentElementBlocking_clss || (this._fComponentElementBlocking_clss = new JSObject(this._getComponentElementBlockingId()));
	};

	_public.i_getDOMComponentElementName = function()
	{
		if (!this._fComponentElementName_clss)
		{
			var l_clss = new JSCObject();
			l_clss.___setDOMElement(this.i_getComponentElement().i_getDOMChildElements()[0]);
			this._fComponentElementName_clss = l_clss;
		}
		return this._fComponentElementName_clss;
	};
	//...PUBLIC

	//PROTECTED...
	//EVENTS...
	_override_protected.__onButtonComponentClick = function(aEvent_obj)
	{
		_superclass.__onButtonComponentClick.call(this, aEvent_obj);

		var lNativeEventData_clss = new JSNativeEventData(aEvent_obj);
		if (lNativeEventData_clss.i_isDefaultPrevented())
		{
			return;
		}

		this.i_getDOMComponentElementBlocking().i_setStyle(JSDOMObject.i_STYLE_NAME_DISPLAY, JSDOMTools.i_STYLE_DISPLAY_VALUE_BLOCK);
		this.i_getDOMComponentElementName().i_setStyle(JSDOMObject.i_STYLE_NAME_VISIBILITY, JSDOMTools.i_STYLE_VISIBILITY_VALUE_HIDDEN);
	};
	//...EVENTS
	//...PROTECTED

	//PRIVATE...
	_private._getComponentElementBlockingId = function()
	{
		return this.__fComponentAttrs_obj[_self.i_COMPONENT_ATTR_ELEMENT_BLOCKING_ID];
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCSubmitButtonComponentView;
};