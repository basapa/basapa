bsp.i_getNamespace('bsp.components_ns.composite_ns').i_importJSCFilefieldCompositeComponentViewClass = function()
{
	var _ns = bsp.components_ns.composite_ns;
	//INIT...
	if (_ns.JSCFilefieldCompositeComponentView)
	{
		return _ns.JSCFilefieldCompositeComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCCompositeComponentView = bsp.components_ns.composite_ns.i_importJSCCompositeComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCFilefieldCompositeComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCFilefieldCompositeComponentView;
	bsp.i_setExtends(_self, JSCCompositeComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCFilefieldCompositeComponentView();
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
	var JSEventHandler = bsp._unified_ns.controller_ns.events_ns.i_importJSEventHandlerClass();
	var JSCComponentView = bsp.components_ns.i_importJSCComponentViewClass();
	var JSSentFileTools = bsp._unified_ns.tools_ns.variables_ns.i_importJSSentFileToolsClass();
	//...IMPORTS

	//CONSTS...
	//JS PHP AGREEMENTS...
	_static_public_const.i_COMPOSITE_COMPONENT_ID_FILE_NAME_LABELFIELD	= 'COMPOSITE_COMPONENT_ID_FILE_NAME_LABELFIELD';
	_static_public_const.i_COMPOSITE_COMPONENT_ID_FILE_UPLOADING_BUTTON	= 'COMPOSITE_COMPONENT_ID_FILE_UPLOADING_BUTTON';
	//...JS PHP AGREEMENTS
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSCFilefieldCompositeComponentView = function()
	{
	};
	//...INIT

	//VARS...
	//...VARS

	//PUBLIC...
	//...PUBLIC

	//PROTECTED...
	_override_protected.__initDOMComponent = function()
	{
		_superclass.__initDOMComponent.call(this);

		var lFileUploadingButtonCompositeComponentView_clss = this.__getCompositeComponent(_self.i_COMPOSITE_COMPONENT_ID_FILE_UPLOADING_BUTTON);
		lFileUploadingButtonCompositeComponentView_clss.i_addEventListener(JSCComponentView.i_NATIVE_EVENT_ID_CHANGE, new JSEventHandler(this, this._onFileUploadingButtonComponentChanged));
	};
	//...PROTECTED

	//PRIVATE...
	//EVENTS...
	_private._onFileUploadingButtonComponentChanged = function(aEvent_obj)
	{
		var lFileUploadingButtonCompositeComponentView_clss = this.__getCompositeComponent(_self.i_COMPOSITE_COMPONENT_ID_FILE_UPLOADING_BUTTON);
		var lFileData_obj = lFileUploadingButtonCompositeComponentView_clss.i_getFilesData()[0];
		var lFileName_str = JSSentFileTools.i_getName(lFileData_obj);

		var lFileNameLabelfieldCompositeComponentView_clss = this.__getCompositeComponent(_self.i_COMPOSITE_COMPONENT_ID_FILE_NAME_LABELFIELD);
		lFileNameLabelfieldCompositeComponentView_clss.i_setValue(lFileName_str);
	};
	//...EVENTS
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCFilefieldCompositeComponentView;
};