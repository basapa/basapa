bsp.jsGetNamespace('bsp.modules_ns.infos_ns').importJSCInfoBaseClass = function()
{
	var _ns = bsp.modules_ns.infos_ns;
	//INIT...
	if (_ns.JSCInfoBase)
	{
		return _ns.JSCInfoBase;
	}

	//INHERITANCE IMPORT...
	var JSCDOMObject = bsp._unified_ns.importJSCDOMObjectClass();
	//...INHERITANCE IMPORT

	_ns.JSCInfoBase = function()
	{
		____constructor.call(this);
	};
	var _class = _ns.JSCInfoBase;
	bsp.jsExtends(_class, JSCDOMObject);

	var _prototype = _class.prototype;
	var _superclass = _class.superclass;

	var ____constructor;
	____constructor = function()
	{
		_superclass.constructor.call(this);
		this._jsInitJSCInfoBase();
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
	//...IMPORTS

	//CONSTS...
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._jsInitJSCInfoBase = function()
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

	return _ns.JSCInfoBase;
};