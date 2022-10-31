bsp.i_getNamespace('bsp._unified_ns.controller_ns.timers_ns').i_importJSSimpleTimerClass = function()
{
	var _ns = bsp._unified_ns.controller_ns.timers_ns;
	//INIT...
	if (_ns.JSSimpleTimer)
	{
		return _ns.JSSimpleTimer;
	}

	//INHERITANCE IMPORT...
	var JSEventDispatcher = bsp._unified_ns.controller_ns.events_ns.i_importJSEventDispatcherClass();
	//...INHERITANCE IMPORT

	_ns.JSSimpleTimer = function(aInterval_num, aTicksCount_int, aOptAutoStart_bl)
	{
		___constructor.call(this, aInterval_num, aTicksCount_int, aOptAutoStart_bl);
	};
	var _self = _ns.JSSimpleTimer;
	bsp.i_setExtends(_self, JSEventDispatcher);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function(aInterval_num, aTicksCount_int, aOptAutoStart_bl)
	{
		_superclass.constructor.call(this);
		this._initJSSimpleTimer(aInterval_num, aTicksCount_int, aOptAutoStart_bl);
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
	var JSObjectMethod = bsp._unified_ns.view_ns.i_importJSObjectMethodClass();
	var JSVariableType = bsp._unified_ns.tools_ns.variables_ns.i_importJSVariableTypeClass();
	var JSException = bsp._unified_ns.controller_ns.exceptions_ns.i_importJSExceptionClass();
	//...IMPORTS

	//CONSTS...
	//EVENTS...
	_static_public_const.i_EVENT_ID_TIMER_STARTED				= "onTimerStarted";
	_static_public_const.i_EVENT_ID_TIMER_TICK					= "onTimerTick";
	_static_public_const.i_EVENT_ID_TIMER_STOPPED				= "onTimerStopped";
	_static_public_const.i_EVENT_ID_TIMER_COMPLETED				= "onTimerCompleted";
	//...EVENTS
	//...CONSTS
	
	//STATIC...
	//...STATIC
	
	_private._initJSSimpleTimer = function(aInterval_num, aTicksCount_int, aOptAutoStart_bl)
	{
		if (!JSVariableType.i_isNumber(aInterval_num))
		{
			new JSException('_initCSimpleTimer', 'Interval value must be number: ' + aInterval_num);
		}
		
		this._fInterval_num = aInterval_num;
		
		if (!JSVariableType.i_isInt(aTicksCount_int))
		{
			new JSException('_initJSSimpleTimer', 'Ticks count value must be int: ' + aTicksCount_int);
		}
		
		this._fTicksCount_int = aTicksCount_int;
		
		if (Boolean(aOptAutoStart_bl))
		{
			this._start();
		}
	};
	//...INIT

	//VARS...
	_private._fTimerId_str = undefined;
	_private._fInterval_num = undefined;
	_private._fTicksCount_int = undefined;
	_private._fElapsedTicksCount_int = undefined;
	//...VARS

	//PUBLIC...
	_public.i_start = function()
	{
		this._start();
	};
	
	_public.i_stop = function()
	{
		this._stop();
	};
	
	_public.i_isInProgress = function()
	{
		return this._isInProgress();
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	_private._start = function()
	{
		this._stop();
		
		this._fTimerId_str = setInterval(this._onTickHandler, this._fInterval_num);
		
		this.i_dispatchEvent(_self.i_EVENT_ID_TIMER_STARTED);
	};

	_private._stop = function()
	{
		if (this._isInProgress())
		{
			this._reset();
			
			this.i_dispatchEvent(_self.i_EVENT_ID_TIMER_STOPPED);
		}
	};

	_private._reset = function()
	{
		clearInterval(this._fTimerId_str);
		
		this._fTimerId_str = undefined;
	};
	
	_private._isInProgress = function()
	{
		return this._fTimerId_str !== undefined;
	};

	_private._onTickHandler = function()
	{
		this._fElapsedTicksCount_int++;

		this.i_dispatchEvent(_self.i_EVENT_ID_TIMER_TICK);
		
		if (this._fElapsedTicksCount_int === this._fTicksCount_int)
		{
			this._reset();
			
			this.i_dispatchEvent(_self.i_EVENT_ID_TIMER_COMPLETED);
		}
	};
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSSimpleTimer;
};