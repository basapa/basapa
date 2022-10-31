/*CLASS PATTERN VERSION: 1.1*/
bsp.i_getNamespace('bsp._unified_ns.tools_ns.variables_ns').i_importJSArrayToolsClass = function()
{
	var _ns = bsp._unified_ns.tools_ns.variables_ns;
	//INIT...
	if (_ns.JSArrayTools)
	{
		return _ns.JSArrayTools;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSArrayTools = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSArrayTools;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		this._initJSArrayTools();
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
	_static_public.i_getKeys = function(a_a_arr)
	{
		return [];
	};

	_static_public.i_convertStringToMultiAssociativeArray = function(a_str)
	{
		/*if (!isset($a_obj_arr))
		{
			new CException('i_convertMultiAssociativeArrayToJSObject', 'Invalid arg: ' .$a_obj_arr);
		}*/

		/*var l_obj_arr = [];

		var l_str_arr = a_str.split("|");

		for (var i = 0; i < l_str_arr.length; i++)
		{
			var l_str = l_str_arr[i];

			var l2_str_arr = l_str.split(";");
			for (var j = 0; j < l2_str_arr.length; j++)
			{
				var l2_str = l2_str_arr[j];
			}
		}*/

		/*$lIndex_int = 0;
		foreach ($a_obj_arr as $lElement_obj)
		{
			$lJSArrayElementsSeparator_str = $lIndex_int == 0 ? '' : '|';
			$lJSArray_str .= $lJSArrayElementsSeparator_str . self::i_convertAssociativeArrayToJSObject($lElement_obj);
			$lIndex_int++;
		}*/

		return l_obj_arr;
	};
	//...STATIC PUBLIC

	//STATIC PRIVATE...
	//...STATIC PRIVATE

	//STATIC PROTECTED...
	//...STATIC PROTECTED
	
	_private._initJSArrayTools = function()
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

	return _ns.JSArrayTools;
};