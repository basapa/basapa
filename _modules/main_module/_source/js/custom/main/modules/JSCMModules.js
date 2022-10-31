bsp.jsGetNamespace('bsp.modules_ns').importJSCModulesClass = function()
{
	var _ns = bsp.modules_ns;
	//INIT...
	if (_ns.JSCModules)
	{
		return _ns.JSCModules;
	}

	//INHERITANCE IMPORT...
	var JSCObject = bsp._unified_ns.importJSCObjectClass();
	//...INHERITANCE IMPORT

	_ns.JSCModules = function()
	{
		____constructor.call(this);
	};
	var _class = _ns.JSCModules;
	bsp.jsExtends(_class, JSCObject);

	var _prototype = _class.prototype;
	var _superclass = _class.superclass;

	var ____constructor;
	____constructor = function()
	{
		_superclass.constructor.call(this);
		this._jsInitJSCModules();
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
	var JSCForms = bsp.modules_ns.forms_ns.importJSCFormsClass();
	//...IMPORTS

	//CONSTS...
	//...CONSTS
	
	//STATIC...
	//...STATIC
	
	_private._jsInitJSCModules = function()
	{
	};
	//...INIT

	//VARS...
	_private._fForms_clss = null;
	//...VARS

	//PUBLIC...
	_public.jsGetForms = function()
	{
		return this._jsGetForms();
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	//FORMS...
	_private._jsGetForms = function()
	{
		return this._fForms_clss || this._jsInitForms();
	};
	
	_private._jsInitForms = function()
	{
		var l_clss = new JSCForms();
		this._fForms_clss = l_clss;
		return l_clss;
	};
	//...FORMS
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSCModules;
};