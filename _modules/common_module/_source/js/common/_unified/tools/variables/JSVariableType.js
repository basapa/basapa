bsp.i_getNamespace('bsp._unified_ns.tools_ns.variables_ns').i_importJSVariableTypeClass = function()
{
	var _ns = bsp._unified_ns.tools_ns.variables_ns;
	//INIT...
	if (_ns.JSVariableType)
	{
		return _ns.JSVariableType;
	}

	_ns.JSVariableType = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSVariableType;

	var _prototype = _self.prototype;

	var ___constructor;
	___constructor = function()
	{
		this._initJSVariableType();
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
	//...IMPORTS

	//CONSTS...
	//...CONSTS
	
	//STATIC...
	_static_public.i_isInt = function (aValue_obj)
	{
		return _static_public.i_isNumber(aValue_obj)
				&&
				(
					aValue_obj === (aValue_obj | 0)
					|| (aValue_obj === Math.floor(aValue_obj))
				);
	};
	
	_static_public.i_isNumber = function (aValue_obj)
	{
		return (aValue_obj === aValue_obj - 0);
	};

	_static_public.i_isString = function (aValue_obj)
	{
		return typeof(aValue_obj) === "string";
	};

	_static_public.i_isBoolean = function (aValue_obj)
	{
		return typeof(aValue_obj) === "boolean";
	};
	
	_static_public.i_isObject = function (aValue_obj)
	{
		return aValue_obj instanceof Object;
	};
	
	_static_public.i_isArray = function (aValue_obj)
	{
		return aValue_obj instanceof Array;
	};
	
	_static_public.i_isFunction = function (aValue_obj)
	{
		return aValue_obj instanceof Function;
	};
	
	_static_public.i_isClassType = function (aValue_obj, aClassType_obj)
	{
		return aValue_obj instanceof aClassType_obj;
	};

	_static_public.i_toInt = function (aValue_obj)
	{
		var l_num = _self.i_toNumber(aValue_obj);
		return l_num > 0 ? Math.floor(l_num) : Math.ceil(l_num);
	};

	_static_public.i_toNumber = function (aValue_obj)
	{
		return Number(aValue_obj);
	};

	_static_public.i_toArray = function(a_str)
	{
		if (!_static_public.i_isString(a_str))
		{
			new CException('i_toArray', 'Value not string: ' + a_str);
		}

		return a_str ? a_str.split(',') : null;
	};

	_static_public.i_toObject = function(a_str)
	{
		if (!_static_public.i_isString(a_str))
		{
			new CException('i_toObject', 'Value not string: ' + a_str);
		}

		var l_obj = null;

		if (a_str)
		{
			l_obj = {};

			var l_str_arr = a_str.split(';');
			var lLength_int = l_str_arr.length;
			for (var i = 0; i < lLength_int; i++)
			{
				var lElements_str_arr = l_str_arr[i].split(':');
				l_obj[lElements_str_arr[0]] = lElements_str_arr[1];
			}
		}
		return l_obj;
	};
	//...STATIC
	
	_private._initJSVariableType = function()
	{
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

	return _ns.JSVariableType;
};