<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBContentEditingFormView extends CCFormView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	public const i_ID_FORM								= 'job_content_edition_form_id';
	public const i_FORM_COMPONENT_ID_FORM_NAME			= self::i_ID_FORM. '_form_name';
	public const i_FORM_COMPONENT_ID_AMOUNT				= self::i_ID_FORM. '_amount';
	public const i_FORM_COMPONENT_ID_NAME				= self::i_ID_FORM. '_name';
	public const i_FORM_COMPONENT_ID_EMAIL				= self::i_ID_FORM. '_email';
	public const i_FORM_COMPONENT_ID_MESSAGE			= self::i_ID_FORM. '_message';
	public const i_FORM_COMPONENT_ID_SUBMIT				= self::i_ID_FORM. '_submit';
	//...IDS

	//FILLING_MODES...
	public const i_FILLING_MODE_FIELD_AMOUNT			= CCFormComponentView::i_FILLING_MODE_ID_MANDATORY;
	public const i_FILLING_MODE_FIELD_NAME				= CCFormComponentView::i_FILLING_MODE_ID_NON_MANDATORY;
	public const i_FILLING_MODE_FIELD_EMAIL				= CCFormComponentView::i_FILLING_MODE_ID_NON_MANDATORY;
	public const i_FILLING_MODE_FIELD_MESSAGE			= CCFormComponentView::i_FILLING_MODE_ID_NON_MANDATORY;
	//...FILLING_MODES

	//CHARS COUNT...
	public const i_MIN_CHARS_COUNT_FIELD_AMOUNT			= 1;
	public const i_MAX_CHARS_COUNT_FIELD_AMOUNT			= 64;

	public const i_MIN_CHARS_COUNT_FIELD_NAME			= 1;
	public const i_MAX_CHARS_COUNT_FIELD_NAME			= 64;

	public const i_MIN_CHARS_COUNT_FIELD_EMAIL			= 1;
	public const i_MAX_CHARS_COUNT_FIELD_EMAIL			= 64;

	public const i_MIN_CHARS_COUNT_FIELD_MESSAGE		= 1;
	public const i_MAX_CHARS_COUNT_FIELD_MESSAGE		= 1024;
	//...CHARS COUNT

	//CSS...
	private const _CSS_FORM								= 'css_job_content_edition_form';
	//...CSS


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getFormPOSTRequestId():string
	{
	//	return CCRequestConst::i_REQUEST_ID_USER_MESSAGE_ADDITION;
	}

	//JS...
	/*override*/protected function __isJSSupportAllowed():bool
	{
		return false;
	}

	/*override*/protected function __drawPreJS():void
	{
		/*$lComponentValidationParams_obj_arr = CRegistrationRequestController::$COMPONENT_VALIDATION_PARAMS_LOGIN_TEXTFIELD;
		$lRegistrationEventView_clss = CJOBodulesView::getInstance()->getEventsView()->getRegistrationEventView();

		$lJSComponentValidationParams_obj_arr = $this->__generateJSComponentValidationParams($lComponentValidationParams_obj_arr, $lRegistrationEventView_clss);

		echo
		'var lJSForm_clss = ' .$this->__getJSForm(). ';
		*///lJSForm_clss.JSSetFormAttrs(\'' .CJSUtil::convertAssociativeArrayToJSObject($this->__getFormJSAttrs()). '\');
		//lJSForm_clss.JSSetFormComponentValidationParams(\'' .CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD. '\', \'' .$lJSComponentValidationParams_obj_arr. '\');';

		/*echo
		'var lJSForm_clss = ' .$this->__getJSForm(). ';
		lJSForm_clss.JSSetFormAttrs(\'' .CJSTools::i_convertAssociativeArrayToJSObject($this->__getFormJSAttrs()). '\');';*/
	}

	/*override*/protected function __drawPostJS():void
	{
	/*	echo
		'var lJSForm_clss = ' .$this->__getJSForm(). ';
		lJSForm_clss.JSInitDOMForm();';*/
	}

	/*override*/protected function __getJSForm():string
	{
		/*$lMainData_clss = $this->__getMainData();
		$lSiteId_str = $lMainData_clss->i_getGETParamSiteId();
		$lPageId_str = $lMainData_clss->i_getGETParamPageId();

		return 'bsp.CMain.i_getSite(\'' .$lSiteId_str. '\').i_getPages().i_getPage(\'' .$lPageId_str. '\').i_getForms().i_getContentAdditionFormView()';*/

		return '';
	}
	//...JS

	/*override*/protected function __drawHeaderContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		//$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		//$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();
		//$lTranslationData_clss = $this->__getXMLFilesData()->i_getXMLFileData($lSiteId_str)->i_getTranslationXMLFileData();
		//$lFormTranslationData_clss = $lTranslationData_clss->i_getFormsTranslationData()->i_getPaymentFormTranslationData();

		//FORM NAME...
		/*$lFormName_str = $lFormTranslationData_clss->getFormName();

		$lParams_a_arr	= [	CCCaptionTextComponentView::PARAM_ID						=> self::FORM_COMPONENT_ID_FORM_NAME,
								CCCaptionTextComponentView::PARAM_VALUE						=> $lFormName_str,
								CCCaptionTextComponentView::PARAM_CLASSES					=> 'css_text_component_form_name',
								CCCaptionTextComponentView::PARAM_ELEMENT_CLASSES			=> 'css_text_component_element_form_name',
								//CCCaptionTextComponentView::PARAM_JS_COMPONENT_ID			=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
								CCCaptionTextComponentView::PARAM_JS_COMPONENT_INIT_FUNC	=> $this->__getJSFormComponentInitFunc()];
		$lTextComponentsView_clss->getCaptionTextComponentView()->draw($lParams_a_arr);*/
		//...FORM NAME
	}

	/*override*/protected function __drawBodyContent():void
	{
		/*if (!$this->__userFieldsData()->isFormNeedFilled())
		{
			$lContentData_arr = $this->__databaseCustomData()->vacancyData(CJOBRDatabaseData::TYPE_VACANCY_DATA_BY_ID);

			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_NAME, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_NAME]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_PAY_MIN, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_PAY_MIN]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_PAY_MAX, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_PAY_MAX]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_AGREEMENT, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_AGREEMENT]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_TYPE_WORK, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_TYPE_WORK]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_TERMS, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_TERMS]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_REGION, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_REGION_ID]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_CITY, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_CITY_ID]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_MOVE_OTHER_CITY, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_MOVE_ANOTHER_CITY]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_SUBCATEGORY_1, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_CATEGORY_ID]. '_' .$lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_SUBCATEGORY_ID]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_SUBCATEGORY_2, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_CATEGORY_ID_2]. '_' .$lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_SUBCATEGORY_ID_2]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_SUBCATEGORY_3, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_CATEGORY_ID_3]. '_' .$lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_SUBCATEGORY_ID_3]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_SUBCATEGORY_4, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_CATEGORY_ID_4]. '_' .$lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_SUBCATEGORY_ID_4]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_SUBCATEGORY_5, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_CATEGORY_ID_5]. '_' .$lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_SUBCATEGORY_ID_5]);

			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_AGE_MIN, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_AGE_MIN]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_AGE_MAX, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_AGE_MAX]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_LEVEL_EDUCATION, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_LEVEL_EDUCATION]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_TOTAL_WORK_EXPERIENCE, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_TOTAL_WORK_EXPERIENCE]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_SEX, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_SEX]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_EXPERIENCE, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_EXPERIENCE]);

			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_CONTACT_NAME, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_CONTACT_NAME]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_PHONE_CODE, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_PHONE_CODE]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_PHONE_NUMBER, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_PHONE_NUMBER]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_PHONE_ADDITIONAL, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_PHONE_ADDITIONAL]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_ADDITIONAL_PHONE_CODE, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_ADDITIONAL_PHONE_CODE]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_ADDITIONAL_PHONE_NUMBER, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_ADDITIONAL_PHONE_NUMBER]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_ADDITIONAL_PHONE_ADDITIONAL, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_ADDITIONAL_PHONE_ADDITIONAL]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_EMAIL, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_EMAIL]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_ICQ, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_ICQ]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_SKYPE, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_SKYPE]);

			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_ADDITIONAL, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_ADDITIONAL]);
			$this->__userFieldsData()->addFormField(CJOBRTransmitConst::FORM_ADD_JOB_TYPE_STORAGE, false, $lContentData_arr[CJOBRDatabaseConst::TABLE_JOB_TYPE_STORAGE]);
		}

		parent::__bodyContent();*/
	}

	/*override*/protected function __drawFooterContent():void
	{
		//button
		/*$_params 	= array(CComponentParam::BUTTON_ID 					=> CRequestConst::REQUEST_EDIT_JOB,
							CComponentParam::BUTTON_NAME 				=> CFieldNameConst::BUTTON_SAVE_CHANGED,
							CComponentParam::BUTTON_TYPE 				=> CButton::TYPE_SUBMIT_WITH_PROGRESS_BAR,
							CComponentParam::BUTTON_COLOR 				=> CButton::COLOR_BLUE,
							CComponentParam::BUTTON_STYLE 				=> 'display:inline-block;');
		$this->__components()->button()->draw($_params);

		//text
		$_params 	= array(CComponentParam::TEXT_TYPE 					=> CText::TYPE_LOW,
							CComponentParam::TEXT_NAME 					=> CFieldDescriptionConst::TEXT_FIELD_REQUIRED,
							CComponentParam::TEXT_STYLE					=> 'float:right;',
							CComponentParam::TEXT_STYLE_COMPONENT 		=> 'text-align:right;');
		$this->__components()->text()->draw($_params);*/
	}

	//PARAMS...
	/*override*/protected function __getFormId():string
	{
		return self::i_ID_FORM;
	}

	/*override*/protected function __getFormClasses():string
	{
		return self::_CSS_FORM. ' ' .parent::__getFormClasses();
	}

	/*override*/protected function __getFormAction():string
	{
		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		$lStaticParams_a_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE	=> $lSiteId_str,
									CCRequestParamConst::i_GET_PARAM_ID_PAGE	=> CCPageConst::i_PAGE_ID_MAIN];
		return CURLTools::i_generateURLByParams($lStaticParams_a_arr);


		/*$lParams_arr 	= array(CParamConst::PAGE 		=> CPageConst::PAGE_JOB_VACANCY,
								CParamConst::SITE 		=> CSiteConst::SITE_JOB,
								CParamConst::SUBPAGE 	=> CSubpageConst::SUBPAGE_NONE,
								CParamConst::ACTION 	=> CActionConst::ACTION_EDIT,
								CParamConst::ID			=> $this->__data()->param(CParamConst::ID),
								CParamConst::NAME		=> $this->__data()->param(CParamConst::NAME));*/
	}
	//...PARAMS
}


?>
