bsp.i_getNamespace('bsp.pages_ns').i_importJSCPageViewClass = function()
{
	var _ns = bsp.pages_ns;
	//INIT...
	if (_ns.JSCPageView)
	{
		return _ns.JSCPageView;
	}

	//INHERITANCE IMPORT...
	var JSObject = bsp._unified_ns.view_ns.i_importJSObjectClass();
	//...INHERITANCE IMPORT

	_ns.JSCPageView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCPageView;
	bsp.i_setExtends(_self, JSObject);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCPageView();
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
	var JSCFormsView = bsp.modules_ns.forms_ns.i_importJSCFormsViewClass();
	var JSCInfosView = bsp.modules_ns.infos_ns.i_importJSCInfosViewClass();
	var JSCDialogsView = bsp.modules_ns.dialogs_ns.i_importJSCDialogsViewClass();
	//...IMPORTS

	//CONSTS...
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSCPageView = function()
	{
	};
	//...INIT

	//VARS...
	_private._fFormsView_clss = null;
	_private._fInfosView_clss = null;
	_private._fDialogsView_clss = null;
	//...VARS

	//PUBLIC...
	_public.i_getFormsView = function()
	{
		return this._getFormsView();
	};

	_public.i_getInfosView = function()
	{
		return this._getInfosView();
	};

	_public.i_getDialogsView = function()
	{
		return this._getDialogsView();
	};
	//...PUBLIC

	//PROTECTED...
	_virtual_protected.__generateFormsView = function()
	{
		return new JSCFormsView();
	};

	_virtual_protected.__generateInfosView = function()
	{
		return new JSCInfosView();
	};

	_virtual_protected.__generateDialogsView = function()
	{
		return new JSCDialogsView();
	};
	//...PROTECTED

	//PRIVATE...
//FORMS...
	_private._getFormsView = function()
	{
		return this._fFormsView_clss || this._initFormsView();
	};

	_private._initFormsView = function()
	{
		var l_clss = this.__generateFormsView();
		this._fFormsView_clss = l_clss;
		return l_clss;
	};
	//...FORMS

	//INFOS...
	_private._getInfosView = function()
	{
		return this._fInfosView_clss || this._initInfosView();
	};

	_private._initInfosView = function()
	{
		var l_clss = this.__generateInfosView();
		this._fInfosView_clss = l_clss;
		return l_clss;
	};
	//...INFOS

	//DIALOGS...
	_private._getDialogsView = function()
	{
		return this._fDialogsView_clss || this._initDialogsView();
	};

	_private._initDialogsView = function()
	{
		var l_clss = this.__generateDialogsView();
		this._fDialogsView_clss = l_clss;
		return l_clss;
	};
	//...DIALOGS
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCPageView;
};