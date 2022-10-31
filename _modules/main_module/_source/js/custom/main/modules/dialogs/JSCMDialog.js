bsp.jsGetNamespace('bsp.modules_ns.forms_ns').importJSCFormBaseClass = function()
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
};