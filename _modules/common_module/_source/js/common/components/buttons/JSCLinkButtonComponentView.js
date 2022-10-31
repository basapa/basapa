bsp.i_getNamespace('bsp.components_ns.buttons_ns').i_importJSCLinkButtonComponentViewClass = function()
{
	var _ns = bsp.components_ns.buttons_ns;
	//INIT...
	if (_ns.JSCLinkButtonComponentView)
	{
		return _ns.JSCLinkButtonComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCButtonComponentView = bsp.components_ns.buttons_ns.i_importJSCButtonComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCLinkButtonComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCLinkButtonComponentView;
	bsp.i_setExtends(_self, JSCButtonComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCLinkButtonComponentView();
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
	//ATTRS...
	//...ATTRS
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSCLinkButtonComponentView = function()
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

	return _ns.JSCLinkButtonComponentView;
};