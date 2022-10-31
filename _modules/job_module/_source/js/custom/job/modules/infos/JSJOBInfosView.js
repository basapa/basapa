bsp.i_getNamespace('bsp.job_ns.modules_ns.infos_ns').i_importJSJOBInfosViewClass = function()
{
	var _ns = bsp.job_ns.modules_ns.infos_ns;
	//INIT...
	if (_ns.JSJOBInfosView)
	{
		return _ns.JSJOBInfosView;
	}

	//INHERITANCE IMPORT...
	var JSCInfosView = bsp.modules_ns.infos_ns.i_importJSCInfosViewClass();
	//...INHERITANCE IMPORT

	_ns.JSJOBInfosView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSJOBInfosView;
	bsp.i_setExtends(_self, JSCInfosView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSJOBInfosView();
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
	var JSJOBNavigationsInfoView = bsp.job_ns.modules_ns.infos_ns.navigations_ns.i_importJSJOBNavigationsInfoViewClass();
	//...IMPORTS

	//CONSTS...
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSJOBInfosView = function()
	{
	};
	//...INIT

	//VARS...
	//...VARS

	//PUBLIC...
	//...PUBLIC

	//PROTECTED...
	_override_protected.__generateNavigationsInfoView = function()
	{
		return new JSJOBNavigationsInfoView();
	};

	_override_protected.__generateInfoView = function(aInfoId_int)
	{
		var l_clss;

		switch (aInfoId_int)
		{
			default:
				l_clss = _superclass.__generateInfoView.call(this, aInfoId_int);
			break;
		}

		return l_clss;
	};
	//...PROTECTED

	//PRIVATE...
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSJOBInfosView;
};