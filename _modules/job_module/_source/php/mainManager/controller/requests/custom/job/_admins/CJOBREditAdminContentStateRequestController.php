<?php


//include_once(ROOT_PHP_DIRECTORY. 'mainManager/controller/requests/custom/job/CJOBRParentRequestController.php');


class CJOBREditAdminContentStateRequestController //extends CJOBRParentRequestController
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
				$this->__data()->addEvent(CJOBREventConst::EDIT_ADMIN_CONTENT_STATE_WRONG_DATA);
				return false;
			}
		}

		if (!$this->__validateFieldsRequired())
		{
			$this->__data()->addEvent(CJOBREventConst::EDIT_ADMIN_CONTENT_STATE_DATA_EMPTY);
			return false;
		}

		return $this->__validateFieldsIncorrectlyCount();
	}


	protected function __request()
	{
		if (!$this->_validateRequiredStates())
		{
			$this->__data()->addEvent(CJOBREventConst::EDIT_ADMIN_CONTENT_STATE_NO_SET);
			return;
		}

		$lContentType_int = $this->__data()->contentType();
		switch ($lContentType_int)
		{
			case CContentConst::TYPE_JOB_VACANCY:
			{
				$this->__fResult_str = $this->__customDatabaseController()->getVacancyDatabaseController()->updateDatasStates($this->_fIds_arr, $this->_fStates_arr);
			}break;


			case CContentConst::TYPE_JOB_REZUME:
			{
				$this->__fResult_str = $this->__customDatabaseController()->getRezumeDatabaseController()->updateDatasStates($this->_fIds_arr, $this->_fStates_arr);
			}break;


			case CContentConst::TYPE_JOB_COMPANY:
			{
				$this->__fResult_str = $this->__customDatabaseController()->getCompanyDatabaseController()->updateDatasStates($this->_fIds_arr, $this->_fStates_arr);

				$this->_updateVacanciesStatesByCompaniesStates();
			}break;


			case CContentConst::TYPE_JOB_ADVERTISEMENT:
			{
				$this->__fResult_str = $this->__customDatabaseController()->getAdvertisementDatabaseController()->updateDatasStates($this->_fIds_arr, $this->_fStates_arr);
			}break;
		}

		if (!$this->__fResult_str)
		{
			$this->__data()->addEvent(CJOBREventConst::EDIT_ADMIN_CONTENT_STATE_FAILED);
			return;
		}

		$this->__data()->addEvent(CJOBREventConst::EDIT_ADMIN_CONTENT_STATE_SUCCESS);
	}


	private function _validateRequiredStates()
	{
		$lTempIds_arr = $this->_fIds_arr;
		$lTempStates_arr = $this->_fStates_arr;

		$this->_fIds_arr = null;
		$this->_fStates_arr = null;

		$lCount_int = count($lTempIds_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lState_int = $lTempStates_arr[$i];
			$lId_int = $lTempIds_arr[$i];
			if ($lState_int != CControlParamConst::CONTENT_STATE_UNKNOWN)
			{
				$this->_fIds_arr[] = $lId_int;
				$this->_fStates_arr[] = $lState_int;
			}
		}

		return isset($this->_fStates_arr);
	}


	private function _updateVacanciesStatesByCompaniesStates()
	{
		$lCount_int = count($this->_fIds_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lCompanyId_int = $this->_fIds_arr[$i];
			$lCompanyState_int = $this->_fStates_arr[$i];
			switch ($lCompanyState_int)
			{
				case CControlParamConst::CONTENT_STATE_ACTIVATED:
				{
				}break;


				case CControlParamConst::CONTENT_STATE_BLOCKED:
				{
					$this->__customDatabaseController()->getVacancyDatabaseController()->updateStateByCompanyId($lCompanyId_int, CControlParamConst::CONTENT_STATE_DEACTIVATED);
				}break;


				case CControlParamConst::CONTENT_STATE_BANNED:
				{
					$this->__customDatabaseController()->getVacancyDatabaseController()->updateStateByCompanyId($lCompanyId_int, CControlParamConst::CONTENT_STATE_BANNED);
				}break;


				default:
					throw new Exception('Unsupported company state: ' .$lCompanyState_int, CMainConst::ERROR_TYPE_403);
				break;
			}
		}
	}
}


?>
