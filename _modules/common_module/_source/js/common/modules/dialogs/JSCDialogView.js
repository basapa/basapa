bsp.i_getNamespace('bsp.modules_ns.dialogs_ns').i_importJSCDialogViewClass = function()
{
	var _ns = bsp.modules_ns.dialogs_ns;
	//INIT...
	if (_ns.JSCDialogView)
	{
		return _ns.JSCDialogView;
	}

	//INHERITANCE IMPORT...
	var JSObject = bsp._unified_ns.view_ns.i_importJSObjectClass();
	//...INHERITANCE IMPORT

	_ns.JSCDialogView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCDialogView;
	bsp.i_setExtends(_self, JSObject);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCDialogView();
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
	//...IMPORTS

	//CONSTS...
	//JS PHP AGREEMENTS...
	_static_public_const.i_DIALOG_ATTR_ID					= 'DIALOG_ATTR_ID';
	//...JS PHP AGREEMENTS
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSCDialogView = function()
	{
		this._fDialogAttrs_obj = {};
		this._fDialogModules_clss_arr = [];
	};
	//...INIT

	//VARS...
	_private._fDialogAttrs_obj = null;
	_private._fDialogModules_clss_arr = null;
	//...VARS

	//PUBLIC...
	_public.i_setDialogAttrs = function(aAttrs_str_obj)
	{
		this.__setDialogAttrs(aAttrs_str_obj);
	};
	
	_public.i_initDialogModule = function(aDialogModuleId_int, aDialogModule_clss)
	{
		this._initDialogModule(aDialogModuleId_int, aDialogModule_clss);
	};

	_public.i_initDOMDialog = function()
	{
		this.__initDOMDialog();
	};
	//...PUBLIC

	//PROTECTED...
	_virtual_protected.__initDOMDialog = function()
	{
	};

	_virtual_protected.__setDialogAttrs = function(aAttrs_str_obj)
	{
		this._fDialogAttrs_obj = bsp.i_getObject(aAttrs_str_obj);
	};

	_protected.__getDialogId = function()
	{
		return this._fDialogAttrs_obj[_self.i_DIALOG_ATTR_ID];
	};

	_protected.__getDialogModule = function(aDialogModuletId_int)
	{
		var lDialogModule_clss = this._fDialogModules_clss_arr[aDialogModuletId_int];
		if (!lDialogModule_clss)
		{
			new JSException('__getDialogModule', 'Dialog module not exist: ' + aDialogModuletId_int);
		}
		return lDialogModule_clss;
	};
	//...PROTECTED

	//PRIVATE...
	_private._initDialogModule = function(aDialogModuleId_int, aDialogModule_clss)
	{
		this._fDialogModules_clss_arr[aDialogModuleId_int] = aDialogModule_clss;
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCDialogView;
};