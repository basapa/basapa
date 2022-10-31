bsp.i_getNamespace('bsp.modules_ns.forms_ns').i_importJSSupportFormViewClass = function()
{
	var _ns = bsp.modules_ns.forms_ns;
	//INIT...
	if (_ns.JSCUserMessageAdditingFormView)
	{
		return _ns.JSCUserMessageAdditingFormView;
	}

	//INHERITANCE IMPORT...
	var JSCFormView = bsp.modules_ns.forms_ns.i_importJSCFormViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCUserMessageAdditingFormView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCUserMessageAdditingFormView;
	bsp.i_setExtends(_self, JSCFormView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSSupportFormView();
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
	
	_private._initJSSupportFormView = function()
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

	return _ns.JSCUserMessageAdditingFormView;
};