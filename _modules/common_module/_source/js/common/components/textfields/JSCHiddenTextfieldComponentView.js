bsp.i_getNamespace('bsp.components_ns.textfields_ns').i_importJSCHiddenTextfieldComponentViewClass = function()
{
	var _ns = bsp.components_ns.textfields_ns;
	//INIT...
	if (_ns.JSCHiddenTextfieldComponentView)
	{
		return _ns.JSCHiddenTextfieldComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCTextfieldComponentView = bsp.components_ns.textfields_ns.i_importJSCTextfieldComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCHiddenTextfieldComponentView = function()
	{
		____constructor.call(this);
	};
	var _self = _ns.JSCHiddenTextfieldComponentView;
	bsp.i_setExtends(_self, JSCTextfieldComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ____constructor;
	____constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCHiddenTextfieldComponentView();
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

	_private._initJSCHiddenTextfieldComponentView = function()
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

	return _ns.JSCHiddenTextfieldComponentView;
};