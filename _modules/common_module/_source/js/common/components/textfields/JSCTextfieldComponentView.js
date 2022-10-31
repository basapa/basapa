bsp.i_getNamespace('bsp.components_ns.textfields_ns').i_importJSCTextfieldComponentViewClass = function()
{
	var _ns = bsp.components_ns.textfields_ns;
	//INIT...
	if (_ns.JSCTextfieldComponentView)
	{
		return _ns.JSCTextfieldComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCComponentView = bsp.components_ns.i_importJSCComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCTextfieldComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCTextfieldComponentView;
	bsp.i_setExtends(_self, JSCComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCTextfieldComponentView();
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
	_static_public.i_setValue = function(aValue_str, aDOMElement_obj)
	{
		aDOMElement_obj.value = aValue_str;
	};

	_static_public.i_isValueSetted = function(aDOMElement_obj, aOptValue_str)
	{
		var lValue_str = aOptValue_str !== undefined ? aOptValue_str : "";
		return aDOMElement_obj.value !== lValue_str;
	};
	//...STATIC

	_private._initJSCTextfieldComponentView = function()
	{
	};
	//...INIT

	//VARS...
	//...VARS

	//PUBLIC...
	_public.i_setValue = function(aValue_str)
	{
		this._setValue(aValue_str);
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	_private._setValue = function(aValue_str)
	{
		_self.i_setValue(aValue_str, this.i_getDOMElement());
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCTextfieldComponentView;
};