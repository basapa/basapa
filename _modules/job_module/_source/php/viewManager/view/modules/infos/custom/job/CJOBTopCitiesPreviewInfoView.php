<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBTopCitiesPreviewInfoView extends CCInfoView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	private const _INFO_ID								= 'job_top_cities_preview_info_id';
	private const _INFO_COMPONENT_ID_CAPTION			= self::_INFO_ID. '_01';
	private const _INFO_COMPONENT_ID_CITIES				= self::_INFO_ID. '_02';
	//...IDS

	//CSS...
	private const _CSS_INFO								= 'css_job_top_cities_preview_info';
	//...CSS

	//CLASSES...
	private const _TEXT_COMPONENT_CAPTION_CLASSES			= 'css_text_component_caption';
	private const _TEXT_COMPONENT_ELEMENT_CAPTION_CLASSES	= 'css_text_component_element_caption';

	private const _LABELLIST_COMPONENT_CITIES_CLASSES			= 'css_labellist_component_cities';
	private const _LABELLIST_COMPONENT_ELEMENT_CITIES_CLASSES	= 'css_labellist_component_element_cities';
	//...CLASSES

	//TRANSLATIONS...
	private const _INFO_XML_NODE_ID						= 'top_cities_preview_info';
	private const _CAPTION_TEXT_XML_NODE_ID				= 'caption_text';
	//...TRANSLATIONS


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//JS...
	/*override*/protected function __getJSInfoImport():string
	{
		return '';
	}

	/*override*/protected function __getJSInfo():string
	{
		/*$lSiteId_str = $this->__getMainData()->i_getGetParam(CCRequestParamConst::i_GET_PARAM_ID_SITE);
		$lPageId_str = $this->__getMainData()->i_getGetParam(CCRequestParamConst::i_GET_PARAM_ID_PAGE);

		return 'bsp.main.i_getSiteView(\'' .$lSiteId_str. '\').i_getPagesView().i_getPageView(\'' .$lPageId_str. '\').i_getInfosView().i_getTopCitiesPreviewInfoView()';*/

		return '';
	}

	/*override*/protected function __drawPreJS():void
	{
		/*echo
		'var lInfo_clss = ' .$this->__getJSInfo(). ';
		lInfo_clss.i_setInfoAttrs(\'' .CJSTools::i_convertAssociativeArrayToJSObject($this->__getInfoJSAttrs()). '\');';*/
	}

	/*override*/protected function __drawPostJS():void
	{
		/*echo
		'var lInfo_clss = ' .$this->__getJSInfo(). ';
		lInfo_clss.i_initDOMInfo();';*/
	}
	//...JS

	/*override*/protected function __draw():void
	{
		$this->__drawBody();
	}

	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lLabellistComponentsView_clss = $lComponentsView_clss->i_getLabellistComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);

		//CAPTION...
		$lTextTranslationData_clss = $this->__getTranslationXMLTextComponentNode(self::_CAPTION_TEXT_XML_NODE_ID);

		$lParams_a_arr	= [	CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_INFO_COMPONENT_ID_CAPTION,
							CCCaptionTextComponentView::i_PARAM_ID_COMPONENT_SIZE					=> CCCaptionTextComponentView::i_SIZE_3,
							CCCaptionTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lTextTranslationData_clss->i_getValue(),
							CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_TEXT_COMPONENT_CAPTION_CLASSES,
							CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_TEXT_COMPONENT_ELEMENT_CAPTION_CLASSES,
							//CCCaptionTextComponentView::PARAM_JS_COMPONENT_ID						=> self::___INFO_COMPONENT_ID_CAPTION,
							CCCaptionTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lTextComponentsView_clss->i_getCaptionTextComponentView()->i_draw($lParams_a_arr);
		//...CAPTION

		//CITIES...
		$lRegionData_clss = $lDatabaseData_clss->i_getRegionsTableQueriesData()->___getSelectData()[2/*tomsk*/];
		$lRegionData_clss = CCRegionsSTableData::i_toClassType($lRegionData_clss);

		$lItemsParams_a_arr_arr = [];

		$lStaticParams_a_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE					=> CSiteConst::i_SITE_ID_JOB,
									CCRequestParamConst::i_GET_PARAM_ID_PAGE					=> CJOBPageConst::i_PAGE_ID_CONTENTS,
									CCRequestParamConst::i_GET_PARAM_ID_OPT_REGION_STRING_ID	=> $lRegionData_clss->i_getTableFieldStringId()];

		$lCitiesData_clss_arr = $lDatabaseData_clss->i_getCitiesTableQueriesData()->___getSelectData();
		foreach ($lCitiesData_clss_arr as $lCityData_clss)
		{
			$lCityData_clss = CCCitiesSTableData::i_toClassType($lCityData_clss);

			$lId_int = $lCityData_clss->i_getTableFieldId();
			$lName_str = $lCityData_clss->i_getTableFieldName();

			$lItemsParams_a_arr_arr[] = $this->_generateItemParams($lId_int, $lName_str, CURLTools::i_generateURLByParams(CArrayTools::i_merge($lStaticParams_a_arr, [CCRequestParamConst::i_GET_PARAM_ID_OPT_CITY_STRING_ID	=> $lCityData_clss->i_getTableFieldStringId()])));
		}

		$lParams_a_arr	= [	CCSimpleLabellistComponentView::i_PARAM_ID_ITEMS_PARAMS						=> $lItemsParams_a_arr_arr,
							CCSimpleLabellistComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_LABELLIST_COMPONENT_CITIES_CLASSES,
							CCSimpleLabellistComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_LABELLIST_COMPONENT_ELEMENT_CITIES_CLASSES];
		$lLabellistComponentsView_clss->i_getSimpleLabellistComponentView()->i_draw($lParams_a_arr);
		//...CITIES
	}

	private function _generateItemParams(int $aItemIndex_int, string $aItemName_str, string $aItemValue_str):array
	{
		$lItemParams_a_arr	= [	CCLabellistComponentItem::i_PARAM_ID_OPT_ITEM_COMPONENT_ID	=> $this->__getInfoId(),
								CCLabellistComponentItem::i_PARAM_ID_OPT_ITEM_ID			=> CVariableTools::i_toString($aItemIndex_int),
								CCLabellistComponentItem::i_PARAM_ID_ITEM_NAME				=> $aItemName_str,
								CCLabellistComponentItem::i_PARAM_ID_ITEM_VALUE				=> $aItemValue_str,
								CCLabellistComponentItem::i_PARAM_ID_ITEM_STATE				=> CCLabellistComponentItem::i_ITEM_STATE_ENABLED];
		return $lItemParams_a_arr;
	}

	//PARAMS...
	/*override*/protected function __getInfoId():string
	{
		return self::_INFO_ID;
	}

	/*override*/protected function __getInfoClasses():string
	{
		return self::_CSS_INFO. ' ' .parent::__getInfoClasses();
	}
	//...PARAMS

	//TRANSLATIONS...
	/*override*/protected function __getInfoNodeName():string
	{
		return self::_INFO_XML_NODE_ID;
	}
	//...TRANSLATIONS
}


?>