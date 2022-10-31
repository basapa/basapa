bsp.i_getNamespace('bsp._unified_ns.controller_ns.transitions_ns').i_importJSAnimateClass = function()
{
	var _ns = bsp._unified_ns.controller_ns.transitions_ns;
	//INIT...
	if (_ns.JSAnimate)
	{
		return _ns.JSAnimate;
	}

	//INHERITANCE IMPORT...
	var JSEventDispatcher = bsp._unified_ns.controller_ns.events_ns.i_importJSEventDispatcherClass();
	//...INHERITANCE IMPORT

	_ns.JSAnimate = function(aInitialValue_num, aFinalValue_num, aDuration_num, aUpdateObjectMethod_clss, aOptInterpolationType_int)
	{
		___constructor.call(this, aInitialValue_num, aFinalValue_num, aDuration_num, aUpdateObjectMethod_clss, aOptInterpolationType_int);
	};
	var _self = _ns.JSAnimate;
	bsp.i_setExtends(_self, JSEventDispatcher);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function(aInitialValue_num, aFinalValue_num, aDuration_num, aUpdateObjectMethod_clss, aOptInterpolationType_int)
	{
		_superclass.constructor.call(this);
		this._initJSAnimate(aInitialValue_num, aFinalValue_num, aDuration_num, aUpdateObjectMethod_clss, aOptInterpolationType_int);
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
	_static_public_const.i_EVENT_ID_ANIMATION_STARTED			= "onAnimationStarted";
	_static_public_const.i_EVENT_ID_ANIMATION_STOPPED			= "onAnimationStopped";
	_static_public_const.i_EVENT_ID_ANIMATION_COMPLETED			= "onAnimationCompleted";
	//...EVENTS
	
	//INTERPOLATION TYPES...
	_static_public_const.i_INTERPOLATION_TYPE_LINEAR			= 0;
	_static_public_const.i_INTERPOLATION_TYPE_EASE_IN_CUBIC		= 1;
	_static_public_const.i_INTERPOLATION_TYPE_EASE_OUT_CUBIC	= 2;
	_static_public_const.i_INTERPOLATION_TYPE_EASE_IN_OUT_CUBIC	= 3;
	//...INTERPOLATION TYPES
	//...CONSTS
	
	//STATIC...
	_static_private._interpolationMethodLinear = function(aElapsedTime_num, aInitialValue_num, aFinalValue_num, aDuration_num)
	{
		return aInitialValue_num + (aFinalValue_num - aInitialValue_num) * aElapsedTime_num / aDuration_num;
	};
	
	_static_private._interpolationMethod = function(aElapsedTime_num, aInitialValue_num, aFinalValue_num, aDuration_num)
	{
		//easeNone
		return aInitialValue_num + (aFinalValue_num - aInitialValue_num) * aElapsedTime_num / aDuration_num;
		
		//easeInCubic
		/*return aInitialValue_num + (aFinalValue_num - aInitialValue_num) * (aElapsedTime_num /= aDuration_num) * aElapsedTime_num * aElapsedTime_num;
		
		//easeOutCubic
		return aInitialValue_num + (aFinalValue_num - aInitialValue_num) * ((aElapsedTime_num = aElapsedTime_num / aDuration_num - 1) * aElapsedTime_num * aElapsedTime_num + 1);
		
		//easeInOutCubic
		if ((aElapsedTime_num /= aDuration_num / 2) < 1)
		{
			return aInitialValue_num + (aFinalValue_num - aInitialValue_num) / 2 * aElapsedTime_num * aElapsedTime_num * aElapsedTime_num;
		}
		return aInitialValue_num + (aFinalValue_num - aInitialValue_num) / 2 * ((aElapsedTime_num -= 2) * aElapsedTime_num * aElapsedTime_num + 2);
		*/
		//t=aElapsedTime_num, b=aInitialValue_num, c=aFinalValue_num - aInitialValue_num, d=aDuration_num
		//http://gsgd.co.uk/sandbox/jquery/easing/jquery.easing.1.3.i_
	};
	//...STATIC
	
	_private._initCAnimate = function(aInitialValue_num, aFinalValue_num, aDuration_num, aUpdateObjectMethod_clss, aOptInterpolationType_int)
	{
		if (!JSVariableType.i_isNumber(aInitialValue_num))
		{
			new JSException('_initCAnimate', 'Initial value must be number: ' + aInitialValue_num);
		}
		
		this._fInitialValue_num = aInitialValue_num;
		
		if (!JSVariableType.i_isNumber(aFinalValue_num))
		{
			new JSException('_initCAnimate', 'Final value must be number: ' + aFinalValue_num);
		}
		
		this._fFinalValue_num = aFinalValue_num;
		
		if (!JSVariableType.i_isNumber(aDuration_num))
		{
			new JSException('_initCAnimate', 'Duration must be number: ' + aDuration_num);
		}
		
		this._fDuration_num = aDuration_num;
		
		if (!JSVariableType.i_isClassType(aUpdateObjectMethod_clss, CObjectMethod))
		{
			new JSException('_initCAnimate', 'Update object method must be class: ' + aUpdateObjectMethod_clss);
		}
		
		this._fUpdateObjectMethod_clss = aUpdateObjectMethod_clss;
		
		if (aOptInterpolationType_int !== undefined
			&& !CVariableType.i_isInt(aOptInterpolationType_int))
		{
			new JSException('_initJSAnimate', 'Interpolation type must be integer: ' + aOptInterpolationType_int);
		}
		
		var lInterpolationType_int = aOptInterpolationType_int !== undefined ? aOptInterpolationType_int : _self.i_INTERPOLATION_TYPE_LINEAR;
		switch (lInterpolationType_int)
		{
			case _self.i_INTERPOLATION_TYPE_LINEAR:
			{
				this._fInterpolationMethod_func = _static_private._interpolationMethodLinear;
			}break;
			
			case _self.i_INTERPOLATION_TYPE_EASE_IN_CUBIC:
			{
				this._fInterpolationMethod_func = null;
			}break;
			
			case _self.i_INTERPOLATION_TYPE_EASE_OUT_CUBIC:
			{
				this._fInterpolationMethod_func = null;
			}break;
			
			case _self.i_INTERPOLATION_TYPE_EASE_IN_OUT_CUBIC:
			{
				this._fInterpolationMethod_func = null;
			}break;
			
			default:
				new CException('_initCAnimate', 'Invalid interpolation type: ' + lInterpolationType_int);
			break;
		}
	};
	//...INIT

	//VARS...
	_private._fStartTime_num = undefined;
	_private._fDuration_num = undefined;
	_private._fInitialValue_num = undefined;
	_private._fFinalValue_num = undefined;
	_private._fUpdateObjectMethod_clss = null;
	_private._fInterpolationMethod_func = null;
	_private._fElapsedTime_num = undefined;
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
	
	_public.i_isPlaying = function()
	{
		return this._isPlaying();
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	_private._start = function()
	{
		this._fStartTime_num = performance.now();
		
		requestAnimationFrame(this._onAnimationFrame);
		
		this._onAnimationStarted();
	};
	
	_private._stop = function()
	{
		this._reset();
		
		this._onAnimationStopped();
	};
	
	_private._isPlaying = function()
	{
		return this._fStartTime_num !== undefined;
	};
	
	_private._reset = function()
	{
		this._fStartTime_num = undefined;
	};
	
	_private._update = function()
	{
		var lValue_num = this._fInterpolationMethod_func.call(this, this._fElapsedTime_num, this._fInitialValue_num, this._fFinalValue_num, this._fDuration_num);

		this._fUpdateObjectMethod_clss.i_getMethodFunc().call(this, lValue_num);
	};
	
	_private._onAnimationFrame = function()
	{
		var lCurrentTime_num = performance.now();
		
		this._fElapsedTime_num = lCurrentTime_num - this._fStartTime_num;
		if (this._fElapsedTime_num > this._fDuration_num)
		{
			this._fElapsedTime_num = this._fDuration_num;
			
			this._update();
			this._reset();
			this._onAnimationCompleted();
			return;
		}
		
		this._update();
		
		requestAnimationFrame(this._onAnimationFrame);
	};
	
	_private._onAnimationStarted = function()
	{
		this._fUpdateObjectMethod_clss.i_getHandlerClass().i_dispatchEvent(_static_public_const.i_EVENT_ID_ANIMATION_STARTED);
	};
	
	_private._onAnimationStopped = function()
	{
		this._fUpdateObjectMethod_clss.i_getHandlerClass().i_dispatchEvent(_static_public_const.i_EVENT_ID_ANIMATION_STOPPED);
	};
	
	_private._onAnimationCompleted = function()
	{
		this._fUpdateObjectMethod_clss.i_getHandlerClass().i_dispatchEvent(_static_public_const.i_EVENT_ID_ANIMATION_COMPLETED);
	};
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSAnimate;
};