bsp.i_getNamespace('bsp._unified_ns.view_ns').i_importJSDOMObjectClass = function()
{
	var _ns = bsp._unified_ns.view_ns;
	//INIT...
	if (_ns.JSDOMObject)
	{
		return _ns.JSDOMObject;
	}

	_ns.JSDOMObject = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSDOMObject;

	var _prototype = _self.prototype;

	var ___constructor;
	___constructor = function()
	{
		this._initJSDOMObject();
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
	var JSDOMTools = bsp._unified_ns.tools_ns.i_importJSDOMToolsClass();
	//...IMPORTS

	//CONSTS...
	//STYLE NAMES...
	_static_public_const.i_STYLE_NAME_DISPLAY					= 'display';
	_static_public_const.i_STYLE_NAME_VISIBILITY				= 'visibility';
	//...STYLE NAMES
	//...CONSTS
	
	//STATIC...
	//...STATIC
	
	_private._initJSDOMObject = function()
	{
	};
	//...INIT

	//VARS...
	_private._fDOMElementId_str = undefined;
	_private._fDOMElement_obj = null;
	//...VARS

	//PUBLIC...
	_public.i_getDOMElementId = function()
	{
		return this._fDOMElementId_str;
	};

	_public.i_getDOMElement = function()
	{
		return this._fDOMElement_obj || (this._fDOMElement_obj = JSDOMTools.i_getDOMElementById(this.i_getDOMElementId()));
	};

	_public.i_getDOMChildElements = function(aOptTagName_str)
	{
		return this.i_getDOMElement().getElementsByTagName(aOptTagName_str === undefined ? 'span' : aOptTagName_str);
	};

	_public.i_setStyle = function(aName_str, aValue_str)
	{
		this._setStyle(aName_str, aValue_str);
	};

	_public.i_setText = function(aValue_str)
	{
		this._setText(aValue_str);
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	_private._setStyle = function(aName_str, aValue_str)
	{
		if (
				aName_str === undefined
				|| aValue_str === undefined
			)
		{
			new JSException('_setStyle', 'Name and(or) value is undefined!');
		}

		var lDOMElement_obj = this.i_getDOMElement();

		switch (aName_str)
		{
			case _self.i_STYLE_NAME_DISPLAY:
			{
				JSDOMTools.i_setDOMElementDisplayStyle(lDOMElement_obj, aValue_str);
			}break;

			case _self.i_STYLE_NAME_VISIBILITY:
			{
				JSDOMTools.i_setDOMElementVisibilityStyle(lDOMElement_obj, aValue_str);
			}break;
		}
	};

	_private._setText = function(aValue_str)
	{
		if (aValue_str === undefined)
		{
			new JSException('_setText', 'Value is undefined!');
		}

		JSDOMTools.i_setDOMElementInnerHTML(this.i_getDOMElement(), aValue_str);
	};
	//...PRIVATE
	
	//INTERNAL...
	_internal.___setDOMElementId = function(aDOMElementId_str)
	{
		this._fDOMElementId_str = aDOMElementId_str;
	};

	_internal.___setDOMElement = function(aDOMElement_obj)
	{
		this._fDOMElement_obj = aDOMElement_obj;
	};

	_internal.___addDOMElement = function(aDOMParentId_str)
	{
		var lDOM_obj = JSDOMTools.i_getDOMElementById(aDOMParentId_str);
		lDOM_obj.appendChild(this.i_getDOMElement());
	};

	_internal.___removeDOMElement = function()
	{
		var lDOM_obj = this.i_getDOMElement();
		if (lDOM_obj)
		{
			lDOM_obj.parentNode.removeChild(lDOM_obj);
			lDOM_obj = null;
		}
	};
	//...INTERNAL

	return _ns.JSDOMObject;
};