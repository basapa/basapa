/*CLASS PATTERN VERSION: 1.1*/
bsp.i_getNamespace('bsp.components_ns.images_ns').i_importJSCImageComponentViewClass = function()
{
	var _ns = bsp.components_ns.images_ns;
	//INIT...
	if (_ns.JSCImageComponentView)
	{
		return _ns.JSCImageComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCComponentView = bsp.components_ns.i_importJSCComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCImageComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCImageComponentView;
	bsp.i_setExtends(_self, JSCComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCImageComponentView();
	};

	var _static_public = _self;
	var _static_private = _self;
	var _static_public_const = _self;
	var _static_private_const = _self;
	var _public = _prototype;
	var _protected = _prototype;
	var _private = _prototype;
	var _internal = _prototype;
	var _virtual_public = _prototype;
	var _override_public = _prototype;
	var _virtual_protected = _prototype;
	var _override_protected = _prototype;

	//IMPORTS...
	//...IMPORTS

	//CONSTS PUBLIC...
	//...CONSTS PUBLIC

	//CONSTS PRIVATE...
	//...CONSTS PRIVATE

	//CONSTS PROTECTED...
	//...CONSTS PROTECTED

	//STATIC PUBLIC...
	//...STATIC PUBLIC

	//STATIC PRIVATE...
	//...STATIC PRIVATE

	//STATIC PROTECTED...
	//...STATIC PROTECTED

	_private._initJSCImageComponentView = function()
	{
	};
	//...INIT

	//VARS...
	//...VARS

	//PUBLIC...
	_public.i_isSrcSetted = function(aOptSrc_str)
	{
		return this.__isSrcSetted(aOptSrc_str);
	};

	_public.i_setSrc = function(aSrc_str)
	{
		this.__setSrc(aSrc_str);
	};
	//...PUBLIC

	//PROTECTED...
	_virtual_protected.__isSrcSetted = function(aOptSrc_str)
	{
		var lSrc_str = aOptSrc_str !== undefined ? aOptSrc_str : "";
		return this.i_getDOMComponentElement().src !== lSrc_str;
	};

	_virtual_protected.__setSrc = function(aSrc_str)
	{
		this.i_getDOMComponentElement().src = aSrc_str;
	};
	//...PROTECTED

	//PRIVATE...
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCImageComponentView;
};