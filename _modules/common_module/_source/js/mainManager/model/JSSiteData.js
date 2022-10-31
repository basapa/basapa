/*CLASS PATTERN VERSION: 1.1*/
bsp.i_getNamespace('bsp.main_manager_ns.model_ns').i_importJSSiteDataClass = function()
{
	var _ns = bsp.main_manager_ns.model_ns;
	if (_ns.JSSiteData)
	{
		return _ns.JSSiteData;
	}

	//INHERITANCE IMPORT...
	//...INHERITANCE IMPORT

	_ns.JSSiteData = function()
	{
		___constructor.apply(this, arguments);
	};
	var _self = _ns.JSSiteData;

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSSiteData();
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
	//...IMPORTS

	//CONST PUBLIC...
	_static_public_const.i_SITE_NAME					= 'avatar_bsp.loc';
	//...CONST PUBLIC

	//CONST PRIVATE...
	//...CONST PRIVATE

	//STATIC PUBLIC...
	//...STATIC PUBLIC

	//STATIC PRIVATE...
	//...STATIC PRIVATE

	//VARS...
	//...VARS

	_private._initJSSiteData = function()
	{
	};

	//PUBLIC...
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSSiteData;
};