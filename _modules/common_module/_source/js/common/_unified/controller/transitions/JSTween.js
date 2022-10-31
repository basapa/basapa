bsp.i_getNamespace('bsp._unified_ns.controller_ns.transitions_ns').i_importJSTweenClass = function()
{
	var _ns = bsp._unified_ns.view_ns;
	//INIT...
	if (_ns.JSTween)
	{
		return _ns.JSTween;
	}

	//INHERITANCE IMPORT...
	var JSEventDispatcher = bsp._unified_ns.controller_ns.events_ns.i_importJSEventDispatcherClass();
	//...INHERITANCE IMPORT

	_ns.JSTween = function(aInitialValue_num, aFinalValue_num, aDuration_num, aUpdatingObjectMethod_clss, aOptInterpolationType_int)
	{
		___constructor.call(this, aInitialValue_num, aFinalValue_num, aDuration_num, aUpdatingObjectMethod_clss, aOptInterpolationType_int);
	};
	var _self = _ns.JSTween;
	bsp.i_setExtends(_self, JSEventDispatcher);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function(aInitialValue_num, aFinalValue_num, aDuration_num, aUpdatingObjectMethod_clss, aOptInterpolationType_int)
	{
		_superclass.constructor.call(this);
		this._initJSTween(aInitialValue_num, aFinalValue_num, aDuration_num, aUpdatingObjectMethod_clss, aOptInterpolationType_int);
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
	_static_public_const.i_EVENT_ID_TWEEN_STARTED				= "onTweenStarted";
	_static_public_const.i_EVENT_ID_TWEEN_STOPPED				= "onTweenStopped";
	_static_public_const.i_EVENT_ID_TWEEN_COMPLETED				= "onTweenCompleted";
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
	
	_private._initCTween = function(aInitialValue_num, aFinalValue_num, aDuration_num, aUpdatingObjectMethod_clss, aOptInterpolationType_int)
	{
		if (!JSVariableType.i_isNumber(aInitialValue_num))
		{
			new JSException('_initCTween', 'Initial value must be number: ' + aInitialValue_num);
		}
		
		this._fInitialValue_num = aInitialValue_num;
		
		if (!JSVariableType.i_isNumber(aFinalValue_num))
		{
			new JSException('_initCTween', 'Final value must be number: ' + aFinalValue_num);
		}
		
		this._fFinalValue_num = aFinalValue_num;
		
		if (!JSVariableType.i_isNumber(aDuration_num))
		{
			new JSException('_initCTween', 'Duration must be number: ' + aDuration_num);
		}
		
		this._fDuration_num = aDuration_num;
		
		if (!JSVariableType.i_isClassType(aUpdatingObjectMethod_clss, CObjectMethod))
		{
			new JSException('_initCTween', 'Updating object method must be class: ' + aUpdatingObjectMethod_clss);
		}
		
		this._fUpdatingObjectMethod_clss = aUpdatingObjectMethod_clss;
		
		if (aOptInterpolationType_int !== undefined
			&& !CVariableType.i_isInt(aOptInterpolationType_int))
		{
			new JSException('_initJSTween', 'Interpolation type must be integer: ' + aOptInterpolationType_int);
		}
		
		var lInterpolationType_int = aOptInterpolationType_int !== undefined ? aOptInterpolationType_int : _self.i_INTERPOLATION_TYPE_LINEAR;
		switch (lInterpolationType_int)
		{
			case _self.i_INTERPOLATION_TYPE_LINEAR:
			{
				this._fInterpolationMethod_func = _static_private._interpolationMethodLinear;
			}break;
			
			case _self.i_INTERPOLATION_TYPE_EASE_iN_CUBIC:
			{
				this._fInterpolationMethod_func = null;
			}break;
			
			case _self.i_INTERPOLATION_TYPE_EASE_oUT_CUBIC:
			{
				this._fInterpolationMethod_func = null;
			}break;
			
			case _self.i_INTERPOLATION_TYPE_EASE_iN_oUT_CUBIC:
			{
				this._fInterpolationMethod_func = null;
			}break;
			
			default:
				new CException('_initJSTween', 'Invalid interpolation type: ' + lInterpolationType_int);
			break;
		}
	};
	//...INIT

	//VARS...
	_private._fStartTime_num = undefined;
	_private._fDuration_num = undefined;
	_private._fInitialValue_num = undefined;
	_private._fFinalValue_num = undefined;
	_private._fUpdatingObjectMethod_clss = null;
	_private._fInterpolationMethod_func = null;
	_private._fElapsedTime_num = undefined;
	//...VARS

	//PUBLIC...
	_public.i_Start = function()
	{
		this._Start();
	};
	
	_public.i_Stop = function()
	{
		this._Stop();
	};
	
	_public.i_isPlaying = function()
	{
		return this._isPlaying();
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	_private._Start = function()
	{
		this._fStartTime_num = performance.now();
		
		requestAnimationFrame(this._onTweenFrame);
		
		this.i_DispatchEvent(_static_public_const.i_EVENT_ID_TWEEN_STARTED);
	};
	
	_private._Stop = function()
	{
		if (this._isPlaying())
		{
			this._Reset();
			
			this.i_DispatchEvent(_static_public_const.i_EVENT_ID_TWEEN_STOPPED);
		}
	};
	
	_private._isPlaying = function()
	{
		return this._fStartTime_num !== undefined;
	};
	
	_private._Reset = function()
	{
		this._fStartTime_num = undefined;
	};
	
	_private._Update = function()
	{
		var lValue_num = this._fInterpolationMethod_func.call(this, this._fElapsedTime_num, this._fInitialValue_num, this._fFinalValue_num, this._fDuration_num);

		this._fUpdatingObjectMethod_clss.i_getMethodFunc().call(this, lValue_num);
	};
	
	_private._onTweenFrame = function()
	{
		var lCurrentTime_num = performance.now();
		
		this._fElapsedTime_num = lCurrentTime_num - this._fStartTime_num;
		if (this._fElapsedTime_num > this._fDuration_num)
		{
			this._fElapsedTime_num = this._fDuration_num;
			
			this._Update();
			
			this._Reset();
			
			this.i_DispatchEvent(_static_public_const.i_EVENT_ID_TWEEN_COMPLETED);
			
			return;
		}
		
		this._Update();
		
		requestAnimationFrame(this._onTweenFrame);
	};
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSTween;
};