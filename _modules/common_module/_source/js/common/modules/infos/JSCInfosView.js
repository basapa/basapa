bsp.i_getNamespace('bsp.modules_ns.infos_ns').i_importJSCInfosViewClass = function()
{
	var _ns = bsp.modules_ns.infos_ns;
	//INIT...
	if (_ns.JSCInfosView)
	{
		return _ns.JSCInfosView;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSCInfosView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCInfosView;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		this._initJSCInfosView();
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
	//var CCNavigationsInfoView = bsp.modules_ns.infos_ns.navigations_ns.i_importCCNavigationsInfoViewClass();
	//var CCExternalRedirectInfoView = bsp.modules_ns.infos_ns.i_importCCExternalRedirectInfoViewClass();
	//...IMPORTS

	//CONSTS...
	_static_private_const._INFO_ID_EXTERNAL_REDIRECT = 0;
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSCInfosView = function()
	{
		this._fInfoView_clss_arr = [];
	};
	//...INIT

	//VARS...
	_private._fNavigationsInfoView_clss = null;

	_private._fInfoView_clss_arr = null;
	//...VARS

	//PUBLIC...
	_public.i_getNavigationsInfoView = function()
	{
		return this._getNavigationsInfoView();
	};

	_public.i_getInfoView = function(aInfoId_int)
	{
		return this._getInfoView(aInfoId_int);
	};

	//EXTERNAL REDIRECT INFO...
	_public.i_getExternalRedirectInfo = function()
	{
		return this._getExternalRedirectInfo();
	};
	//...EXTERNAL REDIRECT INFO
	//...PUBLIC

	//PROTECTED...
	_virtual_protected.__generateNavigationsInfoView = function()
	{
		return new JSCNavigationsInfoView();
	};

	_virtual_protected.__generateInfoView = function(aInfoId_int)
	{
		var l_clss;

		switch (aInfoId_int)
		{
			case _self._INFO_ID_EXTERNAL_REDIRECT:
			{
				l_clss = new JSCExternalRedirectInfoView();
			}break;

			default:
				new JSException('__generateInfoView', 'Unsupported info id: ' + aInfoId_int);
			break;
		}

		return l_clss;
	};
	//...PROTECTED

	//PRIVATE...
	_private._getNavigationsInfoView = function()
	{
		return this._fNavigationsInfoView_clss || this._initNavigationsInfoView();
	};

	_private._initNavigationsInfoView = function()
	{
		var l_clss = this.__generateNavigationsInfoView();
		this._fNavigationsInfoView_clss = l_clss;
		return l_clss;
	};

	_private._getInfoView = function(aInfoId_int)
	{
		return this._fInfoView_clss_arr[aInfoId_int] || this._initInfoView(aInfoId_int);
	};

	//EXTERNAL REDIRECT INFO...
	_private._getExternalRedirectInfo = function()
	{
		return this.__getInfo(_self._INFO_ID_EXTERNAL_REDIRECT);
	};
	//...EXTERNAL REDIRECT INFO

	_private._initInfoView = function(aInfoId_int)
	{
		var l_clss = this.__generateInfoView(aInfoId_int);
		this._fInfoView_clss_arr[aInfoId_int] = l_clss;
		return l_clss;
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCInfosView;
};