bsp.i_getNamespace('bsp.modules_ns.infos_ns.navigations_ns').i_importJSCPageNavigationInfoViewClass = function()
{
	var _ns = bsp.modules_ns.infos_ns.navigations_ns;
	//INIT...
	if (_ns.JSCPageNavigationInfoView)
	{
		return _ns.JSCPageNavigationInfoView;
	}

	//INHERITANCE IMPORT...
	var JSObject = bsp._unified_ns.view_ns.i_importJSObjectClass();
	//...INHERITANCE IMPORT

	_ns.JSCPageNavigationInfoView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCPageNavigationInfoView;
	bsp.i_setExtends(_self, JSObject);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCPageNavigationInfoView();
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
	var JSEventHandler = bsp._unified_ns.controller_ns.events_ns.i_importJSEventHandlerClass();
	var JSCComponentView = bsp.components_ns.i_importJSCComponentViewClass();
	//...IMPORTS

	//CONSTS...
	//JS PHP AGREEMENTS...
	_static_public_const.i_INFO_ATTR_ID				= 'i_INFO_ATTR_ID';
	//...JS PHP AGREEMENTS
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSCPageNavigationInfoView = function()
	{
		this._fInfoAttrs_obj = {};
		this._fInfoComponents_clss_arr = [];
	};
	//...INIT

	//VARS...
	_private._fInfoAttrs_obj = null;
	_private._fInfoComponents_clss_arr = null;
	//...VARS

	//PUBLIC...
	_public.i_setInfoAttrs = function(aAttrs_str_obj)
	{
		this.__setInfoAttrs(aAttrs_str_obj);
	};

	_public.i_initInfoComponent = function(aInfoComponentId_int, aInfoComponent_clss)
	{
		this._initInfoComponent(aInfoComponentId_int, aInfoComponent_clss);
	};

	_public.i_initDOMInfo = function()
	{
		this.__initDOMInfo();
	};
	//...PUBLIC

	//PROTECTED...
	_virtual_protected.__initDOMInfo = function()
	{
		this.___setDOMElementId(this.__getInfoId());
	};

	_virtual_protected.__setInfoAttrs = function(aAttrs_str_obj)
	{
		this._fInfoAttrs_obj = bsp.i_getObject(aAttrs_str_obj);
	};

	_protected.__getInfoId = function()
	{
		return this._fInfoAttrs_obj[_self.i_INFO_ATTR_ID];
	};

	_protected.__getInfoComponent = function(aInfoComponentId_int)
	{
		var lInfoComponent_clss = this._fInfoComponents_clss_arr[aInfoComponentId_int];
		if (!lInfoComponent_clss)
		{
			new JSException('__getInfoComponent', 'Info component not exist: ' + aInfoComponentId_int);
		}
		return lInfoComponent_clss;
	};
	//...PROTECTED

	//PRIVATE...
	_private._initInfoComponent = function(aInfoComponentId_int, aInfoComponent_clss)
	{
		this._fInfoComponents_clss_arr[aInfoComponentId_int] = aInfoComponent_clss;
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCPageNavigationInfoView;
};