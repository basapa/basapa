bsp.i_getNamespace('bsp.job_ns.pages_ns').i_importJSJOBPagesViewClass = function()
{
	var _ns = bsp.job_ns.pages_ns;
	//INIT...
	if (_ns.JSJOBPagesView)
	{
		return _ns.JSJOBPagesView;
	}

	//INHERITANCE IMPORT...
	var JSCPagesView = bsp.pages_ns.i_importJSCPagesViewClass();
	//...INHERITANCE IMPORT

	_ns.JSJOBPagesView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSJOBPagesView;
	bsp.i_setExtends(_self, JSCPagesView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSJOBPagesView();
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
	var JSCPageView = bsp.pages_ns.i_importJSCPageViewClass();
	var JSJOBMainPageView = bsp.job_ns.pages_ns.i_importJSJOBMainPageViewClass();
	var JSJOBContentPageView = bsp.job_ns.pages_ns.i_importJSJOBContentPageViewClass();
	var JSJOBContentsPageView = bsp.job_ns.pages_ns.i_importJSJOBContentsPageViewClass();
	//...IMPORTS

	//CONSTS...
	//JS PHP AGREEMENTS...
	_static_public_const.i_PAGE_ID_MAIN				= JSCPagesView.i_PAGE_ID_MAIN;
	_static_public_const.i_PAGE_ID_CONTENT			= 'content';
	_static_public_const.i_PAGE_ID_CONTENTS			= 'contents';
	//...JS PHP AGREEMENTS
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSJOBPagesView = function()
	{
	};
	//...INIT

	//VARS...
	//...VARS

	//PUBLIC...
	_public.i_getMainPageView = function()
	{
		return this.i_getPageView(_self.i_PAGE_ID_MAIN);
	};

	_public.i_getContentPageView = function()
	{
		return this.i_getPageView(_self.i_PAGE_ID_CONTENT);
	};

	_public.i_getContentsPageView = function()
	{
		return this.i_getPageView(_self.i_PAGE_ID_CONTENTS);
	};
	//...PUBLIC

	//PROTECTED...
	_override_protected.__generatePageView = function(aPageId_str)
	{
		var l_clss;

		switch (aPageId_str)
		{
			case _self.i_PAGE_ID_MAIN:
			{
				l_clss = new JSJOBMainPageView();
			}break;

			case _self.i_PAGE_ID_CONTENT:
			{
				l_clss = new JSJOBContentPageView();
			}break;

			case _self.i_PAGE_ID_CONTENTS:
			{
				l_clss = new JSJOBContentsPageView();
			}break;

			default:
				l_clss = _superclass.__generatePageView.call(this, aPageId_str);
			break;
		}

		return l_clss;
	};
	//...PROTECTED

	//PRIVATE...
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSJOBPagesView;
};