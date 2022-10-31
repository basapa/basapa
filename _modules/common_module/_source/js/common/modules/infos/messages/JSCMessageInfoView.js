bsp.i_getNamespace('bsp.modules_ns.infos_ns.messages_ns').i_importJSCMessageInfoViewClass = function()
{
	var _ns = bsp.modules_ns.infos_ns.messages_ns;
	//INIT...
	if (_ns.JSCMessageInfoView)
	{
		return _ns.JSCMessageInfoView;
	}

	//INHERITANCE IMPORT...
	var JSEventDispatcher = bsp._unified_ns.controller_ns.events_ns.i_importJSEventDispatcherClass();
	//...INHERITANCE IMPORT

	_ns.JSCMessageInfoView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCMessageInfoView;
	bsp.i_setExtends(_self, JSEventDispatcher);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCMessageInfoView();
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

	_private._initJSCMessageInfoView = function()
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

	return _ns.JSCMessageInfoView;
};