bsp.i_getNamespace('bsp.job_ns.modules_ns.infos_ns.navigations_ns').i_importJSJOBAUSubcategoriesNavigationInfoViewClass = function()
{
	var _ns = bsp.modules_ns.forms_ns;
	//INIT...
	if (_ns.JSJOBAUSubcategoriesNavigationInfoView)
	{
		return _ns.JSJOBAUSubcategoriesNavigationInfoView;
	}

	//INHERITANCE IMPORT...
	var JSCNavigationInfoView = bsp.modules_ns.infos_ns.navigations_ns.i_importJSCNavigationInfoViewClass();
	//...INHERITANCE IMPORT

	_ns.JSJOBAUSubcategoriesNavigationInfoView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSJOBAUSubcategoriesNavigationInfoView;
	bsp.i_setExtends(_self, JSCNavigationInfoView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSJOBAUSubcategoriesNavigationInfoView();
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
	var JSEventHandler = bsp._unified_ns.controller_ns.events_ns.i_importJSEventHandlerClass();
	var JSCComponentView = bsp.components_ns.i_importJSCComponentViewClass();
	var JSDOMTools = bsp._unified_ns.tools_ns.i_importJSDOMToolsClass();
	//...IMPORTS
	
	//CONSTS...
	//ATTRS...
	_static_private_const._INFO_COMPONENT_ID_TOGGLE				= 'JS_INFO_COMPONENT_ID_TOGGLE';
	_static_private_const._MIN_ITEMS_COUNT_FOR_TOGGLE_DISPLAY	= 'JS_MIN_ITEMS_COUNT_FOR_TOGGLE_DISPLAY';
	_static_private_const._MIN_BODY_HEIGHT						= 'JS_MIN_BODY_HEIGHT';
	_static_private_const._TOGGLE_NAME_HIDE						= 'JS_TOGGLE_NAME_HIDE';
	_static_private_const._TOGGLE_NAME_SHOW						= 'JS_TOGGLE_NAME_SHOW';
	//...ATTRS

	//...CONSTS
	
	//STATIC...
	//...STATIC
	
	_private._initJSJOBAUSubcategoriesNavigationInfoView = function()
	{
	};
	//...INIT
	
	//VARS...
	_private._fBody_obj = null;
	_private._fIsBodyClipped_bl = undefined;
	//...VARS
	
	//PUBLIC...
	//...PUBLIC
	
	//PROTECTED...
	_override_protected.__initDOMInfo = function()
	{
		_superclass.__initDOMInfo.call(this);

		var lBody_obj = JSDOMTools.i_getDOMElementByClassName(this.i_getDOMElement(), 'css_body');
		this._fBody_obj = lBody_obj;

		var l_obj_arr = JSDOMTools.i_getDOMElementsByTagName(lBody_obj, 'li', true);
		if (l_obj_arr)
		{
			var lSubcategoryItemsCount_int = l_obj_arr.length;
			if (lSubcategoryItemsCount_int > this.__getInfoAttr(_self._MIN_ITEMS_COUNT_FOR_TOGGLE_DISPLAY))
			{
				this.__getInfoComponent(_self._INFO_COMPONENT_ID_TOGGLE).i_addEventListener(JSCComponentView.i_NATIVE_EVENT_ID_CLICK, new JSEventHandler(this, this._onToggleInfoComponentClick));

				this._fIsBodyClipped_bl = true;

				this._updateBodyHeight();
			}
		}
	};
	//...PROTECTED
	
	//PRIVATE...
	//EVENTS...
	_private._onToggleInfoComponentClick = function(aEvent_obj)
	{
		//var lNativeEventData_clss = new JSNativeEventData(aEvent_obj);

		this._fIsBodyClipped_bl = !this._fIsBodyClipped_bl;

		this._updateBodyHeight();
	};
	//...EVENTS

	_private._updateBodyHeight = function()
	{
		JSDOMTools.i_setDOMElementInnerHTML(this.__getInfoComponent(_self._INFO_COMPONENT_ID_TOGGLE).i_getDOMComponentElement(), this._fIsBodyClipped_bl ? this.__getInfoAttr(_self._TOGGLE_NAME_SHOW) : this.__getInfoAttr(_self._TOGGLE_NAME_HIDE));

		JSDOMTools.i_setDOMElementHeight(this._fBody_obj, this._fIsBodyClipped_bl ? this.__getInfoAttr(_self._MIN_BODY_HEIGHT) : JSDOMTools.i_STYLE_HEIGHT_VALUE_AUTO);
	};
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSJOBAUSubcategoriesNavigationInfoView;
};