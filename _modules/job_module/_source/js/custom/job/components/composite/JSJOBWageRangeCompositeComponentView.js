bsp.i_getNamespace('bsp.job_ns.components_ns.composite_ns').i_importJSJOBWageRangeCompositeComponentViewClass = function()
{
	var _ns = bsp.job_ns.components_ns.composite_ns;
	//INIT...
	if (_ns.JSJOBWageRangeCompositeComponentView)
	{
		return _ns.JSJOBWageRangeCompositeComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCCompositeComponentView = bsp.components_ns.composite_ns.i_importJSCCompositeComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSJOBWageRangeCompositeComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSJOBWageRangeCompositeComponentView;
	bsp.i_setExtends(_self, JSCCompositeComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSJOBWageRangeCompositeComponentView();
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
	//...IMPORTS

	//CONSTS...
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSJOBWageRangeCompositeComponentView = function()
	{
	};
	//...INIT

	//VARS...
	//...VARS

	//PUBLIC...
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSJOBWageRangeCompositeComponentView;
};