bsp.i_getNamespace('bsp._unified_ns.controller_ns.events_ns').i_importJSEventHandlerClass = function()
{
	var _ns = bsp._unified_ns.controller_ns.events_ns;
	//INIT...
	if (_ns.JSEventHandler)
	{
		return _ns.JSEventHandler;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSEventHandler = function(aHandlerClass_obj, aHandler_func)
	{
		___constructor.call(this, aHandlerClass_obj, aHandler_func);
	};
	var _self = _ns.JSEventHandler;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function(aHandlerClass_obj, aHandler_func)
	{
		this._initJSEventHandler(aHandlerClass_obj, aHandler_func);
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
	
	_private._initJSEventHandler = function(aHandlerClass_obj, aHandler_func)
	{
		this._fHandlerClass_obj = aHandlerClass_obj;
		this._fHandler_func = aHandler_func;
		this._fBindingHandler_func = aHandler_func.bind(aHandlerClass_obj);
	};
	//...INIT

	//VARS...
	_private._fEventId_str = undefined;
	_private._fHandlerClass_obj = null;
	_private._fHandler_func = null;
	_private._fBindingHandler_func = null;
	//...VARS

	//PUBLIC...
	_public.i_setEventId = function(aEventId_str)
	{
		this._fEventId_str = aEventId_str;
	};

	_public.i_getEventId = function()
	{
		return this._fEventId_str;
	};

	_public.i_getHandlerClass = function()
	{
		return this._fHandlerClass_obj;
	};

	_public.i_getHandlerFunc = function()
	{
		return this._fHandler_func;
	};

	_public.i_getBindingHandlerFunc = function()
	{
		return this._fBindingHandler_func;
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSEventHandler;
};