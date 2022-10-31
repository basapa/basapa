/*CLASS PATTERN VERSION: 1.1*/
bsp.i_getNamespace('bsp.file_manager_ns.model_ns').i_importJSCookiesDataClass = function()
{
	var _ns = bsp.file_manager_ns.model_ns;
	if (_ns.JSCookiesData)
	{
		return _ns.JSCookiesData;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSCookiesData = function()
	{
		___constructor.apply(this, arguments);
	};
	var _self = _ns.JSCookiesData;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCookiesData();
	};

	var _static_public_const = _self;
	var _static_private_const = _self;
	var _static_public = _self;
	var _static_private = _self;
	var _public = _prototype;
	var _protected = _prototype;
	var _private = _prototype;
	var _internal = _prototype;
	var _virtual_public = _prototype;
	var _override_public = _prototype;
	var _virtual_protected = _prototype;
	var _override_protected = _prototype;

	//IMPORTS...
	var JSMainData = bsp.main_manager_ns.model_ns.i_importJSMainDataClass();
	//...IMPORTS

	//CONST PUBLIC...
	//...CONST PUBLIC

	//CONST PRIVATE...
	//...CONST PRIVATE

	//STATIC PUBLIC...
	//...STATIC PUBLIC

	//STATIC PRIVATE...
	//...STATIC PRIVATE

	//VARS...
	_private._fCookieData_clss_arr = null;
	//...VARS

	_private._initJSCookiesData = function()
	{
	};

	//PUBLIC...
	_public.i_getRealtyCookieData = function()
	{
		return $this._getCookieData(JSMainData.i_SITE_ID_REALTY);
	};

	_public.i_getCookieData = function(aSiteId_str)
	{
		return $this._getCookieData(aSiteId_str);
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	_private._getCookieData = function(aSiteId_str)
	{
		if (!$this._fCookieData_clss_arr[aSiteId_str])
		{
			l_clss = null;

			switch (aSiteId_str)
			{
				case CMainData.i_SITE_ID_REALTY:
				{
					l_clss = new CRLTCookieData();
				}break;

				default:
					new CException('_getCookieData', 'Unsupported site id: ' .aSiteId_str);
				break;
			}

			$this._fCookieData_clss_arr[aSiteId_str] = l_clss;
		}

		return $this._fCookieData_clss_arr[aSiteId_str];
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCookiesData;
};