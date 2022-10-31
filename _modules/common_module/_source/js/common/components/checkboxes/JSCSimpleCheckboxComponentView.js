bsp.i_getNamespace('bsp.components_ns.checkboxes_ns').i_importJSCSimpleCheckboxComponentViewClass = function()
{
	var _ns = bsp.components_ns.checkboxes_ns;
	//INIT...
	if (_ns.JSCSimpleCheckboxComponentView)
	{
		return _ns.JSCSimpleCheckboxComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCCheckboxComponentView = bsp.components_ns.checkboxes_ns.i_importJSCCheckboxComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCSimpleCheckboxComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCSimpleCheckboxComponentView;
	bsp.i_setExtends(_self, JSCCheckboxComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCSimpleCheckboxComponentView();
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

	_private._initJSCSimpleCheckboxComponentView = function()
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

	return _ns.JSCSimpleCheckboxComponentView;
};