/*CLASS PATTERN VERSION: 1.1*/
bsp.i_getNamespace('bsp._unified_ns.tools_ns.variables_ns').i_importJSSentFileToolsClass = function()
{
	var _ns = bsp._unified_ns.tools_ns.variables_ns;
	//INIT...
	if (_ns.JSSentFileTools)
	{
		return _ns.JSSentFileTools;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSSentFileTools = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSSentFileTools;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		this._initJSSentFileTools();
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
	_static_public.i_getName = function(a_obj)
	{
		return a_obj.name;
	};

	_static_public.i_getSizeInBytes = function(a_obj)
	{
		return a_obj.size;
	};

	_static_public.i_getContentType = function(a_obj)
	{
		return a_obj.type;
	};
	//...STATIC PUBLIC

	//STATIC PRIVATE...
	//...STATIC PRIVATE

	//STATIC PROTECTED...
	//...STATIC PROTECTED
	
	_private._initJSSentFileTools = function()
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

	return _ns.JSSentFileTools;
};