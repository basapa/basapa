bsp.i_getNamespace('bsp.components_ns.labelfields_ns').i_importJSCSimpleLabelfieldComponentViewClass = function()
{
	var _ns = bsp.components_ns.labelfields_ns;
	//INIT...
	if (_ns.JSCSimpleLabelfieldComponentView)
	{
		return _ns.JSCSimpleLabelfieldComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCLabelfieldComponentView = bsp.components_ns.labelfields_ns.i_importJSCLabelfieldComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCSimpleLabelfieldComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCSimpleLabelfieldComponentView;
	bsp.i_setExtends(_self, JSCLabelfieldComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCSimpleLabelfieldComponentView();
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

	_private._initJSCSimpleLabelfieldComponentView = function()
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

	return _ns.JSCSimpleLabelfieldComponentView;
};