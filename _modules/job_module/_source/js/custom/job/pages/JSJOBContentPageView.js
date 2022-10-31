bsp.i_getNamespace('bsp.job_ns.pages_ns').i_importJSJOBContentPageViewClass = function()
{
	var _ns = bsp.job_ns.pages_ns;
	//INIT...
	if (_ns.JSJOBContentPageView)
	{
		return _ns.JSJOBContentPageView;
	}

	//INHERITANCE IMPORT...
	var JSCPageView = bsp.pages_ns.i_importJSCPageViewClass();
	//...INHERITANCE IMPORT

	_ns.JSJOBContentPageView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSJOBContentPageView;
	bsp.i_setExtends(_self, JSCPageView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSJOBContentPageView();
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
	var JSJOBFormsView = bsp.job_ns.modules_ns.forms_ns.i_importJSJOBFormsViewClass();
	var JSJOBInfosView = bsp.job_ns.modules_ns.infos_ns.i_importJSJOBInfosViewClass();
	var JSJOBDialogsView = bsp.job_ns.modules_ns.dialogs_ns.i_importJSJOBDialogsViewClass();
	//...IMPORTS

	//CONSTS...
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSJOBContentPageView = function()
	{
	};
	//...INIT

	//VARS...
	//...VARS

	//PUBLIC...
	//...PUBLIC

	//PROTECTED...
	_override_protected.__generateFormsView = function()
	{
		return new JSJOBFormsView();
	};

	_override_protected.__generateInfosView = function()
	{
		return new JSJOBInfosView();
	};

	_override_protected.__generateDialogsView = function()
	{
		return new JSJOBDialogsView();
	};
	//...PROTECTED

	//PRIVATE...
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSJOBContentPageView;
};