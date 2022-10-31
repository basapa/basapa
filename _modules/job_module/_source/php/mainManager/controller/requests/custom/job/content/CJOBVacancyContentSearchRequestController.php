<?php


//include_once(ROOT_PHP_DIRECTORY. 'mainManager/controller/requests/custom/job/CJOBRParentRequestController.php');


class CJOBVacancyContentSearchRequestController //extends CJOBRParentRequestController
{
	protected $_name;
	protected $_payMin;
	protected $_payMax;
	protected $_agreement;
	protected $_typeWork;
	protected $_idCity;
	protected $_idRegion;
	protected $_idCountry;
	protected $_idCategory;
	protected $_levelEducation;
	protected $_totalWorkExperience;
	protected $_sex;
	protected $_hidden;


	/***************************************************
	 * PUBLIC
	 */

	/*
	 * PUBLIC
	 ***************************************************/


	protected function __validateRequestFields()
	{
		parent::__validateRequestFields();

		$this->__fParams_arr 	= array(CParentRequestController::PARAM_TRANSMIT 			=> CJOBRTransmitConst::FORM_ADD_JOB_NAME,
										CParentRequestController::PARAM_REQUIRED 			=> CFieldRequiredConst::FIELD_NOT_REQUIRED,
										CParentRequestController::PARAM_PATTERN 				=> CParentRequestController::VALIDATE_FIELD_NAME,
										CParentRequestController::PARAM_PLACEHOLDER 			=> CFieldPlaceholderConst::PLACEHOLDER_NONE,
										CParentRequestController::PARAM_EVENT_WRONG_LENGTH 	=> CJOBREventConst::ADD_JOB_WRONG_LENGTH_JOB,
										CParentRequestController::PARAM_EVENT_ILLEGAL_CHARS	=> CJOBREventConst::ADD_JOB_ILLEGAL_CHARS_JOB,
										CParentRequestController::PARAM_LENGTH_MIN			=> CFieldLengthConst::MIN_NAME,
										CParentRequestController::PARAM_LENGTH_MAX			=> CJOBRFieldLengthConst::FORM_ADD_JOB_NAME);
		$this->_name = $this->__validateTextField();

		$this->__fParams_arr 	= array(CParentRequestController::PARAM_TRANSMIT 			=> CJOBRTransmitConst::FORM_ADD_JOB_PAY_MIN,
										CParentRequestController::PARAM_REQUIRED 			=> CFieldRequiredConst::FIELD_NOT_REQUIRED,
										CParentRequestController::PARAM_PATTERN 				=> CParentRequestController::VALIDATE_FIELD_PAY,
										CParentRequestController::PARAM_PLACEHOLDER 			=> CFieldPlaceholderConst::PLACEHOLDER_NONE,
										CParentRequestController::PARAM_EVENT_WRONG_LENGTH 	=> CJOBREventConst::ADD_JOB_WRONG_LENGTH_PAYS,
										CParentRequestController::PARAM_EVENT_ILLEGAL_CHARS	=> CJOBREventConst::ADD_JOB_ILLEGAL_CHARS_PAYS,
										CParentRequestController::PARAM_LENGTH_MIN			=> CFieldLengthConst::MIN_PAY,
										CParentRequestController::PARAM_LENGTH_MAX			=> CJOBRFieldLengthConst::FORM_ADD_JOB_PAYS);
		$this->_payMin = $this->__validateNumberField();

		$this->__fParams_arr 	= array(CParentRequestController::PARAM_TRANSMIT 			=> CJOBRTransmitConst::FORM_ADD_JOB_PAY_MAX,
										CParentRequestController::PARAM_REQUIRED 			=> CFieldRequiredConst::FIELD_NOT_REQUIRED,
										CParentRequestController::PARAM_PATTERN 				=> CParentRequestController::VALIDATE_FIELD_PAY,
										CParentRequestController::PARAM_PLACEHOLDER 			=> CFieldPlaceholderConst::PLACEHOLDER_NONE,
										CParentRequestController::PARAM_EVENT_WRONG_LENGTH 	=> CJOBREventConst::ADD_JOB_WRONG_LENGTH_PAYS,
										CParentRequestController::PARAM_EVENT_ILLEGAL_CHARS	=> CJOBREventConst::ADD_JOB_ILLEGAL_CHARS_PAYS,
										CParentRequestController::PARAM_LENGTH_MIN			=> CFieldLengthConst::MIN_PAY,
										CParentRequestController::PARAM_LENGTH_MAX			=> CJOBRFieldLengthConst::FORM_ADD_JOB_PAYS);
		$this->_payMax = $this->__validateNumberField();

		$this->__fParams_arr 	= array(CParentRequestController::PARAM_TRANSMIT 			=> CJOBRTransmitConst::FORM_ADD_JOB_AGREEMENT,
										CParentRequestController::PARAM_REQUIRED 			=> CFieldRequiredConst::FIELD_NOT_REQUIRED);
		$this->_agreement = $this->__validateCheckBox();

		$this->__fParams_arr 	= array(CParentRequestController::PARAM_TRANSMIT 			=> CJOBRTransmitConst::FORM_ADD_JOB_TYPE_WORK,
										CParentRequestController::PARAM_REQUIRED 			=> CFieldRequiredConst::FIELD_NOT_REQUIRED);
		$this->_typeWork = $this->__validateListBox();

		$this->__fParams_arr 	= array(CParentRequestController::PARAM_TRANSMIT 			=> CJOBRTransmitConst::FORM_ADD_JOB_CITY,
										CParentRequestController::PARAM_REQUIRED 			=> CFieldRequiredConst::FIELD_NOT_REQUIRED);
		$this->_idCity = $this->__validateListBox();

		$this->__fParams_arr 	= array(CParentRequestController::PARAM_TRANSMIT 			=> CJOBRTransmitConst::FORM_ADD_JOB_REGION,
										CParentRequestController::PARAM_REQUIRED 			=> CFieldRequiredConst::FIELD_NOT_REQUIRED);
		$this->_idRegion = $this->__validateListBox();

		$this->__fParams_arr 	= array(CParentRequestController::PARAM_TRANSMIT 			=> CJOBRTransmitConst::FORM_ADD_JOB_CATEGORY,
										CParentRequestController::PARAM_REQUIRED 			=> CFieldRequiredConst::FIELD_NOT_REQUIRED);
		$this->_idCategory = $this->__validateListBox();

		$this->__fParams_arr 	= array(CParentRequestController::PARAM_TRANSMIT 			=> CJOBRTransmitConst::FORM_ADD_JOB_LEVEL_EDUCATION,
										CParentRequestController::PARAM_REQUIRED 			=> CFieldRequiredConst::FIELD_NOT_REQUIRED);
		$this->_levelEducation = $this->__validateListBox();

		$this->__fParams_arr 	= array(CParentRequestController::PARAM_TRANSMIT 			=> CJOBRTransmitConst::FORM_ADD_JOB_TOTAL_WORK_EXPERIENCE,
										CParentRequestController::PARAM_REQUIRED 			=> CFieldRequiredConst::FIELD_NOT_REQUIRED);
		$this->_totalWorkExperience = $this->__validateListBox();

		$this->__fParams_arr 	= array(CParentRequestController::PARAM_TRANSMIT 			=> CJOBRTransmitConst::FORM_ADD_JOB_SEX,
										CParentRequestController::PARAM_REQUIRED 			=> CFieldRequiredConst::FIELD_NOT_REQUIRED);
		$this->_sex = $this->__validateListBox();

		if (!$this->__validateFieldsRequired())
		{
			$this->__data()->addEvent(CJOBREventConst::EXTENDED_SEARCH_JOB_DATA_EMPTY);
			return false;
		}

		return $this->__validateFieldsIncorrectlyCount();
	}


	protected function __request()
	{
		$this->__hostData()->addCookie(CMainConst::COOKIE_EVENT_ID, CJOBREventConst::EXTENDED_SEARCH_JOB_SUCCESS);

		$lParams_arr 	= array(CParamConst::SEARCHING_CATEGORY 				=> $this->_idCategory,
								CParamConst::SEARCHING_NAME 					=> $this->_name,
								CParamConst::SEARCHING_PAY_MIN 					=> $this->_payMin,
								CParamConst::SEARCHING_PAY_MAX 					=> $this->_payMax,
								CParamConst::SEARCHING_AGREEMENT 				=> $this->_agreement,
								CParamConst::SEARCHING_CITY 					=> $this->_idCity,
								CParamConst::SEARCHING_REGION 					=> $this->_idRegion,
								CParamConst::SEARCHING_TYPE_WORK 				=> $this->_typeWork,
								CParamConst::SEARCHING_LEVEL_EDUCATION 			=> $this->_levelEducation,
								CParamConst::SEARCHING_TOTAL_WORK_EXPERIENCE 	=> $this->_totalWorkExperience,
								CParamConst::SEARCHING_SEX 						=> $this->_sex);

		$this->__data()->setRedirect(CPageConst::PAGE_JOB_VACANCIES, CSiteConst::SITE_JOB, CSubpageConst::SUBPAGE_NONE, CActionConst::ACTION_NONE, $lParams_arr);
	}
}


?>
