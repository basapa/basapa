bsp.i_getNamespace('bsp.components_ns.labelfields_ns').i_importJSCLabelfieldComponentViewClass = function()
{
	var _ns = bsp.components_ns.labelfields_ns;
	//INIT...
	if (_ns.JSCLabelfieldComponentView)
	{
		return _ns.JSCLabelfieldComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCComponentView = bsp.components_ns.i_importJSCComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCLabelfieldComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCLabelfieldComponentView;
	bsp.i_setExtends(_self, JSCComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCLabelfieldComponentView();
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

	_private._initJSCLabelfieldComponentView = function()
	{
	};
	//...INIT

	//VARS...
	//...VARS

	//PUBLIC...
	_public.i_setValue = function(aValue_str)
	{
		this.i_getComponentElement().i_setText(aValue_str);
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCLabelfieldComponentView;
};