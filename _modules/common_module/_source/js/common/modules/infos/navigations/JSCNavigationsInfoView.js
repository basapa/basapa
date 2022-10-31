bsp.i_getNamespace('bsp.modules_ns.infos_ns.navigations_ns').i_importJSCNavigationsInfoViewClass = function()
{
	var _ns = bsp.modules_ns.infos_ns.navigations_ns;
	//INIT...
	if (_ns.JSCNavigationsInfoView)
	{
		return _ns.JSCNavigationsInfoView;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSCNavigationsInfoView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCNavigationsInfoView;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		this._initJSCNavigationsInfoView();
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
	//var JSCSiteDescriptionInfoView = bsp.modules_ns.infos_ns.i_importJSCSiteDescriptionInfoViewClass();
	//...IMPORTS

	//CONSTS...
	//_static_private_const._INFO_ID_SITE_DESCRIPTION = 0;
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSCNavigationsInfoView = function()
	{
		this._fNavigationInfoView_clss_arr = [];
	};
	//...INIT

	//VARS...
	_private._fNavigationInfoView_clss_arr = null;
	//...VARS

	//PUBLIC...
	_public.i_getNavigationInfoView = function(aNavigationInfoId_int)
	{
		return this._getNavigationInfoView(aNavigationInfoId_int);
	};

	//SITE DESCRIPTION INFO...
	/*_public.i_getSiteDescriptionInfo = function()
	{
		return this._getSiteDescriptionInfo();
	};*/
	//...SITE DESCRIPTION INFO
	//...PUBLIC

	//PROTECTED...
	_protected.__getNavigationInfoView = function(aNavigationInfoId_int)
	{
		return this._fNavigationInfoView_clss_arr[aNavigationInfoId_int] || this._initNavigationInfoView(aNavigationInfoId_int);
	};

	_virtual_protected.__generateNavigationInfoView = function(aNavigationInfoId_int)
	{
		var l_clss;

		switch (aNavigationInfoId_int)
		{
			/*case _self._INFO_ID_SITE_DESCRIPTION:
			{
				l_clss = new JSCSiteDescriptionInfoView();
			}break;*/

			default:
				new JSException('__generateNavigationInfoView', 'Unsupported navigation info id: ' + aNavigationInfoId_int);
			break;
		}

		return l_clss;
	};
	//...PROTECTED

	//PRIVATE...
	//SITE DESCRIPTION INFO...
	/*_private._getSiteDescriptionInfo = function()
	{
		return this.__getInfo(_self._INFO_ID_SITE_DESCRIPTION);
	};*/
	//...SITE DESCRIPTION INFO

	_private._initNavigationInfoView = function(aNavigationInfoId_int)
	{
		var l_clss = this.__generateNavigationInfoView(aNavigationInfoId_int);
		this._fNavigationInfoView_clss_arr[aNavigationInfoId_int] = l_clss;
		return l_clss;
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCNavigationsInfoView;
};