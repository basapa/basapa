bsp.i_getNamespace('bsp').i_importJSCSiteViewClass = function()
{
	var _ns = bsp;
	//INIT...
	if (_ns.JSCSiteView)
	{
		return _ns.JSCSiteView;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSCSiteView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCSiteView;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		this._initJSCSiteView();
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
	var JSCPagesView = bsp.pages_ns.i_importJSCPagesViewClass();
	//...IMPORTS

	//CONSTS...
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSCSiteView = function()
	{
	};
	//...INIT

	//VARS...
	_private._fPagesView_clss = null;
	//...VARS

	//PUBLIC...
	_public.i_getPagesView = function()
	{
		return this._getPagesView();
	};
	//...PUBLIC

	//PROTECTED...
	_virtual_protected.__generatePagesView = function()
	{
		return new JSCPagesView();
	};
	//...PROTECTED

	//PRIVATE...
	_private._getPagesView = function()
	{
		return this._fPagesView_clss || this._initPagesView();
	};

	_private._initPagesView = function()
	{
		var l_clss = this.__generatePagesView();
		this._fPagesView_clss = l_clss;
		return l_clss;
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCSiteView;
};