bsp.i_getNamespace('bsp.modules_ns.infos_ns.messages_ns').i_importJSCErrorMessageInfoViewClass = function()
{
	var _ns = bsp.modules_ns.infos_ns.messages_ns;
	//INIT...
	if (_ns.JSCErrorMessageInfoView)
	{
		return _ns.JSCErrorMessageInfoView;
	}

	//INHERITANCE IMPORT...
	var JSDOMObject = bsp._unified_ns.view_ns.i_importJSDOMObjectClass();
	//...INHERITANCE IMPORT

	_ns.CCErrorMessageInfoView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCErrorMessageInfoView;
	bsp.i_setExtends(_self, JSDOMObject);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCErrorMessageInfoView();
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

	_private._initJSCErrorMessageInfoView = function()
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

	return _ns.JSCErrorMessageInfoView;
};