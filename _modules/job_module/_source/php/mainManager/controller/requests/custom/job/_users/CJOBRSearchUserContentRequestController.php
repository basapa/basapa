<?php


//include_once(ROOT_PHP_DIRECTORY. 'mainManager/controller/requests/custom/job/CJOBRParentRequestController.php');


class CJOBRSearchUserContentRequestController //extends CJOBRParentRequestController
{
	private $_fName_str;


	/***************************************************
	 * PUBLIC
	 */

	/*
	 * PUBLIC
	 ***************************************************/


	protected function __validateRequestFields()
	{
		parent::__validateRequestFields();

		//name
		$this->__fParams_arr 	= array(CParentRequestController::PARAM_TRANSMIT 			=> CJOBRTransmitConst::FORM_SEARCH_USER_CONTENT_NAME,
										CParentRequestController::PARAM_REQUIRED 			=> CJOBRFieldRequiredConst::FORM_SEARCH_USER_CONTENT_NAME,
										CParentRequestController::PARAM_PATTERN 			=> CParentRequestController::VALIDATE_FIELD_NAME,
										CParentRequestController::PARAM_PLACEHOLDER 		=> CFieldPlaceholderConst::PLACEHOLDER_NONE,
										CParentRequestController::PARAM_EVENT_WRONG_LENGTH 	=> CJOBREventConst::SEARCH_USER_CONTENT_WRONG_LENGTH_NAME,
										CParentRequestController::PARAM_EVENT_ILLEGAL_CHARS	=> CJOBREventConst::SEARCH_USER_CONTENT_ILLEGAL_CHARS_NAME,
										CParentRequestController::PARAM_LENGTH_MIN			=> CFieldLengthConst::MIN_NAME_FOR_SEARCH,
										CParentRequestController::PARAM_LENGTH_MAX			=> CJOBRFieldLengthConst::FORM_SEARCH_USER_CONTENT_NAME);
		$this->_fName_str = $this->__validateTextField();

		if (!$this->__validateFieldsRequired())
		{
			$this->__data()->addEvent(CJOBREventConst::SEARCH_USER_CONTENT_DATA_EMPTY);
			return false;
		}

		return $this->__validateFieldsIncorrectlyCount();
	}


	protected function __request()
	{
		$this->__hostData()->setCookie(CMainConst::COOKIE_EVENT_ID, CJOBREventConst::SEARCH_USER_CONTENT_SUCCESS);

		$lParams_arr 	= array(CParamConst::SEARCHING_NAME => $this->_fName_str,
								CParamConst::SEARCHING_CITY => CParamConst::SEARCHING_ALL);
		$this->__data()->setRedirect(CPageConst::PAGE_JOB_ACCOUNT, CSiteConst::SITE_JOB, $this->__data()->param(CParamConst::SUBPAGE), CActionConst::ACTION_NONE, $lParams_arr);
	}
}


?>
