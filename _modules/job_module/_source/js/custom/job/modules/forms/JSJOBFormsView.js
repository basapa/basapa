bsp.i_getNamespace('bsp.job_ns.modules_ns.forms_ns').i_importJSJOBFormsViewClass = function()
{
	var _ns = bsp.job_ns.modules_ns.forms_ns;
	//INIT...
	if (_ns.JSJOBFormsView)
	{
		return _ns.JSJOBFormsView;
	}

	//INHERITANCE IMPORT...
	var JSCFormsView = bsp.modules_ns.forms_ns.i_importJSCFormsViewClass();
	//...INHERITANCE IMPORT

	_ns.JSJOBFormsView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSJOBFormsView;
	bsp.i_setExtends(_self, JSCFormsView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSJOBFormsView();
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
	var JSCFormView = bsp.modules_ns.forms_ns.i_importJSCFormViewClass();
	var JSJOBVacancyContentQuickSearchFormView = bsp.job_ns.modules_ns.forms_ns.content_ns.i_importJSJOBVacancyContentQuickSearchFormViewClass();
	//...IMPORTS

	//CONSTS...
	_static_private_const._FORM_ID_VACANCY_CONTENT_ADDITION		= 0;
	_static_private_const._FORM_ID_VACANCY_CONTENT_QUICK_SEARCH	= 1;
	//...CONSTS
	
	//STATIC...
	//...STATIC
	
	_private._initJSJOBFormsView = function()
	{
	};
	//...INIT
	
	//VARS...
	//...VARS
	
	//PUBLIC...
	_public.i_getVacancyContentAdditionFormView = function()
	{
		return this.i_getFormView(_self._FORM_ID_VACANCY_CONTENT_ADDITION);
	};

	_public.i_getVacancyContentQuickSearchFormView = function()
	{
		return this.i_getFormView(_self._FORM_ID_VACANCY_CONTENT_QUICK_SEARCH);
	};
	//...PUBLIC
	
	//PROTECTED...
	_override_protected.__generateFormView = function(aFormId_int)
	{
		var l_clss;

		switch (aFormId_int)
		{
			case _self._FORM_ID_VACANCY_CONTENT_ADDITION:
			{
				l_clss = new JSCFormView();
			}break;

			case _self._FORM_ID_VACANCY_CONTENT_QUICK_SEARCH:
			{
				l_clss = new JSJOBVacancyContentQuickSearchFormView();
			}break;

			default:
				l_clss = _superclass.__generateFormView.call(this, aFormId_int);
			break;
		}
		
		return l_clss;
	};
	//...PROTECTED
	
	//PRIVATE...
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSJOBFormsView;
};