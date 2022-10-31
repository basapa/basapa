bsp.i_getNamespace('bsp._unified_ns.model_ns.events_ns').i_importJSNativeEventDataClass = function()
{
	var _ns = bsp._unified_ns.model_ns.events_ns;
	//INIT...
	if (_ns.JSNativeEventData)
	{
		return _ns.JSNativeEventData;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSNativeEventData = function(aNativeEventObject_obj)
	{
		___constructor.call(this, aNativeEventObject_obj);
	};
	var _self = _ns.JSNativeEventData;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function(aNativeEventObject_obj)
	{
		this._initJSNativeEventData(aNativeEventObject_obj);
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
	
	_private._initJSNativeEventData = function(aNativeEventObject_obj)
	{
		this._fNativeEventObject_obj = aNativeEventObject_obj;
	};
	//...INIT

	//VARS...
	_private._fNativeEventObject_obj = null;
	//...VARS

	//PUBLIC...
	_public.i_getNativeEventObject = function()
	{
		return this._fNativeEventObject_obj;
	};

	_public.i_preventDefault = function()
	{
		this._fNativeEventObject_obj.preventDefault();
	};

	_public.i_isDefaultPrevented = function()
	{
		return this._fNativeEventObject_obj.defaultPrevented;
	};

	_public.i_stopPropagation = function()
	{
		this._fNativeEventObject_obj.stopPropagation();
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSNativeEventData;
};