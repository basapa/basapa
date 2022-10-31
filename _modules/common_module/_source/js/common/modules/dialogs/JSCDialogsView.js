bsp.i_getNamespace('bsp.modules_ns.dialogs_ns').i_importJSCDialogsViewClass = function()
{
	var _ns = bsp.modules_ns.dialogs_ns;
	//INIT...
	if (_ns.JSCDialogsView)
	{
		return _ns.JSCDialogsView;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSCDialogsView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCDialogsView;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		this._initJSCDialogsView();
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
	//var CSupportFormViewDialogView = bsp.modules_ns.dialogs_ns.i_importCSupportFormViewDialogViewClass();
	//...IMPORTS
	
	//CONSTS...
	//_static_private_const._DIALOG_ID_SUPPORT_FORM	= 0;
	//...CONSTS
	
	//STATIC...
	//...STATIC
	
	_private._initJSCDialogsView = function()
	{
		this._fDialogView_clss_arr = [];
	};
	//...INIT
	
	//VARS...
	_private._fDialogView_clss_arr = null;
	//...VARS
	
	//PUBLIC...
	_public.i_getDialogView = function(aDialogId_int)
	{
		return this._getDialogView(aDialogId_int);
	};
	/*_public.i_getSupportFormDialog = function()
	{
		return this.__getDialog(_self._DIALOG_ID_SUPPORT_FORM);
	};*/
	//...PUBLIC
	
	//PROTECTED...
	_virtual_protected.__generateDialogView = function(aDialogId_int)
	{
		var l_clss;

		switch (aDialogId_int)
		{
			/*case _self._DIALOG_ID_SUPPORT_FORM:
			{
				l_clss = new CSupportFormViewDialogView();
			}break;*/

			default:
				new JSException('__generateDialogView', 'Unsupported Dialog id: ' + aDialogId_int);
			break;
		}

		return l_clss;
	};
	//...PROTECTED
	
	//PRIVATE...
	_private._getDialogView = function(aDialogId_int)
	{
		return this._fDialogView_clss_arr[aDialogId_int] || this._initDialogView(aDialogId_int);
	};

	_private._initDialogView = function(aDialogId_int)
	{
		var l_clss = this.__generateDialogView(aDialogId_int);
		this._fDialogView_clss_arr[aDialogId_int] = l_clss;
		return l_clss;
	};
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSCDialogsView;
};