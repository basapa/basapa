bsp.i_getNamespace('bsp._unified_ns.tools_ns').i_importJSDOMToolsClass = function()
{
	var _ns = bsp._unified_ns.tools_ns;
	//INIT...
	if (_ns.JSDOMTools)
	{
		return _ns.JSDOMTools;
	}

	_ns.JSDOMTools = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSDOMTools;

	var _prototype = _self.prototype;

	var ___constructor;
	___constructor = function()
	{
		this._initJSDOMTools();
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
	var JSVariableType = bsp._unified_ns.tools_ns.variables_ns.i_importJSVariableTypeClass();
	//...IMPORTS

	//CONSTS...
	//STYLE VALUES...
	_static_public_const.i_STYLE_HEIGHT_VALUE_AUTO				= 'auto';

	_static_public_const.i_STYLE_DISPLAY_VALUE_NONE				= 'none';
	_static_public_const.i_STYLE_DISPLAY_VALUE_BLOCK			= 'block';
	_static_public_const.i_STYLE_DISPLAY_VALUE_INLINE_BLOCK		= 'inline-block';
	_static_private_const._SUPPORTED_STYLE_DISPLAY_VALUES		= [	_self.i_STYLE_DISPLAY_VALUE_NONE,
																	_self.i_STYLE_DISPLAY_VALUE_BLOCK,
																	_self.i_STYLE_DISPLAY_VALUE_INLINE_BLOCK];

	_static_public_const.i_STYLE_VISIBILITY_VALUE_HIDDEN		= 'hidden';
	_static_public_const.i_STYLE_VISIBILITY_VALUE_VISIBLE		= 'visible';
	_static_private_const._SUPPORTED_STYLE_VISIBILITY_VALUES	= [	_self.i_STYLE_VISIBILITY_VALUE_HIDDEN,
																	_self.i_STYLE_VISIBILITY_VALUE_VISIBLE];

	_static_public_const.i_STYLE_OVERFLOW_VALUE_HIDDEN		= 'hidden';
	_static_public_const.i_STYLE_OVERFLOW_VALUE_VISIBLE		= 'visible';
	_static_public_const.i_STYLE_OVERFLOW_VALUE_SCROLL		= 'scroll';
	_static_private_const._SUPPORTED_STYLE_OVERFLOW_VALUES	= [	_self.i_STYLE_OVERFLOW_VALUE_HIDDEN,
																_self.i_STYLE_OVERFLOW_VALUE_VISIBLE,
																_self.i_STYLE_OVERFLOW_VALUE_SCROLL];
	//...STYLE VALUES
	//...CONSTS
	
	//STATIC...
	_static_public.i_createDOMElement = function(aTagName_str)
	{
		return document.createElement(aTagName_str);
	};

	_static_public.i_getDOMElementById = function(aId_str)
	{
		return document.getElementById(aId_str);
	};

	_static_public.i_getDOMElementId = function(aDOMElement_obj)
	{
		return aDOMElement_obj.id;
	};

	_static_public.i_getDOMElementOffsetHeight = function(aDOMElement_obj)
	{
		return aDOMElement_obj.offsetHeight;
	};

	_static_public.i_getDOMElementClientHeight = function(aDOMElement_obj)
	{
		return aDOMElement_obj.clientHeight;
	};

	_static_public.i_getDOMElementHeight = function(aDOMElement_obj)
	{
		var lHeight_int =  aDOMElement_obj.style.height;
		if (!lHeight_int)
		{
			lHeight_int = _self.i_getDOMElementClientHeight(aDOMElement_obj);
		}

		return lHeight_int;
	};

	_static_public.i_setDOMElementHeight = function(aDOMElement_obj, aValue_str)
	{
		if (aValue_str === _self.i_STYLE_HEIGHT_VALUE_AUTO)
		{
			aDOMElement_obj.style.height = aValue_str;
		}
		else
		{
			aDOMElement_obj.style.height = aValue_str + 'px';
		}
	};

	_static_public.i_setDOMElementOverflow = function(aDOMElement_obj, aValue_str)
	{
		if (_self._SUPPORTED_STYLE_OVERFLOW_VALUES.indexOf(aValue_str) === -1)
		{
			new JSException('i_setDOMElementOverflow', 'Unsupported overlow value: ' + aValue_str);
		}

		aDOMElement_obj.style.overflow = aValue_str;
	};

	_static_public.i_getDOMElementByTagName = function(aDOMElement_obj, aTagName_str, aOptDoNotThrowIfNotFound_bl)
	{
		var l_obj = aDOMElement_obj.querySelector(aTagName_str);
		if (
			!l_obj
			&& !aOptDoNotThrowIfNotFound_bl
		)
		{
			new JSException('i_getDOMElementByTagName', 'Tag "' + aTagName_str + '" not found for element id: ' + _self.i_getDOMElementId(aDOMElement_obj));
		}

		return l_obj;
	};

	_static_public.i_getDOMElementsByTagName = function(aDOMElement_obj, aTagName_str, aOptDoNotThrowIfNotFound_bl)
	{
		var l_obj = aDOMElement_obj.querySelectorAll(aTagName_str);
		if (
				!l_obj
				&& !aOptDoNotThrowIfNotFound_bl
			)
		{
			new JSException('i_getDOMElementsByTagName', 'Tags "' + aTagName_str + '" not found for element id: ' + _self.i_getDOMElementId(aDOMElement_obj));
		}

		return l_obj;
	};

	_static_public.i_getDOMElementByClassName = function(aDOMElement_obj, aClassName_str, aOptDoNotThrowIfNotFound_bl)
	{
		var l_obj = aDOMElement_obj.querySelector('.' + aClassName_str);
		if (
				!l_obj
				&& !aOptDoNotThrowIfNotFound_bl
			)
		{
			new JSException('i_getDOMElementByClassName', 'CSS class "' + aClassName_str + '" not found for element id: ' + _self.i_getDOMElementId(aDOMElement_obj));
		}

		return l_obj;
	};

	_static_public.i_getDOMElementsByClassName = function(aDOMElement_obj, aClassName_str, aOptDoNotThrowIfNotFound_bl)
	{
		var l_obj_arr = aDOMElement_obj.querySelectorAll('.' + aClassName_str);
		if (
				!l_obj_arr
				&& !aOptDoNotThrowIfNotFound_bl
			)
		{
			new JSException('i_getDOMElementsByClassName', 'CSS classes "' + aClassName_str + '" not found for element id: ' + _self.i_getDOMElementId(aDOMElement_obj));
		}

		return l_obj_arr;
	};

	_static_public.i_setDOMElementDisplayStyle = function(aDOMElement_obj, aValue_str)
	{
		if (_self._SUPPORTED_STYLE_DISPLAY_VALUES.indexOf(aValue_str) === -1)
		{
			new JSException('i_setDOMElementDisplayStyle', 'Unsupported style display value: ' + aValue_str);
		}

		aDOMElement_obj.style.display = aValue_str;
	};

	_static_public.i_setDOMElementVisibilityStyle = function(aDOMElement_obj, aValue_str)
	{
		if (_self._SUPPORTED_STYLE_VISIBILITY_VALUES.indexOf(aValue_str) === -1)
		{
			new JSException('i_setDOMElementVisibilityStyle', 'Unsupported style visibility value: ' + aValue_str);
		}

		aDOMElement_obj.style.visibility = aValue_str;
	};

	_static_public.i_setDOMElementInnerHTML = function(aDOMElement_obj, aValue_str)
	{
		aDOMElement_obj.innerHTML = aValue_str;
	};
	//...STATIC
	
	_private._initCDOMTools = function()
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

	return _ns.JSDOMTools;
};