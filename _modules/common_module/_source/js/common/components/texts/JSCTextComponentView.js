bsp.i_getNamespace('bsp.components_ns.texts_ns').i_importJSCTextComponentViewClass = function()
{
	var _ns = bsp.components_ns.texts_ns;
	//INIT...
	if (_ns.JSCTextComponentView)
	{
		return _ns.JSCTextComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCComponentView = bsp.components_ns.i_importJSCComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCTextComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCTextComponentView;
	bsp.i_setExtends(_self, JSCComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCTextComponentView();
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

	_private._initJSCTextComponentView = function()
	{
	};
	//...INIT

	//VARS...
	//...VARS

	//PUBLIC...
	_public.i_setText = function(aText_str)
	{
		this._setText(aText_str);
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	_private._setText = function(aText_str)
	{
		this.i_getDOMElement().innerHTML = aText_str;
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCTextComponentView;
};