<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:4
*/
namespace basapa_ns;


final class CCTimeRangeFormCompositeComponentView
{
	/*public const i_TIME_FROM_COMPOSITE_COMPONENT_TYPE_LISTBOX		= 0;
	public const i_TIME_TO_COMPOSITE_COMPONENT_TYPE_LISTBOX		= 1;

	//COMPONENT PARAMS...
	public const i_COMPONENT_PARAM_TRANSLATION_DATA		= 'translation_data';
	public const i_COMPONENT_PARAM_VALIDATION_PARAMS		= 'validation_params';
	public const i_COMPONENT_PARAM_LIST_DATA				= 'list_data';
	//...COMPONENT PARAMS*/


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*//*protected function __validateParams():bool
	{
		$lId_str = $this->__getId();
		$lComponentsParams_obj_arr = $this->__getComponentsParams();

		return parent::__validateParams()
				&& isset($lId_str)
				&& isset($lComponentsParams_obj_arr);
	}*/

	/*override*//*protected function __getJSComponent()
	{
		return 'bsp.components_ns.composite_ns.importJSCTimeRangeCompositeComponentClass()';
	}*/

	/*override*//*protected function __getClasses():string
	{
		return 'css_time_range_composite_component ' .parent::__getClasses();
	}*/

	/*override*//*protected function __getHTMLElement():string
	{
		$lComponentsParams_obj_arr = $this->__getComponentsParams();
		$lTranslationData_clss_arr = $lComponentsParams_obj_arr[CCTimeRangeCompositeComponentView::i_COMPONENT_PARAM_TRANSLATION_DATA];
		$lValidationParams_obj_arr = $lComponentsParams_obj_arr[CCTimeRangeCompositeComponentView::i_COMPONENT_PARAM_VALIDATION_PARAMS];
		$lListData_clss_arr_arr = $lComponentsParams_obj_arr[CCTimeRangeCompositeComponentView::i_COMPONENT_PARAM_LIST_DATA];

		//TIME FROM...
		$this->_drawSimpleListboxComponent(CCTimeRangeCompositeComponentView::i_TIME_FROM_COMPOSITE_COMPONENT_TYPE_LISTBOX, $lTranslationData_clss_arr, $lValidationParams_obj_arr, $lListData_clss_arr_arr, 'css_listbox_component_time_from', 'css_listbox_component_element_time_from');
		//...TIME FROM

		//TIME TO...
		$this->_drawSimpleListboxComponent(CCTimeRangeCompositeComponentView::i_TIME_TO_COMPOSITE_COMPONENT_TYPE_LISTBOX, $lTranslationData_clss_arr, $lValidationParams_obj_arr, $lListData_clss_arr_arr, 'css_listbox_component_time_to', 'css_listbox_component_element_time_to');
		//...TIME TO
	}*/

/*	private function _drawSimpleListboxComponent(int $aCompositeComponentType_int, array $aComponentTranslationData_clss_arr, array $aComponentValidationParams_obj_arr, array $aComponentListTableData_clss_arr_arr, string $aClassesParam_str, string $aElementClassesParam_str)
	{
		$lComponentTranslationData_clss = $aComponentTranslationData_clss_arr[$aCompositeComponentType_int];
		$lComponentId_str = $aComponentValidationParams_obj_arr[CJOBRequestController::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID][$aCompositeComponentType_int];
		//$lComponentFillingMode_int = $aComponentValidationParams_obj_arr[CJOBRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE][$aCompositeComponentType_int];
		$lComponentListTableData_clss_arr = $aComponentListTableData_clss_arr_arr[$aCompositeComponentType_int];

		$lItemsParams_obj_arr_arr = array();
		$lItemParams_obj_arr	= array(CCListboxComponentItem::i_PARAM_COMPONENT_ID	=> $lComponentId_str,
										CCListboxComponentItem::i_PARAM_ID			=> 0,
										CCListboxComponentItem::i_PARAM_NAME			=> $lComponentTranslationData_clss->getValue(),
										CCListboxComponentItem::i_PARAM_VALUE			=> 0,
										CCListboxComponentItem::i_PARAM_STATE			=> CCListboxComponentItem::i_STATE_SELECTED);
		$lItemsParams_obj_arr_arr[] = $lItemParams_obj_arr;

		$lCount_int = count($lComponentListTableData_clss_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lComponentListTableData_clss = $lComponentListTableData_clss_arr[$i];

			$lItemId_int = $lComponentListTableData_clss->i_getTableFieldId();
			$lItemName_str = $lComponentListTableData_clss->i_getTableFieldName();
			$lItemValue_str = $lItemId_int;
			//$lItemState_str = *$i === $lSelectedItemId_int ? CCListboxComponentItem::STATE_SELECTED :* CCListboxComponentItem::i_STATE_ENABLED;

			$lItemParams_obj_arr	= array(CCListboxComponentItem::i_PARAM_COMPONENT_ID	=> $lComponentId_str,
											CCListboxComponentItem::i_PARAM_ID			=> $lItemId_int,
											CCListboxComponentItem::i_PARAM_NAME			=> $lItemName_str,
											CCListboxComponentItem::i_PARAM_VALUE			=> $lItemValue_str,
											CCListboxComponentItem::i_PARAM_STATE			=> $lItemState_str);

			$lItemsParams_obj_arr_arr[] = $lItemParams_obj_arr;
		}

		$lParams_obj_arr	= array(CCSimpleListboxComponentView::i_PARAM_ID						=> $lComponentId_str,
									CCSimpleListboxComponentView::i_PARAM_NAME					=> $lComponentTranslationData_clss->getName(),
									CCSimpleListboxComponentView::i_PARAM_ITEMS_PARAMS			=> $lItemsParams_obj_arr_arr,
									//CCSimpleListboxComponentView::PARAM_FILLING_MODE			=> $lComponentFillingMode_int,//do not use
									CCSimpleListboxComponentView::i_PARAM_DESCRIPTION				=> '',//CTools::replace($lEncodingTextTextareaData_clss->getDescription(), CJOBTextAvatarGenerationFormView::ENCODING_TEXT_FIELD_MIN_CHARS_COUNT, CTools::REPLACING_PATTERN_MIN_CHARS_COUNT),
									CCSimpleListboxComponentView::i_PARAM_CLASSES					=> $aClassesParam_str,
									CCSimpleListboxComponentView::i_PARAM_ELEMENT_CLASSES			=> $aElementClassesParam_str,
									//CCSimpleListboxComponentView::PARAM_JS_COMPONENT_ID		=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
									CCSimpleListboxComponentView::i_PARAM_JS_COMPONENT_INIT_FUNC	=> $this->__getJSComponentInitFunc());
		$this->__getComponentsView()->i_getListboxComponentsView()->i_getSimpleListboxComponentView()->i_draw($lParams_obj_arr);
	}*/
}


?>