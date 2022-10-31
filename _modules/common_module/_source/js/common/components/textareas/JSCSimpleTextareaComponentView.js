bsp.i_getNamespace('bsp.components_ns.textareas_ns').i_importJSCSimpleTextareaComponentViewClass = function()
{
	var _ns = bsp.components_ns.textareas_ns;
	//INIT...
	if (_ns.JSCSimpleTextareaComponentView)
	{
		return _ns.JSCSimpleTextareaComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCTextareaComponentView = bsp.components_ns.textareas_ns.i_importJSCTextareaComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCSimpleTextareaComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCSimpleTextareaComponentView;
	bsp.i_setExtends(_self, JSCTextareaComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCSimpleTextareaComponentView();
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

	_private._initJSCSimpleTextareaComponentView = function()
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

	return _ns.JSCSimpleTextareaComponentView;
};