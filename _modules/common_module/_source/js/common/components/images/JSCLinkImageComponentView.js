bsp.i_getNamespace('bsp.components_ns.images_ns').i_importJSCLinkImageComponentViewClass = function()
{
	var _ns = bsp.components_ns.images_ns;
	//INIT...
	if (_ns.JSCLinkImageComponentView)
	{
		return _ns.JSCLinkImageComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCImageComponentView = bsp.components_ns.images_ns.i_importJSCImageComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCLinkImageComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.CCLinkImageComponentView;
	bsp.i_setExtends(_self, JSCImageComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCLinkImageComponentView();
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

	_private._initJSCLinkImageComponentView = function()
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

	return _ns.JSCLinkImageComponentView;
};