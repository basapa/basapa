bsp.i_getNamespace('bsp.job_ns.modules_ns.infos_ns.navigations_ns').i_importJSJOBNavigationsInfoViewClass = function()
{
	var _ns = bsp.job_ns.modules_ns.infos_ns.navigations_ns;
	//INIT...
	if (_ns.JSJOBNavigationsInfoView)
	{
		return _ns.JSJOBNavigationsInfoView;
	}

	//INHERITANCE IMPORT...
	var JSCNavigationsInfoView = bsp.modules_ns.infos_ns.navigations_ns.i_importJSCNavigationsInfoViewClass();
	//...INHERITANCE IMPORT

	_ns.JSJOBNavigationsInfoView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSJOBNavigationsInfoView;
	bsp.i_setExtends(_self, JSCNavigationsInfoView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSJOBNavigationsInfoView();
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
	var JSJOBAUSubcategoriesNavigationInfoView = bsp.job_ns.modules_ns.infos_ns.navigations_ns.i_importJSJOBAUSubcategoriesNavigationInfoViewClass();
	//...IMPORTS

	//CONSTS...
	_static_private_const._NAVIGATION_INFO_ID_AU_SUBCATEGORIES = 0;
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSJOBNavigationsInfoView = function()
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

	//AU SUBCATEGORIES NAVIGATION INFO...
	_public.i_getAUSubcategoriesNavigationInfoView = function()
	{
		return this._getAUSubcategoriesNavigationInfoView();
	};
	//...AU SUBCATEGORIES NAVIGATION INFO
	//...PUBLIC

	//PROTECTED...
	_override_protected.__generateNavigationInfoView = function(aNavigationInfoId_int)
	{
		var l_clss;

		switch (aNavigationInfoId_int)
		{
			case _self._NAVIGATION_INFO_ID_AU_SUBCATEGORIES:
			{
				l_clss = new JSJOBAUSubcategoriesNavigationInfoView();
			}break;

			default:
				l_clss = _superclass.__generateNavigationInfoView.call(this, aNavigationInfoId_int);
			break;
		}

		return l_clss;
	};
	//...PROTECTED

	//PRIVATE...
	//AU SUBCATEGORIES NAVIGATION INFO...
	_private._getAUSubcategoriesNavigationInfoView = function()
	{
		return this.__getNavigationInfoView(_self._NAVIGATION_INFO_ID_AU_SUBCATEGORIES);
	};
	//...AU SUBCATEGORIES NAVIGATION INFO
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSJOBNavigationsInfoView;
};