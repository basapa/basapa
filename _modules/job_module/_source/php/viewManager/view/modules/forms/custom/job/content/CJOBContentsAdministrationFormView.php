<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBContentsAdministrationFormView extends CCFormView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//PARAM IDS...
	public const i_PARAM_ID_JOB_CONTENT_TABLE_DATA		= 'job_vacancy_content_table_data';
	//...PARAM IDS

	//IDS...
	private const _ID_FORM									= 'job_contents_administration_form_id';
	public const i_FORM_COMPONENT_ID_FORM_NAME				= self::_ID_FORM. '_01';
	public const i_FORM_COMPONENT_ID_CONTENT_ID				= self::_ID_FORM. '_03_';
	public const i_FORM_COMPONENT_ID_ACTIONS				= self::_ID_FORM. '_09_';
	public const i_FORM_COMPONENT_ID_SUBMIT					= self::_ID_FORM. '_10';
	//...IDS

	//CHARS COUNT...
	public const i_MIN_CHARS_COUNT_FIELD_CONTENT_ID		= 1;
	public const i_MAX_CHARS_COUNT_FIELD_CONTENT_ID		= 10;
	//...CHARS COUNT

	//CSS...
	private const _CSS_FORM								= 'css_job_contents_administration_form';
	//...CSS
	
	//CLASSES...
	private const _TEXT_COMPONENT_FORM_NAME_CLASSES			= 'css_text_component_form_name';
	private const _TEXT_COMPONENT_ELEMENT_FORM_NAME_CLASSES	= 'css_text_component_element_form_name';

	private const _TABLE_COMPONENT_CONTENTS_CLASSES				= 'css_table_component_contents';
	private const _TABLE_COMPONENT_ELEMENT_CONTENTS_CLASSES		= 'css_table_component_element_contents';

	//TABLE ROWS CAPTIONS...
	private const _TEXT_COMPONENT_CONTENT_ID_CAPTION_CLASSES			= 'css_text_component_content_id_caption';
	private const _TEXT_COMPONENT_ELEMENT_CONTENT_ID_CAPTION_CLASSES	= 'css_text_component_element_content_id_caption';

	private const _TEXT_COMPONENT_CONTENT_STATE_CAPTION_CLASSES			= 'css_text_component_content_state_caption';
	private const _TEXT_COMPONENT_ELEMENT_CONTENT_STATE_CAPTION_CLASSES	= 'css_text_component_element_content_state_caption';

	private const _TEXT_COMPONENT_CONTENT_ADDITION_TIME_CAPTION_CLASSES			= 'css_text_component_content_addition_time_caption';
	private const _TEXT_COMPONENT_ELEMENT_CONTENT_ADDITION_TIME_CAPTION_CLASSES	= 'css_text_component_element_content_addition_time_caption';

	private const _TEXT_COMPONENT_CONTENT_UPDATING_TIME_CAPTION_CLASSES			= 'css_text_component_content_updating_time_caption';
	private const _TEXT_COMPONENT_ELEMENT_CONTENT_UPDATING_TIME_CAPTION_CLASSES	= 'css_text_component_element_content_updating_time_caption';

	private const _TEXT_COMPONENT_CONTENT_EXPIRING_TIME_CAPTION_CLASSES			= 'css_text_component_content_expiring_time_caption';
	private const _TEXT_COMPONENT_ELEMENT_CONTENT_EXPIRING_TIME_CAPTION_CLASSES	= 'css_text_component_element_content_expiring_time_caption';

	private const _TEXT_COMPONENT_CONTENT_DESCRIPTION_CAPTION_CLASSES			= 'css_text_component_content_description_caption';
	private const _TEXT_COMPONENT_ELEMENT_CONTENT_DESCRIPTION_CAPTION_CLASSES	= 'css_text_component_element_content_description_caption';

	private const _TEXT_COMPONENT_ACTIONS_CAPTION_CLASSES			= 'css_text_component_actions_caption';
	private const _TEXT_COMPONENT_ELEMENT_ACTIONS_CAPTION_CLASSES	= 'css_text_component_element_actions_caption';
	//...TABLE ROWS CAPTIONS

	//TABLE ROWS ITEMS...
	private const _TEXT_COMPONENT_CONTENT_ID_CLASSES			= 'css_text_component_content_id';
	private const _TEXT_COMPONENT_ELEMENT_CONTENT_ID_CLASSES	= 'css_text_component_element_content_id';

	private const _TEXT_COMPONENT_CONTENT_STATE_CLASSES			= 'css_text_component_content_state';
	private const _TEXT_COMPONENT_ELEMENT_CONTENT_STATE_CLASSES	= 'css_text_component_element_content_state';

	private const _TEXT_COMPONENT_CONTENT_ADDITION_TIME_CLASSES			= 'css_text_component_content_addition_time';
	private const _TEXT_COMPONENT_ELEMENT_CONTENT_ADDITION_TIME_CLASSES	= 'css_text_component_element_content_addition_time';

	private const _TEXT_COMPONENT_CONTENT_UPDATING_TIME_CLASSES			= 'css_text_component_content_updating_time';
	private const _TEXT_COMPONENT_ELEMENT_CONTENT_UPDATING_TIME_CLASSES	= 'css_text_component_element_content_updating_time';

	private const _TEXT_COMPONENT_CONTENT_EXPIRING_TIME_CLASSES			= 'css_text_component_content_expiring_time';
	private const _TEXT_COMPONENT_ELEMENT_CONTENT_EXPIRING_TIME_CLASSES	= 'css_text_component_element_content_expiring_time';

	private const _TEXT_COMPONENT_CONTENT_DESCRIPTION_CLASSES			= 'css_text_component_content_description';
	private const _TEXT_COMPONENT_ELEMENT_CONTENT_DESCRIPTION_CLASSES	= 'css_text_component_element_content_description';

	private const _LISTBOX_COMPONENT_ACTIONS_CLASSES			= 'css_listbox_component_actions';
	private const _LISTBOX_COMPONENT_ELEMENT_ACTIONS_CLASSES	= 'css_listbox_component_element_actions';
	//...TABLE ROWS ITEMS

	private const _BUTTON_COMPONENT_SUBMIT_CLASSES			= 'css_button_component_submit css_inline_show';
	private const _BUTTON_COMPONENT_ELEMENT_SUBMIT_CLASSES	= 'css_button_component_element_submit css_blue css_rounded_low';
	//...CLASSES

	//TRANSLATIONS...
	public const i_FORM_XML_NODE_ID						= 'contents_administration_form';
	private const _TABLE_CAPTIONS_XML_NODE_ID			= 'table_captions_list';
	public const i_ACTIONS_LISTBOX_XML_NODE_ID			= 'actions_listbox';
	//...TRANSLATIONS


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getFormPOSTRequestId():string
	{
		return CVariableTools::i_toString(CJOBRequestConst::i_REQUEST_ID_VACANCY_CONTENTS_ADMINISTRATION);
	}

	//JS...
	/*override*/protected function __isJSSupportAllowed():bool
	{
		return false;
	}

	/*override*/protected function __drawPreJS():void
	{
		/*echo
		'var lForm_clss = ' .$this->__getJSForm(). ';
		lForm_clss.i_setFormAttrs(\'' .CJSTools::i_convertAssociativeArrayToJSObject($this->__getFormJSAttrs()). '\');';*/
	}

	/*override*/protected function __drawPostJS():void
	{
	/*	echo
		'var lForm_clss = ' .$this->__getJSForm(). ';
		lForm_clss.i_initDOMForm();';*/
	}

	/*override*/protected function __getFormJSAttrs():array
	{
		/*$l_a_arr = parent::__getFormJSAttrs();
		$l_a_arr[self::i_FORM_COMPONENT_ID_SUBMIT] = self::i_JS_FORM_COMPONENT_ID_SUBMIT_BUTTON;
		return $l_a_arr;*/

		return [];
	}

	/*override*/protected function __getJSForm():string
	{
		/*$lMainData_clss = $this->__getMainData();
		$lSiteId_str = $lMainData_clss->i_getGETParamSiteId();
		$lPageId_str = $lMainData_clss->i_getGETParamPageId();

		return 'bsp.CMain.i_getSiteView(\'' .$lSiteId_str. '\').i_getPagesView().i_getPageView(\'' .$lPageId_str. '\').i_getFormsView().i_getContentsAdministrationFormView()';*/

		return '';
	}
	//...JS

	/*override*/protected function __drawHeaderContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		$lFormTranslationData_clss = $this->__getTranslationXMLFormNode();

		//FORM NAME...
		$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::i_FORM_COMPONENT_ID_FORM_NAME,
							CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lFormTranslationData_clss->i_getFormName(),
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> self::_TEXT_COMPONENT_FORM_NAME_CLASSES,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> self::_TEXT_COMPONENT_ELEMENT_FORM_NAME_CLASSES,
							//CCSimpleTextComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lTextComponentsView_clss->i_getSimpleTextComponentView()->i_draw($lParams_a_arr);
		//...FORM NAME
	}

	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTableComponentsView_clss = $lComponentsView_clss->i_getTableComponentsView();
		$lTextfieldComponentsView_clss = $lComponentsView_clss->i_getTextfieldComponentsView();

		//TABLE CAPTIONS...
		$lTableCaptionsTranslationData_clss = $this->__getTranslationXMLListboxComponentNode(self::_TABLE_CAPTIONS_XML_NODE_ID);//little hack: using listbox component for getting a simple items list only
		$lTableCaptionsTranslationItemsData_a_arr = $lTableCaptionsTranslationData_clss->i_getItemsData();

		$lTableRowItemsData_a_arr = [];

		//ID...
		$lItemName_str = $lTableCaptionsTranslationItemsData_a_arr->i_getItemNameByItemId('id');

		$lParams_a_arr = $this->_generateLinkTextComponentParams($this->_generateSortingURL(CCRequestParamConst::i_GET_PARAM_ID_OPT_ID_SORTING), $this->_getSortingMarker(CCRequestParamConst::i_GET_PARAM_ID_OPT_ID_SORTING) . $lItemName_str, self::_TEXT_COMPONENT_CONTENT_ID_CAPTION_CLASSES, self::_TEXT_COMPONENT_ELEMENT_CONTENT_ID_CAPTION_CLASSES);

		$lTableRowItemsData_a_arr[] = [	CCTableComponentView::i_ITEM_DATA_PARAM_ID_TYPE		=> CCTableComponentView::i_ITEM_DATA_TYPE_LINK_TEXT,
										CCTableComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lParams_a_arr];
		//...ID

		//STATE...
		$lItemName_str = $lTableCaptionsTranslationItemsData_a_arr->i_getItemNameByItemId('state');

		$lParams_a_arr = $this->_generateLinkTextComponentParams($this->_generateSortingURL(CCRequestParamConst::i_GET_PARAM_ID_OPT_STATE_SORTING), $this->_getSortingMarker(CCRequestParamConst::i_GET_PARAM_ID_OPT_STATE_SORTING) . $lItemName_str, self::_TEXT_COMPONENT_CONTENT_STATE_CAPTION_CLASSES, self::_TEXT_COMPONENT_ELEMENT_CONTENT_STATE_CAPTION_CLASSES);

		$lTableRowItemsData_a_arr[] = [	CCTableComponentView::i_ITEM_DATA_PARAM_ID_TYPE		=> CCTableComponentView::i_ITEM_DATA_TYPE_LINK_TEXT,
										CCTableComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lParams_a_arr];
		//...STATE

		//ADDITION TIME...
		$lItemName_str = $lTableCaptionsTranslationItemsData_a_arr->i_getItemNameByItemId('addition_time');

		$lParams_a_arr = $this->_generateLinkTextComponentParams($this->_generateSortingURL(CCRequestParamConst::i_GET_PARAM_ID_OPT_ADDITION_TIME_SORTING), $this->_getSortingMarker(CCRequestParamConst::i_GET_PARAM_ID_OPT_ADDITION_TIME_SORTING) . $lItemName_str, self::_TEXT_COMPONENT_CONTENT_ADDITION_TIME_CAPTION_CLASSES, self::_TEXT_COMPONENT_ELEMENT_CONTENT_ADDITION_TIME_CAPTION_CLASSES);

		$lTableRowItemsData_a_arr[] = [	CCTableComponentView::i_ITEM_DATA_PARAM_ID_TYPE		=> CCTableComponentView::i_ITEM_DATA_TYPE_LINK_TEXT,
										CCTableComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lParams_a_arr];
		//...ADDITION TIME

		//UPDATING TIME...
		$lItemName_str = $lTableCaptionsTranslationItemsData_a_arr->i_getItemNameByItemId('updating_time');

		$lParams_a_arr = $this->_generateLinkTextComponentParams($this->_generateSortingURL(CCRequestParamConst::i_GET_PARAM_ID_OPT_UPDATING_TIME_SORTING), $this->_getSortingMarker(CCRequestParamConst::i_GET_PARAM_ID_OPT_UPDATING_TIME_SORTING) . $lItemName_str, self::_TEXT_COMPONENT_CONTENT_UPDATING_TIME_CAPTION_CLASSES, self::_TEXT_COMPONENT_ELEMENT_CONTENT_UPDATING_TIME_CAPTION_CLASSES);

		$lTableRowItemsData_a_arr[] = [	CCTableComponentView::i_ITEM_DATA_PARAM_ID_TYPE		=> CCTableComponentView::i_ITEM_DATA_TYPE_LINK_TEXT,
										CCTableComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lParams_a_arr];
		//...UPDATING TIME

		//EXPIRING TIME...
		$lItemName_str = $lTableCaptionsTranslationItemsData_a_arr->i_getItemNameByItemId('expiring_time');

		$lParams_a_arr = $this->_generateLinkTextComponentParams($this->_generateSortingURL(CCRequestParamConst::i_GET_PARAM_ID_OPT_EXPIRING_TIME_SORTING), $this->_getSortingMarker(CCRequestParamConst::i_GET_PARAM_ID_OPT_EXPIRING_TIME_SORTING) . $lItemName_str, self::_TEXT_COMPONENT_CONTENT_EXPIRING_TIME_CAPTION_CLASSES, self::_TEXT_COMPONENT_ELEMENT_CONTENT_EXPIRING_TIME_CAPTION_CLASSES);

		$lTableRowItemsData_a_arr[] = [	CCTableComponentView::i_ITEM_DATA_PARAM_ID_TYPE		=> CCTableComponentView::i_ITEM_DATA_TYPE_LINK_TEXT,
										CCTableComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lParams_a_arr];
		//...EXPIRING TIME

		//DESCRIPTION...
		$lItemName_str = $lTableCaptionsTranslationItemsData_a_arr->i_getItemNameByItemId('description');

		$lParams_a_arr = $this->_generateSimpleTextComponentParams($lItemName_str, self::_TEXT_COMPONENT_CONTENT_DESCRIPTION_CAPTION_CLASSES, self::_TEXT_COMPONENT_ELEMENT_CONTENT_DESCRIPTION_CAPTION_CLASSES);

		$lTableRowItemsData_a_arr[] = [	CCTableComponentView::i_ITEM_DATA_PARAM_ID_TYPE		=> CCTableComponentView::i_ITEM_DATA_TYPE_SIMPLE_TEXT,
										CCTableComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lParams_a_arr];
		//...DESCRIPTION

		//ACTIONS...
		$lItemName_str = $lTableCaptionsTranslationItemsData_a_arr->i_getItemNameByItemId('actions');

		$lParams_a_arr = $this->_generateSimpleTextComponentParams($lItemName_str, self::_TEXT_COMPONENT_ACTIONS_CAPTION_CLASSES, self::_TEXT_COMPONENT_ELEMENT_ACTIONS_CAPTION_CLASSES);

		$lTableRowItemsData_a_arr[] = [	CCTableComponentView::i_ITEM_DATA_PARAM_ID_TYPE		=> CCTableComponentView::i_ITEM_DATA_TYPE_SIMPLE_TEXT,
										CCTableComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lParams_a_arr];
		//...ACTIONS

		$lTableItemsData_a_arr[0] = $lTableRowItemsData_a_arr;
		//...TABLE CAPTIONS

		//TABLE ITEMS...
		$lRowIndex_int = 1;

		$lContentTableData_clss_arr = $this->_getContentTableData();
		foreach ($lContentTableData_clss_arr as $lContentTableData_clss)
		{
			$lContentTableData_clss = CJOBContentTableData::i_toClassType($lContentTableData_clss);

			$lTableRowItemsData_a_arr = [];

			//ID...
			$lId_str = CVariableTools::i_toString($lContentTableData_clss->i_getTableFieldId());

			$lParams_a_arr = $this->_generateSimpleTextComponentParams($lId_str, self::_TEXT_COMPONENT_CONTENT_ID_CLASSES, self::_TEXT_COMPONENT_ELEMENT_CONTENT_ID_CLASSES);

			$lTableRowItemsData_a_arr[] = [	CCTableComponentView::i_ITEM_DATA_PARAM_ID_TYPE		=> CCTableComponentView::i_ITEM_DATA_TYPE_SIMPLE_TEXT,
											CCTableComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lParams_a_arr];

			//hidden...
			$lParams_a_arr 	= [	CCHiddenTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ID		=> self::i_FORM_COMPONENT_ID_CONTENT_ID. '[]',
								CCHiddenTextfieldComponentView::i_PARAM_ID_VALUE	 			=> $lId_str,
								CCHiddenTextfieldComponentView::i_PARAM_ID_MAX_CHARS_COUNT 		=> self::i_MAX_CHARS_COUNT_FIELD_CONTENT_ID];
			$lTextfieldComponentsView_clss->i_getHiddenTextfieldComponentView()->i_draw($lParams_a_arr);
			//...hidden
			//...ID

			//STATE...
			$lState_int = $lContentTableData_clss->i_getTableFieldState();
			switch ($lState_int)
			{
				case CCContentTableData::i_CONTENT_STATE_ID_MODERATION_WAITING:
				{
					$lComponentElementClass_str = 'css_moderation_waiting';
					$lState_str = 'M';
				}break;

				case CCContentTableData::i_CONTENT_STATE_ID_ACTIVATED:
				{
					$lComponentElementClass_str = 'css_activated';
					$lState_str = 'А';
				}break;

				case CCContentTableData::i_CONTENT_STATE_ID_DEACTIVATED:
				{
					$lComponentElementClass_str = 'css_deactivated';
					$lState_str = 'D';
				}break;

				case CCContentTableData::i_CONTENT_STATE_ID_BLOCKED:
				{
					$lComponentElementClass_str = 'css_blocked';
					$lState_str = 'B';
				}break;

				case CCContentTableData::i_CONTENT_STATE_ID_DELETED:
				{
					$lComponentElementClass_str = 'css_deleted';
					$lState_str = 'R';//removed
				}break;

				default:
					new CException('__drawBodyContent', 'Unsupported content state id: ' .$lState_int);
				break;
			}

			$lParams_a_arr = $this->_generateSimpleTextComponentParams($lState_str, self::_TEXT_COMPONENT_CONTENT_STATE_CLASSES, self::_TEXT_COMPONENT_ELEMENT_CONTENT_STATE_CLASSES. ' ' .$lComponentElementClass_str);

			$lTableRowItemsData_a_arr[] = [	CCTableComponentView::i_ITEM_DATA_PARAM_ID_TYPE		=> CCTableComponentView::i_ITEM_DATA_TYPE_SIMPLE_TEXT,
											CCTableComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lParams_a_arr];
			//...STATE

			//ADDITION TIME...
			$lAdditionTime_str = CDateTimeTools::i_getFormattedDateTime('DD MM YYYY', $lContentTableData_clss->i_getTableFieldAdditionTime(), CDateTimeTools::i_MOUNTHS_NAMES_AS_DATE_PART);

			$lParams_a_arr = $this->_generateSimpleTextComponentParams($lAdditionTime_str, self::_TEXT_COMPONENT_CONTENT_ADDITION_TIME_CLASSES, self::_TEXT_COMPONENT_ELEMENT_CONTENT_ADDITION_TIME_CLASSES);

			$lTableRowItemsData_a_arr[] = [	CCTableComponentView::i_ITEM_DATA_PARAM_ID_TYPE		=> CCTableComponentView::i_ITEM_DATA_TYPE_SIMPLE_TEXT,
											CCTableComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lParams_a_arr];
			//...ADDITION TIME

			//UPDATING TIME...
			$lUpdatingTime_str = CDateTimeTools::i_getFormattedDateTime('DD MM YYYY', $lContentTableData_clss->i_getTableFieldUpdatingTime(), CDateTimeTools::i_MOUNTHS_NAMES_AS_DATE_PART);

			$lParams_a_arr = $this->_generateSimpleTextComponentParams($lUpdatingTime_str, self::_TEXT_COMPONENT_CONTENT_UPDATING_TIME_CLASSES, self::_TEXT_COMPONENT_ELEMENT_CONTENT_UPDATING_TIME_CLASSES);

			$lTableRowItemsData_a_arr[] = [	CCTableComponentView::i_ITEM_DATA_PARAM_ID_TYPE		=> CCTableComponentView::i_ITEM_DATA_TYPE_SIMPLE_TEXT,
											CCTableComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lParams_a_arr];
			//...UPDATING TIME

			//EXPIRING TIME...
			$lExpiringTime_str = CDateTimeTools::i_getFormattedDateTime('DD MM YYYY', $lContentTableData_clss->i_getTableFieldExpiringTime(), CDateTimeTools::i_MOUNTHS_NAMES_AS_DATE_PART);

			$lParams_a_arr = $this->_generateSimpleTextComponentParams($lExpiringTime_str, self::_TEXT_COMPONENT_CONTENT_EXPIRING_TIME_CLASSES, self::_TEXT_COMPONENT_ELEMENT_CONTENT_EXPIRING_TIME_CLASSES);

			$lTableRowItemsData_a_arr[] = [	CCTableComponentView::i_ITEM_DATA_PARAM_ID_TYPE		=> CCTableComponentView::i_ITEM_DATA_TYPE_SIMPLE_TEXT,
											CCTableComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lParams_a_arr];
			//...EXPIRING TIME

			//DESCRIPTION...
			$lExpiringTime_str = $lContentTableData_clss->i_getTableFieldDescription();

			$lParams_a_arr = $this->_generateSimpleTextComponentParams($lExpiringTime_str, self::_TEXT_COMPONENT_CONTENT_DESCRIPTION_CLASSES, self::_TEXT_COMPONENT_ELEMENT_CONTENT_DESCRIPTION_CLASSES);

			$lTableRowItemsData_a_arr[] = [	CCTableComponentView::i_ITEM_DATA_PARAM_ID_TYPE		=> CCTableComponentView::i_ITEM_DATA_TYPE_SIMPLE_TEXT,
											CCTableComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lParams_a_arr];
			//...DESCRIPTION

			//ACTIONS...
			$lListboxTranslationData_clss = $this->__getTranslationXMLListboxComponentNode(self::i_ACTIONS_LISTBOX_XML_NODE_ID);

			$lItemsData_a_arr = [];

			$lListboxItemsData_clss = $lListboxTranslationData_clss->i_getItemsData();
			$lItemsCount_int = $lListboxItemsData_clss->i_getItemsCount();
			for ($i = 0; $i < $lItemsCount_int; $i++)
			{
				$lId_str = $lListboxItemsData_clss->i_getItemId($i);
				$lName_str = $lListboxItemsData_clss->i_getItemName($i);

				$lItemParams_a_arr	= [	CCListboxComponentItem::i_PARAM_ID_OPT_ITEM_ID			=> $lId_str,
										CCListboxComponentItem::i_PARAM_ID_ITEM_NAME			=> $lName_str,
										CCListboxComponentItem::i_PARAM_ID_ITEM_VALUE			=> $lId_str,
										CCListboxComponentItem::i_PARAM_ID_ITEM_STATE			=> /*$aComponentSelectedItemValue_str === $lId_str ? CCLabellistComponentItem::i_ITEM_STATE_SELECTED :*/ CCLabellistComponentItem::i_ITEM_STATE_ENABLED];

				$lItemsData_a_arr[] = [	CCListboxComponentView::i_ITEM_DATA_PARAM_ID_TYPE	=> CCListboxComponentView::i_ITEM_DATA_TYPE_SINGLE,
										CCListboxComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lItemParams_a_arr];
			}

			$lParams_a_arr	= [	CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::i_FORM_COMPONENT_ID_ACTIONS. '[]',
								CCSimpleListboxComponentView::i_PARAM_ID_ITEMS_DATA						=> $lItemsData_a_arr,
								CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_LISTBOX_COMPONENT_ACTIONS_CLASSES,
								CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_LISTBOX_COMPONENT_ELEMENT_ACTIONS_CLASSES,
								//CCSimpleListboxComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID			=> $aJSIdParam_str,
								CCSimpleListboxComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];

			$lTableRowItemsData_a_arr[] = [	CCTableComponentView::i_ITEM_DATA_PARAM_ID_TYPE		=> CCTableComponentView::i_ITEM_DATA_TYPE_SIMPLE_LISTBOX,
											CCTableComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lParams_a_arr];
			//...ACTIONS

			$lTableItemsData_a_arr[$lRowIndex_int] = $lTableRowItemsData_a_arr;

			$lRowIndex_int++;
		}

		$lParams_a_arr	= [	CCSimpleTableComponentView::i_PARAM_ID_ITEMS_DATA						=> $lTableItemsData_a_arr,
							CCSimpleTableComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_TABLE_COMPONENT_CONTENTS_CLASSES,
							CCSimpleTableComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_TABLE_COMPONENT_ELEMENT_CONTENTS_CLASSES,
							//CCSimpleTableComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID			=> $aJSIdParam_str,
							CCSimpleTableComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lTableComponentsView_clss->i_getSimpleTableComponentView()->i_draw($lParams_a_arr);
		//...TABLE ITEMS
	}

	/*override*/protected function __drawFooterContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lButtonComponentsView_clss = $lComponentsView_clss->i_getButtonComponentsView();

		//SUBMIT...
		$lFormTranslationData_clss = $this->__getTranslationXMLFormNode();

		$lParams_a_arr	= [	CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::i_FORM_COMPONENT_ID_SUBMIT,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lFormTranslationData_clss->i_getSubmitButtonTranslationData()->i_getName(),
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_REQUEST_ID		=> $this->__getFormPOSTRequestId(),
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_BUTTON_COMPONENT_SUBMIT_CLASSES,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_BUTTON_COMPONENT_ELEMENT_SUBMIT_CLASSES,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID				=> self::i_JS_FORM_COMPONENT_ID_SUBMIT_BUTTON,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lButtonComponentsView_clss->i_getSubmitButtonComponentView()->i_draw($lParams_a_arr);
		//...SUBMIT
	}

	private function _generateSortingURL(string $aSortingGETParam_str):string
	{
		$lMainData_clss = $this->__getMainData();

		$lSupportedSortingGETParams_str_arr = [	CJOBRequestParamConst::i_GET_PARAM_ID_OPT_ID_SORTING,
												CJOBRequestParamConst::i_GET_PARAM_ID_OPT_STATE_SORTING,
												CJOBRequestParamConst::i_GET_PARAM_ID_OPT_ADDITION_TIME_SORTING,
												CJOBRequestParamConst::i_GET_PARAM_ID_OPT_UPDATING_TIME_SORTING,
												CJOBRequestParamConst::i_GET_PARAM_ID_OPT_EXPIRING_TIME_SORTING];

		$lDynamicParams_a_arr = [];

		$lCount_int = CArrayTools::i_count($lSupportedSortingGETParams_str_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lGETParamId_str = $lSupportedSortingGETParams_str_arr[$i];
			if ($lGETParamId_str !== $aSortingGETParam_str)
			{
				continue;
			}

			if ($lMainData_clss->i_isGETParamDefined($lGETParamId_str))
			{
				$lSortingValue_str = $lMainData_clss->i_getGETParam($lGETParamId_str);
				if ($lSortingValue_str === CCMySQLDatabaseContentTableController::i_CONTENT_SORTING_VALUE_DEC)
				{
					$lIdSortingNextValue_str = CCMySQLDatabaseContentTableController::i_CONTENT_SORTING_VALUE_INC;
				}
				else //if ($lSortingValue_str === CCMySQLDatabaseContentTableController::i_CONTENT_SORTING_VALUE_INC)
				{
					$lIdSortingNextValue_str = CCMySQLDatabaseContentTableController::i_CONTENT_SORTING_VALUE_DEC;
				}
			}
			else
			{
				$lIdSortingNextValue_str = CCMySQLDatabaseContentTableController::i_CONTENT_SORTING_VALUE_INC;
			}

			$lDynamicParams_a_arr[$lGETParamId_str] = $lIdSortingNextValue_str;
		}

		$lGETParamId_str = CJOBRequestParamConst::i_GET_PARAM_ID_OPT_CONTENT_PAGE_INDEX;
		if ($lMainData_clss->i_isGETParamDefined($lGETParamId_str))
		{
			$lDynamicParams_a_arr[$lGETParamId_str] = $lMainData_clss->i_getGETParam($lGETParamId_str);
		}

		$lStaticParams_a_arr	= [	CJOBRequestParamConst::i_GET_PARAM_ID_SITE		=> CSiteConst::i_SITE_ID_JOB,
									CJOBRequestParamConst::i_GET_PARAM_ID_PAGE		=> CJOBPageConst::i_PAGE_ID_ADMINISTRATION];

		return CURLTools::i_generateURLByParams($lStaticParams_a_arr, $lDynamicParams_a_arr, true, false);
	}

	private function _getSortingMarker(string $aSortingGETParam_str):string
	{
		$lNoSortingMarker_str = CSymbolsTools::i_SYMBOL_ICON_TOP_BLACK_TRIANGLE . CSymbolsTools::i_SYMBOL_ICON_BOTTOM_BLACK_TRIANGLE;
		$lDescSortingMarker_str = CSymbolsTools::i_SYMBOL_ICON_BOTTOM_BLACK_TRIANGLE;
		$lAscSortingMarker_str = CSymbolsTools::i_SYMBOL_ICON_TOP_BLACK_TRIANGLE;

		$lSortingValue_str = $this->__getMainData()->i_getGETParam($aSortingGETParam_str, false);
		if ($lSortingValue_str === CCMySQLDatabaseContentTableController::i_CONTENT_SORTING_VALUE_DEC)
		{
			$lSortingMarker_str = $lDescSortingMarker_str;
		}
		else if ($lSortingValue_str === CCMySQLDatabaseContentTableController::i_CONTENT_SORTING_VALUE_INC)
		{
			$lSortingMarker_str = $lAscSortingMarker_str;
		}
		else
		{
			$lSortingMarker_str = $lNoSortingMarker_str;
		}

		return $lSortingMarker_str;
	}

	private function _generateLinkTextComponentParams(string $aComponentHref_str, string $aComponentValue_str, string $aOptClassesParam_str = '', string $aOptElementClassesParam_str = '', string $aOptComponentId_str = '', string $aOptJSIdParam_str = ''):array
	{
		$lParams_a_arr 	= [	CCLinkTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> $aOptComponentId_str,
							CCLinkTextComponentView::i_PARAM_ID_COMPONENT_HREF 					=> $aComponentHref_str,
							CCLinkTextComponentView::i_PARAM_ID_COMPONENT_VALUE 				=> $aComponentValue_str,
							CCLinkTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> $aOptClassesParam_str,
							CCLinkTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> $aOptElementClassesParam_str,
							//CCLinkTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID			=> $aOptJSIdParam_str,
							CCLinkTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC	=> $this->__getJSFormComponentInitFunc()];
		return $lParams_a_arr;
	}

	private function _generateSimpleTextComponentParams(string $aComponentValue_str, string $aOptClassesParam_str = '', string $aOptElementClassesParam_str = '', string $aOptComponentId_str = '', string $aOptJSIdParam_str = ''):array
	{
		$lParams_a_arr 	= [	CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> $aOptComponentId_str,
							CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE 				=> $aComponentValue_str,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> $aOptClassesParam_str,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> $aOptElementClassesParam_str,
							//CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID			=> $aOptJSIdParam_str,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC	=> $this->__getJSFormComponentInitFunc()];
		return $lParams_a_arr;
	}

	//PARAMS...
	/*override*/protected function __getFormId():string
	{
		return self::_ID_FORM;
	}

	/*override*/protected function __getFormClasses():string
	{
		return self::_CSS_FORM. ' ' .parent::__getFormClasses();
	}

	/*override*//*protected function __getFormAction():string
	{
		$lStaticParams_a_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE	=> CSiteConst::i_SITE_ID_JOB,
									CCRequestParamConst::i_GET_PARAM_ID_PAGE	=> CJOBPageConst::i_PAGE_ID_ADMINISTRATION];
		return CURLTools::i_generateURLByParams($lStaticParams_a_arr);
	}*/

	/*override*/protected function __getFormSendingDataMethod():string
	{
		return self::i_SENDING_DATA_METHOD_POST;
	}

	/*override*/protected function __getFormSendingDataType():string
	{
		return self::i_SENDING_DATA_TYPE_MULTIPART_FORM_DATA;
	}

	//JOB CONTENT TABLE DATA...
	private function _getContentTableData():array
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_JOB_CONTENT_TABLE_DATA);
	}
	//...JOB CONTENT TABLE DATA
	//...PARAMS

	//TRANSLATIONS...
	/*override*/protected function __getFormNodeName():string
	{
		return self::i_FORM_XML_NODE_ID;
	}
	//...TRANSLATIONS
}


?>
