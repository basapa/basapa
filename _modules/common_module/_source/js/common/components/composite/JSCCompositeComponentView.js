bsp.i_getNamespace('bsp.components_ns.composite_ns').i_importJSCCompositeComponentViewClass = function()
{
	var _ns = bsp.components_ns.composite_ns;
	//INIT...
	if (_ns.JSCCompositeComponentView)
	{
		return _ns.JSCCompositeComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCComponentView = bsp.components_ns.i_importJSCComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCCompositeComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCCompositeComponentView;
	bsp.i_setExtends(_self, JSCComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCCompositeComponentView();
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
	//...IMPORTS

	//CONSTS...
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSCCompositeComponentView = function()
	{
		this._fCompositeComponents_clss_arr = [];
	};
	//...INIT

	//VARS...
	_private._fCompositeComponents_clss_arr = null;
	//...VARS

	//PUBLIC...
	_public.i_initCompositeComponent = function(aCompositeComponentId_int, aCompositeComponent_clss)
	{
		this._initCompositeComponent(aCompositeComponentId_int, aCompositeComponent_clss);
	};
	//...PUBLIC

	//PROTECTED...
	_protected.__getCompositeComponent = function(aCompositeComponentId_int, aOptDontThrowIfNotExist_bl)
	{
		var lCompositeComponent_clss = this._fCompositeComponents_clss_arr[aCompositeComponentId_int];
		if (!lCompositeComponent_clss)
		{
			if (aOptDontThrowIfNotExist_bl)
			{
				return null;
			}

			new JSException('__getCompositeComponent', 'Composite component not exist: ' + aCompositeComponentId_int);
		}
		return lCompositeComponent_clss;
	};
	//...PROTECTED

	//PRIVATE...
	_private._initCompositeComponent = function(aCompositeComponentId_int, aCompositeComponent_clss)
	{
		this._fCompositeComponents_clss_arr[aCompositeComponentId_int] = aCompositeComponent_clss;
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCCompositeComponentView;
};