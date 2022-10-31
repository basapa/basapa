bsp.i_getNamespace('bsp._unified_ns.view_ns').i_importJSObjectMethodClass = function()
{
	var _ns = bsp._unified_ns.view_ns;
	//INIT...
	if (_ns.JSObjectMethod)
	{
		return _ns.JSObjectMethod;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSObjectMethod = function(aHandlerClass_obj, aMethod_func)
	{
		___constructor.call(this, aHandlerClass_obj, aMethod_func);
	};
	var _self = _ns.JSObjectMethod;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function(aHandlerClass_obj, aMethod_func)
	{
		this._initJSObjectMethod(aHandlerClass_obj, aMethod_func);
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
	
	_private._initJSObjectMethod = function(aHandlerClass_obj, aMethod_func)
	{
		this._fHandlerClass_obj = aHandlerClass_obj;
		this._fMethod_func = aMethod_func;
	};
	//...INIT

	//VARS...
	_private._fHandlerClass_obj = null;
	_private._fMethod_func = null;
	//...VARS

	//PUBLIC...
	_public.i_getHandlerClass = function()
	{
		return this._fHandlerClass_obj;
	};

	_public.i_getMethodFunc = function()
	{
		return this._fMethod_func;
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSObjectMethod;
};