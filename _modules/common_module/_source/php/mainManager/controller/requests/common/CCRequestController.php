<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCRequestController
{
	//COMPONENT VALUE VALIDATION PATTERNS...
	protected const __COMPONENT_VALUE_VALIDATION_PATTERN_LOGIN			= '/^[a-z0-9\_]+$/i';
	protected const __COMPONENT_VALUE_VALIDATION_PATTERN_PASSWORD		= self::__COMPONENT_VALUE_VALIDATION_PATTERN_LOGIN;
	protected const __COMPONENT_VALUE_VALIDATION_PATTERN_TEXT			= '/^(.*)$/imu';
	protected const __COMPONENT_VALUE_VALIDATION_PATTERN_NUMBERS		= '/^[0-9]+$/i';
	protected const __COMPONENT_VALUE_VALIDATION_PATTERN_EMAIL			= '/^(([a-z0-9\_\.\-]{1,38})@([a-z0-9\_\.\-]{1,20})\.([a-z]{2,4}))$/i';
	protected const __COMPONENT_VALUE_VALIDATION_PATTERN_PHONE_NUMBER	= '/^[0-9\+]+$/i';
	protected const __COMPONENT_VALUE_VALIDATION_PATTERN_URL			= '/^[a-zа-яё0-9\-\.:\/]+$/iu';
	//...COMPONENT VALUE VALIDATION PATTERNS
	
	//COMPONENT VALIDATION PARAMS...
	protected const __COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								= 0;
	protected const __COMPONENT_VALIDATION_PARAM_ID_FIELD_ID									= 1;
	protected const __COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						= 2;
	protected const __COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	= 3;
	protected const __COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		= 4;
	protected const __COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID			= 5;
	protected const __COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			= 6;
	protected const __COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT				= 7;
	protected const __COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT				= 8;
	//...COMPONENT VALIDATION PARAMS
	
	//VALIDATION COMPONENT TYPES...
	protected const ___VALIDATION_COMPONENT_TYPE_CHECKBOX		= 0;
	protected const ___VALIDATION_COMPONENT_TYPE_FILEFIELD		= 1;
	protected const ___VALIDATION_COMPONENT_TYPE_LISTBOX		= 2;
	protected const ___VALIDATION_COMPONENT_TYPE_RADIOBUTTON	= 3;
	protected const ___VALIDATION_COMPONENT_TYPE_TEXTAREA		= 4;
	protected const ___VALIDATION_COMPONENT_TYPE_TEXTFIELD		= 5;
	//...VALIDATION COMPONENT TYPES

	private $_fComponentValidationParams_a_arr;


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_update():void
	{
		if ($this->__validateComponents())
		{
			$this->__update();
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}

	protected function __getHostData()
	{
		return $this->__getMainData()->i_getHostData();
	}

	protected function __getViewsData()
	{
		return CViewManager::i_getInstance()->i_getViewsData();
	}

	protected function __getFilesData()
	{
		return CFileManager::i_getInstance()->i_getFilesData();
	}

	/*virtual*/protected function __getFormsMessagesData():CCFormsMessagesData
	{
		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		return $this->__getViewsData()->i_getViewData($lSiteId_str)->i_getFormsMessagesData();
	}

	/*virtual*/protected function __getFormMessagesData():CCFormMessagesData
	{
		return new CCFormMessagesData();
	}

	protected function __getDatabaseData()
	{
		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		return CDatabaseManager::i_getInstance()->i_getDatabasesData()->i_getDatabaseData($lSiteId_str);
	}

	protected function __getDatabaseTablesController()
	{
		return CDatabaseManager::i_getInstance()->i_getDatabaseTablesController();
	}

	/*virtual*/protected function __getComponentsValidationsParams():array
	{
		return [];
	}

	/*virtual*/protected function __getCompositeComponentsValidationsParams():array
	{
		return [];
	}

	/*virtual*/protected function __getHiddenComponentValidationParams():array
	{
		return [];
	}

	/*virtual*/protected function __getEmptyDataFormMessageId():int
	{
		return 0;
	}

	protected function __addFormMessageId($aFormMessageId_int):void
	{
		$this->__getFormMessagesData()->i_addFormMessageData(new CCFormMessageData($aFormMessageId_int));
	}

	/*virtual*/protected function __update():void
	{
	}

	/*virtual*/protected function __validateComponents():bool
	{
		/*$lServerParamValueHttpReferer_str = CHostData::getInstance()->getServerParamValueHttpReferer();
		if (!empty($lServerParamValueHttpReferer_str)
			&& !preg_match('/^' .addcslashes(SITE_FULL_NAME, './'). '/', $lServerParamValueHttpReferer_str))
		{
			CLog::addMessage('Invalid http referer: ' .$lServerParamValueHttpReferer_str);

			$lStaticParams_obj_arr	= array(CParamConst::SITE_ID => CSiteConst::SITE_ID_MAIN,
											CParamConst::PAGE_ID => CPageConst::PAGE_ID_ACCESS_ERROR);
			$this->__getMainData()->setRedirect($lStaticParams_obj_arr);
			return false;
		}

		$lCookieParamValueAntiSpam_str = $this->__getHostData()->getCookieParamValue(CMainConst::COOKIE_ANTI_SPAM);
		$lValue_str = $this->__getPostRequestComponentValue(CFieldIdConst::FORM_COMMON_HIDDEN);
		if (empty($lValue_str)
			|| empty($lCookieParamValueAntiSpam_str))
		{
			CLog::addMessage('Cookie anti spam and hidden value must be not empty!');

			$lStaticParams_obj_arr	= array(CParamConst::SITE_ID => CSiteConst::SITE_ID_MAIN,
											CParamConst::PAGE_ID => CPageConst::PAGE_ID_ACCESS_REQUIREMENT);
			$this->__getMainData()->setRedirect($lStaticParams_obj_arr);
			return false;
		}

		if ($lCookieParamValueAntiSpam_str !== $lValue_str)
		{
			CLog::addMessage('Cookie anti spam and hidden value must be equal!');

			$lStaticParams_obj_arr	= array(CParamConst::SITE_ID => CSiteConst::SITE_ID_MAIN,
											CParamConst::PAGE_ID => CPageConst::PAGE_ID_ACCESS_ERROR);
			$this->__getMainData()->setRedirect($lStaticParams_obj_arr);
			return false;
		}

		$this->__getHostData()->clearCookieParam(CMainConst::COOKIE_ANTI_SPAM);*/

		//optimizations...
		if (
				$this->_areEmptyAllComponentsValues()
				&& $this->_areEmptyAllCompositeComponentsValues()
			)
		{
			$this->__addFormMessageId($this->__getEmptyDataFormMessageId());
			return false;
		}
		//...optimizations

		return $this->__validateMandatoryComponentsValues()
				&& $this->__validateMandatoryCompositeComponentsValues()
				&& $this->_areAllComponentsValid()
				&& $this->_areAllCompositeComponentsValid();
	}

	protected function __validateMandatoryComponentsValues():bool
	{
		$lComponentsValidationsParams_a_arr_arr = $this->__getComponentsValidationsParams();
		$lEmptyDataFormMessageId_int = $this->__getEmptyDataFormMessageId();

		$lCount_int = CArrayTools::i_count($lComponentsValidationsParams_a_arr_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			if (!$this->__validateMandatoryComponentValue($lComponentsValidationsParams_a_arr_arr[$i], $lEmptyDataFormMessageId_int))
			{
				return false;
			}
		}
		return true;
	}

	protected function __validateMandatoryComponentValue(array $aComponentValidationParams_a_arr, int $aEmptyDataFormMessageId_int):bool
	{
		if ($this->__isMandatoryComponentValue($aComponentValidationParams_a_arr))
		{
			if ($this->__isEmptyComponentValue($aComponentValidationParams_a_arr))
			{
				$this->__addFormMessageId($aEmptyDataFormMessageId_int);

				return false;
			}
		}
		return true;
	}

	protected function __isMandatoryComponentValue(array $aComponentValidationParams_a_arr):bool
	{
		return $aComponentValidationParams_a_arr[self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE] === CCFormComponentView::i_FILLING_MODE_ID_MANDATORY;
	}

	protected function __isEmptyComponentValue(array $aComponentValidationParams_a_arr):bool
	{
		$lComponentType_int = $aComponentValidationParams_a_arr[self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE];
		$lComponentId_str = $aComponentValidationParams_a_arr[self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID];

		if ($lComponentType_int === self::___VALIDATION_COMPONENT_TYPE_FILEFIELD)
		{
			$lComponentValue_str = CFileSystemTools::i_getUploadedFullFileName($this->__getFILERequestComponentValue($lComponentId_str));
		}
		else if ($lComponentType_int === self::___VALIDATION_COMPONENT_TYPE_CHECKBOX)
		{
			$lComponentValue_str = $this->__isPOSTRequestComponentValueDefined($lComponentId_str) ? $this->__getPOSTRequestStringComponentValue($lComponentId_str) : '';
		}
		else
		{
			$lComponentValue_var = $this->__getPOSTRequestComponentValue($lComponentId_str);
			if (CVariableTools::i_isArray($lComponentValue_var))
			{
				$lCount_int = CArrayTools::i_count($lComponentValue_var);
				for ($i = 0; $i < $lCount_int; $i++)
				{
					if (!empty($lComponentValue_var[$i]))
					{
						return false;
					}
				}
				return true;
			}
			else
			{
				$lComponentValue_str = CVariableTools::i_toString($lComponentValue_var);
			}
		}

		return empty($lComponentValue_str);
	}

	protected function __validateMandatoryCompositeComponentsValues():bool
	{
		$lCompositeComponentsValidationsParams_a_arr_arr = $this->__getCompositeComponentsValidationsParams();
		$lEmptyDataFormMessageId_int = $this->__getEmptyDataFormMessageId();

		$lCount_int = CArrayTools::i_count($lCompositeComponentsValidationsParams_a_arr_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lComponentsCount_int = CArrayTools::i_count($lCompositeComponentsValidationsParams_a_arr_arr[$i]);
			for ($j = 0; $j < $lComponentsCount_int; $j++)
			{
				$lComponentValidationParams_a_arr = $this->_getComponentValidationParamsByCompositeComponentIndex($lCompositeComponentsValidationsParams_a_arr_arr[$i], $j);

				if (!$this->__validateMandatoryComponentValue($lComponentValidationParams_a_arr, $lEmptyDataFormMessageId_int))
				{
					return false;
				}
			}
		}
		return true;
	}

	/*protected function __getRadiobuttonComponentValue($aComponentValidationParams_obj_arr)
	{
		$this->_fComponentValidationParams_a_arr = $aComponentValidationParams_obj_arr;

		$lComponentValidationFieldId_str = $this->_getComponentValidationFieldId();
		//$lComponentValidationFillingMode_int = $this->_getComponentValidationFillingMode();

		$lComponentValue_str = $this->__getPostRequestComponentValue($lComponentValidationFieldId_str);

		$lIsValidRadiobuttonComponentValue_bl = $this->_validateRadiobuttonComponentValue($lComponentValue_str);
		if (!$lIsValidRadiobuttonComponentValue_bl)
		{
		}

		return $lIsValidRadiobuttonComponentValue_bl ? $lComponentValue_str : '';
	}

	protected function __getCheckboxComponentValue($aComponentValidationParams_obj_arr)
	{
		$this->_fComponentValidationParams_a_arr = $aComponentValidationParams_obj_arr;

		$lComponentValidationFieldId_str = $this->_getComponentValidationFieldId();
		//$lComponentValidationFillingMode_int = $this->_getComponentValidationFillingMode();

		$lComponentValue_str = $this->__getPostRequestComponentValue($lComponentValidationFieldId_str, false);

		$lIsValidCheckboxComponentValue_bl = $this->_validateCheckboxComponentValue($lComponentValue_str);
		if (!$lIsValidCheckboxComponentValue_bl)
		{
		}

		//$this->__getUserComponentFilledData()->addComponentValue($lComponentValidationFieldId_str, $lComponentValue_str, $lIsValidCheckboxComponentValue_bl, $lComponentValidationFillingMode_int);

		return $lIsValidCheckboxComponentValue_bl ? $lComponentValue_str : '';
	}

	protected function __getListboxComponentValue($aComponentValidationParams_obj_arr)
	{
		$this->_fComponentValidationParams_a_arr = $aComponentValidationParams_obj_arr;

		$lComponentValidationFieldId_str = $this->_getComponentValidationFieldId();
		//$lComponentValidationFillingMode_int = $this->_getComponentValidationFillingMode();

		$lComponentValue_str = $this->__getPostRequestComponentValue($lComponentValidationFieldId_str);

		$lIsValidListboxComponentValue_bl = $this->_validateListboxComponentValue($lComponentValue_str);
		if (!$lIsValidListboxComponentValue_bl)
		{
		}

		return $lIsValidListboxComponentValue_bl ? $lComponentValue_str : '';
	}*/

	//VALIDATE COMPONENTS...
	protected function __validateTextareaComponent(array $aComponentValidationParams_a_arr):bool
	{
		return $this->__validateTextfieldComponent($aComponentValidationParams_a_arr);
	}

	protected function __validateTextfieldComponent(array $aComponentValidationParams_a_arr):bool
	{
		$this->_fComponentValidationParams_a_arr = $aComponentValidationParams_a_arr;

		$lComponentValidationFieldId_str = $this->_getComponentValidationFieldId();

		$lComponentValue_var = $this->__getPOSTRequestComponentValue($lComponentValidationFieldId_str);
		if (CVariableTools::i_isArray($lComponentValue_var))
		{
			$lCount_int = CArrayTools::i_count($lComponentValue_var);
			for ($i = 0; $i < $lCount_int; $i++)
			{
				if (!$this->_validateTextfieldComponentValue($lComponentValue_var[$i]))
				{
					return false;
				}
			}
			return true;
		}
		else
		{
			$lComponentValue_str = CVariableTools::i_toString($lComponentValue_var);
		}

		return $this->_validateTextfieldComponentValue($lComponentValue_str);
	}

	protected function __validateRadiobuttonComponent(array $aComponentValidationParams_a_arr):bool
	{
		$this->_fComponentValidationParams_a_arr = $aComponentValidationParams_a_arr;

		$lComponentValidationFieldId_str = $this->_getComponentValidationFieldId();

		$lComponentValue_str = $this->__getPOSTRequestStringComponentValue($lComponentValidationFieldId_str);

		return $this->_validateRadiobuttonComponentValue($lComponentValue_str);
	}

	protected function __validateCheckboxComponent(array $aComponentValidationParams_a_arr):bool
	{
		$this->_fComponentValidationParams_a_arr = $aComponentValidationParams_a_arr;

		$lComponentValidationFieldId_str = $this->_getComponentValidationFieldId();

		$lComponentValue_str = $this->__getPOSTRequestStringComponentValue($lComponentValidationFieldId_str);

		return $this->_validateCheckboxComponentValue($lComponentValue_str);
	}

	protected function __validateFilefieldComponent(array $aComponentValidationParams_a_arr):bool
	{
		$this->_fComponentValidationParams_a_arr = $aComponentValidationParams_a_arr;

		$lComponentValidationFieldId_str = $this->_getComponentValidationFieldId();

		$lComponentValue_a_arr = $this->__getFILERequestComponentValue($lComponentValidationFieldId_str);

		return $this->_validateFilefieldComponentValue($lComponentValue_a_arr);
	}

	protected function __validateListboxComponent(array $aComponentValidationParams_a_arr):bool
	{
		$this->_fComponentValidationParams_a_arr = $aComponentValidationParams_a_arr;

		$lComponentValidationFieldId_str = $this->_getComponentValidationFieldId();

		$lComponentValue_var = $this->__getPOSTRequestComponentValue($lComponentValidationFieldId_str);
		if (CVariableTools::i_isArray($lComponentValue_var))
		{
			$lCount_int = CArrayTools::i_count($lComponentValue_var);
			for ($i = 0; $i < $lCount_int; $i++)
			{
				if (!$this->__validateListboxComponentValue($lComponentValue_var[$i]))
				{
					return false;
				}
			}
			return true;
		}
		else
		{
			$lComponentValue_str = CVariableTools::i_toString($lComponentValue_var);
		}

		return $this->__validateListboxComponentValue($lComponentValue_str);
	}
	//...VALIDATE COMPONENTS

	/*protected function __getTextfieldComponentValue(array $aComponentValidationParams_a_arr):bool
	{
		$this->_fComponentValidationParams_a_arr = $aComponentValidationParams_a_arr;

		$lComponentValidationFieldId_str = $this->_getComponentValidationFieldId();
		$lComponentValidationFillingMode_int = $this->_getComponentValidationFillingMode();

		$lComponentValue_str = $this->__getPostRequestComponentValue($lComponentValidationFieldId_str);

		$lIsValidTextfieldComponentValue_bl = $this->_validateTextfieldComponentValue($lComponentValue_str);
		if (!$lIsValidTextfieldComponentValue_bl)
		{
			$this->_updateMandatoryNonFillingFieldsCount($lComponentValidationFillingMode_int);
		}

		$this->__getUserComponentFilledData()->addComponentValue($lComponentValidationFieldId_str, $lComponentValue_str, $lIsValidTextfieldComponentValue_bl, $lComponentValidationFillingMode_int);

		return $lIsValidTextfieldComponentValue_bl ? $lComponentValue_str : '';
	}*///----------

	/*protected function __validateNumberValue():bool
	{
		$lValue_obj = $this->__validateTextField();

		return !empty($lValue_obj) ? $lValue_obj : 0;
	}*/

	/*protected function __validateStringValue():bool
	{
		$lComponentId_str = $this->_getComponentId();
		$lComponentValueFillingMode_int = $this->_getComponentValueFillingMode();
		$lValue_str = $this->__getPostRequestComponentValue($lComponentId_str);

		if (empty($lValue_str)
			|| $lValue_str == CValueTransmitConst::COMMON_NOT_SELECTED)
		{
			//$this->__updateMandatoryNonFillingFieldsCount($lComponentId_str, $lComponentValueFillingMode_int);
			//return CValueTransmitConst::COMMON_NOT_SELECTED;
			return false;
		}

		//$this->__getUserFieldsData()->addFormField($lComponentId_str, CFieldRequiredConst::FIELD_FILLED_NOT_REQUIRED, $lValue_str);

		//return $lValue_str;
		return true;
	}*/

	//POST REQUEST COMPONENT VALUES...
	protected function __isPOSTRequestComponentValueDefined(string $aFormComponentId_str):bool
	{
		return $this->__getMainData()->i_isPOSTParamDefined($aFormComponentId_str);
	}

	protected function __getPOSTRequestComponentValue(string $aFormComponentId_str)
	{
		return $this->__getMainData()->i_getPOSTParam($aFormComponentId_str);
	}

	protected function __getPOSTRequestStringComponentValue(string $aFormComponentId_str):string
	{
		return CVariableTools::i_toString($this->__getPOSTRequestComponentValue($aFormComponentId_str));
	}

	protected function __getPOSTRequestIntegerComponentValue(string $aFormComponentId_str):int
	{
		return CVariableTools::i_toInt($this->__getPOSTRequestComponentValue($aFormComponentId_str));
	}

	protected function __getPOSTRequestNumberComponentValue(string $aFormComponentId_str):float
	{
		return CVariableTools::i_toNumber($this->__getPOSTRequestComponentValue($aFormComponentId_str));
	}
	//...POST REQUEST COMPONENT VALUES
	
	/*private function _getPosts($aTransmitId_str)
	{
		return isset($_POST[$aTransmitId_str]) ? $_POST[$aTransmitId_str] : null;
	}*/

	//FILE REQUEST COMPONENT VALUES...
	protected function __isFILERequestComponentValueDefined(string $aFormComponentId_str):bool
	{
		return $this->__getMainData()->i_isFILESParamDefined($aFormComponentId_str);
	}

	protected function __getFILERequestComponentValue(string $aFormComponentId_str):array
	{
		return $this->__getMainData()->i_getFILESParam($aFormComponentId_str);
	}
	//...FILE REQUEST COMPONENT VALUES

	private function _areEmptyAllComponentsValues():bool
	{
		$lComponentsValidationsParams_a_arr_arr = $this->__getComponentsValidationsParams();

		$lCount_int = CArrayTools::i_count($lComponentsValidationsParams_a_arr_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			if (!$this->__isEmptyComponentValue($lComponentsValidationsParams_a_arr_arr[$i]))
			{
				return false;
			}
		}
		return true;
	}

	private function _areEmptyAllCompositeComponentsValues():bool
	{
		$lCompositeComponentsValidationsParams_a_arr_arr = $this->__getCompositeComponentsValidationsParams();

		$lCount_int = CArrayTools::i_count($lCompositeComponentsValidationsParams_a_arr_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lComponentsCount_int = CArrayTools::i_count($lCompositeComponentsValidationsParams_a_arr_arr[$i]);
			for ($j = 0; $j < $lComponentsCount_int; $j++)
			{
				$lComponentValidationParams_a_arr = $this->_getComponentValidationParamsByCompositeComponentIndex($lCompositeComponentsValidationsParams_a_arr_arr[$i], $j);

				if (!$this->__isEmptyComponentValue($lComponentValidationParams_a_arr))
				{
					return false;
				}
			}
		}

		return true;
	}

	private function _areAllComponentsValid():bool
	{
		$lComponentsValidationsParams_a_arr_arr = $this->__getComponentsValidationsParams();

		$lCount_int = CArrayTools::i_count($lComponentsValidationsParams_a_arr_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			if (!$this->_validateComponent($lComponentsValidationsParams_a_arr_arr[$i]))
			{
				return false;
			}
		}
		return true;
	}

	private function _areAllCompositeComponentsValid():bool
	{
		$lCompositeComponentsValidationsParams_a_arr_arr = $this->__getCompositeComponentsValidationsParams();

		$lCount_int = CArrayTools::i_count($lCompositeComponentsValidationsParams_a_arr_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lComponentsCount_int = CArrayTools::i_count($lCompositeComponentsValidationsParams_a_arr_arr[$i]);
			for ($j = 0; $j < $lComponentsCount_int; $j++)
			{
				$lComponentValidationParams_a_arr = $this->_getComponentValidationParamsByCompositeComponentIndex($lCompositeComponentsValidationsParams_a_arr_arr[$i], $j);

				if (!$this->_validateComponent($lComponentValidationParams_a_arr))
				{
					return false;
				}
			}
		}
		return true;
	}

	private function _validateComponent(array $aComponentValidationParams_a_arr):bool
	{
		$lResult_bl = false;

		$lValidationComponentType_int = $aComponentValidationParams_a_arr[self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE];
		switch ($lValidationComponentType_int)
		{
			case self::___VALIDATION_COMPONENT_TYPE_CHECKBOX:
			{
				$lResult_bl = $this->__validateCheckboxComponent($aComponentValidationParams_a_arr);
			}break;

			case self::___VALIDATION_COMPONENT_TYPE_FILEFIELD:
			{
				$lResult_bl = $this->__validateFilefieldComponent($aComponentValidationParams_a_arr);
			}break;

			case self::___VALIDATION_COMPONENT_TYPE_LISTBOX:
			{
				$lResult_bl = $this->__validateListboxComponent($aComponentValidationParams_a_arr);
			}break;

			case self::___VALIDATION_COMPONENT_TYPE_RADIOBUTTON:
			{
				$lResult_bl = $this->__validateRadiobuttonComponent($aComponentValidationParams_a_arr);
			}break;

			case self::___VALIDATION_COMPONENT_TYPE_TEXTAREA:
			{
				$lResult_bl = $this->__validateTextareaComponent($aComponentValidationParams_a_arr);
			}break;

			case self::___VALIDATION_COMPONENT_TYPE_TEXTFIELD:
			{
				$lResult_bl = $this->__validateTextfieldComponent($aComponentValidationParams_a_arr);
			}break;

			default:
				new CException('_validateComponent', 'Invalid component type: ' .$lValidationComponentType_int);
			break;
		}

		return $lResult_bl;
	}

	private function _getComponentValidationParamsByCompositeComponentIndex(array $aCompositeComponentValidationParams_a_arr, int $aCompositeComponentIndex_int):array
	{
		/*$lCompositeComponentValidationParams_a_arr = [];

		foreach ($aCompositeComponentValidationParams_a_arr as $lComponentValidationParamId_int => $lComponentValidationParamValue_a_arr)
		{
			$lCompositeComponentValidationParams_a_arr[$lComponentValidationParamId_int] = $lComponentValidationParamValue_a_arr[$aCompositeComponentIndex_int];
		}*/
		return $aCompositeComponentValidationParams_a_arr[$aCompositeComponentIndex_int];
	}

	//VALIDATE COMPONENTS VALUES...
	private function _validateRadiobuttonComponentValue(string $aComponentValue_str):bool
	{
		//$this->_validateComponentValue($aComponentData_arr, $aComponentValue_str);

		//$this->__getUserFieldsData()->addFormField($lTransmit_str, CFieldRequiredConst::FIELD_FILLED_REQUIRED, $aComponentValue_str);

		//return $aComponentValue_str;
		return true;
	}

	private function _validateCheckboxComponentValue(string $aComponentValue_str):bool
	{
		/*if (empty($aComponentValue_str))
		{
			$lComponentValidationFillingMode_int = $this->_getComponentValidationFillingMode();

			return false;
		}*/

		//$this->__getUserFieldsData()->addFormField($lComponentId_str, CFieldRequiredConst::FIELD_FILLED_NOT_REQUIRED, CValueTransmitConst::COMMON_SELECTED);

		//return CValueTransmitConst::COMMON_SELECTED;
		return true;
	}

	private function _validateFilefieldComponentValue(array $aComponentValue_a_arr):bool
	{
		return $this->_validateComponentValueEmptyData(CFileSystemTools::i_getUploadedFullFileName($aComponentValue_a_arr));
	}

	/*virtual*/protected function __validateListboxComponentValue(string $aComponentValue_str):bool
	{
		return $this->_validateComponentValueEmptyData($aComponentValue_str);
	}

	private function _validateTextfieldComponentValue(string $aComponentValue_str):bool
	{
		return $this->_validateComponentValueEmptyData($aComponentValue_str)
				&& $this->_validateComponentValueIllegalChars($aComponentValue_str)
				&& $this->_validateComponentValueWrongCharsCount($aComponentValue_str);
	}

	private function _validateComponentValueEmptyData(string $aComponentValue_str):bool
	{
		$lComponentValidationFillingMode_int = $this->_getComponentValidationFillingMode();
		$lComponentValidationValueEmptyDataEventId_int = $this->_getComponentValidationValueEmptyDataEventId();

		if (
				empty($aComponentValue_str)
				&& $lComponentValidationFillingMode_int === CCFormComponentView::i_FILLING_MODE_ID_MANDATORY
			)
		{
			$this->__addFormMessageId($lComponentValidationValueEmptyDataEventId_int);

			return false;
		}

		return true;
	}

	private function _validateComponentValueIllegalChars(string $aComponentValue_str):bool
	{
		if (empty($aComponentValue_str))
		{
			return true;
		}

		$lComponentValidationValuePattern_str = $this->_getComponentValidationValuePattern();
		$lComponentValidationValueIllegalCharsEventId_int = $this->_getComponentValidationValueIllegalCharsEventId();

		if (!CStringTools::i_searchRegEx($aComponentValue_str, $lComponentValidationValuePattern_str))
		{
			$this->__addFormMessageId($lComponentValidationValueIllegalCharsEventId_int);

			return false;
		}

		return true;
	}

	private function _validateComponentValueWrongCharsCount(string $aComponentValue_str):bool
	{
		if (empty($aComponentValue_str))
		{
			return true;
		}

		$lComponentValidationValueWrongCharsCountEventId_int = $this->_getComponentValidationValueWrongCharsCountEventId();
		$lComponentValidationValueMinCharsCount_int = $this->_getComponentValidationValueMinCharsCount();
		$lComponentValidationValueMaxCharsCount_int = $this->_getComponentValidationValueMaxCharsCount();

		$lComponentValueCharsCount_int = CStringTools::i_length($aComponentValue_str);
		
		if (
				$lComponentValueCharsCount_int < $lComponentValidationValueMinCharsCount_int
				|| $lComponentValueCharsCount_int > $lComponentValidationValueMaxCharsCount_int
			)
		{
			$this->__addFormMessageId($lComponentValidationValueWrongCharsCountEventId_int);

			return false;
		}

		return true;
	}
	//...VALIDATE COMPONENTS VALUES

	//COMPONENT VALIDATION PARAMS...
	private function _getComponentValidationFieldId():string
	{
		return $this->_getComponentValidationParamValue(self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID);
	}
	
	private function _getComponentValidationFillingMode():int
	{
		return CVariableTools::i_toInt($this->_getComponentValidationParamValue(self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE));
	}
	
	private function _getComponentValidationValueWrongCharsCountEventId():int
	{
		return CVariableTools::i_toInt($this->_getComponentValidationParamValue(self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID));
	}

	private function _getComponentValidationValueIllegalCharsEventId():int
	{
		return CVariableTools::i_toInt($this->_getComponentValidationParamValue(self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID));
	}

	private function _getComponentValidationValueEmptyDataEventId():int
	{
		return CVariableTools::i_toInt($this->_getComponentValidationParamValue(self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID));
	}

	private function _getComponentValidationValuePattern():string
	{
		return $this->_getComponentValidationParamValue(self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN);
	}
	
	private function _getComponentValidationValueMinCharsCount():int
	{
		return CVariableTools::i_toInt($this->_getComponentValidationParamValue(self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT));
	}

	private function _getComponentValidationValueMaxCharsCount():int
	{
		return CVariableTools::i_toInt($this->_getComponentValidationParamValue(self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT));
	}

	private function _getComponentValidationParamValue(int $aComponentValidationParamId_int)
	{
		if (!isset($this->_fComponentValidationParams_a_arr[$aComponentValidationParamId_int]))
		{
			new CException('_getComponentValidationParamValue', 'Component validation param must be defined!');
		}
		return $this->_fComponentValidationParams_a_arr[$aComponentValidationParamId_int];
	}
	//...COMPONENT VALIDATION PARAMS
}


?>