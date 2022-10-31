bsp.i_getNamespace('bsp._unified_ns.view_ns').i_importJSSpriteMapClass = function()
{
	var _ns = bsp._unified_ns.view_ns;
	//INIT...
	if (_ns.JSSpriteMap)
	{
		return _ns.JSSpriteMap;
	}

	//INHERITANCE IMPORT...
	var JSEventDispatcher = bsp._unified_ns.controller_ns.events_ns.i_importJSEventDispatcherClass();
	//...INHERITANCE IMPORT

	_ns.JSSpriteMap = function(aSpriteMapDescriptor_clss)
	{
		___constructor.call(this, aSpriteMapDescriptor_clss);
	};
	var _self = _ns.JSSpriteMap;
	bsp.i_setExtends(_self, JSEventDispatcher);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function(aSpriteMapDescriptor_clss)
	{
		_superclass.constructor.call(this);
		this._initJSSpriteMap(aSpriteMapDescriptor_clss);
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
	var JSVariableType = bsp._unified_ns.model_ns.types_ns.i_importJSVariableTypeClass();
	var JSSpriteMapDescriptor = bsp._unified_ns.model_ns.descriptors_ns.i_importJSSpriteMapDescriptorClass();
	var JSException = bsp._unified_ns.controller_ns.exceptions_ns.i_importJSExceptionClass();
	//...IMPORTS

	//CONSTS...
	//EVENTS...
	_static_public_const.i_EVENT_ID_ANIMATION_PLAYING_STARTED			= "onAnimationPlayingStarted";
	_static_public_const.i_EVENT_ID_ANIMATION_PLAYING_STOPPED			= "onAnimationPlayingStopped";
	_static_public_const.i_EVENT_ID_ANIMATION_PLAYING_COMPLETED			= "onAnimationPlayingCompleted";
	//...EVENTS
	//...CONSTS
	
	//STATIC...
	_static_private._DrawImage = function(a_htmlc2d, a_obj, aX_num, aY_num, aW_num, aH_num, aContextX_num, aContextY_num)
	{
		a_htmlc2d.drawImage(a_obj, aX_num, aY_num, aW_num, aH_num, aContextX_num, aContextY_num, aW_num, aH_num);
	}
	//...STATIC
	
	_private._initJSSpriteMap = function(aSpriteMapDescriptor_clss)
	{
		if (!CVariableType.i_isClassType(aSpriteMapDescriptor_clss, CSpriteMapDescriptor))
		{
			new JSException('_initJSSpriteMap', 'Sprite map descriptor must be class: ' + aSpriteMapDescriptor_clss);
		}
		
		this._fSpriteMapDescriptor_clss = aSpriteMapDescriptor_clss;
	};
	//...INIT

	//VARS...
	_private._fSpriteMapDescriptor_clss = null;
	_private._fFrameIndex_int = undefined;
	_private._fBFrameIndex_int = undefined;
	_private._fIsPlaying_bl = false;
	//...VARS

	//PUBLIC...
	_public.i_Play = function()
	{
		this._Play();
	};
	
	_public.i_Stop = function()
	{
		this._Stop();
	};
	
	_public.i_isPlaying = function()
	{
		return this._fIsPlaying_bl;
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	_private._Play = function()
	{
		this._fIsPlaying_bl = true;
		
		//connect to anim timer
		
		this.i_DispatchEvent(_self.i_EVENT_ID_ANIMATION_PLAYING_STARTED);
	};
	
	_private._Stop = function()
	{
		//disconnect to anim timer
		
		if (this._isPlaying())
		{
			this._Reset();
			
			this.i_DispatchEvent(_self.i_EVENT_ID_ANIMATION_PLAYING_STOPPED);
		}
	};
	
	_private._Reset = function()
	{
		this._fIsPlaying_bl = false;
	};
	
	_private._Draw = function()
	{
		var lSpriteMapDescriptor_clss = this._fSpriteMapDescriptor_clss;
		var lSpriteMapImage_img = lSpriteMapDescriptor_clss.i_getSpriteMapImage();
		var lSpriteW_int = lSpriteMapDescriptor_clss.i_getSpriteMapWidth();
		var lSpriteH_int = lSpriteMapDescriptor_clss.i_getSpriteMapHeight();
		var lFramesCount_int = lSpriteMapDescriptor_clss.i_getSpriteMapFramesCount();
		var lBFramesCount_int = lSpriteMapDescriptor_clss.i_getSpriteMapBFramesCount();
		
		_static_private._DrawImage(null, lSpriteMapImage_img, Math.round(lSpriteW_int * this._fFrameIndex_int), 0, lSpriteW_int, lSpriteH_int, 0, 0, lSpriteW_int, lSpriteH_int);
		
		if (this._fBFrameIndex_int >= lBFramesCount_int)
		{
			if (this._fFrameIndex_int >= lFramesCount_int - 1)
			{
				this._fFrameIndex_int = 0;
				
				console.log("END");
			}
			else
			{
				this._fFrameIndex_int++;
			}
			
			this._fBFrameIndex_int = 0;
		}
		else
		{
			this._fBFrameIndex_int++;
		}
	};
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSSpriteMap;
};