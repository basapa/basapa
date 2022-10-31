bsp.i_getNamespace('bsp.pages_ns').i_importJSCPagesViewClass = function()
{
	var _ns = bsp.pages_ns;
	//INIT...
	if (_ns.JSCPagesView)
	{
		return _ns.JSCPagesView;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSCPagesView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCPagesView;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		this._initJSCPagesView();
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
	var JSCPageView = bsp.pages_ns.i_importJSCPageViewClass();
	//...IMPORTS

	//CONSTS...
	//JS PHP AGREEMENTS...
	_static_public_const.i_PAGE_ID_MAIN					= 'main';
	_static_public_const.i_PAGE_ID_SUPPORT				= 'support';
	_static_public_const.i_PAGE_ID_PAYMENT				= 'payment';
	_static_public_const.i_PAGE_ID_ERROR_403			= 'error_403';
	_static_public_const.i_PAGE_ID_ERROR_404			= 'error_404';
	//...JS PHP AGREEMENTS
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSCPagesView = function()
	{
		this._fPageView_clss_arr = [];
	};
	//...INIT

	//VARS...
	_private._fPageView_clss_arr = null;
	//...VARS

	//PUBLIC...
	_public.i_getPageView = function(aPageId_str)
	{
		return this._getPageView(aPageId_str);
	};
	//...PUBLIC

	//PROTECTED...
	_override_protected.__generatePageView = function(aPageId_str)
	{
		var l_clss;

		switch (aPageId_str)
		{
			default:
				new JSException('__generatePageView', 'Unsupported page id: ' + aPageId_str);
			break;
		}

		return l_clss;
	};
	//...PROTECTED

	//PRIVATE...
	_private._getPageView = function(aPageId_str)
	{
		return this._fPageView_clss_arr[aPageId_str] || this._initPageView(aPageId_str);
	};

	_private._initPageView = function(aPageId_str)
	{
		var l_clss = this.__generatePageView(aPageId_str);
		this._fPageView_clss_arr[aPageId_str] = l_clss;
		return l_clss;
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCPagesView;
};