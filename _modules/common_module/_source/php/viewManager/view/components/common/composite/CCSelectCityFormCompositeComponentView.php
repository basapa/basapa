<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:4
*/
namespace basapa_ns;


final class CCSelectCityFormCompositeComponentView extends CCFormCompositeComponentView
{
	//JS PHP AGREEMENTS...
	public const i_JS_COMPOSITE_COMPONENT_ID_REGION_LISTBOX	= 'COMPOSITE_COMPONENT_ID_REGION_LISTBOX';
	public const i_JS_COMPOSITE_COMPONENT_ID_CITY_LISTBOX	= 'COMPOSITE_COMPONENT_ID_CITY_LISTBOX';
	//...JS PHP AGREEMENTS

	//IDS...
	public const i_COMPOSITE_COMPONENT_ID_REGION_LISTBOX	= 0;
	public const i_COMPOSITE_COMPONENT_ID_CITY_LISTBOX		= 1;
	//...IDS

	//COMPOSITE COMPONENT PARAMS...
	public const i_COMPOSITE_COMPONENT_PARAM_TRANSLATION_DATA	= 'translation_data';
	public const i_COMPOSITE_COMPONENT_PARAM_VALIDATION_DATA	= 'validation_data';
	//...COMPOSITE COMPONENT PARAMS

	//VALIDATION PARAMS...
	public const i_VALIDATION_DATA_COMPONENT_ID						= 0;
	public const i_VALIDATION_DATA_COMPONENT_FILLING_MODE			= 1;
	public const i_VALIDATION_DATA_COMPONENT_ITEMS_DATA				= 2;
	public const i_VALIDATION_DATA_COMPONENT_SELECTED_ITEM_VALUE	= 3;
	//...VALIDATION PARAMS

	//CSS...
	private const _CSS_COMPONENT						= 'css_select_city_composite_component';
	//...CSS

	//CLASSES...
	private const _LISTBOX_COMPONENT_REGION_CLASSES			= 'css_listbox_component_region';
	private const _LISTBOX_COMPONENT_ELEMENT_REGION_CLASSES	= 'css_listbox_component_element_region';
	private const _LISTBOX_COMPONENT_CITY_CLASSES			= 'css_listbox_component_city';
	private const _LISTBOX_COMPONENT_ELEMENT_CITY_CLASSES	= 'css_listbox_component_element_city';
	//...CLASSES


	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	//JS...
	/*override*/protected function __getJSComponent():string
	{
		return 'bsp.components_ns.composite_ns.i_importJSCSelectCityFormCompositeComponentViewClass()';
	}
	//...JS

	/*override*/protected function __draw():void
	{
		$this->__drawHTMLComponentElement();
	}

	//HTMLS...
	/*override*/protected function __drawHTMLComponentElement():void
	{
		$lCompositeComponentParams_a_arr = $this->__getCompositeComponentParams();
		$lTranslationData_clss_arr = $lCompositeComponentParams_a_arr[self::i_COMPOSITE_COMPONENT_PARAM_TRANSLATION_DATA];
		$lValidationData_obj_arr_arr = $lCompositeComponentParams_a_arr[self::i_COMPOSITE_COMPONENT_PARAM_VALIDATION_DATA];

		//REGION...
		$this->_drawSimpleListboxComponent(self::i_COMPOSITE_COMPONENT_ID_REGION_LISTBOX, $lTranslationData_clss_arr, $lValidationData_obj_arr_arr, self::_LISTBOX_COMPONENT_REGION_CLASSES, self::_LISTBOX_COMPONENT_ELEMENT_REGION_CLASSES, self:: i_JS_COMPOSITE_COMPONENT_ID_REGION_LISTBOX);
		//...REGION

		//CITY...
		$this->_drawSimpleListboxComponent(self::i_COMPOSITE_COMPONENT_ID_CITY_LISTBOX, $lTranslationData_clss_arr, $lValidationData_obj_arr_arr, self::_LISTBOX_COMPONENT_CITY_CLASSES, self::_LISTBOX_COMPONENT_ELEMENT_CITY_CLASSES, self:: i_JS_COMPOSITE_COMPONENT_ID_CITY_LISTBOX);
		//...CITY
	}
	//...HTMLS

	//PARAMS...
	/*override*/protected function __getComponentClasses():string
	{
		return self::_CSS_COMPONENT. ' ' .parent::__getComponentClasses();
	}
	//...PARAMS

	private function _drawSimpleListboxComponent(int $aCompositeComponentId_int, array $aTranslationData_clss_arr, array $aValidationData_obj_arr_arr, string $aClassesParam_str, string $aElementClassesParam_str, string $aJSIdParam_str)
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lListboxComponentsView_clss = $lComponentsView_clss->i_getListboxComponentsView();

		$lComponentId_str = $aValidationData_obj_arr_arr[$aCompositeComponentId_int][self::i_VALIDATION_DATA_COMPONENT_ID];
		$lComponentFillingMode_int = $aValidationData_obj_arr_arr[$aCompositeComponentId_int][self::i_VALIDATION_DATA_COMPONENT_FILLING_MODE];
		$lComponentItemsData_a_arr = $aValidationData_obj_arr_arr[$aCompositeComponentId_int][self::i_VALIDATION_DATA_COMPONENT_ITEMS_DATA];
		$lComponentSelectedItemValue_str = $aValidationData_obj_arr_arr[$aCompositeComponentId_int][self::i_VALIDATION_DATA_COMPONENT_SELECTED_ITEM_VALUE];
		$lComponentTranslationData_clss = CCTranslationXMLListboxComponentNode::i_toClassType($aTranslationData_clss_arr[$aCompositeComponentId_int]);

		$lParams_a_arr	= [	CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> $lComponentId_str,
							CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lComponentTranslationData_clss->i_getName(),
							//CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_PRE_NAME			=> $lComponentTranslationData_clss->i_getPreName(),
							//CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_POST_NAME		=> $lComponentTranslationData_clss->i_getPostName(),
							CCSimpleListboxComponentView::i_PARAM_ID_ITEMS_DATA						=> $this->_generateListboxItemsData($lComponentId_str, $lComponentTranslationData_clss, $lComponentItemsData_a_arr, $lComponentSelectedItemValue_str),
							CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> $lComponentFillingMode_int,
							CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> $aClassesParam_str,
							CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> $aElementClassesParam_str,
							CCSimpleListboxComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID			=> $aJSIdParam_str/*,
							CCSimpleListboxComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSCompositeComponentInitFunc()*/];
		$lListboxComponentsView_clss->i_getSimpleListboxComponentView()->i_draw($lParams_a_arr);
	}

	private function _generateListboxItemsData(string $aFormComponentId_str, CCTranslationXMLListboxComponentNode $aListboxTranslationData_clss, array $aTableData_clss_arr, string $aComponentSelectedItemValue_str):array
	{
		if ($aListboxTranslationData_clss->i_isPlaceholderDefined())
		{
			$lItemParams_a_arr	= [	CCListboxComponentItem::i_PARAM_ID_OPT_ITEM_COMPONENT_ID	=> $aFormComponentId_str,
									//CCListboxComponentItem::i_PARAM_ID_OPT_ITEM_ID			=> '',
									CCListboxComponentItem::i_PARAM_ID_ITEM_NAME				=> $aListboxTranslationData_clss->i_getPlaceholder(),
									CCListboxComponentItem::i_PARAM_ID_ITEM_VALUE				=> CVariableTools::i_toString(CCListboxComponentItem::i_EMPTY_ITEM_VALUE),
									CCListboxComponentItem::i_PARAM_ID_ITEM_STATE				=> $aComponentSelectedItemValue_str === CVariableTools::i_toString(CCListboxComponentItem::i_EMPTY_ITEM_VALUE) ? CCLabellistComponentItem::i_ITEM_STATE_SELECTED : CCLabellistComponentItem::i_ITEM_STATE_ENABLED];

			$lItemsData_a_arr[] = [	CCListboxComponentView::i_ITEM_DATA_PARAM_ID_TYPE	=> CCListboxComponentView::i_ITEM_DATA_TYPE_SINGLE,
									CCListboxComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lItemParams_a_arr];
		}

		foreach ($aTableData_clss_arr as $lSTableData_clss)
		{
			$lId_int = $lSTableData_clss->i_getTableFieldId();
			$lName_str = $lSTableData_clss->i_getTableFieldName();

			$lId_str = CVariableTools::i_toString($lId_int);

			$lItemParams_a_arr	= [	CCListboxComponentItem::i_PARAM_ID_OPT_ITEM_COMPONENT_ID	=> $aFormComponentId_str,
									CCListboxComponentItem::i_PARAM_ID_OPT_ITEM_ID				=> $lId_str,
									CCListboxComponentItem::i_PARAM_ID_ITEM_NAME				=> $lName_str,
									CCListboxComponentItem::i_PARAM_ID_ITEM_VALUE				=> $lId_str,
									CCListboxComponentItem::i_PARAM_ID_ITEM_STATE				=> $aComponentSelectedItemValue_str === $lId_str ? CCLabellistComponentItem::i_ITEM_STATE_SELECTED : CCLabellistComponentItem::i_ITEM_STATE_ENABLED];

			$lItemsData_a_arr[] = [	CCListboxComponentView::i_ITEM_DATA_PARAM_ID_TYPE	=> CCListboxComponentView::i_ITEM_DATA_TYPE_SINGLE,
									CCListboxComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lItemParams_a_arr];
		}

		return $lItemsData_a_arr;
	}
}


?>