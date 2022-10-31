bsp.i_getNamespace('bsp.modules_ns.forms_ns').i_importJSCFormsViewClass = function()
{
	var _ns = bsp.modules_ns.forms_ns;
	//INIT...
	if (_ns.JSCFormsView)
	{
		return _ns.JSCFormsView;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSCFormsView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCFormsView;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		this._initJSCFormsView();
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
	//var CCPaymentFormView = bsp.modules_ns.forms_ns.i_importCCPaymentFormViewClass();
	//var CCSupportFormView = bsp.modules_ns.forms_ns.i_importCCSupportFormViewClass();
	//...IMPORTS
	
	//CONSTS...
	//_static_private_const._FORM_ID_PAYMENT	= 0;
	//_static_private_const._FORM_ID_SUPPORT	= 1;
	//...CONSTS
	
	//STATIC...
	//...STATIC
	
	_private._initJSCFormsView = function()
	{
		this._fFormView_clss_arr = [];
	};
	//...INIT
	
	//VARS...
	_private._fFormView_clss_arr = null;
	//...VARS
	
	//PUBLIC...
	_public.i_getFormView = function(aFormId_int)
	{
		return this._getFormView(aFormId_int);
	};
	/*_public.i_getPaymentForm = function()
	{
		return this.__getForm(_self._FORM_ID_PAYMENT);
	};

	_public.i_getSupportForm = function()
	{
		return this.__getForm(_self._FORM_ID_SUPPORT);
	};*/
	//...PUBLIC
	
	//PROTECTED...
	_virtual_protected.__generateFormView = function(aFormId_int)
	{
		var l_clss;

		switch (aFormId_int)
		{
			/*case _self._FORM_ID_PAYMENT:
			{
				l_clss = new CCPaymentFormView();
			}break;

			case _self._FORM_ID_SUPPORT:
			{
				l_clss = new CCSupportFormView();
			}break;*/

			default:
				new JSException('_generateFormView', 'Unsupported form id: ' + aFormId_int);
			break;
		}

		return l_clss;
	};
	//...PROTECTED
	
	//PRIVATE...
	_private._getFormView = function(aFormId_int)
	{
		return this._fFormView_clss_arr[aFormId_int] || this._initFormView(aFormId_int);
	};

	_private._initFormView = function(aFormId_int)
	{
		var l_clss = this.__generateFormView(aFormId_int);
		this._fFormView_clss_arr[aFormId_int] = l_clss;
		return l_clss;
	};
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSCFormsView;
};