bsp.jsGetNamespace('bsp.modules_ns.forms_ns').importJSCLoginFormClass = function()
{
	var _ns = bsp.modules_ns.forms_ns;
	//INIT...
	if (_ns.JSCLoginForm)
	{
		return _ns.JSCLoginForm;
	}

	//INHERITANCE IMPORT...
	var JSCFormBase = bsp.modules_ns.forms_ns.importJSCFormBaseClass();
	//...INHERITANCE IMPORT

	_ns.JSCLoginForm = function()
	{
		____constructor.call(this);
	};
	var _class = _ns.JSCLoginForm;
	bsp.jsExtends(_class, JSCFormBase);

	var _prototype = _class.prototype;
	var _superclass = _class.superclass;

	var ____constructor;
	____constructor = function()
	{
		_superclass.constructor.call(this);
		this._jsInitJSCLoginForm();
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

	_private._jsInitJSCLoginForm = function()
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

	return _ns.JSCLoginForm;
};