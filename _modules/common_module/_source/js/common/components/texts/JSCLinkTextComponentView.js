bsp.i_getNamespace('bsp.components_ns.texts_ns').i_importJSCLinkTextComponentViewClass = function()
{
	var _ns = bsp.components_ns.texts_ns;
	//INIT...
	if (_ns.JSCLinkTextComponentView)
	{
		return _ns.JSCLinkTextComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCTextComponentView = bsp.components_ns.texts_ns.i_importJSCTextComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCLinkTextComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCLinkTextComponentView;
	bsp.i_setExtends(_self, JSCTextComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCLinkTextComponentView();
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

	_private._initJSCLinkTextComponentView = function()
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

	return _ns.JSCLinkTextComponentView;
};