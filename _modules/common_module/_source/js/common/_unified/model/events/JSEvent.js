bsp.i_getNamespace('bsp._unified_ns.model_ns.events_ns').i_importJSEventClass = function()
{
	var _ns = bsp._unified_ns.model_ns.events_ns;
	//INIT...
	if (_ns.JSEvent)
	{
		return _ns.JSEvent;
	}

	//INHERITANCE IMPORT...
	var JSEventData = bsp._unified_ns.model_ns.events_ns.i_importJSEventDataClass();
	//...INHERITANCE IMPORT

	_ns.JSEvent = function(aEventId_str, aEventSource_clss, aOptEventParams_obj)
	{
		___constructor.call(this, aEventId_str, aEventSource_clss, aOptEventParams_obj);
	};
	var _self = _ns.JSEvent;
	bsp.i_setExtends(_self, JSEventData);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function(aEventId_str, aEventSource_clss, aOptEventParams_obj)
	{
		var lEventDetails_obj = {i_fEventSource_clss:aEventSource_clss,
								i_fEventParams_obj:aOptEventParams_obj};

		_superclass.constructor.call(this, new CustomEvent(aEventId_str, {detail:lEventDetails_obj}));
		this._initJSEvent();
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
	
	_private._initJSEvent = function()
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

	return _ns.JSEvent;
};