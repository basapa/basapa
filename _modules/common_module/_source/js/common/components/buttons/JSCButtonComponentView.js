bsp.i_getNamespace('bsp.components_ns.buttons_ns').i_importJSCButtonComponentViewClass = function()
{
	var _ns = bsp.components_ns.buttons_ns;
	//INIT...
	if (_ns.JSCButtonComponentView)
	{
		return _ns.JSCButtonComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCComponentView = bsp.components_ns.i_importJSCComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCButtonComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCButtonComponentView;
	bsp.i_setExtends(_self, JSCComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCButtonComponentView();
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
	var JSEventHandler = bsp._unified_ns.controller_ns.events_ns.i_importJSEventHandlerClass();
	var JSNativeEventData = bsp._unified_ns.model_ns.events_ns.i_importJSNativeEventDataClass();
	//...IMPORTS

	//CONSTS...
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSCButtonComponentView = function()
	{
	};
	//...INIT

	//VARS...
	_private._fIsEnabled_bl = true;
	//...VARS

	//PUBLIC...
	_public.i_isEnabled = function()
	{
		return this._fIsEnabled_bl;
	};

	_public.i_setEnabled = function(a_bl)
	{
		a_bl = Boolean(a_bl);
		if (this._fIsEnabled_bl === a_bl)
		{
			return;
		}

		this._fIsEnabled_bl = a_bl;

		var lDOMComponentElement_obj = this.i_getDOMComponentElement();
		lDOMComponentElement_obj.disabled = !a_bl;

		//this.i_dispatchEvent(new Event(_self.i_EVENT_ID_ACCESSIBILITY_CHANGED, this));
	};
	//...PUBLIC

	//PROTECTED...
	//EVENTS...
	_virtual_protected.__onButtonComponentClick = function(aEvent_obj)
	{
		if (!this.i_isEnabled())
		{
			var lNativeEventData_clss = new JSNativeEventData(aEvent_obj);
			lNativeEventData_clss.i_preventDefault();
		}

		//console.log("__onButtonComponentClick: " + this.__getComponentId());
	};
	//...EVENTS

	_override_protected.__initDOMComponent = function()
	{
		_superclass.__initDOMComponent.call(this);

		this.i_addEventListener(JSCComponentView.i_NATIVE_EVENT_ID_CLICK, new JSEventHandler(this, this.__onButtonComponentClick));
	};
	//...PROTECTED

	//PRIVATE...
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCButtonComponentView;
};