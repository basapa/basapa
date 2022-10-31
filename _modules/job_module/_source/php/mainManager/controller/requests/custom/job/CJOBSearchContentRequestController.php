<?php


//include_once(ROOT_PHP_DIRECTORY. 'mainManager/controller/requests/custom/job/CJOBRParentRequestController.php');


class CJOBRSearchContentRequestController// extends CJOBRParentRequestController
{
	private $_fName_str;
	private $_fContentType_int;


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
		$this->__fParams_arr 	= array(CParentRequestController::PARAM_TRANSMIT 			=> CJOBRTransmitConst::FORM_SEARCH_CONTENT_NAME,
										CParentRequestController::PARAM_REQUIRED 			=> CJOBRFieldRequiredConst::FORM_SEARCH_CONTENT_NAME,
										CParentRequestController::PARAM_PATTERN 				=> CParentRequestController::VALIDATE_FIELD_NAME,
										CParentRequestController::PARAM_PLACEHOLDER 			=> CFieldPlaceholderConst::PLACEHOLDER_NONE,
										CParentRequestController::PARAM_EVENT_WRONG_LENGTH 	=> CJOBREventConst::SEARCH_CONTENT_WRONG_LENGTH_NAME,
										CParentRequestController::PARAM_EVENT_ILLEGAL_CHARS	=> CJOBREventConst::SEARCH_CONTENT_ILLEGAL_CHARS_NAME,
										CParentRequestController::PARAM_LENGTH_MIN			=> CFieldLengthConst::MIN_NAME_FOR_SEARCH,
										CParentRequestController::PARAM_LENGTH_MAX			=> CJOBRFieldLengthConst::FORM_SEARCH_CONTENT_NAME);
		$this->_fName_str = $this->__validateTextField();

		//content type
		$this->__fParams_arr 	= array(CParentRequestController::PARAM_TRANSMIT 			=> CJOBRTransmitConst::FORM_SEARCH_CONTENT_HIDDEN_CONTENT_TYPE,
										CParentRequestController::PARAM_REQUIRED 			=> CJOBRFieldRequiredConst::FORM_SEARCH_CONTENT_HIDDEN_CONTENT_TYPE);
		$this->_fContentType_int = $this->__validateField();

		if (!$this->__validateFieldsRequired())
		{
			$this->__hostData()->addCookie(CMainConst::COOKIE_EVENT_ID, CJOBREventConst::SEARCH_CONTENT_DATA_EMPTY);

			switch ($this->_fContentType_int)
			{
				case CContentConst::TYPE_JOB_JOB:
				{
					$this->__data()->setRedirect(CPageConst::PAGE_JOB_, CSiteConst::SITE_JOB);
				}break;


				case CContentConst::TYPE_JOB_USERBAR:
				{
					$this->__data()->setRedirect(CPageConst::PAGE_JOB_USERBARS, CSiteConst::SITE_JOB);
				}break;


				default:
					throw new Exception('Unsupported content type: ' .$this->_fContentType_int, CMainConst::ERROR_TYPE_403);
				break;
			}

			return false;
		}

		return $this->__validateFieldsIncorrectlyCount();
	}


	protected function __request()
	{
		$this->__hostData()->setCookie(CMainConst::COOKIE_EVENT_ID, CJOBREventConst::SEARCH_CONTENT_SUCCESS);

		$lParams_arr = array(CParamConst::SEARCHING_NAME => $this->_fName_str);

		switch ($this->_fContentType_int)
		{
			case CContentConst::TYPE_JOB_JOB:
			{
				$this->__data()->setRedirect(CPageConst::PAGE_JOB_, CSiteConst::SITE_JOB, CSubpageConst::SUBPAGE_NONE, CActionConst::ACTION_NONE, $lParams_arr);
			}break;


			case CContentConst::TYPE_JOB_USERBAR:
			{
				$this->__data()->setRedirect(CPageConst::PAGE_JOB_USERBARS, CSiteConst::SITE_JOB, CSubpageConst::SUBPAGE_NONE, CActionConst::ACTION_NONE, $lParams_arr);
			}break;


			default:
				throw new Exception('Unsupported content type: ' .$this->_fContentType_int, CMainConst::ERROR_TYPE_403);
			break;
		}
	}
}


?>
