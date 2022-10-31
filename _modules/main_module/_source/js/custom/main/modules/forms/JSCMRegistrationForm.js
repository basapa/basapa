bsp.jsGetNamespace('bsp.modules_ns.forms_ns').importJSCRegistrationFormClass = function()
{
	var _ns = bsp.modules_ns.forms_ns;
	//INIT...
	if (_ns.JSCRegistrationForm)
	{
		return _ns.JSCRegistrationForm;
	}

	//INHERITANCE IMPORT...
	var JSCFormBase = bsp.modules_ns.forms_ns.importJSCFormBaseClass();
	//...INHERITANCE IMPORT

	_ns.JSCRegistrationForm = function()
	{
		____constructor.call(this);
	};
	var _class = _ns.JSCRegistrationForm;
	bsp.jsExtends(_class, JSCFormBase);

	var _prototype = _class.prototype;
	var _superclass = _class.superclass;

	var ____constructor;
	____constructor = function()
	{
		_superclass.constructor.call(this);
		this._jsInitJSCRegistrationForm();
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
	var JSCEvent = bsp._unified_ns.events_ns.importJSCEventClass();
	var JSCSimpleTextfieldComponent = bsp.components_ns.textfields_ns.importJSCSimpleTextfieldComponentClass();
	//...IMPORTS
	
	//CONSTS...
	//JS PHP AGREEMENTS...
	_static_public_const.FORM_COMPONENT_ID_LOGIN_TEXTFIELD	= 0;
	//...JS PHP AGREEMENTS
	//...CONSTS
	
	//STATIC...
	//...STATIC
	
	_private._jsInitJSCRegistrationForm = function()
	{
	};
	//...INIT
	
	//VARS...
	//...VARS
	
	//PUBLIC...
	//...PUBLIC
	
	//PROTECTED...
	//EVENTS...
	/*_override_protected.__jsOnSubmitButtonComponentClick = function(aEvent_obj)
	{
		_superclass.__jsOnSubmitButtonComponentClick.call(this, aEvent_obj);

		if (!this._jsValidateFormComponents())
		{
			aEvent_obj.preventDefault();
		}
	};*/
	//...EVENTS
	//...PROTECTED
	
	//PRIVATE...
	//VALIDATE COMPONENTS...
	_private._jsValidateFormComponents = function()
	{
		return this._jsValidateLoginTextfieldFormComponent();
	};

	_private._jsValidateLoginTextfieldFormComponent = function()
	{
		return this.__jsValidateTextfieldFormComponent(_static_public_const.FORM_COMPONENT_ID_LOGIN_TEXTFIELD);
	};
	//...VALIDATE COMPONENTS
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSCRegistrationForm;
};