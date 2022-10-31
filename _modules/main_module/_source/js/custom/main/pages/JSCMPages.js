bsp.jsGetNamespace('bsp.pages_ns').importJSCPagesClass = function()
{
	var _ns = bsp.pages_ns;
	//INIT...
	if (_ns.JSCPages)
	{
		return _ns.JSCPages;
	}

	//INHERITANCE IMPORT...
	var JSCObject = bsp._unified_ns.importJSCObjectClass();
	//...INHERITANCE IMPORT

	_ns.JSCPages = function()
	{
		____constructor.call(this);
	};
	var _class = _ns.JSCPages;
	bsp.jsExtends(_class, JSCObject);

	var _prototype = _class.prototype;
	var _superclass = _class.superclass;

	var ____constructor;
	____constructor = function()
	{
		_superclass.constructor.call(this);
		this._jsInitJSCPages();
	};

	var _static_public = _class;
	var _static_private = _class;
	var _static_public_const = _class;
	var _static_private_const = _class;
	var _public = _prototype;
	var _protected = _prototype;
	var _private = _prototype;
	var _internal = _prototype;
	var _virtual_protected = _prototype;
	var _override_protected = _prototype;

	//IMPORTS...
	var JSCException = bsp._unified_ns.exceptions_ns.importJSCExceptionClass();
	//var JSCRegistrationPage = bsp.pages_ns.importJSCRegistrationPageClass();
	//...IMPORTS

	//CONSTS...
	_static_public_const.PAGE_ID_REGISTRATION = 0;
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._jsInitJSCPages = function()
	{
		this._fPages_clss_arr = [];
	};
	//...INIT

	//VARS...
	_private._fPages_clss_arr = null;
	//...VARS

	//PUBLIC...
	//REGISTRATION PAGE...
	_public.jsGetRegistrationPage = function()
	{
		return this._jsGetRegistrationPage();
	};
	//...REGISTRATION PAGE
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	//REGISTRATION PAGE...
	_private._jsGetRegistrationPage = function()
	{
		return this._jsGetPage(_static_public_const.PAGE_ID_REGISTRATION);
	};
	//...REGISTRATION PAGE

	_private._jsGetPage = function(aPageId_int)
	{
		return this._fPages_clss_arr[aPageId_int] || this._jsInitPage(aPageId_int);
	};

	_private._jsInitPage = function(aPageId_int)
	{
		var l_clss = this._jsGeneratePage(aPageId_int);
		this._fPages_clss_arr[aPageId_int] = l_clss;
		return l_clss;
	};

	_private._jsGeneratePage = function(aPageId_int)
	{
		var l_clss;

		switch (aPageId_int)
		{
			case _static_public_const.PAGE_ID_REGISTRATION:
			{
				l_clss = new JSCRegistrationPage();
			}break;

			default:
				new JSCException('_jsGeneratePage', 'Unsupported page id: ' + aPageId_int);
			break;
		}

		return l_clss;
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCPages;
};