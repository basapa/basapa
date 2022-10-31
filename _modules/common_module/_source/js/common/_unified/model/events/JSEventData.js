bsp.i_getNamespace('bsp._unified_ns.model_ns.events_ns').i_importJSEventDataClass = function()
{
	var _ns = bsp._unified_ns.model_ns.events_ns;
	//INIT...
	if (_ns.JSCEventData)
	{
		return _ns.JSEventData;
	}

	//INHERITANCE IMPORT...
	var JSNativeEventData = bsp._unified_ns.model_ns.events_ns.i_importJSNativeEventDataClass();
	//...INHERITANCE IMPORT

	_ns.JSEventData = function(aEventObject_obj)
	{
		___constructor.call(this, aEventObject_obj);
	};
	var _self = _ns.JSEventData;
	bsp.i_setExtends(_self, JSNativeEventData);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function(aEventObject_obj)
	{
		_superclass.constructor.call(this, aEventObject_obj);
		this._initJSEventData();
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
	//...IMPORTS

	//CONSTS...
	//...CONSTS
	
	//STATIC...
	//...STATIC
	
	_private._initJSEventData = function()
	{
	};
	//...INIT

	//VARS...
	//...VARS

	//PUBLIC...
	_public.i_getEventObject = function()
	{
		return this.i_getNativeEventObject();
	};

	_public.i_getEventSource = function()
	{
		return this._getEventDetails().i_fEventSource_clss;
	};

	_public.i_getEventParams = function()
	{
		return this._getEventDetails().i_fEventParams_obj;
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	_private._getEventDetails = function()
	{
		return this.i_getEventObject().detail;
	};
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSEventData;
};