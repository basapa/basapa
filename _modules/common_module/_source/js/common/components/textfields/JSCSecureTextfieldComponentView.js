bsp.i_getNamespace('bsp.components_ns.textfields_ns').i_importJSCSecureTextfieldComponentViewClass = function()
{
	var _ns = bsp.components_ns.textfields_ns;
	//INIT...
	if (_ns.JSCSecureTextfieldComponentView)
	{
		return _ns.JSCSecureTextfieldComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCTextfieldComponentView = bsp.components_ns.textfields_ns.i_importJSCTextfieldComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCSecureTextfieldComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCSecureTextfieldComponentView;
	bsp.i_setExtends(_self, JSCTextfieldComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCSecureTextfieldComponentView();
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

	_private._initJSCSecureTextfieldComponentView = function()
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

	return _ns.JSCSecureTextfieldComponentView;
};