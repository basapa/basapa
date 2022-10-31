bsp.jsGetNamespace('bsp.modules_ns.infos_ns').importJSCInfosClass = function()
{
	var _ns = bsp.modules_ns.infos_ns;
	//INIT...
	if (_ns.JSCInfos)
	{
		return _ns.JSCInfos;
	}

	//INHERITANCE IMPORT...
	var JSCObject = bsp._unified_ns.importJSCObjectClass();
	//...INHERITANCE IMPORT

	_ns.JSCInfos = function()
	{
		____constructor.call(this);
	};
	var _class = _ns.JSCInfos;
	bsp.jsExtends(_class, JSCObject);

	var _prototype = _class.prototype;
	var _superclass = _class.superclass;

	var ____constructor;
	____constructor = function()
	{
		_superclass.constructor.call(this);
		this._jsInitJSCInfos();
	};

	var _static_public = _class;
	var _static_private = _class;
	var _static_public_const = _class;
	var _static_private_const = _class;
	var _public = _prototype;
	var _protected = _prototype;
	var _private = _prototype;
	var _internal = _prototype;
	var _virtual_protected = _prototype;
	var _override_protected = _prototype;

	//IMPORTS...
	var JSCException = bsp._unified_ns.exceptions_ns.importJSCExceptionClass();
	//...IMPORTS

	//CONSTS...
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._jsInitJSCInfos = function()
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

	return _ns.JSCInfos;
};