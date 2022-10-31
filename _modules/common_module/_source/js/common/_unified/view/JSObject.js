bsp.i_getNamespace('bsp._unified_ns.view_ns').i_importJSObjectClass = function()
{
	var _ns = bsp._unified_ns.view_ns;
	//INIT...
	if (_ns.JSObject)
	{
		return _ns.JSObject;
	}

	//INHERITANCE IMPORT...
	var JSEventDispatcher = bsp._unified_ns.controller_ns.events_ns.i_importJSEventDispatcherClass();
	//...INHERITANCE IMPORT

	_ns.JSObject = function(aOptDOMElementId_str)
	{
		___constructor.call(this, aOptDOMElementId_str);
	};
	var _self = _ns.JSObject;
	bsp.i_setExtends(_self, JSEventDispatcher);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function(aOptDOMElementId_str)
	{
		_superclass.constructor.call(this);
		this._initJSObject(aOptDOMElementId_str);
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
	
	_private._initJSObject = function(aOptDOMElementId_str)
	{
		this.___setDOMElementId(aOptDOMElementId_str);
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

	return _ns.JSObject;
};