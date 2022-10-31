bsp.i_getNamespace('bsp._unified_ns.controller_ns.requests_ns').i_importJSSimpleAjaxRequestClass = function()
{
	var _ns = bsp._unified_ns.controller_ns.requests_ns;
	//INIT...
	if (_ns.JSSimpleAjaxRequest)
	{
		return _ns.JSSimpleAjaxRequest;
	}

	//INHERITANCE IMPORT...
	var JSEventDispatcher = bsp._unified_ns.controller_ns.events_ns.i_importJSEventDispatcherClass();
	//...INHERITANCE IMPORT

	_ns.JSSimpleAjaxRequest = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSSimpleAjaxRequest;
	bsp.i_setExtends(_self, JSEventDispatcher);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSSimpleAjaxRequest();
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
	var JSException = bsp._unified_ns.controller_ns.exceptions_ns.i_importJSExceptionClass();
	var JSEvent = bsp._unified_ns.model_ns.events_ns.i_importJSEventClass();
	//...IMPORTS

	//CONSTS...
	//JS PHP AGREEMENTS...
	//REQUESTS...
	_static_public_const.i_REQUEST_ID_GET_SUPPORT_FORM		= "ajax_request_0";
	_static_public_const.i_REQUEST_ID_UPLOAD_FILE			= "ajax_request_1";
	_static_public_const.i_REQUEST_ID_SUBMIT_SUPPORT		= "ajax_request_2";
	_static_public_const.i_REQUEST_ID_GET_CITIES			= "ajax_request_3";
	//...REQUESTS
	
	//REQUEST PARAMS...
	_static_public_const.i_REQUEST_PARAM_ID_FIRST			= "ajax_request_param_0";
	//...REQUEST PARAMS
	//...JS PHP AGREEMENTS

	//EVENTS...
	_static_public_const.i_EVENT_ID_REQUEST_COMPLETED		= "i_EVENT_ID_REQUEST_COMPLETED";
	//...EVENTS

	//EVENTS PARAMS...
	_static_public_const.i_EVENT_PARAM_ID_RESPONSE_DATA		= "event_param_id_0";
	//...EVENTS PARAMS

	//METHODS...
	_static_private_const._REQUEST_METHOD_POST				= "post";
	_static_private_const._REQUEST_METHOD_gET				= "get";
	//...METHODS

	//STATES...
	_static_private_const._REQUEST_STATE_INVALID			= XMLHttpRequest.UNSENT;
	_static_private_const._REQUEST_STATE_OPENED				= XMLHttpRequest.OPENED;
	_static_private_const._REQUEST_STATE_HEADERS_RECEIVED	= XMLHttpRequest.HEADERS_RECEIVED;
	_static_private_const._REQUEST_STATE_PORTION_RECEIVED	= XMLHttpRequest.LOADING;
	_static_private_const._REQUEST_STATE_COMPLETED			= XMLHttpRequest.DONE;
	//...STATES
	//...CONSTS
	
	//STATIC...
	//...STATIC
	
	_private._initJSSimpleAjaxRequest = function()
	{
		this.___setDOMElement(this._getRequestObject());
	};
	//...INIT

	//VARS...
	_private._fRequestObject_obj = null;
	//...VARS

	//PUBLIC...
	_public.i_sendRequest = function(aRequestURL_str, aOptRequestParams_obj)
	{
		this._sendRequest(aRequestURL_str, aOptRequestParams_obj);
	};

	_public.i_cancelRequest = function()
	{
		this._cancelRequest();
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	_private._getRequestObject = function()
	{
		return this._fRequestObject_obj || this._initRequestObject();
	};

	_private._initRequestObject = function()
	{
		var lRequestObject_obj;

		if (typeof XMLHttpRequest !== "undefined")
		{
			lRequestObject_obj = new XMLHttpRequest();
		}
		else
		{
			try
			{
				lRequestObject_obj = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch (aException_obj)
			{
				try
				{
					lRequestObject_obj = new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch (aException_obj)
				{
					lRequestObject_obj = null;

					new JSException('_initRequestObject', 'Request object must be defined!');
				}
			}
		}

		this._fRequestObject_obj = lRequestObject_obj;

		return lRequestObject_obj;
	};

	_private._sendRequest = function(aRequestURL_str, aOptRequestParams_obj)
	{
		var lRequestObject_obj = this._getRequestObject();
		lRequestObject_obj.open(_self._REQUEST_METHOD_POST, aRequestURL_str, true);

		var lFormData_obj = new FormData();
		if (aOptRequestParams_obj !== undefined)
		{
			for (var lParamName_str in aOptRequestParams_obj)
			{
				lFormData_obj.append(lParamName_str, aOptRequestParams_obj[lParamName_str]);
			}
		}
		
		lRequestObject_obj.send(lFormData_obj);
		lRequestObject_obj.onreadystatechange = this._onRequestStateChanged.bind(this);
	};

	_private._onRequestStateChanged = function()
	{
		var lRequestObject_obj = this._getRequestObject();
		if (lRequestObject_obj.readyState !== _self._REQUEST_STATE_COMPLETED)
		{
			return;
		}

		var lResponseData_str;

		var lRequestStatusCode_int = lRequestObject_obj.status;
		switch (lRequestStatusCode_int)
		{
			case 200:
			{
				lResponseData_str = lRequestObject_obj.responseText;
			}break;

			default:
				new JSException('_onRequestStateChanged', 'Unsupported request status code: ' + lRequestStatusCode_int);
			break;
		}

		var lEventParams_obj = {};
		lEventParams_obj[_self.i_EVENT_PARAM_ID_RESPONSE_DATA] = lResponseData_str;

		this.i_dispatchEvent(new CEvent(_self.i_EVENT_ID_REQUEST_COMPLETED, this, lEventParams_obj));
	};

	_private._cancelRequest = function()
	{
		var lRequestObject_obj = this._getRequestObject();
		lRequestObject_obj.abort();
	};
	//...PRIVATE
	
	//INTERNAL...
	//...INTERNAL

	return _ns.JSSimpleAjaxRequest;
};