/*CLASS PATTERN VERSION: 1.1*/
bsp.i_getNamespace('bsp.file_manager_ns').i_importJSFileManagerClass = function()
{
	var _ns = bsp.file_manager_ns;
	if (_ns.JSFileManager)
	{
		return _ns.JSFileManager;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSFileManager = function()
	{
		___constructor.apply(this, arguments);
	};
	var _self = _ns.JSFileManager;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSFileManager();
	};

	var _static_public_const = _self;
	var _static_private_const = _self;
	var _static_public = _self;
	var _static_private = _self;
	var _public = _prototype;
	var _protected = _prototype;
	var _private = _prototype;
	var _internal = _prototype;
	var _virtual_public = _prototype;
	var _override_public = _prototype;
	var _virtual_protected = _prototype;
	var _override_protected = _prototype;

	//IMPORTS...
	var JSFilesData = bsp.file_manager_ns.model_ns.i_importJSFilesDataClass();
	//...IMPORTS

	//CONST PUBLIC...
	//...CONST PUBLIC

	//CONST PRIVATE...
	//...CONST PRIVATE

	//STATIC PUBLIC...
	//...STATIC PUBLIC

	//STATIC PRIVATE...
	//...STATIC PRIVATE

	//VARS...
	_private._fFilesData_clss = null;
	//...VARS

	_private._initJSFileManager = function()
	{
	};

	//PUBLIC...
	_public.i_getFilesData = function()
	{
		return this._fFilesData_clss || this._initFilesData();
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	_private._initFilesData = function()
	{
		var l_clss = new JSFilesData();
		this._fFilesData_clss = l_clss;
		return l_clss;
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSFileManager;
};