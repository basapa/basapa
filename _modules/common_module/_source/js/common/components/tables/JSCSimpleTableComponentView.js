bsp.i_getNamespace('bsp.components_ns.tables_ns').i_importJSCSimpleTableComponentViewClass = function()
{
	var _ns = bsp.components_ns.tables_ns;
	//INIT...
	if (_ns.JSCSimpleTableComponentView)
	{
		return _ns.JSCSimpleTableComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCTableComponentView = bsp.components_ns.tables_ns.i_importJSCTableComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCSimpleTableComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCSimpleTableComponentView;
	bsp.i_setExtends(_self, JSCTableComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCSimpleTableComponentView();
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

	_private._initJSCSimpleTableComponentView = function()
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

	return _ns.JSCSimpleTableComponentView;
};