bsp.i_getNamespace('bsp.modules_ns.forms_ns').i_importJSCFormViewClass = function()
{
	var _ns = bsp.modules_ns.forms_ns;
	//INIT...
	if (_ns.JSCFormView)
	{
		return _ns.JSCFormView;
	}

	//INHERITANCE IMPORT...
	var JSObject = bsp._unified_ns.view_ns.i_importJSObjectClass();
	//...INHERITANCE IMPORT

	_ns.JSCFormView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCFormView;
	bsp.i_setExtends(_self, JSObject);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCFormView();
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
	var JSException = bsp._unified_ns.controller_ns.exceptions_ns.i_importJSExceptionClass();
	var JSEventHandler = bsp._unified_ns.controller_ns.events_ns.i_importJSEventHandlerClass();
	var JSCComponentView = bsp.components_ns.i_importJSCComponentViewClass();
	var JSVariableType = bsp._unified_ns.tools_ns.variables_ns.i_importJSVariableTypeClass();
	//...IMPORTS

	//CONSTS...
	//JS PHP AGREEMENTS...
	_static_public_const.i_FORM_ATTR_ID														= 'FORM_ATTR_ID';

	_static_public_const.i_FORM_COMPONENT_VALIDATION_PARAM_ID								= 'FORM_COMPONENT_VALIDATION_PARAM_ID';
	_static_public_const.i_FORM_COMPONENT_VALIDATION_PARAM_VALUE_FILLING_MODE				= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_FILLING_MODE';
	_static_public_const.i_FORM_COMPONENT_VALIDATION_PARAM_VALUE_WRONG_CHARS_COUNT_MESSAGE	= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_WRONG_CHARS_COUNT_MESSAGE';
	_static_public_const.i_FORM_COMPONENT_VALIDATION_PARAM_VALUE_iLLEGAL_CHARS_MESSAGE		= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_iLLEGAL_CHARS_MESSAGE';
	_static_public_const.i_FORM_COMPONENT_VALIDATION_PARAM_VALUE_PLACEHOLDER				= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_PLACEHOLDER';
	_static_public_const.i_FORM_COMPONENT_VALIDATION_PARAM_VALUE_VALIDATION_PATTERN			= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_VALIDATION_PATTERN';
	_static_public_const.i_FORM_COMPONENT_VALIDATION_PARAM_VALUE_MIN_CHARS_COUNT			= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_MIN_CHARS_COUNT';
	_static_public_const.i_FORM_COMPONENT_VALIDATION_PARAM_VALUE_MAX_CHARS_COUNT			= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_MAX_CHARS_COUNT';

	_static_public_const.i_FORM_COMPONENT_ID_HIDDEN_TEXTFIELD	= 'FORM_COMPONENT_ID_HIDDEN_TEXTFIELD';
	_static_public_const.i_FORM_COMPONENT_ID_SUBMIT_BUTTON		= 'FORM_COMPONENT_ID_SUBMIT_BUTTON';
	//...JS PHP AGREEMENTS
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSCFormView = function()
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
	_public.i_setFormAttrs = function(aAttrs_str_obj)
	{
		this.__setFormAttrs(aAttrs_str_obj);
	};

	_public.i_setFormComponentValidationParams = function(aFormComponentId_int, aFormComponentValidationParams_str_obj)
	{
		this._setFormComponentValidationParams(aFormComponentId_int, aFormComponentValidationParams_str_obj);
	};

	_public.i_initFormComponent = function(aFormComponentId_int, aFormComponent_clss)
	{
		this._initFormComponent(aFormComponentId_int, aFormComponent_clss);
	};

	_public.i_getFormComponent = function(aFormComponentId_int)
	{
		return this.__getFormComponent(aFormComponentId_int);
	};

	_public.i_initDOMForm = function()
	{
		this.__initDOMForm();
	};
	//...PUBLIC

	//PROTECTED...
	//EVENTS...
	_virtual_protected.__onSubmitButtonComponentClick = function(aEvent_obj)
	{
	};
	//...EVENTS

	_virtual_protected.__initDOMForm = function()
	{
		var lSubmitButtonFormComponent_clss = this.__getFormComponent(_self.i_FORM_COMPONENT_ID_SUBMIT_BUTTON);
		lSubmitButtonFormComponent_clss.i_addEventListener(JSCComponentView.i_NATIVE_EVENT_ID_CLICK, new JSEventHandler(this, this.__onSubmitButtonComponentClick));
	};

	_virtual_protected.__setFormAttrs = function(aAttrs_str_obj)
	{
		this._fFormAttrs_obj = JSVariableType.i_toObject(aAttrs_str_obj);
	};

	_protected.__getFormId = function()
	{
		return this._fFormAttrs_obj[_self.i_FORM_ATTR_ID];
	};

	_protected.__getFormComponent = function(aFormComponentId_int)
	{
		var lFormComponent_clss = this._fFormComponents_clss_arr[aFormComponentId_int];
		if (!lFormComponent_clss)
		{
			new JSException('__getFormComponent', 'Form component not exist: ' + aFormComponentId_int);
		}
		return lFormComponent_clss;
	};

	//VALIDATE COMPONENTS...
	_protected.__getFormComponentValidationParams = function()
	{
		return this._fFormComponentsValidationParams_obj;
	};

	_protected.__getFormComponentValidationParam = function(aFormComponentId_int)
	{
		var lFormComponentValidationParam_obj = this._fFormComponentsValidationParams_obj[aFormComponentId_int];
		if (!lFormComponentValidationParam_obj)
		{
			new JSException('__getFormComponentValidationParam', 'Form component validation param not exist: ' + aFormComponentId_int);
		}
		return lFormComponentValidationParam_obj;
	};

	_protected.__validateTextfieldFormComponent = function(aFormComponentId_int)
	{
		var lFormComponentId_int = aFormComponentId_int;
		var lFormComponentValidationParam_obj = this.__getFormComponentValidationParam(lFormComponentId_int);
		var lFormComponent_clss = this.__getFormComponent(lFormComponentId_int);

		var lFormComponentValue_str = lFormComponent_clss.i_getDOMElement();
		var lFormComponentValueLen_int = lFormComponentValue_str.length;
		if (lFormComponentValueLen_int === 0)
		{
			//TODO
			return false;
		}

		var lFormComponentValueMinCharsCount_str = lFormComponentValidationParam_obj[_self.i_FORM_COMPONENT_VALIDATION_PARAM_VALUE_MIN_CHARS_COUNT];
		var lFormComponentValueMaxCharsCount_str = lFormComponentValidationParam_obj[_self.i_FORM_COMPONENT_VALIDATION_PARAM_VALUE_MAX_CHARS_COUNT];
		if (
				lFormComponentValueLen_int < lFormComponentValueMinCharsCount_str
				|| lFormComponentValueLen_int > lFormComponentValueMaxCharsCount_str
			)
		{
			//TODO
			return false;
		}

		var lFormComponentValueValidationPattern_str = lFormComponentValidationParam_obj[_self.i_FORM_COMPONENT_VALIDATION_PARAM_VALUE_VALIDATION_PATTERN];
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
	_private._setFormComponentValidationParams = function(aFormComponentId_int, aFormComponentValidationParams_str_obj)
	{
		this._fFormComponentsValidationParams_obj[aFormComponentId_int] = bsp.i_getObject(aFormComponentValidationParams_str_obj);
	};
	//...VALIDATE COMPONENTS

	_private._initFormComponent = function(aFormComponentId_int, aFormComponent_clss)
	{
		this._fFormComponents_clss_arr[aFormComponentId_int] = aFormComponent_clss;
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCFormView;
};