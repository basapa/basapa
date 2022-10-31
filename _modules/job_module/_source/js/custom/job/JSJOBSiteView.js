bsp.i_getNamespace('bsp.job_ns').i_importJSJOBSiteViewClass = function()
{
	var _ns = bsp.job_ns;
	//INIT...
	if (_ns.JSJOBSiteView)
	{
		return _ns.JSJOBSiteView;
	}

	//INHERITANCE IMPORT...
	var JSCSiteView = bsp.i_importJSCSiteViewClass();
	//...INHERITANCE IMPORT

	_ns.JSJOBSiteView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSJOBSiteView;
	bsp.i_setExtends(_self, JSCSiteView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSJOBSiteView();
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
	var JSJOBPagesView = bsp.job_ns.pages_ns.i_importJSJOBPagesViewClass();
	//...IMPORTS

	//CONSTS...
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSJOBSiteView = function()
	{
	};
	//...INIT

	//VARS...
	//...VARS

	//PUBLIC...
	//...PUBLIC

	//PROTECTED...
	_override_protected.__generatePagesView = function()
	{
		return new JSJOBPagesView();
	};
	//...PROTECTED

	//PRIVATE...
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSJOBSiteView;
};