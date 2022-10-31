bsp.i_getNamespace('bsp.modules_ns.infos_ns.messages_ns').i_importJSCMessagesInfoViewClass = function()
{
	var _ns = bsp.modules_ns.infos_ns.messages_ns;
	//INIT...
	if (_ns.JSCMessagesInfoView)
	{
		return _ns.JSCMessagesInfoView;
	}

	//INHERITANCE IMPORT...
	var JSObject = bsp._unified_ns.view_ns.i_importJSObjectClass();
	//...INHERITANCE IMPORT

	_ns.JSCMessagesInfoView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCMessagesInfoView;
	bsp.i_setExtends(_self, JSObject);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCMessagesInfoView();
	};

	var _static_public = _self;
	var _static_private = _self;
	var _static_public_const = _self;
	var _static_private_const = _self;
	var _public = _prototype;
	var _protected = _prototype;
	var _private = _prototype;
	var _internal = _prototype;

	//IMPORTS...
	var JSException = bsp._unified_ns.controller_ns.exceptions_ns.i_importJSExceptionClass();
	//var CRegistrationForm = bsp.modules_ns.MessagesInfo_ns.i_importCRegistrationFormClass();
	//...IMPORTS

	//CONSTS...
	_static_private_const._MESSAGE_INFO_ID_ERROR = 0;
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initCCMessagesInfoView = function()
	{
		//this._fMessagesInfo_clss_arr = new Array();
	};
	//...INIT

	//VARS...
	_private._fMessagesInfo_clss_arr = null;
	//...VARS

	//PUBLIC...
	//ERROR MESSAGE INFO...
	_public.i_getErrorMessageInfo = function()
	{
		return this._getErrorMessageInfo();
	};
	//...ERROR MESSAGE INFO
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	//ERROR MESSAGE INFO...
	_private._getErrorMessageInfo = function()
	{
		return this._getMessageInfo(_self._MESSAGE_INFO_ID_ERROR);
	};
	//...ERROR MESSAGE INFO

	_private._getMessageInfo = function(aMessageInfoId_int)
	{
		return this._fMessagesInfo_clss_arr[aMessageInfoId_int] || this._initMessageInfo(aMessageInfoId_int);
	};

	_private._initMessageInfo = function(aMessageInfoId_int)
	{
		var l_clss = this._generateMessageInfo(aMessageInfoId_int);
		this._fMessagesInfo_clss_arr[aMessageInfoId_int] = l_clss;
		return l_clss;
	};

	_private._generateMessageInfo = function(aMessageInfoId_int)
	{
		var l_clss;

		switch (aMessageInfoId_int)
		{
			case _self._MESSAGE_INFO_ID_ERROR:
			{
				l_clss = new JSRegistrationForm();
			}break;

			default:
				new JSException('_generateMessageInfo', 'Unsupported message info id: ' + aMessageInfoId_int);
			break;
		}

		return l_clss;
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCMessagesInfoView;
};