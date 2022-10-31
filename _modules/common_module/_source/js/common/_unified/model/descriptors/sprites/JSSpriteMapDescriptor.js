bsp.i_getNamespace('bsp._unified_ns.model_ns.descriptors_ns.sprites_ns').i_importJSSpriteMapDescriptorClass = function()
{
	var _ns = bsp._unified_ns.model_ns.descriptors_ns.sprites_ns;
	//INIT...
	if (_ns.JSSpriteMapDescriptor)
	{
		return _ns.JSSpriteMapDescriptor;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSSpriteMapDescriptor = function(aInitialValue_num, aFinalValue_num, aDuration_num, aUpdateObjectMethod_clss, aOptInterpolationType_int)
	{
		___constructor.call(this, aInitialValue_num, aFinalValue_num, aDuration_num, aUpdateObjectMethod_clss, aOptInterpolationType_int);
	};
	var _self = _ns.JSSpriteMapDescriptor;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function(aInitialValue_num, aFinalValue_num, aDuration_num, aUpdateObjectMethod_clss, aOptInterpolationType_int)
	{
		this._initJSSpriteMapDescriptor(aInitialValue_num, aFinalValue_num, aDuration_num, aUpdateObjectMethod_clss, aOptInterpolationType_int);
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
	var JSVariableType = bsp._unified_ns.model_ns.types_ns.i_importJSVariableTypeClass();
	var JSException = bsp._unified_ns.controller_ns.exceptions_ns.i_importJSExceptionClass();
	//...IMPORTS

	//CONSTS...
	//EVENTS...
	_static_public_const.i_i_EVENT_ID_ANIMATION_STARTED			= "onAnimationStarted";
	_static_public_const.i_i_EVENT_ID_ANIMATION_STOPPED			= "onAnimationStopped";
	_static_public_const.i_i_EVENT_ID_ANIMATION_COMPLETED		= "onAnimationCompleted";
	//...EVENTS
	//...CONSTS
	
	//STATIC...
	//...STATIC
	
	_private._initJSSpriteMapDescriptor = function(aSpriteMapImageFileName_str, aSpriteW_int, aSpriteH_int, aFramesCount_int, aOptBFramesCount_int)
	{
		if (!CVariableType.i_isString(aSpriteMapImageFileName_str))
		{
			new JSException('_initCSpriteMapDescriptor', 'Sprite map image file name must be string: ' + aSpriteMapImageFileName_str);
		}
		
		this._fSpriteMapImageFileName_str = aSpriteMapImageFileName_str;
		
		var l_img = new Image();
		l_img.src = aSpriteMapImageFileName_str;
		this._fSpriteMapImage_img = l_img;
		
		if (!CVariableType.i_isInt(aSpriteW_int))
		{
			new JSException('_initCSpriteMapDescriptor', 'Sprite width value must be int: ' + aSpriteW_int);
		}
		
		this._fSpriteW_int = aSpriteW_int;
		
		if (!CVariableType.i_isInt(aSpriteH_int))
		{
			new JSException('_initCSpriteMapDescriptor', 'Sprite height value must be int: ' + aSpriteH_int);
		}
		
		this._fSpriteH_int = aSpriteH_int;
		
		if (!CVariableType.i_isInt(aFramesCount_int))
		{
			new JSException('_initCSpriteMapDescriptor', 'Frames count value must be int: ' + aFramesCount_int);
		}
		
		this._fFramesCount_int = aFramesCount_int;
		
		if (aOptBFramesCount_int !== undefined
			&& !CVariableType.i_isInt(aOptBFramesCount_int))
		{
			new JSException('_initCSpriteMapDescriptor', 'BFrames count value must be int: ' + aOptBFramesCount_int);
		}
		
		this._fBFramesCount_int = aOptBFramesCount_int ? aOptBFramesCount_int : 0;
	};
	//...INIT

	//VARS...
	_private._fSpriteMapImageFileName_str = undefined;
	_private._fSpriteMapImage_img = null;
	_private._fSpriteW_int = undefined;
	_private._fSpriteH_int = undefined;
	_private._fFramesCount_int = undefined;
	_private._fBFramesCount_int = undefined;
	//...VARS

	//PUBLIC...
	_public.i_getSpriteMapImageFileName = function()
	{
		return this._fSpriteMapImageFileName_str;
	};
	
	_public.i_getSpriteMapImage = function()
	{
		return this._fSpriteMapImage_img;
	};
	
	_public.i_getSpriteMapWidth = function()
	{
		return this._fSpriteW_int;
	};
	
	_public.i_getSpriteMapHeight = function()
	{
		return this._fSpriteH_int;
	};
	
	_public.i_getSpriteMapFramesCount = function()
	{
		return this._fFramesCount_int;
	};
	
	_public.i_getSpriteMapBFramesCount = function()
	{
		return this._fBFramesCount_int;
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSSpriteMapDescriptor;
};