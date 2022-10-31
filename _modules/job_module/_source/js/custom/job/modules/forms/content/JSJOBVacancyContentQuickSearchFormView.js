bsp.i_getNamespace('bsp.job_ns.modules_ns.forms_ns.content_ns').i_importJSJOBVacancyContentQuickSearchFormViewClass = function()
{
	var _ns = bsp.job_ns.modules_ns.forms_ns.content_ns;
	//INIT...
	if (_ns.JSJOBVacancyContentQuickSearchFormView)
	{
		return _ns.JSJOBVacancyContentQuickSearchFormView;
	}

	//INHERITANCE IMPORT...
	var JSCFormView = bsp.modules_ns.forms_ns.i_importJSCFormViewClass();
	//...INHERITANCE IMPORT

	_ns.JSJOBVacancyContentQuickSearchFormView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSJOBVacancyContentQuickSearchFormView;
	bsp.i_setExtends(_self, JSCFormView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSJOBVacancyContentQuickSearchFormView();
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
	var JSEventHandler = bsp._unified_ns.controller_ns.events_ns.i_importJSEventHandlerClass();
	var JSCComponentView = bsp.components_ns.i_importJSCComponentViewClass();
	var JSCSelectCityFormCompositeComponentView = bsp.components_ns.composite_ns.i_importJSCSelectCityFormCompositeComponentViewClass();
	//...IMPORTS
	
	//CONSTS...
	//JS PHP AGREEMENTS...
	_static_public_const.i_FORM_COMPONENT_ID_SELECT_CITY		= 'FORM_COMPONENT_ID_SELECT_CITY';
	//...JS PHP AGREEMENTS
	//...CONSTS
	
	//STATIC...
	//...STATIC
	
	_private._initJSJOBVacancyContentQuickSearchFormView = function()
	{
	};
	//...INIT
	
	//VARS...
	//...VARS
	
	//PUBLIC...
	//...PUBLIC
	
	//PROTECTED...
	_override_protected.__initDOMForm = function()
	{
		_superclass.__initDOMForm.call(this);

		var lSelectCityFormComponent_clss = this.__getFormComponent(_self.i_FORM_COMPONENT_ID_SELECT_CITY);
		lSelectCityFormComponent_clss.i_addEventListener(JSCComponentView.i_NATIVE_EVENT_ID_CLICK, new JSEventHandler(this, this._onSelectCityComponentClick));
		lSelectCityFormComponent_clss.i_addEventListener(JSCSelectCityFormCompositeComponentView.i_EVENT_ID_SOME_COMPONENT_ACCESSIBILITY_CHANGED, new JSEventHandler(this, this._onSomeComponentAccessibilityChanged));

		this._validateSubmitButtonAccessibility();
	};
	//...PROTECTED
	
	//PRIVATE...
	//EVENTS...
	_private._onSelectCityComponentClick = function(aEvent_obj)
	{
	};

	_private._onSomeComponentAccessibilityChanged = function(aEvent_obj)
	{
		this._validateSubmitButtonAccessibility();
	};
	//...EVENTS

	_private._validateSubmitButtonAccessibility = function()
	{
		var lSelectCityFormComponent_clss = this.__getFormComponent(_self.i_FORM_COMPONENT_ID_SELECT_CITY);
		var lSubmitButtonFormComponent_clss = this.__getFormComponent(JSCFormView.i_FORM_COMPONENT_ID_SUBMIT_BUTTON);

		lSubmitButtonFormComponent_clss.i_setEnabled(lSelectCityFormComponent_clss.i_areAllComponentsEnabled());
	};
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSJOBVacancyContentQuickSearchFormView;
};