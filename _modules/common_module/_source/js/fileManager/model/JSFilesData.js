/*CLASS PATTERN VERSION: 1.1*/
bsp.i_getNamespace('bsp.file_manager_ns.model_ns').i_importJSFilesDataClass = function()
{
	var _ns = bsp.file_manager_ns.model_ns;
	if (_ns.JSFilesData)
	{
		return _ns.JSFilesData;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSFilesData = function()
	{
		___constructor.apply(this, arguments);
	};
	var _self = _ns.JSFilesData;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSFilesData();
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
	var JSCookiesData = bsp.file_manager_ns.model_ns.i_importJSCookiesDataClass();
	var JSSessionsData = bsp.file_manager_ns.model_ns.i_importJSSessionsDataClass();
	//...IMPORTS

	//CONST PUBLIC...
	//LIFE TIMES...
	_static_public_const.i_LIFE_TIME_NONE						= 0;
	_static_public_const.i_LIFE_TIME_HALF_HOUR					= 1800;
	_static_public_const.i_LIFE_TIME_ONE_HOUR					= 3600;
	_static_public_const.i_LIFE_TIME_THREE_HOURS				= 10800;
	_static_public_const.i_LIFE_TIME_TWELFTH_HOURS				= 43200;
	_static_public_const.i_LIFE_TIME_ONE_DAY					= 86400;
	_static_public_const.i_LIFE_TIME_THREE_DAYS					= 259200;
	_static_public_const.i_LIFE_TIME_ONE_WEEK					= 604800;
	_static_public_const.i_LIFE_TIME_TWO_WEEKS					= 1209600;
	_static_public_const.i_LIFE_TIME_ONE_MONTH					= 2592000;
	_static_public_const.i_LIFE_TIME_THREE_MONTHS				= 7776000;
	_static_public_const.i_LIFE_TIME_SIX_MONTHS					= 15768000;
	_static_public_const.i_LIFE_TIME_ONE_YEAR					= 31536000;
	//...LIFE TIMES
	//...CONST PUBLIC

	//CONST PRIVATE...
	//...CONST PRIVATE

	//STATIC PUBLIC...
	//...STATIC PUBLIC

	//STATIC PRIVATE...
	//...STATIC PRIVATE

	//VARS...
	_private._fCookiesData_clss = null;
	_private._fSessionsData_clss = null;
	//...VARS

	_private._initJSFilesData = function()
	{
	};

	//PUBLIC...
	_public.i_getCookiesData = function()
	{
		return this._fCookiesData_clss || this._initCookiesData();
	};
	
	_public.i_getSessionsData = function()
	{
		return this._fSessionsData_clss || this._initSessionsData();
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	_private._initCookiesData = function()
	{
		var l_clss = new JSCookiesData();
		this._fCookiesData_clss = l_clss;
		return l_clss;
	};
	
	_private._initSessionsData = function()
	{
		var l_clss = new JSSessionsData();
		this._fSessionsData_clss = l_clss;
		return l_clss;
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSFilesData;
};