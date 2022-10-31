bsp.i_getNamespace('bsp._unified_ns.controller_ns.exceptions_ns').i_importJSExceptionClass = function()
{
	var _ns = bsp._unified_ns.controller_ns.exceptions_ns;
	//INIT...
	if (_ns.JSException)
	{
		return _ns.JSException;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSException = function(aFuncName_str, aMessage_str)
	{
		___constructor.call(this, aFuncName_str, aMessage_str);
	};
	var _self = _ns.JSException;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function(aFuncName_str, aMessage_str)
	{
		this._initJSException(aFuncName_str, aMessage_str);
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
	
	_private._initJSException = function(aFuncName_str, aOptMessage_str)
	{
		try
		{
			i.dont.exist += 0;
		}
		catch (aError_obj)
		{
		}
		
		var lMessage_str = aOptMessage_str ? aOptMessage_str : 'unknown error';
		
		console.log('[' + aFuncName_str + '] ' + lMessage_str);

		throw this;
	};
	//...INIT

	//VARS...
	//...VARS

	//PUBLIC...
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSException;
};