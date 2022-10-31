bsp.i_getNamespace('bsp.job_ns.modules_ns.infos_ns.content_ns').i_importJSJOBContentInfoViewClass = function()
{
	var _ns = bsp.job_ns.modules_ns.infos_ns.content_ns;
	//INIT...
	if (_ns.JSJOBContentInfoView)
	{
		return _ns.JSJOBContentInfoView;
	}

	//INHERITANCE IMPORT...
	var JSCInfoView = bsp.modules_ns.infos_ns.i_importJSCInfoViewClass();
	//...INHERITANCE IMPORT

	_ns.JSJOBContentInfoView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSJOBContentInfoView;
	bsp.i_setExtends(_self, JSCInfoView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSJOBContentInfoView();
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
	//...STATIC
	
	_private._initJSJOBContentInfoView = function()
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

	return _ns.JSJOBContentInfoView;
};