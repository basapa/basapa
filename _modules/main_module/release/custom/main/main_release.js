bsp.jsGetNamespace('bsp.modules_ns.infos_ns').importJSCInfoBaseClass = function()
{
	var _ns = bsp.modules_ns.infos_ns;
	//INIT...
	if (_ns.JSCInfoBase)
	{
		return _ns.JSCInfoBase;
	}

	//INHERITANCE IMPORT...
	var JSCDOMObject = bsp._unified_ns.importJSCDOMObjectClass();
	//...INHERITANCE IMPORT

	_ns.JSCInfoBase = function()
	{
		____constructor.call(this);
	};
	var _class = _ns.JSCInfoBase;
	bsp.jsExtends(_class, JSCDOMObject);

	var _prototype = _class.prototype;
	var _superclass = _class.superclass;

	var ____constructor;
	____constructor = function()
	{
		_superclass.constructor.call(this);
		this._jsInitJSCInfoBase();
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

	_private._jsInitJSCInfoBase = function()
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

	return _ns.JSCInfoBase;
};bsp.jsGetNamespace('bsp.modules_ns.forms_ns').importJSCRegistrationFormClass = function()
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
};bsp.jsGetNamespace('bsp.modules_ns.forms_ns').importJSCLogoutFormClass = function()
{
	var _ns = bsp.modules_ns.forms_ns;
	//INIT...
	if (_ns.JSCLogoutForm)
	{
		return _ns.JSCLogoutForm;
	}

	//INHERITANCE IMPORT...
	var JSCFormBase = bsp.modules_ns.forms_ns.importJSCFormBaseClass();
	//...INHERITANCE IMPORT

	_ns.JSCLogoutForm = function()
	{
		____constructor.call(this);
	};
	var _class = _ns.JSCLogoutForm;
	bsp.jsExtends(_class, JSCFormBase);

	var _prototype = _class.prototype;
	var _superclass = _class.superclass;

	var ____constructor;
	____constructor = function()
	{
		_superclass.constructor.call(this);
		this._jsInitJSCLogoutForm();
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

	_private._jsInitJSCLogoutForm = function()
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

	return _ns.JSCLogoutForm;
};bsp.jsGetNamespace('bsp.pages_ns').importJSCRegistrationPageClass = function()
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
};bsp.jsGetNamespace('bsp.pages_ns').importJSCPagesClass = function()
{
	var _ns = bsp.pages_ns;
	//INIT...
	if (_ns.JSCPages)
	{
		return _ns.JSCPages;
	}

	//INHERITANCE IMPORT...
	var JSCObject = bsp._unified_ns.importJSCObjectClass();
	//...INHERITANCE IMPORT

	_ns.JSCPages = function()
	{
		____constructor.call(this);
	};
	var _class = _ns.JSCPages;
	bsp.jsExtends(_class, JSCObject);

	var _prototype = _class.prototype;
	var _superclass = _class.superclass;

	var ____constructor;
	____constructor = function()
	{
		_superclass.constructor.call(this);
		this._jsInitJSCPages();
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
	//var JSCRegistrationPage = bsp.pages_ns.importJSCRegistrationPageClass();
	//...IMPORTS

	//CONSTS...
	_static_public_const.PAGE_ID_REGISTRATION = 0;
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._jsInitJSCPages = function()
	{
		this._fPages_clss_arr = [];
	};
	//...INIT

	//VARS...
	_private._fPages_clss_arr = null;
	//...VARS

	//PUBLIC...
	//REGISTRATION PAGE...
	_public.jsGetRegistrationPage = function()
	{
		return this._jsGetRegistrationPage();
	};
	//...REGISTRATION PAGE
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	//REGISTRATION PAGE...
	_private._jsGetRegistrationPage = function()
	{
		return this._jsGetPage(_static_public_const.PAGE_ID_REGISTRATION);
	};
	//...REGISTRATION PAGE

	_private._jsGetPage = function(aPageId_int)
	{
		return this._fPages_clss_arr[aPageId_int] || this._jsInitPage(aPageId_int);
	};

	_private._jsInitPage = function(aPageId_int)
	{
		var l_clss = this._jsGeneratePage(aPageId_int);
		this._fPages_clss_arr[aPageId_int] = l_clss;
		return l_clss;
	};

	_private._jsGeneratePage = function(aPageId_int)
	{
		var l_clss;

		switch (aPageId_int)
		{
			case _static_public_const.PAGE_ID_REGISTRATION:
			{
				l_clss = new JSCRegistrationPage();
			}break;

			default:
				new JSCException('_jsGeneratePage', 'Unsupported page id: ' + aPageId_int);
			break;
		}

		return l_clss;
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCPages;
};bsp.jsGetNamespace('bsp.modules_ns.infos_ns').importJSCInfosClass = function()
{
	var _ns = bsp.modules_ns.infos_ns;
	//INIT...
	if (_ns.JSCInfos)
	{
		return _ns.JSCInfos;
	}

	//INHERITANCE IMPORT...
	var JSCObject = bsp._unified_ns.importJSCObjectClass();
	//...INHERITANCE IMPORT

	_ns.JSCInfos = function()
	{
		____constructor.call(this);
	};
	var _class = _ns.JSCInfos;
	bsp.jsExtends(_class, JSCObject);

	var _prototype = _class.prototype;
	var _superclass = _class.superclass;

	var ____constructor;
	____constructor = function()
	{
		_superclass.constructor.call(this);
		this._jsInitJSCInfos();
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
	//...IMPORTS

	//CONSTS...
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._jsInitJSCInfos = function()
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

	return _ns.JSCInfos;
};bsp.jsGetNamespace('bsp.modules_ns.forms_ns').importJSCLoginFormClass = function()
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
};bsp.jsGetNamespace('bsp.modules_ns.forms_ns').importJSCFormsClass = function()
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
};bsp.jsGetNamespace('bsp.modules_ns.forms_ns').importJSCFormBaseClass = function()
{
	var _ns = bsp.modules_ns.forms_ns;
	//INIT...
	if (_ns.JSCFormBase)
	{
		return _ns.JSCFormBase;
	}

	//INHERITANCE IMPORT...
	var JSCEventDispatcher = bsp._unified_ns.events_ns.importJSCEventDispatcherClass();
	//...INHERITANCE IMPORT

	_ns.JSCFormBase = function()
	{
		____constructor.call(this);
	};
	var _class = _ns.JSCFormBase;
	bsp.jsExtends(_class, JSCEventDispatcher);

	var _prototype = _class.prototype;
	var _superclass = _class.superclass;

	var ____constructor;
	____constructor = function()
	{
		_superclass.constructor.call(this);
		this._jsInitJSCFormBase();
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
	var JSCEventHandler = bsp._unified_ns.events_ns.importJSCEventHandlerClass();
	var JSCSubmitButtonComponent = bsp.components_ns.buttons_ns.importJSCSubmitButtonComponentClass();
	//...IMPORTS

	//CONSTS...
	//JS PHP AGREEMENTS...
	_static_public_const.FORM_ATTR_ID														= 'FORM_ATTR_ID';

	_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_ID									= 'FORM_COMPONENT_VALIDATION_PARAM_ID';
	_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_VALUE_FILLING_MODE					= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_FILLING_MODE';
	_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_VALUE_WRONG_CHARS_COUNT_MESSAGE	= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_WRONG_CHARS_COUNT_MESSAGE';
	_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_VALUE_ILLEGAL_CHARS_MESSAGE		= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_ILLEGAL_CHARS_MESSAGE';
	_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_VALUE_PLACEHOLDER					= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_PLACEHOLDER';
	_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_VALUE_VALIDATION_PATTERN			= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_VALIDATION_PATTERN';
	_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_VALUE_MIN_CHARS_COUNT				= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_MIN_CHARS_COUNT';
	_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_VALUE_MAX_CHARS_COUNT				= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_MAX_CHARS_COUNT';

	_static_public_const.FORM_COMPONENT_ID_HIDDEN_TEXTFIELD	= 99;
	_static_public_const.FORM_COMPONENT_ID_SUBMIT_BUTTON	= 100;
	//...JS PHP AGREEMENTS
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._jsInitJSCFormBase = function()
	{
		this._fFormAttrs_obj = {};
		this._fFormComponents_clss_arr = [];
		this._fFormComponentsValidationParams_obj = {};
	};
	//...INIT

	//VARS...
	_private._fFormAttrs_obj = null;
	_private._fFormComponents_clss_arr = null;
	_private._fFormComponentsValidationParams_obj = null;
	//...VARS

	//PUBLIC...
	_public.jsSetFormAttrs = function(aAttrs_str_obj)
	{
		this.__jsSetFormAttrs(aAttrs_str_obj);
	};

	_public.jsSetFormComponentValidationParams = function(aFormComponentId_int, aFormComponentValidationParams_str_obj)
	{
		this._jsSetFormComponentValidationParams(aFormComponentId_int, aFormComponentValidationParams_str_obj);
	};

	_public.jsInitFormComponent = function(aFormComponentId_int, aFormComponent_clss)
	{
		this._jsInitFormComponent(aFormComponentId_int, aFormComponent_clss);
	};

	_public.jsInitDOMForm = function()
	{
		this.__jsInitDOMForm();
	};
	//...PUBLIC

	//PROTECTED...
	//EVENTS...
	_virtual_protected.__jsOnSubmitButtonComponentClick = function(aEvent_obj)
	{
	};
	//...EVENTS

	_virtual_protected.__jsInitDOMForm = function()
	{
		var lSubmitButtonFormComponent_clss = this.__jsGetFormComponent(_static_public_const.FORM_COMPONENT_ID_SUBMIT_BUTTON);
		lSubmitButtonFormComponent_clss.jsAddEventListener(JSCSubmitButtonComponent.EVENT_ID_CLICK, new JSCEventHandler(this, this.__jsOnSubmitButtonComponentClick));
	};

	_virtual_protected.__jsSetFormAttrs = function(aAttrs_str_obj)
	{
		this._fFormAttrs_obj = bsp.jsGetObject(aAttrs_str_obj);
	};

	_protected.__jsGetFormId = function()
	{
		return this._fFormAttrs_obj[_static_public_const.FORM_ATTR_ID];
	};

	_protected.__jsGetFormComponent = function(aFormComponentId_int)
	{
		var lFormComponent_clss = this._fFormComponents_clss_arr[aFormComponentId_int];
		if (!lFormComponent_clss)
		{
			new JSCException('__jsGetFormComponent', 'Form component not exist: ' + aFormComponentId_int);
		}
		return lFormComponent_clss;
	};

	//VALIDATE COMPONENTS...
	_protected.__jsGetFormComponentValidationParams = function()
	{
		return this._fFormComponentsValidationParams_obj;
	};

	_protected.__jsGetFormComponentValidationParam = function(aFormComponentId_int)
	{
		var lFormComponentValidationParam_obj = this._fFormComponentsValidationParams_obj[aFormComponentId_int];
		if (!lFormComponentValidationParam_obj)
		{
			new JSCException('__jsGetFormComponentValidationParam', 'Form component validation param not exist: ' + aFormComponentId_int);
		}
		return lFormComponentValidationParam_obj;
	};

	_protected.__jsValidateTextfieldFormComponent = function(aFormComponentId_int)
	{
		var lFormComponentId_int = aFormComponentId_int;
		var lFormComponentValidationParam_obj = this.__jsGetFormComponentValidationParam(lFormComponentId_int);
		var lFormComponent_clss = this.__jsGetFormComponent(lFormComponentId_int);

		var lFormComponentValue_str = lFormComponent_clss.jsGetDOMElement();
		var lFormComponentValueLen_int = lFormComponentValue_str.length;
		if (lFormComponentValueLen_int === 0)
		{
			//TODO
			return false;
		}

		var lFormComponentValueMinCharsCount_str = lFormComponentValidationParam_obj[_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_VALUE_MIN_CHARS_COUNT];
		var lFormComponentValueMaxCharsCount_str = lFormComponentValidationParam_obj[_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_VALUE_MAX_CHARS_COUNT];
		if (lFormComponentValueLen_int < lFormComponentValueMinCharsCount_str
			|| lFormComponentValueLen_int > lFormComponentValueMaxCharsCount_str)
		{
			//TODO
			return false;
		}

		var lFormComponentValueValidationPattern_str = lFormComponentValidationParam_obj[_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_VALUE_VALIDATION_PATTERN];
		var l_str_arr = lFormComponentValueValidationPattern_str.split("$/");
		var lPattern_str = l_str_arr[0].replace("/^", "^") + "$";
		var lOptions_str = l_str_arr[1];
		var lRegExp_re = new RegExp(lPattern_str, lOptions_str);
		if (!lRegExp_re.test(lFormComponentValue_str))
		{
			//TODO
			return false;
		}

		return lRegExp_re.test(lFormComponentValue_str);
	};
	//...VALIDATE COMPONENTS
	//...PROTECTED

	//PRIVATE...
	//VALIDATE COMPONENTS...
	_private._jsSetFormComponentValidationParams = function(aFormComponentId_int, aFormComponentValidationParams_str_obj)
	{
		this._fFormComponentsValidationParams_obj[aFormComponentId_int] = bsp.jsGetObject(aFormComponentValidationParams_str_obj);
	};
	//...VALIDATE COMPONENTS

	_private._jsInitFormComponent = function(aFormComponentId_int, aFormComponent_clss)
	{
		this._fFormComponents_clss_arr[aFormComponentId_int] = aFormComponent_clss;
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCFormBase;
};bsp.jsGetNamespace('bsp.modules_ns').importJSCModulesClass = function()
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
};bsp.jsGetNamespace('bsp.modules_ns.forms_ns').importJSCFormsClass = function()
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
};bsp.jsGetNamespace('bsp.modules_ns.forms_ns').importJSCFormBaseClass = function()
{
	var _ns = bsp.modules_ns.forms_ns;
	//INIT...
	if (_ns.JSCFormBase)
	{
		return _ns.JSCFormBase;
	}

	//INHERITANCE IMPORT...
	var JSCEventDispatcher = bsp._unified_ns.events_ns.importJSCEventDispatcherClass();
	//...INHERITANCE IMPORT

	_ns.JSCFormBase = function()
	{
		____constructor.call(this);
	};
	var _class = _ns.JSCFormBase;
	bsp.jsExtends(_class, JSCEventDispatcher);

	var _prototype = _class.prototype;
	var _superclass = _class.superclass;

	var ____constructor;
	____constructor = function()
	{
		_superclass.constructor.call(this);
		this._jsInitJSCFormBase();
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
	var JSCEventHandler = bsp._unified_ns.events_ns.importJSCEventHandlerClass();
	var JSCSubmitButtonComponent = bsp.components_ns.buttons_ns.importJSCSubmitButtonComponentClass();
	//...IMPORTS

	//CONSTS...
	//JS PHP AGREEMENTS...
	_static_public_const.FORM_ATTR_ID														= 'FORM_ATTR_ID';

	_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_ID									= 'FORM_COMPONENT_VALIDATION_PARAM_ID';
	_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_VALUE_FILLING_MODE					= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_FILLING_MODE';
	_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_VALUE_WRONG_CHARS_COUNT_MESSAGE	= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_WRONG_CHARS_COUNT_MESSAGE';
	_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_VALUE_ILLEGAL_CHARS_MESSAGE		= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_ILLEGAL_CHARS_MESSAGE';
	_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_VALUE_PLACEHOLDER					= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_PLACEHOLDER';
	_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_VALUE_VALIDATION_PATTERN			= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_VALIDATION_PATTERN';
	_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_VALUE_MIN_CHARS_COUNT				= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_MIN_CHARS_COUNT';
	_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_VALUE_MAX_CHARS_COUNT				= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_MAX_CHARS_COUNT';

	_static_public_const.FORM_COMPONENT_ID_HIDDEN_TEXTFIELD	= 99;
	_static_public_const.FORM_COMPONENT_ID_SUBMIT_BUTTON	= 100;
	//...JS PHP AGREEMENTS
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._jsInitJSCFormBase = function()
	{
		this._fFormAttrs_obj = {};
		this._fFormComponents_clss_arr = [];
		this._fFormComponentsValidationParams_obj = {};
	};
	//...INIT

	//VARS...
	_private._fFormAttrs_obj = null;
	_private._fFormComponents_clss_arr = null;
	_private._fFormComponentsValidationParams_obj = null;
	//...VARS

	//PUBLIC...
	_public.jsSetFormAttrs = function(aAttrs_str_obj)
	{
		this.__jsSetFormAttrs(aAttrs_str_obj);
	};

	_public.jsSetFormComponentValidationParams = function(aFormComponentId_int, aFormComponentValidationParams_str_obj)
	{
		this._jsSetFormComponentValidationParams(aFormComponentId_int, aFormComponentValidationParams_str_obj);
	};

	_public.jsInitFormComponent = function(aFormComponentId_int, aFormComponent_clss)
	{
		this._jsInitFormComponent(aFormComponentId_int, aFormComponent_clss);
	};

	_public.jsInitDOMForm = function()
	{
		this.__jsInitDOMForm();
	};
	//...PUBLIC

	//PROTECTED...
	//EVENTS...
	_virtual_protected.__jsOnSubmitButtonComponentClick = function(aEvent_obj)
	{
	};
	//...EVENTS

	_virtual_protected.__jsInitDOMForm = function()
	{
		var lSubmitButtonFormComponent_clss = this.__jsGetFormComponent(_static_public_const.FORM_COMPONENT_ID_SUBMIT_BUTTON);
		lSubmitButtonFormComponent_clss.jsAddEventListener(JSCSubmitButtonComponent.EVENT_ID_CLICK, new JSCEventHandler(this, this.__jsOnSubmitButtonComponentClick));
	};

	_virtual_protected.__jsSetFormAttrs = function(aAttrs_str_obj)
	{
		this._fFormAttrs_obj = bsp.jsGetObject(aAttrs_str_obj);
	};

	_protected.__jsGetFormId = function()
	{
		return this._fFormAttrs_obj[_static_public_const.FORM_ATTR_ID];
	};

	_protected.__jsGetFormComponent = function(aFormComponentId_int)
	{
		var lFormComponent_clss = this._fFormComponents_clss_arr[aFormComponentId_int];
		if (!lFormComponent_clss)
		{
			new JSCException('__jsGetFormComponent', 'Form component not exist: ' + aFormComponentId_int);
		}
		return lFormComponent_clss;
	};

	//VALIDATE COMPONENTS...
	_protected.__jsGetFormComponentValidationParams = function()
	{
		return this._fFormComponentsValidationParams_obj;
	};

	_protected.__jsGetFormComponentValidationParam = function(aFormComponentId_int)
	{
		var lFormComponentValidationParam_obj = this._fFormComponentsValidationParams_obj[aFormComponentId_int];
		if (!lFormComponentValidationParam_obj)
		{
			new JSCException('__jsGetFormComponentValidationParam', 'Form component validation param not exist: ' + aFormComponentId_int);
		}
		return lFormComponentValidationParam_obj;
	};

	_protected.__jsValidateTextfieldFormComponent = function(aFormComponentId_int)
	{
		var lFormComponentId_int = aFormComponentId_int;
		var lFormComponentValidationParam_obj = this.__jsGetFormComponentValidationParam(lFormComponentId_int);
		var lFormComponent_clss = this.__jsGetFormComponent(lFormComponentId_int);

		var lFormComponentValue_str = lFormComponent_clss.jsGetDOMElement();
		var lFormComponentValueLen_int = lFormComponentValue_str.length;
		if (lFormComponentValueLen_int === 0)
		{
			//TODO
			return false;
		}

		var lFormComponentValueMinCharsCount_str = lFormComponentValidationParam_obj[_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_VALUE_MIN_CHARS_COUNT];
		var lFormComponentValueMaxCharsCount_str = lFormComponentValidationParam_obj[_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_VALUE_MAX_CHARS_COUNT];
		if (lFormComponentValueLen_int < lFormComponentValueMinCharsCount_str
			|| lFormComponentValueLen_int > lFormComponentValueMaxCharsCount_str)
		{
			//TODO
			return false;
		}

		var lFormComponentValueValidationPattern_str = lFormComponentValidationParam_obj[_static_public_const.FORM_COMPONENT_VALIDATION_PARAM_VALUE_VALIDATION_PATTERN];
		var l_str_arr = lFormComponentValueValidationPattern_str.split("$/");
		var lPattern_str = l_str_arr[0].replace("/^", "^") + "$";
		var lOptions_str = l_str_arr[1];
		var lRegExp_re = new RegExp(lPattern_str, lOptions_str);
		if (!lRegExp_re.test(lFormComponentValue_str))
		{
			//TODO
			return false;
		}

		return lRegExp_re.test(lFormComponentValue_str);
	};
	//...VALIDATE COMPONENTS
	//...PROTECTED

	//PRIVATE...
	//VALIDATE COMPONENTS...
	_private._jsSetFormComponentValidationParams = function(aFormComponentId_int, aFormComponentValidationParams_str_obj)
	{
		this._fFormComponentsValidationParams_obj[aFormComponentId_int] = bsp.jsGetObject(aFormComponentValidationParams_str_obj);
	};
	//...VALIDATE COMPONENTS

	_private._jsInitFormComponent = function(aFormComponentId_int, aFormComponent_clss)
	{
		this._fFormComponents_clss_arr[aFormComponentId_int] = aFormComponent_clss;
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCFormBase;
};bsp.jsGetNamespace('bsp.modules_ns.forms_ns').importJSCAuthorizationFormClass = function()
{
	var _ns = bsp.modules_ns.forms_ns;
	//INIT...
	if (_ns.JSCAuthorizationForm)
	{
		return _ns.JSCAuthorizationForm;
	}

	//INHERITANCE IMPORT...
	var JSCFormBase = bsp.modules_ns.forms_ns.importJSCFormBaseClass();
	//...INHERITANCE IMPORT

	_ns.JSCAuthorizationForm = function()
	{
		____constructor.call(this);
	};
	var _class = _ns.JSCAuthorizationForm;
	bsp.jsExtends(_class, JSCFormBase);

	var _prototype = _class.prototype;
	var _superclass = _class.superclass;

	var ____constructor;
	____constructor = function()
	{
		_superclass.constructor.call(this);
		this._jsInitJSCAuthorizationForm();
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

	_private._jsInitJSCAuthorizationForm = function()
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

	return _ns.JSCAuthorizationForm;
};