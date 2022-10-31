bsp.i_getNamespace('bsp.job_ns.modules_ns.dialogs_ns').i_importJSJOBDialogsViewClass = function()
{
	var _ns = bsp.job_ns.modules_ns.dialogs_ns;
	//INIT...
	if (_ns.JSJOBDialogsView)
	{
		return _ns.JSJOBDialogsView;
	}

	//INHERITANCE IMPORT...
	var JSCDialogsView = bsp.modules_ns.dialogs_ns.i_importJSCDialogsViewClass();
	//...INHERITANCE IMPORT

	_ns.JSJOBDialogsView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSJOBDialogsView;
	bsp.i_setExtends(_self, JSCDialogsView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSJOBDialogsView();
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
	//...IMPORTS

	//CONSTS...
	//...CONSTS
	
	//STATIC...
	//...STATIC
	
	_private._initJSJOBDialogsView = function()
	{
	};
	//...INIT
	
	//VARS...
	//...VARS
	
	//PUBLIC...
	//...PUBLIC
	
	//PROTECTED...
	_override_protected.__generateDialogView = function(aDialogId_int)
	{
		var l_clss;
		
		switch (aDialogId_int)
		{
			default:
				l_clss = _superclass.__generateDialogView.call(this, aDialogId_int);
			break;
		}
		
		return l_clss;
	};
	//...PROTECTED
	
	//PRIVATE...
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSJOBDialogsView;
};