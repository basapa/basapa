bsp.i_getNamespace('bsp._unified_ns.model_ns.tools_ns.files_ns').i_importJSJSONFileToolsClass = function()
{
	var _ns = bsp._unified_ns.model_ns.tools_ns.files_ns;
	//INIT...
	if (_ns.JSJSONFileTools)
	{
		return _ns.JSJSONFileTools;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSJSONFileTools = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSJSONFileTools;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		this._initJSJSONFileTools();
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
	//...IMPORTS

	//CONSTS...
	//...CONSTS
	
	//STATIC...
	_static_public.i_decodeJSON = function(aJSON_str)
	{
		return JSON.parse(aJSON_str);
	};

	_static_public.i_encodeJSON = function(a_a_arr)
	{
		return JSON.stringify(a_a_arr);
	};
	//...STATIC
	
	_private._initJSJSONFileTools = function()
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

	return _ns.JSJSONFileTools;
};



/*function CJSONFileTools()
{
}
var CJSONFileToolsClass = CJSONFileTools.prototype;

*/
/***************************************************
 * PUBLIC
 */
/*

CJSONFileToolsClass.___setDOMElementId = function(aDOMElementId_str)
{
var event = JSON.parse(str, function(key, value) {
  if (key == 'date') return new Date(value);
  return value;
});

};


CJSONFileToolsClass.___setDOMElementId = function(aDOMElementId_str)
{
var str = JSON.stringify(event);
};
*/

/*
 * PUBLIC
 ***************************************************/