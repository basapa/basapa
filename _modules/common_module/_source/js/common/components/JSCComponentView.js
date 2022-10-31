bsp.i_getNamespace('bsp.components_ns').i_importJSCComponentViewClass = function()
{
	var _ns = bsp.components_ns;
	//INIT...
	if (_ns.JSCComponentView)
	{
		return _ns.JSCComponentView;
	}

	//INHERITANCE IMPORT...
	var JSObject = bsp._unified_ns.view_ns.i_importJSObjectClass();
	//...INHERITANCE IMPORT

	_ns.JSCComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCComponentView;
	bsp.i_setExtends(_self, JSObject);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCComponentView();
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
	var JSVariableType = bsp._unified_ns.tools_ns.variables_ns.i_importJSVariableTypeClass();
	//...IMPORTS

	//CONSTS...
	//JS PHP AGREEMENTS...
	//ATTRS...
	_static_public_const.i_COMPONENT_ATTR_ID			= "COMPONENT_ATTR_ID";
	//...ATTRS

	_static_private_const._TAG_PREFIX_ELEMENT			= "element_";
	_static_private_const._TAG_PREFIX_NAME				= "name_";
	//...JS PHP AGREEMENTS

	//EVENTS...
	_static_public_const.i_NATIVE_EVENT_ID_CLICK			= "click";
	_static_public_const.i_NATIVE_EVENT_ID_CHANGE			= "change";
	//...EVENTS
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSCComponentView = function()
	{
		this.__fComponentAttrs_obj = {};
	};
	//...INIT

	//VARS...
	_protected.__fComponentAttrs_obj = null;

	_private._fComponentElement_clss = null;
	//...VARS

	//PUBLIC...
	_public.i_initDOMComponent = function()
	{
		this.__initDOMComponent();
	};

	_public.i_setComponentAttrs = function(aComponentAttrs_str_obj)
	{
		this._setComponentAttrs(aComponentAttrs_str_obj);
	};

	_public.i_getDOMComponent = function()
	{
		return this.i_getDOMElement();
	};

	_public.i_getComponentElement = function()
	{
		return this._fComponentElement_clss || (this._fComponentElement_clss = new JSObject(this.__getComponentElementId()));
	};

	_public.i_getDOMComponentElement = function()
	{
		return this.i_getComponentElement().i_getDOMElement();
	};
	//...PUBLIC

	//PROTECTED...
	_virtual_protected.__initDOMComponent = function()
	{
		this.___setDOMElementId(this.__getComponentId());
	};

	_protected.__getComponentId = function()
	{
		return this.__getComponentAttr(_self.i_COMPONENT_ATTR_ID);
	};

	_protected.__getComponentElementId = function()
	{
		return _self._TAG_PREFIX_ELEMENT + this.__getComponentId();
	};

	_protected.__getComponentAttr = function(aComponentAttrId_str)
	{
		var lComponentAttr_str = this.__fComponentAttrs_obj[aComponentAttrId_str];
		if (!lComponentAttr_str)
		{
			new JSException('__getComponentAttr', 'Component not exist: ' + aComponentAttrId_str);
		}
		return lComponentAttr_str;
	};
	//...PROTECTED

	//PRIVATE...
	_private._setComponentAttrs = function(aComponentAttrs_str_obj)
	{
		this.__fComponentAttrs_obj = JSVariableType.i_toObject(aComponentAttrs_str_obj);
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCComponentView;
};