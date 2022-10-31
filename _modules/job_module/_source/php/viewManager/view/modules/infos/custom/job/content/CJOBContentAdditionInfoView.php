<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBContentAdditionInfoView extends CCInfoView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	private const _INFO_ID									= 'job_content_info_id';
	private const _INFO_COMPONENT_ID_INFO_NAME				= self::_INFO_ID. '_01';
	private const _INFO_COMPONENT_ID_JOB_IMAGE				= self::_INFO_ID. '_02';
	private const _INFO_COMPONENT_ID_JOB_NAME				= self::_INFO_ID. '_03';
	private const _INFO_COMPONENT_ID_JOB_RESOLUTION			= self::_INFO_ID. '_04';
	private const _INFO_COMPONENT_ID_JOB_FILE_SIZE			= self::_INFO_ID. '_05';
	//private const _INFO_COMPONENT_ID_JOB_DATE_ADDITION	= self::_INFO_ID. '_06';
	//private const _INFO_COMPONENT_ID_JOB_AUTHOR			= self::_INFO_ID. '_07';
	private const _INFO_COMPONENT_ID_JOB_DOWNLOAD			= self::_INFO_ID. '_06';
	//private const _INFO_COMPONENT_ID_JOB_TAGS				= self::_INFO_ID. '_08';
	//...IDS

	//CSS...
	private const _CSS_INFO								= 'css_job_content_addition_info';
	//...CSS

	//CLASSES...
	private const _TEXT_COMPONENT_INFO_NAME_CLASSES						= 'css_text_component_info_name';
	private const _TEXT_COMPONENT_ELEMENT_INFO_NAME_CLASSES				= 'css_text_component_element_info_name';

	private const _INFO_BODY_LEFT_PART_NAME_CLASS						= 'css_info_body_left_part';
	private const _INFO_BODY_RIGHT_PART_NAME_CLASS						= 'css_info_body_right_part';
	private const _INFO_BODY_BOTTOM_PART_NAME_CLASS						= 'css_info_body_bottom_part';

	private const _IMAGE_COMPONENT_JOB_IMAGE_CLASSES					= 'css_image_component_job_image';
	private const _IMAGE_COMPONENT_ELEMENT_JOB_IMAGE_CLASSES			= 'css_image_component_element_job_image';

	private const _LABELFIELD_COMPONENT_JOB_NAME_CLASSES				= 'css_labelfield_component_job_name';
	private const _LABELFIELD_COMPONENT_ELEMENT_JOB_NAME_CLASSES		= 'css_labelfield_component_element_job_name';

	private const _LABELFIELD_COMPONENT_JOB_RESOLUTION_CLASSES			= 'css_labelfield_component_job_resolution';
	private const _LABELFIELD_COMPONENT_ELEMENT_JOB_RESOLUTION_CLASSES	= 'css_labelfield_component_element_job_resolution';

	private const _LABELFIELD_COMPONENT_JOB_FILE_SIZE_CLASSES			= 'css_labelfield_component_job_file_size';
	private const _LABELFIELD_COMPONENT_ELEMENT_JOB_FILE_SIZE_CLASSES	= 'css_labelfield_component_element_job_file_size';

	//private const _LABELFIELD_COMPONENT_JOB_DATE_ADDITION_CLASSES			= 'css_labelfield_component_job_date_addition';
	//private const _LABELFIELD_COMPONENT_ELEMENT_JOB_DATE_ADDITION_CLASSES	= 'css_labelfield_component_element_job_date_addition';

	//private const _LABELFIELD_COMPONENT_JOB_AUTHOR_CLASSES			= 'css_labelfield_component_job_author';
	//private const _LABELFIELD_COMPONENT_ELEMENT_JOB_AUTHOR_CLASSES	= 'css_labelfield_component_element_job_author';

	private const _BUTTON_COMPONENT_JOB_DOWNLOAD_CLASSES				= 'css_button_component_job_download css_show';
	private const _BUTTON_COMPONENT_ELEMENT_JOB_DOWNLOAD_CLASSES		= 'css_button_component_element_job_download css_green css_rounded_low';

	//private const _LABELFIELD_COMPONENT_JOB_TAGS_CLASSES			= 'css_labelfield_component_job_tags';
	//private const _LABELFIELD_COMPONENT_ELEMENT_JOB_TAGS_CLASSES	= 'css_labelfield_component_element_job_tags';
	//...CLASSES
	
	
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
		$this->__drawBody();
	}

	/*override*/protected function __drawHeaderContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		$lInfosTranslationData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getInfosTranslationData();
		$lInfosTranslationData_clss = CJOBTranslationXMLInfosNode::i_toClassType($lInfosTranslationData_clss);
		$lInfoTranslationData_clss = $lInfosTranslationData_clss->i_getContentInfoTranslationData();

		//INFO NAME...
		$lInfoName_str = $lInfoTranslationData_clss->i_getInfoName();

		$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_INFO_COMPONENT_ID_INFO_NAME,
							CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lInfoName_str,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> self::_TEXT_COMPONENT_INFO_NAME_CLASSES,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> self::_TEXT_COMPONENT_ELEMENT_INFO_NAME_CLASSES,
							//CCSimpleTextComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lTextComponentsView_clss->i_getSimpleTextComponentView()->i_draw($lParams_a_arr);
		//...INFO NAME
	}

	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lLabelfieldComponentsView_clss = $lComponentsView_clss->i_getLabelfieldComponentsView();
		$lButtonComponentsView_clss = $lComponentsView_clss->i_getButtonComponentsView();
		$lImageComponentsView_clss = $lComponentsView_clss->i_getImageComponentsView();

		$lInfosTranslationData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getInfosTranslationData();
		$lInfosTranslationData_clss = CJOBTranslationXMLInfosNode::i_toClassType($lInfosTranslationData_clss);
		$lInfoTranslationData_clss = $lInfosTranslationData_clss->i_getContentInfoTranslationData();

		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);
		$lContentTableData_clss = $lDatabaseData_clss->i_getContentTableQueriesData()->i_getContentDataById(/*id*/);
		$lContentTableData_clss = CJOBContentTableData::i_toClassType($lContentTableData_clss);

		CHTMLTagsViewTools::i_drawHTMLTag(CHTMLTagsViewTools::i_HTML_TAG_ID_DIV, true, [CHTMLTagsViewTools::i_HTML_TAG_ATTR_NAME_CLASS => self::_INFO_BODY_LEFT_PART_NAME_CLASS]);
		//JOB IMAGE...
		$lJOBImageTranslationData_clss = $lInfoTranslationData_clss->i_getJOBImageTranslationData();

		$lJOBCategoryStringId_str = $lDatabaseData_clss->i_getContentCategoriesTableQueriesData()->i_getAUCategoryStringIdByAUCategoryId($lContentTableData_clss->i_getTableFieldJOBCategoryId());
		$lubcategoryStringId_str = $lDatabaseData_clss->i_getContentSubcategoriesTableQueriesData()->i_getAUSubcategoryStringIdByAUSubcategoryId($lContentTableData_clss->i_getTableFieldubcategoryId());

		$lJOBImageFullFileName_str = CJOBFileConst::i_getJOBImageFullFileName($lJOBCategoryStringId_str, $lubcategoryStringId_str, $lContentTableData_clss->i_getTableFieldJOBFileName());
		$lJOBImageParams_a_arr = CImageTools::i_getImageParams($lJOBImageFullFileName_str);

		$lParams_a_arr	= [	CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_INFO_COMPONENT_ID_JOB_IMAGE,
							CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lJOBImageTranslationData_clss->i_getName(),
							CCSimpleImageComponentView::i_PARAM_ID_COMPONENT_FILE_NAME				=> CURLTools::i_applyFullSiteName($lJOBImageFullFileName_str),
							CCSimpleImageComponentView::i_PARAM_ID_COMPONENT_WIDTH					=> $lJOBImageParams_a_arr[CImageTools::i_IMAGE_PARAM_ID_WIDTH],
							CCSimpleImageComponentView::i_PARAM_ID_COMPONENT_HEIGHT					=> $lJOBImageParams_a_arr[CImageTools::i_IMAGE_PARAM_ID_HEIGHT],
							CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_IMAGE_COMPONENT_JOB_IMAGE_CLASSES,
							CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_IMAGE_COMPONENT_ELEMENT_JOB_IMAGE_CLASSES,
							//CCSimpleImageComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleImageComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lImageComponentsView_clss->i_getSimpleImageComponentView()->i_draw($lParams_a_arr);
		//...JOB IMAGE
		CHTMLTagsViewTools::i_drawHTMLTag(CHTMLTagsViewTools::i_HTML_TAG_ID_DIV, false);

		CHTMLTagsViewTools::i_drawHTMLTag(CHTMLTagsViewTools::i_HTML_TAG_ID_DIV, true, [CHTMLTagsViewTools::i_HTML_TAG_ATTR_NAME_CLASS => self::_INFO_BODY_RIGHT_PART_NAME_CLASS]);
		//JOB NAME...
		if ($lContentTableData_clss->i_isTableFieldJOBNameDefined())
		{
			$lJOBNameLabelfieldTranslationData_clss = $lInfoTranslationData_clss->i_getJOBNameLabelfieldTranslationData();

			$lParams_a_arr	= [	CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::_INFO_COMPONENT_ID_JOB_NAME,
								CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lJOBNameLabelfieldTranslationData_clss->i_getName(),
								CCSimpleLabelfieldComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lContentTableData_clss->i_getTableFieldJOBName(),
								CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_LABELFIELD_COMPONENT_JOB_NAME_CLASSES,
								CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_LABELFIELD_COMPONENT_ELEMENT_JOB_NAME_CLASSES,
								//CCSimpleLabelfieldComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
								CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
			$lLabelfieldComponentsView_clss->i_getSimpleLabelfieldComponentView()->i_draw($lParams_a_arr);
		}
		//...JOB NAME

		//JOB RESOLUTION...
		$lJOBResolutionLabelfieldTranslationData_clss = $lInfoTranslationData_clss->i_getJOBResolutionLabelfieldTranslationData();

		$lJOBResolutionValue_str = $lJOBImageParams_a_arr[CImageTools::i_IMAGE_PARAM_ID_WIDTH]. ' x ' .$lJOBImageParams_a_arr[CImageTools::i_IMAGE_PARAM_ID_HEIGHT];

		$lParams_a_arr	= [	CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::_INFO_COMPONENT_ID_JOB_RESOLUTION,
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lJOBResolutionLabelfieldTranslationData_clss->i_getName(),
							CCSimpleLabelfieldComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lJOBResolutionValue_str,
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_LABELFIELD_COMPONENT_JOB_RESOLUTION_CLASSES,
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_LABELFIELD_COMPONENT_ELEMENT_JOB_RESOLUTION_CLASSES,
							//CCSimpleLabelfieldComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lLabelfieldComponentsView_clss->i_getSimpleLabelfieldComponentView()->i_draw($lParams_a_arr);
		//...JOB RESOLUTION

		//JOB FILE SIZE...
		$lJOBFileSizeLabelfieldTranslationData_clss = $lInfoTranslationData_clss->i_getJOBFileSizeLabelfieldTranslationData();

		$lJOBFileSizeValue_str = CNumberFormatTools::i_formatValue(CConverterTools::i_getSizeInKBytes(CFileSystemTools::i_getFileSizeInBytes($lJOBImageFullFileName_str)), 1);

		$lParams_a_arr	= [	CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::_INFO_COMPONENT_ID_JOB_FILE_SIZE,
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lJOBFileSizeLabelfieldTranslationData_clss->i_getName(),
							CCSimpleLabelfieldComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lJOBFileSizeValue_str,
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_LABELFIELD_COMPONENT_JOB_FILE_SIZE_CLASSES,
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_LABELFIELD_COMPONENT_ELEMENT_JOB_FILE_SIZE_CLASSES,
							//CCSimpleLabelfieldComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lLabelfieldComponentsView_clss->i_getSimpleLabelfieldComponentView()->i_draw($lParams_a_arr);
		//...JOB FILE SIZE

		//JOB DATE ADDITION...
		/*$lJOBDateAdditionLabelfieldTranslationData_clss = $lInfoTranslationData_clss->i_getJOBDateAdditionLabelfieldTranslationData();

		$lParams_a_arr	= [	CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::_INFO_COMPONENT_ID_JOB_DATE_ADDITION,
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lJOBDateAdditionLabelfieldTranslationData_clss->i_getName(),
							CCSimpleLabelfieldComponentView::i_PARAM_ID_COMPONENT_VALUE					=> 're',
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_LABELFIELD_COMPONENT_JOB_DATE_ADDITION_CLASSES,
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_LABELFIELD_COMPONENT_ELEMENT_JOB_DATE_ADDITION_CLASSES,
							//CCSimpleLabelfieldComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lLabelfieldComponentsView_clss->i_getSimpleLabelfieldComponentView()->i_draw($lParams_a_arr);*/
		//...JOB DATE ADDITION

		//JOB AUTHOR...
		/*$lJOBAuthorLabelfieldTranslationData_clss = $lInfoTranslationData_clss->i_getJOBAuthorLabelfieldTranslationData();

		$lParams_a_arr	= [	CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::_INFO_COMPONENT_ID_JOB_AUTHOR,
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lJOBAuthorLabelfieldTranslationData_clss->i_getName(),
							CCSimpleLabelfieldComponentView::i_PARAM_ID_COMPONENT_VALUE					=> 're',
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_LABELFIELD_COMPONENT_JOB_AUTHOR_CLASSES,
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_LABELFIELD_COMPONENT_ELEMENT_JOB_AUTHOR_CLASSES,
							//CCSimpleLabelfieldComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lLabelfieldComponentsView_clss->i_getSimpleLabelfieldComponentView()->i_draw($lParams_a_arr);*/
		//...JOB AUTHOR

		//JOB TAGS...
		/*$lJOBTagsLabelfieldTranslationData_clss = $lInfoTranslationData_clss->i_getJOBTagsLabelfieldTranslationData();

		$lParams_a_arr	= [	CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::_INFO_COMPONENT_ID_JOB_TAGS,
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lJOBTagsLabelfieldTranslationData_clss->i_getName(),
							CCSimpleLabelfieldComponentView::i_PARAM_ID_COMPONENT_VALUE					=> 're',
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_LABELFIELD_COMPONENT_JOB_TAGS_CLASSES,
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_LABELFIELD_COMPONENT_ELEMENT_JOB_TAGS_CLASSES,
							//CCSimpleLabelfieldComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lLabelfieldComponentsView_clss->i_getSimpleLabelfieldComponentView()->i_draw($lParams_a_arr);*/
		//...JOB TAGS
		CHTMLTagsViewTools::i_drawHTMLTag(CHTMLTagsViewTools::i_HTML_TAG_ID_DIV, false);

		CHTMLTagsViewTools::i_drawHTMLTag(CHTMLTagsViewTools::i_HTML_TAG_ID_DIV, true, [CHTMLTagsViewTools::i_HTML_TAG_ATTR_NAME_CLASS => self::_INFO_BODY_BOTTOM_PART_NAME_CLASS]);
		//JOB DOWNLOAD BUTTON...
		$lJOBDownloadButtonTranslationData_clss = $lInfoTranslationData_clss->i_getJOBDownloadButtonTranslationData();

		$lParams_a_arr	= [	CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::_INFO_COMPONENT_ID_JOB_DOWNLOAD,
							CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_NAME			=> $lJOBDownloadButtonTranslationData_clss->i_getName(),
							CCLinkButtonComponentView::i_PARAM_ID_COMPONENT_HREF				=> CURLTools::i_applyFullSiteName($lJOBImageFullFileName_str),
							CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_IS_NO_FOLLOW	=> true,
							CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_IS_DOWNLOAD		=> true,
							CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_BUTTON_COMPONENT_JOB_DOWNLOAD_CLASSES,
							CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_BUTTON_COMPONENT_ELEMENT_JOB_DOWNLOAD_CLASSES,
							//CCLinkButtonComponentView::i_PARAM_JS_COMPONENT_ID				=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCLinkButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC	=> $this->__getJSInfoComponentInitFunc()];
		$lButtonComponentsView_clss->i_getLinkButtonComponentView()->i_draw($lParams_a_arr);
		//...JOB DOWNLOAD BUTTON
		CHTMLTagsViewTools::i_drawHTMLTag(CHTMLTagsViewTools::i_HTML_TAG_ID_DIV, false);
	}

	/*override*/protected function __drawFooterContent():void
	{
		//$lComponentsView_clss = $this->__getComponentsView();
		//$lButtonComponentsView_clss = $lComponentsView_clss->i_getButtonComponentsView();

		//$lFormsTranslationData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getFormsTranslationData();
		//$lFormsTranslationData_clss = CJOBTranslationXMLFormsNode::i_toClassType($lFormsTranslationData_clss);
		//$lFormTranslationData_clss = $lFormsTranslationData_clss->i_getContentAdditionFormTranslationData();
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
}


?>