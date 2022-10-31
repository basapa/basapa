/*CLASS PATTERN VERSION: 1.1*/
bsp.i_getNamespace('bsp.main_manager_ns.model_ns.common_ns').i_importJSCRequestParamConstClass = function()
{
	var _ns = bsp.main_manager_ns.model_ns.common_ns;
	if (_ns.JSCRequestParamConst)
	{
		return _ns.JSCRequestParamConst;
	}
	
	var _static_public_const = _self;
	var _static_private_const = _self;
	var _static_public = _self;
	var _static_private = _self;
	
	//IMPORTS...
	//...IMPORTS

	//CONST PUBLIC...
	//JS PHP AGREEMENTS...
	_static_public_const.i_POST_PARAM_ID_REQUEST				= 'request_id';
	
	_static_public_const.i_GET_PARAM_ID_SITE					= 'site_id';
	_static_public_const.i_GET_PARAM_ID_PAGE					= 'page_id';
	_static_public_const.i_GET_PARAM_ID_LANG					= 'lang_id';
	_static_public_const.i_GET_PARAM_ID_OPT_CONTENT_ID			= 'content_id';
	_static_public_const.i_GET_PARAM_ID_OPT_SUBPAGE				= 'subpage_id';
	_static_public_const.i_GET_PARAM_ID_OPT_ACTION				= 'action_id';
	_static_public_const.i_GET_PARAM_ID_OPT_CATEGORY_ID			= 'category_id';
	_static_public_const.i_GET_PARAM_ID_OPT_SUBCATEGORY_ID		= 'subcategory_id';
	_static_public_const.i_GET_PARAM_ID_OPT_CITY_NAME			= 'city_name';
	_static_public_const.i_GET_PARAM_ID_OPT_COUNTRY_NAME		= 'country_name';
	_static_public_const.i_GET_PARAM_ID_OPT_REGION_NAME			= 'region_name';
	_static_public_const.i_GET_PARAM_ID_OPT_CONTENT_PAGE_INDEX 	= 'content_page_index';

	//STATIC...
	/*virtual*/_static_public.i_GET_PARAMS_UNDEFINED_VALUES = function()
	{
		//TODO: optimize required
		var l_a_arr = [];
		l_a_arr[_self.i_GET_PARAM_ID_OPT_SUBPAGE]				= '';
		l_a_arr[_self.i_GET_PARAM_ID_OPT_CONTENT_ID]			= '0';
		l_a_arr[_self.i_GET_PARAM_ID_OPT_ACTION]				= '';
		l_a_arr[_self.i_GET_PARAM_ID_OPT_CATEGORY_ID]			= '0';
		l_a_arr[_self.i_GET_PARAM_ID_OPT_SUBCATEGORY_ID]		= '0';
		l_a_arr[_self.i_GET_PARAM_ID_OPT_CITY_NAME]				= '';
		l_a_arr[_self.i_GET_PARAM_ID_OPT_COUNTRY_NAME]			= '';
		l_a_arr[_self.i_GET_PARAM_ID_OPT_REGION_NAME]			= '';
		l_a_arr[_self.i_GET_PARAM_ID_OPT_CONTENT_PAGE_INDEX]	= '0';
		return l_a_arr;
	};

	/*virtual*/_static_public.i_STATIC_GET_PARAMS = function()
	{
		//TODO: optimize required
		return [_self.i_GET_PARAM_ID_PAGE,
				_self.i_GET_PARAM_ID_OPT_SUBPAGE,
				_self.i_GET_PARAM_ID_OPT_CONTENT_ID,
				_self.i_GET_PARAM_ID_OPT_ACTION];
	};

	/*virtual*/_static_public.i_DYNAMIC_GET_PARAMS = function()
	{
		//TODO: optimize required
		return [_self.i_GET_PARAM_ID_OPT_CATEGORY_ID,
				_self.i_GET_PARAM_ID_OPT_SUBCATEGORY_ID,
				_self.i_GET_PARAM_ID_OPT_CONTENT_PAGE_INDEX];
	};
	//...STATIC
	//...JS PHP AGREEMENTS
	//...CONST PUBLIC

	//CONST PRIVATE...
	//...CONST PRIVATE

	return _ns.JSCRequestParamConst;
};