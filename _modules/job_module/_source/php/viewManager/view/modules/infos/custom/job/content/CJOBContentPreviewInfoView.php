<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBContentPreviewInfoView extends CCInfoView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//PARAM IDS...
	public const i_PARAM_ID_JOB_CONTENT_TABLE_DATA		= 'job_vacancy_content_table_data';
	//...PARAM IDS

	//IDS...
	private const _INFO_ID								= 'job_vacancy_content_preview_info_id';
	private const _INFO_COMPONENT_ID_CAPTION			= self::_INFO_ID. '_01';
	private const _INFO_COMPONENT_ID_WAGE				= self::_INFO_ID. '_02';
	private const _INFO_COMPONENT_ID_DESCRIPTION		= self::_INFO_ID. '_03';
	private const _INFO_COMPONENT_ID_EMPLOYER			= self::_INFO_ID. '_04';
	private const _INFO_COMPONENT_ID_EMPLOYER_CITY		= self::_INFO_ID. '_05';
	private const _INFO_COMPONENT_ID_ADDITION_TIME		= self::_INFO_ID. '_06';
	private const _INFO_COMPONENT_ID_EMPLOYER_LOGO		= self::_INFO_ID. '_07';
	//...IDS

	//CSS...
	private const _CSS_INFO								= 'css_job_vacancy_content_preview_info css_rounded_high';
	//...CSS

	//CLASSES...
	private const _TEXT_COMPONENT_CAPTION_CLASSES					= 'css_text_component_caption';
	private const _TEXT_COMPONENT_ELEMENT_CAPTION_CLASSES			= 'css_text_component_element_caption';
	private const _TEXT_COMPONENT_WAGE_CLASSES						= 'css_text_component_wage';
	private const _TEXT_COMPONENT_ELEMENT_WAGE_CLASSES				= 'css_text_component_element_wage';
	private const _TEXT_COMPONENT_DESCRIPTION_CLASSES				= 'css_text_component_description';
	private const _TEXT_COMPONENT_ELEMENT_DESCRIPTION_CLASSES		= 'css_text_component_element_description';
	private const _TEXT_COMPONENT_EMPLOYER_CLASSES					= 'css_text_component_employer';
	private const _TEXT_COMPONENT_ELEMENT_EMPLOYER_CLASSES			= 'css_text_component_element_employer';
	private const _IMAGE_COMPONENT_EMPLOYER_CITY_CLASSES			= 'css_image_component_employer_city';
	private const _IMAGE_COMPONENT_ELEMENT_EMPLOYER_CITY_CLASSES	= 'css_image_component_element_employer_city';
	private const _IMAGE_COMPONENT_ADDITION_TIME_CLASSES			= 'css_image_component_addition_time';
	private const _IMAGE_COMPONENT_ELEMENT_ADDITION_TIME_CLASSES	= 'css_image_component_element_addition_time';
	private const _IMAGE_COMPONENT_EMPLOYER_LOGO_CLASSES			= 'css_image_component_employer_logo';
	private const _IMAGE_COMPONENT_ELEMENT_EMPLOYER_LOGO_CLASSES	= 'css_image_component_element_employer_logo';
	//...CLASSES

	//TRANSLATIONS...
	private const _INFO_XML_NODE_ID						= 'vacancy_content_preview_info';
	private const _CAPTION_TEXT_XML_NODE_ID				= 'caption_text';
	private const _WAGE_TEXT_XML_NODE_ID				= 'wage_text';
	private const _DESCRIPTION_TEXT_XML_NODE_ID			= 'description_text';
	private const _EMPLOYER_TEXT_XML_NODE_ID			= 'employer_text';
	private const _EMPLOYER_CITY_TEXT_XML_NODE_ID		= 'employer_city_text';
	private const _ADDITION_TIME_TEXT_XML_NODE_ID		= 'addition_time_text';
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
		return '';
	}

	/*override*/protected function __drawPreJS():void
	{
	}

	/*override*/protected function __drawPostJS():void
	{
	}
	//...JS

	/*override*/protected function __draw():void
	{
		$this->__drawHeader();
		$this->__drawBody();
		$this->__drawFooter();
	}

	/*override*/protected function __drawHeaderContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);
		$lContentTableData_clss = $this->_getContentTableData();

		//CAPTION...
		if (!CCTableData::i_isTableDataValueNotSetted($lContentTableData_clss->i_getTableFieldCaption()))
		{
			$lTextTranslationData_clss = $this->__getTranslationXMLTextComponentNode(self::_CAPTION_TEXT_XML_NODE_ID);

			$lValue_str = CStringTools::i_replace($lTextTranslationData_clss->i_getValue(), $lContentTableData_clss->i_getTableFieldCaption(), CStringTools::i_REPLACING_PATTERN_VALUE);

			$lStaticParams_a_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE	=> CSiteConst::i_SITE_ID_JOB,
										CCRequestParamConst::i_GET_PARAM_ID_PAGE	=> CCPageConst::i_PAGE_ID_EXTERNAL_REDIRECT];

			$lDynamicParams_a_arr	= [CCRequestParamConst::i_GET_PARAM_ID_OPT_ID	=> CVariableTools::i_toString($lContentTableData_clss->i_getTableFieldId())];

			$lParams_a_arr = [	CCLinkTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::_INFO_COMPONENT_ID_CAPTION,
								CCLinkTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lValue_str,
								CCLinkTextComponentView::i_PARAM_ID_COMPONENT_HREF					=> CURLTools::i_generateURLByParams($lStaticParams_a_arr, $lDynamicParams_a_arr),
								CCLinkTextComponentView::i_PARAM_ID_OPT_COMPONENT_TARGET			=> CCLinkTextComponentView::i_TARGET_PARAM_VALUE_NEW_WINDOW,
								CCLinkTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_TEXT_COMPONENT_CAPTION_CLASSES,
								CCLinkTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_TEXT_COMPONENT_ELEMENT_CAPTION_CLASSES,
								//CCLinkTextComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
								CCLinkTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
			$lTextComponentsView_clss->i_getLinkTextComponentView()->i_draw($lParams_a_arr);
		}
		//...CAPTION
	}

	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);
		$lContentTableData_clss = $this->_getContentTableData();

		//WAGE...
		if (
				!CCTableData::i_isTableDataValueNotSetted($lContentTableData_clss->i_getTableFieldWageFrom())
				|| !CCTableData::i_isTableDataValueNotSetted($lContentTableData_clss->i_getTableFieldWageTo())
			)
		{
			$lTextTranslationData_clss = $this->__getTranslationXMLTextComponentNode(self::_WAGE_TEXT_XML_NODE_ID);

			$lValue_str = CStringTools::i_replace($lTextTranslationData_clss->i_getValue(), $this->_getFormattedWage($lContentTableData_clss), CStringTools::i_REPLACING_PATTERN_VALUE);

			$lParams_a_arr = [	CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::_INFO_COMPONENT_ID_WAGE,
								CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE				=> $lValue_str,
								CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_TEXT_COMPONENT_WAGE_CLASSES,
								CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_TEXT_COMPONENT_ELEMENT_WAGE_CLASSES,
								//CCSimpleTextComponentView::i_PARAM_JS_COMPONENT_ID				=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
								CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC	=> $this->__getJSInfoComponentInitFunc()];
			$lTextComponentsView_clss->i_getSimpleTextComponentView()->i_draw($lParams_a_arr);
		}
		//...WAGE

		//DESCRIPTION...
		if (!CCTableData::i_isTableDataValueNotSetted($lContentTableData_clss->i_getTableFieldDescription()))
		{
			$lTextTranslationData_clss = $this->__getTranslationXMLTextComponentNode(self::_DESCRIPTION_TEXT_XML_NODE_ID);

			$lValue_str = CStringTools::i_replace($lTextTranslationData_clss->i_getValue(), $lContentTableData_clss->i_getTableFieldDescription(), CStringTools::i_REPLACING_PATTERN_VALUE);

			$lParams_a_arr = [	CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::_INFO_COMPONENT_ID_DESCRIPTION,
								CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE				=> $lValue_str,
								CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_TEXT_COMPONENT_DESCRIPTION_CLASSES,
								CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_TEXT_COMPONENT_ELEMENT_DESCRIPTION_CLASSES,
								//CCSimpleTextComponentView::i_PARAM_JS_COMPONENT_ID				=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
								CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC	=> $this->__getJSInfoComponentInitFunc()];
			$lTextComponentsView_clss->i_getSimpleTextComponentView()->i_draw($lParams_a_arr);
		}
		//...DESCRIPTION
	}

	/*override*/protected function __drawFooterContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lComponentsView_clss = CJOBComponentsView::i_toClassType($lComponentsView_clss);
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();
		$lImageComponentsView_clss = $lComponentsView_clss->i_getImageComponentsView();

		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);
		$lContentTableData_clss = $this->_getContentTableData();

		//EMPLOYER...
		if (!CCTableData::i_isTableDataValueNotSetted($lContentTableData_clss->i_getTableFieldEmployer()))
		{
			$lTextTranslationData_clss = $this->__getTranslationXMLTextComponentNode(self::_EMPLOYER_TEXT_XML_NODE_ID);

			$lValue_str = CStringTools::i_replace($lTextTranslationData_clss->i_getValue(), $lContentTableData_clss->i_getTableFieldEmployer(), CStringTools::i_REPLACING_PATTERN_VALUE);

			$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::_INFO_COMPONENT_ID_EMPLOYER,
								CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE				=> $lValue_str,
								CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_TEXT_COMPONENT_EMPLOYER_CLASSES,
								CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_TEXT_COMPONENT_ELEMENT_EMPLOYER_CLASSES,
								//CCSimpleTextComponentView::i_PARAM_JS_COMPONENT_ID				=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
								CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC	=> $this->__getJSInfoComponentInitFunc()];
			$lTextComponentsView_clss->i_getSimpleTextComponentView()->i_draw($lParams_a_arr);
		}
		//...EMPLOYER

		//EMPLOYER LOGO...
		$lEmployerLogoFullFileName_str = CJOBFileConst::i_getJOBSiteLogoFullFileName($lContentTableData_clss->i_getTableFieldSourceId());
		if (CFileSystemTools::i_isFileExist($lEmployerLogoFullFileName_str))
		{
			$lImageParams_a_arr = CImageTools::i_getImageParams($lEmployerLogoFullFileName_str);
			$lDesignScale_num = 0.6;

			$lParams_a_arr = [	CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_INFO_COMPONENT_ID_EMPLOYER_LOGO,
								CCSimpleImageComponentView::i_PARAM_ID_COMPONENT_FILE_NAME				=> CURLTools::i_applyFullSiteName($lEmployerLogoFullFileName_str),
								CCSimpleImageComponentView::i_PARAM_ID_COMPONENT_WIDTH					=> CVariableTools::i_toInt(CImageTools::i_getImageWidth($lImageParams_a_arr) * $lDesignScale_num),
								CCSimpleImageComponentView::i_PARAM_ID_COMPONENT_HEIGHT					=> CVariableTools::i_toInt(CImageTools::i_getImageHeight($lImageParams_a_arr) * $lDesignScale_num),
								CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_ALT				=> '',
								CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_IMAGE_COMPONENT_EMPLOYER_LOGO_CLASSES,
								CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_IMAGE_COMPONENT_ELEMENT_EMPLOYER_LOGO_CLASSES,
								//CCSimpleImageComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
								CCSimpleImageComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
			$lImageComponentsView_clss->i_getSimpleImageComponentView()->i_draw($lParams_a_arr);
		}
		//...EMPLOYER LOGO

		//EMPLOYER CITY...
		//if (!CCTableData::i_isTableDataValueNotSetted($lContentTableData_clss->i_getTableFieldEmployerCityId()))
		//{
			$lIconFullFileName_str = CJOBFileConst::i_getJOBIconFullFileName(CJOBFileConst::i_IMAGE_FILE_NAME_LOCATION_ICON);
			if (CFileSystemTools::i_isFileExist($lIconFullFileName_str))
			{
				$lTextTranslationData_clss = $this->__getTranslationXMLTextComponentNode(self::_EMPLOYER_CITY_TEXT_XML_NODE_ID);

				$lValue_str = 'Томск';//CStringTools::i_replace($lTextTranslationData_clss->i_getValue(), $this->_getCityNameByCityId($lContentTableData_clss, $lDatabaseData_clss->i_getCitiesTableQueriesData()->i_getSelectCitiesSDataByStates()), CStringTools::i_REPLACING_PATTERN_VALUE);

				$lImageParams_a_arr = CImageTools::i_getImageParams($lIconFullFileName_str);
				$lDesignScale_num = 0.65;

				$lParams_a_arr = [	CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_INFO_COMPONENT_ID_EMPLOYER_CITY,
									CCSimpleImageComponentView::i_PARAM_ID_COMPONENT_FILE_NAME				=> CURLTools::i_applyFullSiteName($lIconFullFileName_str),
									CCSimpleImageComponentView::i_PARAM_ID_COMPONENT_WIDTH					=> CVariableTools::i_toInt(CImageTools::i_getImageWidth($lImageParams_a_arr) * $lDesignScale_num),
									CCSimpleImageComponentView::i_PARAM_ID_COMPONENT_HEIGHT					=> CVariableTools::i_toInt(CImageTools::i_getImageHeight($lImageParams_a_arr) * $lDesignScale_num),
									CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_ALT				=> '',
									CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_POST_NAME			=> $lValue_str,
									CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_IMAGE_COMPONENT_EMPLOYER_CITY_CLASSES,
									CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_IMAGE_COMPONENT_ELEMENT_EMPLOYER_CITY_CLASSES,
									//CCSimpleImageComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
									CCSimpleImageComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
				$lImageComponentsView_clss->i_getSimpleImageComponentView()->i_draw($lParams_a_arr);
			}
		//}
		//...EMPLOYER CITY

		//ADDITION TIME...
		if (!CCTableData::i_isTableDataValueNotSetted($lContentTableData_clss->i_getTableFieldAdditionTime()))
		{
			$lIconFullFileName_str = CJOBFileConst::i_getJOBIconFullFileName(CJOBFileConst::i_IMAGE_FILE_NAME_TIME_ICON);
			if (CFileSystemTools::i_isFileExist($lIconFullFileName_str))
			{
				$lTextTranslationData_clss = $this->__getTranslationXMLTextComponentNode(self::_ADDITION_TIME_TEXT_XML_NODE_ID);

				$lValue_str = CStringTools::i_replace($lTextTranslationData_clss->i_getValue(), $this->_getFormattedAdditionTime($lContentTableData_clss), CStringTools::i_REPLACING_PATTERN_VALUE);

				$lImageParams_a_arr = CImageTools::i_getImageParams($lIconFullFileName_str);
				$lDesignScale_num = 0.65;

				$lParams_a_arr = [	CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_INFO_COMPONENT_ID_ADDITION_TIME,
									CCSimpleImageComponentView::i_PARAM_ID_COMPONENT_FILE_NAME				=> CURLTools::i_applyFullSiteName($lIconFullFileName_str),
									CCSimpleImageComponentView::i_PARAM_ID_COMPONENT_WIDTH					=> CVariableTools::i_toInt(CImageTools::i_getImageWidth($lImageParams_a_arr) * $lDesignScale_num),
									CCSimpleImageComponentView::i_PARAM_ID_COMPONENT_HEIGHT					=> CVariableTools::i_toInt(CImageTools::i_getImageHeight($lImageParams_a_arr) * $lDesignScale_num),
									CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_ALT				=> '',
									CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_POST_NAME			=> $lValue_str,
									CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_IMAGE_COMPONENT_ADDITION_TIME_CLASSES,
									CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_IMAGE_COMPONENT_ELEMENT_ADDITION_TIME_CLASSES,
									//CCSimpleImageComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
									CCSimpleImageComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
				$lImageComponentsView_clss->i_getSimpleImageComponentView()->i_draw($lParams_a_arr);
			}
		}
		//...ADDITION TIME
	}

	private function _getFormattedWage(CJOBContentTableData $aContentTableData_clss):string
	{
		$lTableFieldWageFrom_int = $aContentTableData_clss->i_getTableFieldWageFrom();
		$lTableFieldWageTo_int = $aContentTableData_clss->i_getTableFieldWageTo();
		$lTableFieldWageCurrency_str = $aContentTableData_clss->i_getTableFieldWageCurrency();

		$lFormattedWageFrom_str = CNumberFormatTools::i_formatValueAsMoney($lTableFieldWageFrom_int, $lTableFieldWageCurrency_str);
		$lFormattedWageTo_str = CNumberFormatTools::i_formatValueAsMoney($lTableFieldWageTo_int, $lTableFieldWageCurrency_str);

		if (
				$lTableFieldWageFrom_int > $lTableFieldWageTo_int
				|| $lTableFieldWageFrom_int === $lTableFieldWageTo_int
			)
		{
			return $lFormattedWageFrom_str;
		}
		else if ($lTableFieldWageFrom_int === 0)
		{
			return $lFormattedWageTo_str;
		}

		return $lFormattedWageFrom_str. '-' .$lFormattedWageTo_str;
	}

	private function _getCityNameByCityId(CJOBContentTableData $aContentTableData_clss, array $aCitiesSDataByStates_clss_arr):string
	{
		$lCitiesSTableData_clss = $aCitiesSDataByStates_clss_arr[$aContentTableData_clss->i_getTableFieldEmployerCityId()];
		$lCitiesSTableData_clss = CCCitiesSTableData::i_toClassType($lCitiesSTableData_clss);
		return $lCitiesSTableData_clss->i_getTableFieldName();
	}

	private function _getFormattedAdditionTime(CJOBContentTableData $aContentTableData_clss):string
	{
		$lTableFieldAdditionTime_int = $aContentTableData_clss->i_getTableFieldAdditionTime();

		return CDateTimeTools::i_getFormattedDateTime('D MM', $lTableFieldAdditionTime_int, CDateTimeTools::i_MOUNTHS_NAMES_AS_DATE_PART);//TODO: locale
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

	//JOB CONTENT TABLE DATA...
	private function _getContentTableData():CJOBContentTableData
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_JOB_CONTENT_TABLE_DATA);
	}
	//...JOB CONTENT TABLE DATA
	//...PARAMS

	//TRANSLATIONS...
	/*override*/protected function __getInfoNodeName():string
	{
		return self::_INFO_XML_NODE_ID;
	}
	//...TRANSLATIONS
}


?>