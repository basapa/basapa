bsp.jsGetNamespace('bsp.pages_ns').importJSCRegistrationPageClass = function()
{
	var _ns = bsp.pages_ns;
	//INIT...
	if (_ns.JSCRegistrationPage)
	{
		return _ns.JSCRegistrationPage;
	}

	//INHERITANCE IMPORT...
	var JSCPageBase = bsp.pages_ns.importJSCPageBaseClass();
	//...INHERITANCE IMPORT

	_ns.JSCRegistrationPage = function()
	{
		____constructor.call(this);
	};
	var _class = _ns.JSCRegistrationPage;
	bsp.jsExtends(_class, JSCPageBase);

	var _prototype = _class.prototype;
	var _superclass = _class.superclass;

	var ____constructor;
	____constructor = function()
	{
		_superclass.constructor.call(this);
		this._jsInitJSCRegistrationPage();
	};

	var _static_public = _class;
	var _static_private = _class;
	var _static_public_const = _class;
	var _static_private_const = _class;
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

	_private._jsInitJSCRegistrationPage = function()
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

	return _ns.JSCRegistrationPage;
};