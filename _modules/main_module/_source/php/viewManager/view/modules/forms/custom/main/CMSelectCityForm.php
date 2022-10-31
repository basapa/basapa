<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMSelectCityForm extends CMFormView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
	
	
	protected function __getId()
	{
		return CFieldIdConst::FORM_SELECT_CITY;
	}


	protected function __getAction()
	{
		return CURLConversion::getRealURLByParams(array(CParamConst::SITE => CSiteConst::SITE_MAIN,
														CParamConst::PAGE => CPageConst::PAGE_SELECT_CITY));
	}
	

	protected function __headerContent()
	{
		return CFieldNameConst::FORM_SELECT_CITY;
	}
	
	
	protected function __bodyContent()
	{
		$lCookieCityId_int = $this->__getHostData()->getCookie(CMainConst::COOKIE_USER_CITY_ID);

		//labellist
		$lCityData_arr = $this->__getDatabaseData()->getCityData(CDatabaseData::TYPE_CITY_DATA_BY_TYPE);
		if (!$lCityData_arr)
		{
			throw new Exception('City Data By Type is undefined', CMainConst::ERROR_TYPE_403);
		}

		$lElements_arr = null;
		
		$lCount_int = count($lCityData_arr);
		foreach ($lCityData_arr as $lData_arr)
		{
			$lCityId_int = $lData_arr[CDatabaseConst::TABLE_CITY_ID];
			$lCityName_str = $lData_arr[CDatabaseConst::TABLE_CITY_NAME];

			$lParams_arr 	= array(CParamConst::SITE 	=> CSiteConst::SITE_MAIN,
									CParamConst::PAGE 	=> CPageConst::PAGE_SELECT_CITY);

			$lState_str = $lCityId_int == $lCookieCityId_int ? CComponentParam::ELEMENT_STATE_SELECTED : CComponentParam::ELEMENT_STATE_ENABLED;
			$lElements_arr[] 	= array(CComponentParam::ELEMENT_PARAM_NAME 	=> $lCityName_str,
										CComponentParam::ELEMENT_PARAM_HREF 	=> CURLConversion::getRealURLByParams($lParams_arr, array(CParamConst::CITY_ID => $lCityId_int)),
										CComponentParam::ELEMENT_PARAM_STATE 	=> $lState_str);
		}
		
		$lLength_int = ceil($lCount_int / 4);

		//labellist
		$lParams_arr 	= array(CComponentParam::LABELLIST_TYPE	 			=> CLabelList::TYPE_NAVIGATION_CATEGORY,
								CComponentParam::LABELLIST_ELEMENTS	 		=> array_slice($lElements_arr, 0, $lLength_int),
								CComponentParam::LABELLIST_STYLE			=> 'vertical-align:top; display:inline-block;',
								CComponentParam::LABELLIST_STYLE_COMPONENT	=> 'width:190px;');
		$this->__getComponents()->getLabellist()->draw($lParams_arr);

		//labellist
		$lParams_arr 	= array(CComponentParam::LABELLIST_TYPE	 			=> CLabelList::TYPE_NAVIGATION_CATEGORY,
								CComponentParam::LABELLIST_ELEMENTS	 		=> array_slice($lElements_arr, $lLength_int, $lLength_int),
								CComponentParam::LABELLIST_STYLE			=> 'vertical-align:top; display:inline-block;',
								CComponentParam::LABELLIST_STYLE_COMPONENT	=> 'width:190px;');
		$this->__getComponents()->getLabellist()->draw($lParams_arr);
		
		//labellist
		$lParams_arr 	= array(CComponentParam::LABELLIST_TYPE	 			=> CLabelList::TYPE_NAVIGATION_CATEGORY,
								CComponentParam::LABELLIST_ELEMENTS	 		=> array_slice($lElements_arr, $lLength_int * 2, $lLength_int),
								CComponentParam::LABELLIST_STYLE			=> 'vertical-align:top; display:inline-block;',
								CComponentParam::LABELLIST_STYLE_COMPONENT	=> 'width:190px;');
		$this->__getComponents()->getLabellist()->draw($lParams_arr);
		
		//labellist
		$lParams_arr 	= array(CComponentParam::LABELLIST_TYPE	 			=> CLabelList::TYPE_NAVIGATION_CATEGORY,
								CComponentParam::LABELLIST_ELEMENTS	 		=> array_slice($lElements_arr, $lLength_int * 3, $lLength_int),
								CComponentParam::LABELLIST_STYLE			=> 'vertical-align:top; display:inline-block;',
								CComponentParam::LABELLIST_STYLE_COMPONENT	=> 'width:190px;');
		$this->__getComponents()->getLabellist()->draw($lParams_arr);
		
		//separator
		$this->__getComponents()->getSeparator();
		
		//select city
		$lRegionData_arr = $this->__getDatabaseData()->getRegionData(CDatabaseData::TYPE_REGION_DATA);
		$lElements_arr = CTools::getElementsFromData($lRegionData_arr, CDatabaseConst::TABLE_REGION_NAME, CDatabaseConst::TABLE_REGION_ID);
		
		$lJsChange_str = 'listboxSetComponentStateDisabled(\'' .CFieldIdConst::FORM_SELECT_CITY_REGION. '\', \'button_' .CRequestConst::REQUEST_SELECT_CITY. '\');';
		
		$lComponents_arr[CSelectCityCompositeComponent::LISTBOX_COMPONENT_REGION] 	= array(CComponentParam::COMPONENT_PARAM_ID 				=> CFieldIdConst::FORM_SELECT_CITY_REGION,
																							CComponentParam::COMPONENT_PARAM_REQUIRED 			=> CFieldRequiredConst::FORM_SELECT_CITY_REGION,
																							CComponentParam::COMPONENT_PARAM_TRANSMIT 			=> CTransmitConst::FORM_SELECT_CITY_REGION,
																							CComponentParam::COMPONENT_PARAM_ELEMENTS 			=> $lElements_arr,
																							CComponentParam::COMPONENT_PARAM_VALUE	 			=> '',
																							CComponentParam::COMPONENT_PARAM_PLACEHOLDER 		=> CFieldPlaceholderConst::PLACEHOLDER_SELECT_REGION,
																							CComponentParam::COMPONENT_PARAM_REQUIRED_FILLED	=> $this->__getUserFieldsData()->isFormFieldNeedFilled(CTransmitConst::FORM_SELECT_CITY_REGION),
																							CComponentParam::COMPONENT_PARAM_JS_CHANGE			=> $lJsChange_str);

		$lJsChange_str = 'listboxUpdateComponentState(\'' .CFieldIdConst::FORM_SELECT_CITY_CITY. '\', \'button_' .CRequestConst::REQUEST_SELECT_CITY. '\');';

		$lComponents_arr[CSelectCityCompositeComponent::LISTBOX_COMPONENT_CITY] 		= array(CComponentParam::COMPONENT_PARAM_ID 			=> CFieldIdConst::FORM_SELECT_CITY_CITY,
																							CComponentParam::COMPONENT_PARAM_REQUIRED 			=> CFieldRequiredConst::FORM_SELECT_CITY_CITY,
																							CComponentParam::COMPONENT_PARAM_TRANSMIT 			=> CTransmitConst::FORM_SELECT_CITY_CITY,
																							CComponentParam::COMPONENT_PARAM_ELEMENTS 			=> null,
																							CComponentParam::COMPONENT_PARAM_VALUE	 			=> '',
																							CComponentParam::COMPONENT_PARAM_REQUIRED_FILLED 	=> $this->__getUserFieldsData()->isFormFieldNeedFilled(CTransmitConst::FORM_SELECT_CITY_CITY),
																							CComponentParam::COMPONENT_PARAM_PLACEHOLDER 		=> CFieldPlaceholderConst::PLACEHOLDER_SELECT_CITY,
																							CComponentParam::COMPONENT_PARAM_JS_CHANGE			=> $lJsChange_str);

		$lParams_arr = array(CComponentParam::COMPOSITE_COMPONENTS => $lComponents_arr);
		$this->__getComponents()->getCompositeComponents()->getSelectCityCompositeComponent()->draw($lParams_arr);

		//button
		$lParams_arr 	= array(CComponentParam::BUTTON_ID 					=> CRequestConst::REQUEST_SELECT_CITY,
								CComponentParam::BUTTON_NAME 				=> CFieldNameConst::BUTTON_SET,
								CComponentParam::BUTTON_TYPE 				=> CButton::TYPE_SUBMIT,
								CComponentParam::BUTTON_COLOR 				=> CButton::COLOR_BLUE,
								CComponentParam::BUTTON_STATE 				=> CButton::STATE_DISABLED,
								CComponentParam::BUTTON_STYLE 				=> 'display:inline-block;');
		$this->__getComponents()->getButton()->draw($lParams_arr);

		//hidden
		$lParams_arr 	= array(CComponentParam::TEXTFIELD_ID 				=> CFieldIdConst::FORM_SELECT_CITY_HIDDEN,
								CComponentParam::TEXTFIELD_TRANSMIT 		=> CTransmitConst::FORM_SELECT_CITY_HIDDEN,
								CComponentParam::TEXTFIELD_VALUE 			=> $this->__getHostData()->getCookie(CMainConst::COOKIE_ANTI_SPAM),
								CComponentParam::TEXTFIELD_NUM_CHARS 		=> CFieldLengthConst::HIDDEN,
								CComponentParam::TEXTFIELD_TYPE 			=> CTextField::TYPE_HIDDEN,
								CComponentParam::TEXTFIELD_STYLE 			=> 'padding:0;');
		$this->__getComponents()->getTextfield()->draw($lParams_arr);
	}
}


?>
