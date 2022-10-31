bsp.i_getNamespace('bsp.components_ns.listboxes_ns').i_importJSCSimpleListboxComponentViewClass = function()
{
	var _ns = bsp.components_ns.listboxes_ns;
	//INIT...
	if (_ns.JSCSimpleListboxComponentView)
	{
		return _ns.JSCSimpleListboxComponentView;
	}

	//INHERITANCE IMPORT...
	var JSCListboxComponentView = bsp.components_ns.listboxes_ns.i_importJSCListboxComponentViewClass();
	//...INHERITANCE IMPORT

	_ns.JSCSimpleListboxComponentView = function()
	{
		___constructor.call(this);
	};
	var _self = _ns.JSCSimpleListboxComponentView;
	bsp.i_setExtends(_self, JSCListboxComponentView);

	var _prototype = _self.prototype;
	var _superclass = _self.superclass;

	var ___constructor;
	___constructor = function()
	{
		_superclass.constructor.call(this);
		this._initJSCSimpleListboxComponentView();
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
	var JSDOMTools = bsp._unified_ns.tools_ns.i_importJSDOMToolsClass();
	var JSEvent = bsp._unified_ns.model_ns.events_ns.i_importJSEventClass();
	//...IMPORTS

	//CONSTS...
	//EVENTS...
	_static_public_const.i_EVENT_ID_ACCESSIBILITY_CHANGED	= "accessibility_changed";
	//...EVENTS
	//...CONSTS

	//STATIC...
	//...STATIC

	_private._initJSCSimpleListboxComponentView = function()
	{
	};
	//...INIT

	//VARS...
	_private._fIsEnabled_bl = true;
	//...VARS

	//PUBLIC...
	_public.i_isEnabled = function()
	{
		return this._fIsEnabled_bl;
	};

	_public.i_setEnabled = function(a_bl)
	{
		a_bl = Boolean(a_bl);
		if (this._fIsEnabled_bl === a_bl)
		{
			return;
		}

		this._fIsEnabled_bl = a_bl;

		var lDOMComponentElement_obj = this.i_getDOMComponentElement();
		lDOMComponentElement_obj.disabled = !a_bl;

		this.i_dispatchEvent(new CEvent(_self.i_EVENT_ID_ACCESSIBILITY_CHANGED, this));
	};

	_public.i_removeAllItems = function(aOptExceptValues_int_arr)
	{
		var lDOMComponentElement_obj = this.i_getDOMComponentElement();

		var lCount_int = lDOMComponentElement_obj.options.length;
		var lIndex_int = lCount_int - 1;

		while (lIndex_int > 0)
		{
			var l_obj = lDOMComponentElement_obj.options[lIndex_int];
			if (
					!aOptExceptValues_int_arr
					|| aOptExceptValues_int_arr.indexOf(l_obj.value) === -1
				)
			{
				l_obj.remove();
			}

			lIndex_int--;
		}
	};

	_public.i_addItem = function(a_obj)
	{
		var lDOMComponentElement_obj = this.i_getDOMComponentElement();

		var l_obj = CDOMTools.i_createDOMElement("option");
		l_obj.text = a_obj.i_fText_str;
		l_obj.value = a_obj.i_fValue_int;

		lDOMComponentElement_obj.options.add(l_obj);//----css classes etc.
	};

	_public.i_getSelectedItemValue = function()
	{
		var lDOMComponentElement_obj = this.i_getDOMComponentElement();
		return lDOMComponentElement_obj.value;
	};

	_public.i_getItemsCount = function()
	{
		var lDOMComponentElement_obj = this.i_getDOMComponentElement();
		return lDOMComponentElement_obj.options.length;
	};
	//...PUBLIC

	//PROTECTED...
	//...PROTECTED

	//PRIVATE...
	//...PRIVATE

	//INTERNAL...
	//...INTERNAL

	return _ns.JSCSimpleListboxComponentView;
};