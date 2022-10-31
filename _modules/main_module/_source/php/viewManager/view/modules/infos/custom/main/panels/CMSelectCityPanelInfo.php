<?php


namespace basapa_ns;


class CSelectCityPanelInfo extends CInfoBase
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	
	protected function __draw()
	{
		echo
		'<div class="module_info rounded_high" style="background:#ebf3fa; border:#a5c1dd solid 1px; margin:2px;">',
			$this->__module(),
		'</div>';
	}
	
	
	protected function __header()
	{
	}


	protected function __body()
	{
		echo
		'<div class="body_info" style="padding:0;">',
			$this->__bodyContent(),
		'</div>';
	}


	protected function __footer()
	{
	}
	
	
	protected function __bodyContent()
	{
		//user city
		$lCityData_arr = $this->__getDatabaseData()->getCityData(CDatabaseData::TYPE_CITY_DATA_BY_ID);
		$lRegionData_arr = $this->__getDatabaseData()->getRegionData(CDatabaseData::TYPE_REGION_DATA_BY_ID);

		$lValue_str = $lCityData_arr[CDatabaseConst::TABLE_CITY_NAME]. '<br>(' .$lRegionData_arr[CDatabaseConst::TABLE_REGION_NAME]. ')';
		
		$lParams_arr 	= array(CComponentParam::TEXT_TYPE 					=> CText::TYPE_LOW,
								CComponentParam::TEXT_NAME 					=> $lValue_str,
								CComponentParam::TEXT_STYLE_COMPONENT 		=> 'font-weight:bold; text-align:center;');
		$this->__getComponents()->getText()->draw($lParams_arr);
		
		//select city button
		$lParams_arr 	= array(CComponentParam::BUTTON_NAME 				=> CFieldNameConst::BUTTON_SELECT_CITY,
								CComponentParam::BUTTON_TYPE 				=> CButton::TYPE_LINK,
								CComponentParam::BUTTON_COLOR 				=> CButton::COLOR_BLUE,
								CComponentParam::BUTTON_HREF 				=> CURLConversion::getRealURLByParams(array(CParamConst::SITE => CSiteConst::SITE_MAIN, CParamConst::PAGE => CPageConst::PAGE_SELECT_CITY)),
								CComponentParam::BUTTON_STYLE 				=> 'padding:2px; text-align:center;',
								CComponentParam::BUTTON_STYLE_COMPONENT 	=> 'display:inline-block;');
		$this->__getComponents()->getButton()->draw($lParams_arr);
	}
}


?>
