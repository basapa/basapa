<?php


//include_once(ROOT_PHP_DIRECTORY. 'mainManager/controller/requests/custom/job/CJOBRParentRequestController.php');


class CJOBREditUserContentStateRequestController //extends CJOBRParentRequestController
{
	private $_fIds_arr;
	private $_fStates_arr;


	/***************************************************
	 * PUBLIC
	 */

	/*
	 * PUBLIC
	 ***************************************************/


	protected function __validateRequestFields()
	{
		parent::__validateRequestFields();

		//state
		$this->__fParams_arr	= array(CParentRequestController::PARAM_TRANSMIT => CJOBRTransmitConst::FORM_EDIT_USER_CONTENT_STATE_ACTION);
		$this->_fStates_arr = $this->__validateFields();

		//id
		$this->__fParams_arr	= array(CParentRequestController::PARAM_TRANSMIT => CJOBRTransmitConst::FORM_EDIT_USER_CONTENT_STATE_ID);
		$this->_fIds_arr = $this->__validateFields();

		$lCount_int = count($this->_fIds_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			if (!isset($this->_fStates_arr[$i]) || !isset($this->_fIds_arr[$i]))
			{
				$this->__data()->addEvent(CJOBREventConst::EDIT_USER_CONTENT_STATE_WRONG_DATA);
				return false;
			}
		}

		if (!$this->__validateFieldsRequired())
		{
			$this->__data()->addEvent(CJOBREventConst::EDIT_USER_CONTENT_STATE_DATA_EMPTY);
			return false;
		}

		return $this->__validateFieldsIncorrectlyCount();
	}


	protected function __request()
	{
		$lUserState_int = $this->__userData()->userState();
		if ($lUserState_int != CControlParamConst::USER_STATE_ACTIVATED)
		{
			$this->__hostData()->addCookie(CMainConst::COOKIE_EVENT_ID, CJOBREventConst::EDIT_USER_CONTENT_STATE_INVALID_USER_STATE);
			$this->__data()->setRedirect(CPageConst::PAGE_JOB_ACCOUNT, CSiteConst::SITE_JOB, $this->__data()->param(CParamConst::SUBPAGE), CActionConst::ACTION_NONE, array(CParamConst::SEARCHING_CITY	=> CParamConst::SEARCHING_ALL));
		}

		if (!$this->_receiveSelectedContentIdsAndStates())
		{
			$this->__data()->addEvent(CJOBREventConst::EDIT_USER_CONTENT_STATE_NO_SET);
			return;
		}

		$this->_updateContentStatesReceivedByUserType();
		
		if (!$this->_validateRequiredStates())
		{
			$this->__data()->addEvent(CJOBREventConst::EDIT_USER_CONTENT_STATE_NO_SET);
			return;
		}

		$lContentType_int = $this->__data()->contentType();
		switch ($lContentType_int)
		{
			case CContentConst::TYPE_JOB_VACANCY:
			{
				if ($this->_validateCompanyState())
				{
					$this->__fResult_str = $this->__customDatabaseController()->getVacancyDatabaseController()->updateDatasStatesByUserId($this->__userData()->userId(), $this->_fIds_arr, $this->_fStates_arr);
				}
			}break;


			case CContentConst::TYPE_JOB_REZUME:
			{
				$this->__fResult_str = $this->__customDatabaseController()->getRezumeDatabaseController()->updateDatasStatesByUserId($this->__userData()->userId(), $this->_fIds_arr, $this->_fStates_arr);
			}break;


			case CContentConst::TYPE_JOB_COMPANY:
			{
				//проверка listbox в__validateFields
				if ($this->_validateSupportedCompanyState())
				{
					$this->__fResult_str = $this->__customDatabaseController()->getCompanyDatabaseController()->updateDatasStatesByUserId($this->__userData()->userId(), $this->_fIds_arr, $this->_fStates_arr);

					$this->_updateVacanciesStatesByCompanyState();
				}
			}break;


			case CContentConst::TYPE_JOB_ADVERTISEMENT:
			{
				$this->__fResult_str = $this->__customDatabaseController()->getAdvertisementDatabaseController()->updateDatasStatesByUserId($this->__userData()->userId(), $this->_fIds_arr, $this->_fStates_arr);
			}break;
		}

		if (!$this->__fResult_str)
		{
			$this->__data()->addEvent(CJOBREventConst::EDIT_USER_CONTENT_STATE_FAILED);
			return;
		}

		$this->__data()->addEvent(CJOBREventConst::EDIT_USER_CONTENT_STATE_SUCCESS);
	}


	private function _receiveSelectedContentIdsAndStates()
	{
		$lTempIds_int_arr = $this->_fIds_arr;
		$lTempStates_int_arr = $this->_fStates_arr;

		$this->_fIds_arr = null;
		$this->_fStates_arr = null;

		$lCount_int = count($lTempIds_int_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lState_int = $lTempStates_int_arr[$i];
			$lId_int = $lTempIds_int_arr[$i];
			if ($lState_int != CControlParamConst::CONTENT_STATE_UNKNOWN)
			{
				$this->_fIds_arr[] = $lId_int;
				$this->_fStates_arr[] = $lState_int;
			}
		}

		return isset($this->_fStates_arr);
	}


	private function _validateAvailableContentState($aState_int)
	{
		return in_array($aState_int, CJOBRControlParamConst::$CONTENT_CONTROL_STATES_FOR_USER);
	}


	private function _validateRequiredStates()
	{
		$lResult_str = $this->__customDatabaseController()->getContentDatabaseController()->getDataByIds($this->_fIds_arr, '', true);
		if (!$lResult_str)
		{
			return false;
		}

		$lTempIds_arr = $this->_fIds_arr;
		$lTempStates_arr = $this->_fStates_arr;

		$this->_fIds_arr = null;
		$this->_fStates_arr = null;

		$lCount_int = count($lTempIds_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lContentId_int = $lTempIds_arr[$i];
			$lContentState_int = $lResult_str[$lContentId_int][CDatabaseConst::COMMON_TABLE_STATE];

			$lState_int = $lTempStates_arr[$i];
			$lId_int = $lTempIds_arr[$i];
			if ($lState_int != $lContentState_int
				&& $this->_validateAvailableContentState($lContentState_int))
			{
				$this->_fIds_arr[] = $lId_int;
				$this->_fStates_arr[] = $lState_int;
			}
		}

		return isset($this->_fStates_arr);
	}


	private function _updateContentStatesReceivedByUserType()
	{
		if ($this->__userData()->isTrusted())
		{
			return;
		}

		$lCount_int = count($this->_fStates_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			if ($this->_fStates_arr[$i] == CControlParamConst::CONTENT_STATE_ACTIVATED)
			{
				$this->_fStates_arr[$i] = CControlParamConst::CONTENT_STATE_REPEAT_MODERATION_WAITING;
			}
		}
	}


	private function _validateCompanyState()
	{
		$lResult_str = $this->__customDatabaseController()->getCompanyDatabaseController()->getDataByUserId($this->__userData()->userId(), '', false);

		$lCompanyState_int = $lResult_str[0][CJOBRDatabaseConst::TABLE_COMPANY_STATE];
		if ($lCompanyState_int != CControlParamConst::CONTENT_STATE_MODERATION_WAITING
			&& $lCompanyState_int != CControlParamConst::CONTENT_STATE_REPEAT_MODERATION_WAITING
			&& $lCompanyState_int != CControlParamConst::CONTENT_STATE_ACTIVATED)
		{
			$this->__data()->addEvent(CJOBREventConst::EDIT_USER_CONTENT_STATE_INVALID_COMPANY_STATE);
			return false;
		}

		return true;
	}


	private function _updateVacanciesStatesByCompanyState()
	{
		$lCompanyId_int = $this->_fIds_arr[0];
		$lCompanyState_int = $this->_fStates_arr[0];
		switch ($lCompanyState_int)
		{
			case CControlParamConst::CONTENT_STATE_MODERATION_WAITING:
			case CControlParamConst::CONTENT_STATE_REPEAT_MODERATION_WAITING:
			{
			}break;


			case CControlParamConst::CONTENT_STATE_DEACTIVATED:
			{
				$this->__customDatabaseController()->getVacancyDatabaseController()->updateStateByCompanyId($lCompanyId_int, CControlParamConst::CONTENT_STATE_DEACTIVATED);
			}break;


			case CControlParamConst::CONTENT_STATE_DELETED:
			{
				$this->__customDatabaseController()->getVacancyDatabaseController()->updateStateByCompanyId($lCompanyId_int, CControlParamConst::CONTENT_STATE_DELETED);
			}break;


			default:
				throw new Exception('Unsupported company state: ' .$lCompanyState_int, CMainConst::ERROR_TYPE_403);
			break;
		}
	}
	
	
	private function _validateSupportedCompanyState()
	{
		$lCompanyState_int = $this->_fStates_arr[0];
		if ($lCompanyState_int == CControlParamConst::CONTENT_STATE_DELETED)
		{
			$this->__data()->addEvent(CJOBREventConst::EDIT_USER_CONTENT_STATE_UNSUPPORTED_COMPANY_STATE);
			return false;
		}
		
		return true;
	}
}


?>
