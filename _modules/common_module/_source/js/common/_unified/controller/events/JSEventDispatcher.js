bsp.i_getNamespace('bsp._unified_ns.controller_ns.events_ns').i_importJSEventDispatcherClass = function()
{
	var _ns = bsp._unified_ns.controller_ns.events_ns;
	//INIT...
	if (_ns.JSEventDispatcher)
	{
		return _ns.JSEventDispatcher;
	}

	//INHERITANCE IMPORT...
	var JSDOMObject = bsp._unified_ns.view_ns.i_importJSDOMObjectClass();
	//...INHERITANCE IMPORT

	_ns.JSEventDispatcher = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSEventDispatcher;
	bsp.i_setExtends(_self, JSDOMObject);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSEventDispatcher();
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
	
	_private._initJSEventDispatcher = function()
	{
		this._fEventsHandlers_clss_arr = [];
	};
	//...INIT

	//VARS...
	_private._fEventsHandlers_clss_arr = null;
	//...VARS

	//PUBLIC...
	_public.i_addEventListener = function(aEventId_str, aEventHandler_clss)
	{
		this._addEventListener(aEventId_str, aEventHandler_clss);
	};

	_public.i_removeEventListener = function(aEventId_str, aEventHandler_clss)
	{
		this._removeEventListener(aEventId_str, aEventHandler_clss);
	};

	_public.i_dispatchEvent = function(aEvent_clss)
	{
		this._dispatchEvent(aEvent_clss);
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	_private._addEventListener = function(aEventId_str, aEventHandler_clss)
	{
		if (aEventId_str === undefined)
		{
			new JSException('_addEventListener', 'Event id must be defined!');
		}

		if (!aEventHandler_clss)
		{
			new JSException('_addEventListener', 'Event handler must be defined!');
		}

		var lEventHandler_clss = this._getEventHandler(aEventId_str, aEventHandler_clss);
		if (lEventHandler_clss)
		{
			return;
		}

		aEventHandler_clss.i_setEventId(aEventId_str);

		this._fEventsHandlers_clss_arr.push(aEventHandler_clss);

		this.i_getDOMElement().addEventListener(aEventId_str, aEventHandler_clss.i_getBindingHandlerFunc(), false);
	};

	_private._removeEventListener = function(aEventId_str, aEventHandler_clss)
	{
		if (aEventId_str === undefined)
		{
			new JSException('_removeEventListener', 'Event id must be defined!');
		}

		if (!aEventHandler_clss)
		{
			new JSException('_removeEventListener', 'Event handler must be defined!');
		}

		var lEventHandler_clss = this._getEventHandler(aEventId_str, aEventHandler_clss);
		if (!lEventHandler_clss)
		{
			new JSException('_removeEventListener', 'Event handler must be defined earlier!');
		}

		this.i_getDOMElement().removeEventListener(aEventId_str, lEventHandler_clss.i_getBindingHandlerFunc(), false);
	};

	_private._dispatchEvent = function(aEvent_clss)
	{
		if (!aEvent_clss)
		{
			new CException('_dispatchEvent', 'Event must be defined!');
		}

		this.i_getDOMElement().dispatchEvent(aEvent_clss.i_getEventObject());
	};

	_private._getEventHandler = function(aEventId_str, aEventHandler_clss)
	{
		var lCount_int = this._fEventsHandlers_clss_arr.length;
		for (var i = 0; i < lCount_int; i++)
		{
			var lEventHandler_clss = this._fEventsHandlers_clss_arr[i];
			if (
					lEventHandler_clss.i_getEventId() === aEventId_str
					&& lEventHandler_clss.i_getHandlerClass() === aEventHandler_clss.i_getHandlerClass()
					&& lEventHandler_clss.i_getHandlerFunc() === aEventHandler_clss.i_getHandlerFunc()
				)
			{
				return lEventHandler_clss;
			}
		}

		return null;
	};
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSEventDispatcher;
};