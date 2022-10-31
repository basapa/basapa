<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:4
*/
namespace basapa_ns;


final class CJOBWageRangeCompositeComponentView extends CCFormCompositeComponentView
{
	//JS PHP AGREEMENTS...
	public const i_JS_COMPOSITE_COMPONENT_ID_WAGE_FROM_TEXTFIELD	= 'i_JS_COMPOSITE_COMPONENT_ID_WAGE_FROM_TEXTFIELD';
	public const i_JS_COMPOSITE_COMPONENT_ID_WAGE_TO_TEXTFIELD		= 'i_JS_COMPOSITE_COMPONENT_ID_WAGE_TO_TEXTFIELD';
	public const i_JS_COMPOSITE_COMPONENT_ID_WAGE_CURRENCY_LISTBOX	= 'i_JS_COMPOSITE_COMPONENT_ID_WAGE_CURRENCY_LISTBOX';
	//...JS PHP AGREEMENTS

	//IDS...
	public const i_COMPOSITE_COMPONENT_ID_WAGE_FROM_TEXTFIELD	= 0;
	public const i_COMPOSITE_COMPONENT_ID_WAGE_TO_TEXTFIELD		= 1;
	public const i_COMPOSITE_COMPONENT_ID_WAGE_CURRENCY_LISTBOX	= 2;
	//...IDS

	//COMPOSITE COMPONENT PARAMS...
	public const i_COMPOSITE_COMPONENT_PARAM_TRANSLATION_DATA	= 'translation_data';
	public const i_COMPOSITE_COMPONENT_PARAM_VALIDATION_DATA	= 'validation_data';
	//...COMPOSITE COMPONENT PARAMS

	//VALIDATION PARAMS...
	public const i_VALIDATION_DATA_COMPONENT_ID					= 0;
	public const i_VALIDATION_DATA_COMPONENT_FILLING_MODE		= 1;
	public const i_VALIDATION_DATA_COMPONENT_MAX_CHARS_COUNT	= 2;
	public const i_VALIDATION_DATA_COMPONENT_ITEMS_DATA			= 3;
	//...VALIDATION PARAMS

	//CSS...
	private const _CSS_COMPONENT						= 'css_job_wage_range_composite_component';
	//...CSS

	//CLASSES...
	private const _TEXTFIELD_COMPONENT_WAGE_FROM_CLASSES			= 'css_textfield_component_wage_from';
	private const _TEXTFIELD_COMPONENT_ELEMENT_WAGE_FROM_CLASSES	= 'css_textfield_component_element_wage_from';

	private const _TEXTFIELD_COMPONENT_WAGE_TO_CLASSES				= 'css_textfield_component_wage_to';
	private const _TEXTFIELD_COMPONENT_ELEMENT_WAGE_TO_CLASSES		= 'css_textfield_component_element_wage_to';

	private const _LISTBOX_COMPONENT_WAGE_CURRENCY_CLASSES			= 'css_listbox_component_wage_currency';
	private const _LISTBOX_COMPONENT_ELEMENT_WAGE_CURRENCY_CLASSES	= 'css_listbox_component_element_wage_currency';
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
		return 'bsp.components_ns.composite_ns.i_importJSJOBWageRangeCompositeComponentViewClass()';
	}
	//...JS

	/*override*/protected function __getComponentClasses():string
	{
		return self::_CSS_COMPONENT. ' ' .parent::__getComponentClasses();
	}

	//HTMLS...
	/*override*/protected function __drawHTMLComponentElement():void
	{
		$lCompositeComponentParams_a_arr = $this->__getCompositeComponentParams();
		$lTranslationData_clss_arr = $lCompositeComponentParams_a_arr[self::i_COMPOSITE_COMPONENT_PARAM_TRANSLATION_DATA];
		$lValidationData_obj_arr_arr = $lCompositeComponentParams_a_arr[self::i_COMPOSITE_COMPONENT_PARAM_VALIDATION_DATA];

		//WAGE FROM...
		$this->_drawSimpleTextfieldComponent(self::i_COMPOSITE_COMPONENT_ID_WAGE_FROM_TEXTFIELD, $lTranslationData_clss_arr, $lValidationData_obj_arr_arr, self::_TEXTFIELD_COMPONENT_WAGE_FROM_CLASSES, self::_TEXTFIELD_COMPONENT_ELEMENT_WAGE_FROM_CLASSES);
		//...WAGE FROM

		//WAGE TO...
		$this->_drawSimpleTextfieldComponent(self::i_COMPOSITE_COMPONENT_ID_WAGE_TO_TEXTFIELD, $lTranslationData_clss_arr, $lValidationData_obj_arr_arr, self::_TEXTFIELD_COMPONENT_WAGE_TO_CLASSES, self::_TEXTFIELD_COMPONENT_ELEMENT_WAGE_TO_CLASSES);
		//...WAGE TO

		//WAGE CURRENCY...
		$this->_drawSimpleListboxComponent(self::i_COMPOSITE_COMPONENT_ID_WAGE_CURRENCY_LISTBOX, $lTranslationData_clss_arr, $lValidationData_obj_arr_arr, self::_LISTBOX_COMPONENT_WAGE_CURRENCY_CLASSES, self::_LISTBOX_COMPONENT_ELEMENT_WAGE_CURRENCY_CLASSES);
		//...WAGE CURRENCY
	}
	//...HTMLS

	private function _drawSimpleTextfieldComponent(int $aCompositeComponentId_int, array $aTranslationData_clss_arr, array $aValidationData_obj_arr_arr, string $aClassesParam_str, string $aElementClassesParam_str)
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextfieldComponentsView_clss = $lComponentsView_clss->i_getTextfieldComponentsView();

		$lComponentId_str = $aValidationData_obj_arr_arr[$aCompositeComponentId_int][self::i_VALIDATION_DATA_COMPONENT_ID];
		$lComponentFillingMode_int = $aValidationData_obj_arr_arr[$aCompositeComponentId_int][self::i_VALIDATION_DATA_COMPONENT_FILLING_MODE];
		$lComponentValueMaxCharsCount_int = $aValidationData_obj_arr_arr[$aCompositeComponentId_int][self::i_VALIDATION_DATA_COMPONENT_MAX_CHARS_COUNT];
		$lComponentTranslationData_clss = CCTranslationXMLTextfieldComponentNode::i_toClassType($aTranslationData_clss_arr[$aCompositeComponentId_int]);

		$lParams_a_arr	= [	CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> $lComponentId_str,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lComponentTranslationData_clss->i_getName(),
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_PRE_NAME			=> $lComponentTranslationData_clss->i_getPreName(),
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_POST_NAME			=> $lComponentTranslationData_clss->i_getPostName(),
							CCSimpleTextfieldComponentView::i_PARAM_ID_VALUE							=> $this->__getMainData()->i_isPOSTParamDefined($lComponentId_str) ? $this->__getMainData()->i_getPOSTParam($lComponentId_str) : '',
							CCSimpleTextfieldComponentView::i_PARAM_ID_MAX_CHARS_COUNT					=> $lComponentValueMaxCharsCount_int,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> $lComponentFillingMode_int,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> $aClassesParam_str,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> $aElementClassesParam_str,
							//CCSimpleTextfieldComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSCompositeComponentInitFunc()];
		$lTextfieldComponentsView_clss->i_getSimpleTextfieldComponentView()->i_draw($lParams_a_arr);
	}

	private function _drawSimpleListboxComponent(int $aCompositeComponentId_int, array $aTranslationData_clss_arr, array $aValidationData_obj_arr_arr, string $aClassesParam_str, string $aElementClassesParam_str)
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lListboxComponentsView_clss = $lComponentsView_clss->i_getListboxComponentsView();

		$lComponentId_str = $aValidationData_obj_arr_arr[$aCompositeComponentId_int][self::i_VALIDATION_DATA_COMPONENT_ID];
		$lComponentFillingMode_int = $aValidationData_obj_arr_arr[$aCompositeComponentId_int][self::i_VALIDATION_DATA_COMPONENT_FILLING_MODE];
		$lComponentItemsData_a_arr = $aValidationData_obj_arr_arr[$aCompositeComponentId_int][self::i_VALIDATION_DATA_COMPONENT_ITEMS_DATA];
		$lComponentTranslationData_clss = CCTranslationXMLListboxComponentNode::i_toClassType($aTranslationData_clss_arr[$aCompositeComponentId_int]);

		$lParams_a_arr	= [	CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> $lComponentId_str,
							CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lComponentTranslationData_clss->i_getName(),
							CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_PRE_NAME			=> $lComponentTranslationData_clss->i_getPreName(),
							CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_POST_NAME		=> $lComponentTranslationData_clss->i_getPostName(),
							CCSimpleListboxComponentView::i_PARAM_ID_ITEMS_DATA						=> $this->_generateListboxItemsData($lComponentId_str, $lComponentTranslationData_clss, $lComponentItemsData_a_arr),
							CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> $lComponentFillingMode_int,
							CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> $aClassesParam_str,
							CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> $aElementClassesParam_str,
							//CCSimpleListboxComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_EMPLOYER_CITY_LISTBOX,
							CCSimpleListboxComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSCompositeComponentInitFunc()];
		$lListboxComponentsView_clss->i_getSimpleListboxComponentView()->i_draw($lParams_a_arr);
	}

	private function _generateListboxItemsData(string $aFormComponentId_str, CCTranslationXMLListboxComponentNode $aListboxTranslationData_clss, array $aTableData_clss_arr):array
	{
		$lItemParams_a_arr	= [	CCListboxComponentItem::i_PARAM_ID_ITEM_COMPONENT_ID	=> $aFormComponentId_str,
								//CCListboxComponentItem::i_PARAM_ID_OPT_ITEM_ID			=> '',
								CCListboxComponentItem::i_PARAM_ID_ITEM_NAME			=> $aListboxTranslationData_clss->i_getPlaceholder(),
								CCListboxComponentItem::i_PARAM_ID_ITEM_VALUE			=> CVariableTools::i_toString(CCListboxComponentItem::i_EMPTY_ITEM_VALUE),
								CCListboxComponentItem::i_PARAM_ID_ITEM_STATE			=> CCLabellistComponentItem::i_ITEM_STATE_SELECTED];

		$lItemsData_a_arr[] = [	CCListboxComponentView::i_ITEM_DATA_PARAM_ID_TYPE	=> CCListboxComponentView::i_ITEM_DATA_TYPE_SINGLE,
								CCListboxComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lItemParams_a_arr];

		$lCount_int = CArrayTools::i_count($aTableData_clss_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lSTableData_clss = CCSTableData::i_toClassType($aTableData_clss_arr[$i]);

			$lId_int = $lSTableData_clss->i_getTableFieldId();
			$lName_str = $lSTableData_clss->i_getTableFieldName();

			$lItemParams_a_arr	= [	CCListboxComponentItem::i_PARAM_ID_ITEM_COMPONENT_ID	=> $aFormComponentId_str,
									CCListboxComponentItem::i_PARAM_ID_OPT_ITEM_ID			=> CVariableTools::i_toString($lId_int),
									CCListboxComponentItem::i_PARAM_ID_ITEM_NAME			=> $lName_str,
									CCListboxComponentItem::i_PARAM_ID_ITEM_VALUE			=> CVariableTools::i_toString($lId_int),
									CCListboxComponentItem::i_PARAM_ID_ITEM_STATE			=> CCLabellistComponentItem::i_ITEM_STATE_ENABLED];

			$lItemsData_a_arr[] = [	CCListboxComponentView::i_ITEM_DATA_PARAM_ID_TYPE	=> CCListboxComponentView::i_ITEM_DATA_TYPE_SINGLE,
									CCListboxComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lItemParams_a_arr];
		}

		return $lItemsData_a_arr;
	}
}


?>