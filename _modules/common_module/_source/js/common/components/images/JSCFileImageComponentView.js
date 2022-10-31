bsp.i_getNamespace('bsp.components_ns.images_ns').i_importJSCFileImageComponentViewClass = function()
{
	var _ns = bsp.components_ns.images_ns;
	//INIT...
	if (_ns.JSCFileImageComponentView)
	{
		return _ns.JSCFileImageComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCImageComponentView = bsp.components_ns.images_ns.i_importJSCImageComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCFileImageComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCFileImageComponentView;
	bsp.i_setExtends(_self, JSCImageComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCFileImageComponentView();
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
	var JSEventHandler = bsp._unified_ns.controller_ns.events_ns.i_importJSEventHandlerClass();
	var JSCComponentView = bsp.components_ns.i_importJSCComponentViewClass();
	var JSCTextfieldComponentView = bsp.components_ns.textfields_ns.i_importJSCTextfieldComponentViewClass();
	//var CNativeEventData = bsp._unified_ns.model_ns.events_ns.i_importCNativeEventDataClass();
	var JSEvent = bsp._unified_ns.model_ns.events_ns.i_importJSEventClass();
	//...IMPORTS

	//CONSTS...
	//ATTRS...
	_static_public_const.i_COMPONENT_ATTR_ELEMENT_LOADING_ID			= "COMPONENT_ATTR_ELEMENT_LOADING_ID";
	_static_public_const.i_COMPONENT_ATTR_ELEMENT_DELETING_BUTTON_ID	= "COMPONENT_ATTR_ELEMENT_DELETING_BUTTON_ID";
	//...ATTRS

	//EVENTS...
	_static_public_const.i_EVENT_ID_ELEMENT_DELETING_BUTTON_CLICK		= "EVENT_ID_ELEMENT_DELETING_BUTTON_CLICK";
	//...EVENTS
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSCFileImageComponentView = function()
	{
	};
	//...INIT

	//VARS...
	_private._fComponentElementLoading_clss = null;
	_private._fComponentElementDeletingButton_clss = null;
	//...VARS

	//PUBLIC...
	_public.i_getDOMComponentElementLoading = function()
	{
		return this._fComponentElementLoading_clss || (this._fComponentElementLoading_clss = new JSObject(this._getComponentElementLoadingId()));
	};

	_public.i_getDOMComponentElementDeletingButton = function()
	{
		return this._fComponentElementDeletingButton_clss || (this._fComponentElementDeletingButton_clss = new JSObject(this._getComponentElementDeletingButtonId()));
	};
	//...PUBLIC

	//PROTECTED...
	_override_protected.__initDOMComponent = function()
	{
		_superclass.__initDOMComponent.call(this);

		this.i_getDOMComponentElementDeletingButton().i_addEventListener(JSCComponentView.i_NATIVE_EVENT_ID_CLICK, new JSEventHandler(this, this._onComponentElementDeletingButtonClick));
	};

	_virtual_protected.__isSrcSetted = function(aOptSrc_str)
	{
		return _superclass.__isSrcSetted.call(this, aOptSrc_str)
				&& JSCTextfieldComponentView.i_isValueSetted(this._getDOMInputElement(), aOptSrc_str);
	};

	_override_protected.__setSrc = function(aSrc_str)
	{
		_superclass.__setSrc.call(this, aSrc_str);

		JSCTextfieldComponentView.i_setValue(aSrc_str, this._getDOMInputElement());
	};
	//...PROTECTED

	//PRIVATE...
	//EVENTS...
	_private._onComponentElementDeletingButtonClick = function(aEvent_obj)
	{
		//var lNativeEventData_clss = new JSNativeEventData(aEvent_obj);

		JSCTextfieldComponentView.i_setValue("", this._getDOMInputElement());

		this.i_setStyle(JSDOMObject.i_STYLE_NAME_DISPLAY, JSDOMObject.i_STYLE_DISPLAY_VALUE_NONE);

		this.i_dispatchEvent(new JSEvent(_self.i_EVENT_ID_ELEMENT_DELETING_BUTTON_CLICK, this));
	};
	//...EVENTS

	_private._getDOMInputElement = function()
	{
		return this.i_getDOMChildElements('input')[0];
	};

	_private._getComponentElementLoadingId = function()
	{
		return this.__fComponentAttrs_obj[_self.i_COMPONENT_ATTR_ELEMENT_LOADING_ID];
	};

	_private._getComponentElementDeletingButtonId = function()
	{
		return this.__fComponentAttrs_obj[_self.i_COMPONENT_ATTR_ELEMENT_DELETING_BUTTON_ID];
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCFileImageComponentView;
};