bsp.jsGetNamespace('bsp.modules_ns.forms_ns').importJSCFormsClass = function()
{
	var _ns = bsp.modules_ns.forms_ns;
	//INIT...
	if (_ns.JSCForms)
	{
		return _ns.JSCForms;
	}

	//INHERITANCE IMPORT...
	var JSCObject = bsp._unified_ns.importJSCObjectClass();
	//...INHERITANCE IMPORT

	_ns.JSCForms = function()
	{
		____constructor.call(this);
	};
	var _class = _ns.JSCForms;
	bsp.jsExtends(_class, JSCObject);

	var _prototype = _class.prototype;
	var _superclass = _class.superclass;

	var ____constructor;
	____constructor = function()
	{
		_superclass.constructor.call(this);
		this._jsInitJSCForms();
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
	var JSCException = bsp._unified_ns.exceptions_ns.importJSCExceptionClass();
	var JSCRegistrationForm = bsp.modules_ns.forms_ns.importJSCRegistrationFormClass();
	//...IMPORTS
	
	//CONSTS...
	_static_private_const._FORM_ID_REGISTRATION = 0;
	//...CONSTS
	
	//STATIC...
	//...STATIC
	
	_private._jsInitJSCForms = function()
	{
		this._fForms_clss_arr = [];
	};
	//...INIT
	
	//VARS...
	_private._fForms_clss_arr = null;
	//...VARS
	
	//PUBLIC...
	//REGISTRATION FORM...
	_public.jsGetRegistrationForm = function()
	{
		return this._jsGetRegistrationForm();
	};
	//...REGISTRATION FORM
	//...PUBLIC
	
	//PROTECTED...
	//...PROTECTED
	
	//PRIVATE...
	//REGISTRATION FORM...
	_private._jsGetRegistrationForm = function()
	{
		return this._jsGetForm(_static_private_const._FORM_ID_REGISTRATION);
	};
	//...REGISTRATION FORM
	
	_private._jsGetForm = function(aFormId_int)
	{
		return this._fForms_clss_arr[aFormId_int] || this._jsInitForm(aFormId_int);
	};
	
	_private._jsInitForm = function(aFormId_int)
	{
		var l_clss = this._jsGenerateForm(aFormId_int);
		this._fForms_clss_arr[aFormId_int] = l_clss;
		return l_clss;
	};
	
	_private._jsGenerateForm = function(aFormId_int)
	{
		var l_clss;
		
		switch (aFormId_int)
		{
			case _static_private_const._FORM_ID_REGISTRATION:
			{
				l_clss = new JSCRegistrationForm();
			}break;
			
			default:
				new JSCException('_jsGenerateForm', 'Unsupported form id: ' + aFormId_int);
			break;
		}
		
		return l_clss;
	};
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSCForms;
};