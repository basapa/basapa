bsp.i_getNamespace('bsp.components_ns.composite_ns').i_importJSCFilesUploadingCompositeComponentViewClass = function()
{
	var _ns = bsp.components_ns.composite_ns;
	//INIT...
	if (_ns.JSCFilesUploadingCompositeComponentView)
	{
		return _ns.JSCFilesUploadingCompositeComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCCompositeComponentView = bsp.components_ns.composite_ns.i_importJSCCompositeComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCFilesUploadingCompositeComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCFilesUploadingCompositeComponentView;
	bsp.i_setExtends(_self, JSCCompositeComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCFilesUploadingCompositeComponentView();
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
	var JSDOMObject = bsp._unified_ns.view_ns.i_importJSDOMObjectClass();
	var JSEventHandler = bsp._unified_ns.controller_ns.events_ns.i_importJSEventHandlerClass();
	var JSCComponentView = bsp.components_ns.i_importJSCComponentViewClass();
	var JSSimpleAjaxRequest = bsp._unified_ns.controller_ns.requests_ns.i_importJSSimpleAjaxRequestClass();
	var JSNativeEventData = bsp._unified_ns.model_ns.events_ns.i_importJSNativeEventDataClass();
	var JSEventData = bsp._unified_ns.model_ns.events_ns.i_importJSEventDataClass();
	var JSURLTools = bsp._unified_ns.tools_ns.urls_ns.i_importJSURLToolsClass();
	var JSMainData = bsp.i_importJSMainDataClass();
	var JSCFileImageComponentView = bsp.components_ns.images_ns.i_importJSCFileImageComponentViewClass();
	//...IMPORTS

	//CONSTS...
	//JS PHP AGREEMENTS...
	//_static_public_const.i_COMPOSITE_COMPONENT_ID_FILE_NAME_LABELFIELD	= 0;
	_static_public_const.i_COMPOSITE_COMPONENT_ID_FILES_UPLOADING_BUTTON	= 'i_COMPOSITE_COMPONENT_ID_FILES_UPLOADING_BUTTON';
	_static_public_const.i_COMPOSITE_COMPONENT_PREFIX_FILE_IMAGE_			= 'i_COMPOSITE_COMPONENT_PREFIX_FILE_IMAGE_';
	//_static_public_const.i_COMPOSITE_COMPONENT_ID_FILE_IMAGE_2			= 3;
	//...JS PHP AGREEMENTS
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSCFilesUploadingCompositeComponentView = function()
	{
	};
	//...INIT

	//VARS...
	_private._fSimpleAjaxRequest_clss = null;
	//...VARS

	//PUBLIC...
	//...PUBLIC

	//PROTECTED...
	_override_protected.__initDOMComponent = function()
	{
		_superclass.__initDOMComponent.call(this);

		var lFileUploadingButtonCompositeComponent_clss = this.__getCompositeComponent(_self.i_COMPOSITE_COMPONENT_ID_FILES_UPLOADING_BUTTON);
		lFileUploadingButtonCompositeComponent_clss.i_addEventListener(JSCComponentView.i_NATIVE_EVENT_ID_CHANGE, new JSEventHandler(this, this._onFilesUploadingCompositeComponentChanged));
	};
	//...PROTECTED

	//PRIVATE...
	//EVENTS...
	_private._onFilesUploadingCompositeComponentChanged = function(aEvent_obj)
	{
		//var lNativeEventData_clss = new JSNativeEventData(aEvent_obj);

		var lFileImageCompositeComponent_clss = this._getAvailableCompositeComponentFileImage(false);
		lFileImageCompositeComponent_clss && lFileImageCompositeComponent_clss.i_setStyle(JSDOMObject.i_STYLE_NAME_DISPLAY, JSDOMTools.i_STYLE_DISPLAY_VALUE_INLINE_BLOCK);

		var lFileUploadingButtonCompositeComponent_clss = this.__getCompositeComponent(_self.i_COMPOSITE_COMPONENT_ID_FILES_UPLOADING_BUTTON);
		var lFiles_obj = lFileUploadingButtonCompositeComponent_clss.i_getDOMComponentElement().files;

		var lMainData_clss = bsp.JSMain.i_getMainData();

		var lRequestStaticURLParams_obj = {};
		lRequestStaticURLParams_obj[JSMainData.i_GET_PARAM_ID_SITE] = lMainData_clss.i_getGETParamSiteId();
		lRequestStaticURLParams_obj[JSMainData.i_GET_PARAM_ID_PAGE] = lMainData_clss.i_getGETParamPageId();
		lRequestStaticURLParams_obj[JSMainData.i_GET_PARAM_ID_LANG] = lMainData_clss.i_getGETParamLangId();

		var lRequestDynamicURLParams_obj = {};
		lRequestDynamicURLParams_obj[JSMainData.i_GET_PARAM_ID_AJAX_REQUEST] = JSSimpleAjaxRequest.i_REQUEST_ID_UPLOAD_FILE;

		var lRequestURL_str = JSURLTools.i_generateURLByParams(lRequestStaticURLParams_obj, lRequestDynamicURLParams_obj, true, true);

		var lRequestParams_obj = {};
		lRequestParams_obj[JSSimpleAjaxRequest.i_REQUEST_PARAM_ID_FIRST] = lFiles_obj[0];
		
		var lSimpleAjaxRequest_clss = this._getSimpleAjaxRequest();
		lSimpleAjaxRequest_clss.i_addEventListener(JSSimpleAjaxRequest.i_EVENT_ID_REQUEST_COMPLETED, new JSEventHandler(this, this._onRequestCompleted));
		lSimpleAjaxRequest_clss.i_sendRequest(lRequestURL_str, lRequestParams_obj);
	};

	_private._onRequestCompleted = function(aEvent_obj)
	{
		var lEventData_clss = new JSEventData(aEvent_obj);

		var lFileImageCompositeComponent_clss = this._getAvailableCompositeComponentFileImage();
		lFileImageCompositeComponent_clss.i_setSrc(lEventData_clss.i_getEventParams()[JSSimpleAjaxRequest.i_EVENT_PARAM_ID_RESPONSE_DATA]);
		lFileImageCompositeComponent_clss.i_getDOMComponentElementLoading().i_setStyle(JSDOMObject.i_STYLE_NAME_DISPLAY, JSDOMObject.i_STYLE_DISPLAY_VALUE_NONE);

		this._validateVisibleFileUploadingButton();
	};

	_private._onFileImageCompositeComponentElementDeletingButtonClick = function(aEvent_obj)
	{
		//var lEventData_clss = new JSEventData(aEvent_obj);

		/*this._validateVisibleFileUploadingButton();*/
	};
	//...EVENTS

	_private._getAvailableCompositeComponentFileImage = function(aOptThrowIfNoAvailable_bl)
	{
		var lCount_int = 2;
		for (var i = 0; i < lCount_int; i++)
		{
			var lFileImageCompositeComponent_clss = this.__getCompositeComponent(_self.i_COMPOSITE_COMPONENT_PREFIX_FILE_IMAGE_ + i, true);
			if (
					lFileImageCompositeComponent_clss &&
					!lFileImageCompositeComponent_clss.i_isSrcSetted()
				)
			{
				lFileImageCompositeComponent_clss.i_addEventListener(JSCFileImageComponentView.i_EVENT_ID_ELEMENT_DELETING_BUTTON_CLICK, new JSEventHandler(this, this._onFileImageCompositeComponentElementDeletingButtonClick));
				return lFileImageCompositeComponent_clss;
			}
		}

		var lThrowIfNoAvailable_bl = aOptThrowIfNoAvailable_bl === undefined ? true : aOptThrowIfNoAvailable_bl;
		if (lThrowIfNoAvailable_bl)
		{
			new JSException('_getAvailableCompositeComponentFileImage', 'File image composite component must be available!');
		}

		return null;
	};

	_private._isSomeAvailableCompositeComponentFileImageExist = function()
	{
		return Boolean(this._getAvailableCompositeComponentFileImage(false));
	};

	_private._validateVisibleFileUploadingButton = function()
	{
		var lIsSomeAvailableCompositeComponentFileImageExist_bl = this._isSomeAvailableCompositeComponentFileImageExist();

		var lFileUploadingButtonCompositeComponent_clss = this.__getCompositeComponent(_self.i_COMPOSITE_COMPONENT_ID_FILES_UPLOADING_BUTTON);
		lFileUploadingButtonCompositeComponent_clss.i_setStyle(JSDOMObject.i_STYLE_NAME_DISPLAY, lIsSomeAvailableCompositeComponentFileImageExist_bl ? JSDOMObject.i_STYLE_DISPLAY_VALUE_INLINE_BLOCK : JSDOMObject.i_STYLE_DISPLAY_VALUE_NONE);
	};

	_private._getSimpleAjaxRequest = function()
	{
		if (!this._fSimpleAjaxRequest_clss)
		{
			this._fSimpleAjaxRequest_clss = new JSSimpleAjaxRequest();
		}
		return this._fSimpleAjaxRequest_clss;
	};
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCFilesUploadingCompositeComponentView;
};