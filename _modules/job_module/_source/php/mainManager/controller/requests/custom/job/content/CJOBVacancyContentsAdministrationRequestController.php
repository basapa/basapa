<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBVacancyContentsAdministrationRequestController extends CCRequestController
{
	private const _GROUP_COMPONENTS_VALIDATION_PARAMS_ACTIONS_LISTBOXES	= [	self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID								=> CJOBContentsAdministrationFormView::i_FORM_COMPONENT_ID_ACTIONS,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE						=> self::___VALIDATION_COMPONENT_TYPE_LISTBOX,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE				=> CCFormComponentView::i_FILLING_MODE_ID_NON_MANDATORY,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID	=> CJOBVacancyContentsAdministrationFormMessagesData::i_FORM_MESSAGE_ID_ACTIONS_EMPTY_DATA];

	private const _GROUP_COMPONENTS_VALIDATION_PARAMS_IDS_TEXTFIELDS	= [	self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CJOBContentsAdministrationFormView::i_FORM_COMPONENT_ID_CONTENT_ID,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> self::___VALIDATION_COMPONENT_TYPE_TEXTFIELD,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CCFormComponentView::i_FILLING_MODE_ID_MANDATORY,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> self::__COMPONENT_VALUE_VALIDATION_PATTERN_NUMBERS,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CJOBVacancyContentsAdministrationFormMessagesData::i_FORM_MESSAGE_ID_CONTENT_ID_ILLEGAL_CHARS,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CJOBVacancyContentsAdministrationFormMessagesData::i_FORM_MESSAGE_ID_CONTENT_ID_WRONG_CHARS_COUNT,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID			=> CJOBVacancyContentsAdministrationFormMessagesData::i_FORM_MESSAGE_ID_CONTENT_ID_EMPTY_DATA,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT				=> CJOBContentsAdministrationFormView::i_MIN_CHARS_COUNT_FIELD_CONTENT_ID,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT				=> CJOBContentsAdministrationFormView::i_MAX_CHARS_COUNT_FIELD_CONTENT_ID];

	private const _COMPONENTS_VALIDATIONS_PARAMS	= [	self::_GROUP_COMPONENTS_VALIDATION_PARAMS_ACTIONS_LISTBOXES,
														self::_GROUP_COMPONENTS_VALIDATION_PARAMS_IDS_TEXTFIELDS];

	private const _COMPOSITE_COMPONENTS_VALIDATIONS_PARAMS	= [];

	private const _COMPONENT_VALIDATION_PARAMS_HIDDEN_TEXTFIELD	= [];


	/***************************************************
	 * PUBLIC
	 */

	/*
	 * PUBLIC
	 ***************************************************/

	/*override*/protected function __getFormMessagesData():CCFormMessagesData
	{
		$lFormsMessagesData_clss = $this->__getFormsMessagesData();
		$lFormsMessagesData_clss = CJOBFormsMessagesData::i_toClassType($lFormsMessagesData_clss);
		return $lFormsMessagesData_clss->i_getVacancyContentsAdministrationFormMessagesData();
	}

	/*override*/protected function __getComponentsValidationsParams():array
	{
		return self::_COMPONENTS_VALIDATIONS_PARAMS;
	}

	/*override*/protected function __getCompositeComponentsValidationsParams():array
	{
		return self::_COMPOSITE_COMPONENTS_VALIDATIONS_PARAMS;
	}

	/*override*/protected function __getHiddenComponentValidationParams():array
	{
		return self::_COMPONENT_VALIDATION_PARAMS_HIDDEN_TEXTFIELD;
	}

	/*override*/protected function __getEmptyDataFormMessageId():int
	{
		return CJOBVacancyContentsAdministrationFormMessagesData::i_FORM_MESSAGE_ID_EMPTY_DATA;
	}

	/*override*/protected function __update():void
	{
		$lComponentFieldId_str = self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID;
		$lActionsListboxesComponentValues_str_arr = $this->__getPOSTRequestComponentValue(self::_GROUP_COMPONENTS_VALIDATION_PARAMS_ACTIONS_LISTBOXES[$lComponentFieldId_str]);
		$lContentIdsTextfieldsComponentValues_str_arr = $this->__getPOSTRequestComponentValue(self::_GROUP_COMPONENTS_VALIDATION_PARAMS_IDS_TEXTFIELDS[$lComponentFieldId_str]);

		$lIds_int_arr = CVariableTools::i_toIntArray($lContentIdsTextfieldsComponentValues_str_arr);
		$lStates_int_arr = CVariableTools::i_toIntArray($lActionsListboxesComponentValues_str_arr);

		$lUniqueStates_int_arr = CArrayTools::i_getUniqueValues($lStates_int_arr);
		if (
				CArrayTools::i_count($lUniqueStates_int_arr) === 1
				&& $lUniqueStates_int_arr[0] === CCListboxComponentItem::i_EMPTY_ITEM_VALUE
			)
		{
			$this->__addFormMessageId(CJOBVacancyContentsAdministrationFormMessagesData::i_FORM_MESSAGE_ID_FAILED);
		}
		else
		{
			$this->__getDatabaseTablesController()->i_getJOBMySQLDatabaseTablesController()->i_getMySQLDatabaseContentTableController()->___updateDataStatesByIds($lIds_int_arr, $lStates_int_arr);

			$this->__addFormMessageId(CJOBVacancyContentsAdministrationFormMessagesData::i_FORM_MESSAGE_ID_SUCCESS);
		}
	}
}


?>
