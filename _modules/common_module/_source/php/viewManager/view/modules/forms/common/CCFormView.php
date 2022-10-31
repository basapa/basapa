<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


abstract class CCFormView
{
	//JS PHP AGREEMENTS...
	public const i_JS_FORM_ATTR_ID														= 'FORM_ATTR_ID';

	public const i_JS_FORM_COMPONENT_VALIDATION_PARAM_ID								= 'FORM_COMPONENT_VALIDATION_PARAM_ID';
	public const i_JS_FORM_COMPONENT_VALIDATION_PARAM_VALUE_FILLING_MODE				= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_FILLING_MODE';
	public const i_JS_FORM_COMPONENT_VALIDATION_PARAM_VALUE_WRONG_CHARS_COUNT_MESSAGE	= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_WRONG_CHARS_COUNT_MESSAGE';
	public const i_JS_FORM_COMPONENT_VALIDATION_PARAM_VALUE_ILLEGAL_CHARS_MESSAGE		= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_ILLEGAL_CHARS_MESSAGE';
	public const i_JS_FORM_COMPONENT_VALIDATION_PARAM_VALUE_PLACEHOLDER					= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_PLACEHOLDER';
	public const i_JS_FORM_COMPONENT_VALIDATION_PARAM_VALUE_VALIDATION_PATTERN			= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_VALIDATION_PATTERN';
	public const i_JS_FORM_COMPONENT_VALIDATION_PARAM_VALUE_MIN_CHARS_COUNT				= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_MIN_CHARS_COUNT';
	public const i_JS_FORM_COMPONENT_VALIDATION_PARAM_VALUE_MAX_CHARS_COUNT				= 'FORM_COMPONENT_VALIDATION_PARAM_VALUE_MAX_CHARS_COUNT';

	public const i_JS_FORM_COMPONENT_ID_HIDDEN_TEXTFIELD	= 'FORM_COMPONENT_ID_HIDDEN_TEXTFIELD';
	public const i_JS_FORM_COMPONENT_ID_SUBMIT_BUTTON		= 'FORM_COMPONENT_ID_SUBMIT_BUTTON';
	//...JS PHP AGREEMENTS
	
	//PARAM IDS...
	public const i_PARAM_ID_OPT_FORM_ID						= 'id';
	public const i_PARAM_ID_OPT_FORM_ACTION					= 'action';
	public const i_PARAM_ID_OPT_FORM_SENDING_DATA_METHOD	= 'sending_data_method';
	public const i_PARAM_ID_OPT_FORM_SENDING_DATA_TYPE		= 'sending_data_type';
	public const i_PARAM_ID_OPT_FORM_CLASSES				= 'classes';
	//...PARAM IDS
	
	//SENDING DATA METHODS...
	public const i_SENDING_DATA_METHOD_GET				= 'get';
	public const i_SENDING_DATA_METHOD_POST				= 'post';
	//...SENDING DATA METHODS
	
	//SENDING DATA TYPES...
	public const i_SENDING_DATA_TYPE_APPLICATION_URLENCODED_DATA	= 'application/x-www-form-urlencoded';
	public const i_SENDING_DATA_TYPE_MULTIPART_FORM_DATA			= 'multipart/form-data';
	public const i_SENDING_DATA_TYPE_TEXT_PLAIN						= 'text/plain';
	//...SENDING DATA TYPES
	
	//IDS...
	private const _FORM_ID								= 'form_id_';
	private const _FORM_ELEMENT_ID						= 'element_id_';
	//...IDS
	
	//CSS...
	private const _CSS_FORM								= 'css_form';
	private const _CSS_FORM_HEADER						= 'css_header';
	private const _CSS_FORM_BODY						= 'css_body';
	private const _CSS_FORM_FOOTER						= 'css_footer';
	//...CSS
	
	static private $_fRandomIndex_int = 0;
	private $_fRandomId_str;

	private $_fParams_a_arr;
	
	
	public function __construct()
	{
		$this->__init();
	}

	/***************************************************
	 * INTERFACE
	 */

	public function i_draw(array $aOptParams_a_arr = null):void
	{
		$this->_fParams_a_arr = $aOptParams_a_arr;
		
		if (!$this->__validateParams())
		{
			new CException('i_draw', 'Invalid params: ' .CArrayTools::i_toString($aOptParams_a_arr));
		}

		$lIsJSSupportAllowed_bl = $this->__isJSSupportAllowed();
		if ($lIsJSSupportAllowed_bl)
		{
			echo
			'<script type="text/javascript">';
				$this->__drawPreJS();
			echo
			'</script>';
		}

		echo
		'<div class="' .$this->__getFormClasses(). '" id="' .$this->__getFormId(). '">',
			'<form id="' .$this->__getFormElementId(). '" action="' .$this->__getFormAction(). '" method="' .$this->__getFormSendingDataMethod(). '" enctype="' .$this->__getFormSendingDataType(). '">';
				$this->__draw();
			echo
			'</form>',
		'</div>';

		if ($lIsJSSupportAllowed_bl)
		{
			echo
			'<script type="text/javascript">';
				$this->__drawPostJS();
			echo
			'</script>';
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*/protected function __init():void
	{
		$this->_fRandomId_str = $this->_generateFormRandomId();
	}

	protected function __getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}

	protected function __getCookieData()
	{
		$lSiteId_str = $this->__getMainData()->i_getGetParamSiteId();

		return CFileManager::i_getInstance()->i_getFilesData()->i_getCookiesData()->i_getCookieData($lSiteId_str);
	}

	protected function __getXMLFileData()
	{
		$lSiteId_str = $this->__getMainData()->i_getGetParamSiteId();

		return CFileManager::i_getInstance()->i_getFilesData()->i_getXMLFilesData()->i_getXMLFileData($lSiteId_str);
	}

	protected function __getDatabaseData()
	{
		$lSiteId_str = $this->__getMainData()->i_getGetParamSiteId();

		return CDatabaseManager::i_getInstance()->i_getDatabasesData()->i_getDatabaseData($lSiteId_str);
	}

	protected function __getComponentsView()
	{
		$lSiteId_str = $this->__getMainData()->i_getGetParamSiteId();

		return CViewManager::i_getInstance()->i_getComponentsView()->i_getComponentsView($lSiteId_str);
	}

	/*protected function __getViewData()
	{
		$lSiteId_str = $this->__getMainData()->i_getGetParamSiteId();

		return CViewManager::i_getInstance()->i_getViewsData()->i_getViewData($lSiteId_str);
	}*/

	protected function __getComponentFilledValue(string $aFormComponentId_str):string
	{
		return $this->__getMainData()->i_getPOSTParam($aFormComponentId_str);
	}

	protected function __isComponentErrorMessageAllowed():bool
	{
		return $this->__getMainData()->i_getPOSTParamRequestId() === $this->__getFormPOSTRequestId();
	}

	abstract protected function __getFormPOSTRequestId():string;

	/*virtual*/protected function __isJSSupportAllowed():bool
	{
		return false;
	}

	/*virtual*/protected function __validateParams():bool
	{
		$lFormSendingDataMethod_str = $this->__getFormSendingDataMethod();
		$lFormSendingDataType_str = $this->__getFormSendingDataType();

		return (
					$lFormSendingDataMethod_str === self::i_SENDING_DATA_METHOD_POST
					&& $lFormSendingDataType_str === self::i_SENDING_DATA_TYPE_MULTIPART_FORM_DATA
				)
				||
				(
					$lFormSendingDataMethod_str === self::i_SENDING_DATA_METHOD_GET
					&& $lFormSendingDataType_str !== self::i_SENDING_DATA_TYPE_MULTIPART_FORM_DATA
				);
	}
	
	/*virtual*/protected function __draw():void
	{
		$this->__drawHeader();
		$this->__drawBody();
		$this->__drawFooter();
	}

	//JS...
	/*virtual*/protected function __getFormJSAttrs():array
	{
		return [self::i_JS_FORM_ATTR_ID => $this->__getFormId()];
	}

	abstract protected function __getJSForm():string;

	protected function __getJSFormComponentInitFunc():string
	{
		return $this->__getJSForm(). '.i_initFormComponent';
	}

	abstract protected function __drawPreJS():void;

	abstract protected function __drawPostJS():void;

	/*virtual*/protected function __generateJSComponentValidationParams(array $aComponentValidationParams_a_arr/*, $aEventView_clss*/):string
	{
		/*$lJSComponentValidationParams_obj_arr	= array(CRegistrationFormView::JS_FORM_COMPONENT_VALIDATION_PARAM_ID								=> $aComponentValidationParams_obj_arr[CRequestControllerBase::COMPONENT_VALIDATION_PARAM_ID_FIELD_ID],
														CRegistrationFormView::JS_FORM_COMPONENT_VALIDATION_PARAM_VALUE_FILLING_MODE				=> $aComponentValidationParams_obj_arr[CRequestControllerBase::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE],
														CRegistrationFormView::JS_FORM_COMPONENT_VALIDATION_PARAM_VALUE_WRONG_CHARS_COUNT_MESSAGE	=> $aEventView_clss->getMessageText($aComponentValidationParams_obj_arr[CRequestControllerBase::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID]),
														CRegistrationFormView::JS_FORM_COMPONENT_VALIDATION_PARAM_VALUE_ILLEGAL_CHARS_MESSAGE		=> $aEventView_clss->getMessageText($aComponentValidationParams_obj_arr[CRequestControllerBase::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID]),
														CRegistrationFormView::JS_FORM_COMPONENT_VALIDATION_PARAM_VALUE_PLACEHOLDER					=> $aComponentValidationParams_obj_arr[CRequestControllerBase::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_PLACEHOLDER],
														CRegistrationFormView::JS_FORM_COMPONENT_VALIDATION_PARAM_VALUE_VALIDATION_PATTERN			=> $aComponentValidationParams_obj_arr[CRequestControllerBase::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN],
														CRegistrationFormView::JS_FORM_COMPONENT_VALIDATION_PARAM_VALUE_MIN_CHARS_COUNT				=> $aComponentValidationParams_obj_arr[CRequestControllerBase::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT],
														CRegistrationFormView::JS_FORM_COMPONENT_VALIDATION_PARAM_VALUE_MAX_CHARS_COUNT				=> $aComponentValidationParams_obj_arr[CRequestControllerBase::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT]);

		return CJSUtil::convertAssociativeArrayToJSObject($lJSComponentValidationParams_obj_arr);*/
		return '';
	}
	//...JS
	
	protected function __drawHeader():void
	{
		echo
		'<div class="' .self::_CSS_FORM_HEADER. '">';
			$this->__drawHeaderContent();
		echo
		'</div>';
	}

	protected function __drawBody():void
	{
		echo
		'<div class="' .self::_CSS_FORM_BODY. '">';
			$this->__drawBodyContent();
		echo
		'</div>';
	}

	protected function __drawFooter():void
	{
		echo
		'<div class="' .self::_CSS_FORM_FOOTER. '">';
			$this->__drawFooterContent();
		echo
		'</div>';
	}

	/*virtual*/protected function __drawHeaderContent():void
	{
	}

	/*virtual*/protected function __drawBodyContent():void
	{
	}

	/*virtual*/protected function __drawFooterContent():void
	{
	}
	
	protected function __getFormElementId():string
	{
		return self::_FORM_ELEMENT_ID . $this->__getFormId(); 
	}
	
	protected function __isParamValueDefined(string $aParamId_str):bool
	{
		return isset($this->_fParams_a_arr[$aParamId_str]);
	}

	protected function __getParamValue(string $aParamId_str, bool $aOptThrowIfNotExist_bl = true, $aOptParamValueIfNotExist_var = null)
	{
		if (!$this->__isParamValueDefined($aParamId_str))
		{
			if ($aOptThrowIfNotExist_bl)
			{
				new CException('__getParamValue', 'Param not exist: ' .$aParamId_str);
			}
			return $aOptParamValueIfNotExist_var;
		}
		return $this->_fParams_a_arr[$aParamId_str];
	}

	//PARAMS...
	/*virtual*/protected function __getFormId():string
	{
		//TODO: optimization required
		return CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_FORM_ID, false, $this->_fRandomId_str));
	}

	/*virtual*/protected function __getFormClasses():string
	{
		//TODO: optimization required
		return self::_CSS_FORM. ' ' .CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_FORM_CLASSES, false, ''));
	}

	/*virtual*/protected function __getFormAction():string
	{
		//TODO: optimization required
		return CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_FORM_ACTION, false, $this->__getMainData()->i_getHostData()->i_getCurrentURL()));
	}

	/*virtual*/protected function __getFormSendingDataMethod():string
	{
		//TODO: optimization required
		return CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_FORM_SENDING_DATA_METHOD, false, self::i_SENDING_DATA_METHOD_GET));
	}

	/*virtual*/protected function __getFormSendingDataType():string
	{
		//TODO: optimization required
		return CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_FORM_SENDING_DATA_TYPE, false, self::i_SENDING_DATA_TYPE_TEXT_PLAIN));
	}
	//...PARAMS

	//TRANSLATIONS...
	/**@return CCTranslationXMLFormNode*/
	/*virtual*/protected function __getTranslationXMLFormNode():CCXMLNode
	{
		return CCTranslationXMLFormNodeParser::i_parseNode($this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getTranslationXMLFormsNativeNode()->i_getXMLChildNodeByNodeName($this->__getFormNodeName()));
	}

	/*virtual*/protected function __getFormNodeName():string
	{
		return '';
	}

	/**@return CCTranslationXMLButtonComponentNode*/
	protected function __getTranslationXMLButtonComponentNode(string $aComponentNodeId_str):CCXMLNode
	{
		return CCTranslationXMLButtonComponentNodeParser::i_parseNode($this->_getTranslationXMLComponentNativeNode($aComponentNodeId_str));
	}

	/**@return CCTranslationXMLCheckboxesCompositeComponentNode*/
	protected function __getTranslationXMLCheckboxesCompositeComponentNode(string $aComponentNodeId_str):CCXMLNode
	{
		return CCTranslationXMLCheckboxesCompositeComponentNodeParser::i_parseNode($this->_getTranslationXMLComponentNativeNode($aComponentNodeId_str));
	}

	/**@return CCTranslationXMLFilefieldCompositeComponentNode*/
	protected function __getTranslationXMLFilefieldCompositeComponentNode(string $aComponentNodeId_str):CCXMLNode
	{
		return CCTranslationXMLFilefieldCompositeComponentNodeParser::i_parseNode($this->_getTranslationXMLComponentNativeNode($aComponentNodeId_str));
	}

	/**@return CCTranslationXMLFilesUploadingCompositeComponentNode*/
	protected function __getTranslationXMLFilesUploadingCompositeComponentNode(string $aComponentNodeId_str):CCXMLNode
	{
		return CCTranslationXMLFilesUploadingCompositeComponentNodeParser::i_parseNode($this->_getTranslationXMLComponentNativeNode($aComponentNodeId_str));
	}

	/**@return CCTranslationXMLLabelfieldComponentNode*/
	protected function __getTranslationXMLLabelfieldComponentNode(string $aComponentNodeId_str):CCXMLNode
	{
		return CCTranslationXMLLabelfieldComponentNodeParser::i_parseNode($this->_getTranslationXMLComponentNativeNode($aComponentNodeId_str));
	}

	/**@return CCTranslationXMLLabellistComponentNode*/
	protected function __getTranslationXMLLabellistComponentNode(string $aComponentNodeId_str):CCXMLNode
	{
		return CCTranslationXMLLabellistComponentNodeParser::i_parseNode($this->_getTranslationXMLComponentNativeNode($aComponentNodeId_str));
	}

	/**@return CCTranslationXMLRadiobuttonComponentNode*/
	protected function __getTranslationXMLRadiobuttonComponentNode(string $aComponentNodeId_str):CCXMLNode
	{
		return CCTranslationXMLRadiobuttonComponentNodeParser::i_parseNode($this->_getTranslationXMLComponentNativeNode($aComponentNodeId_str));
	}

	/**@return CCTranslationXMLListboxComponentNode*/
	protected function __getTranslationXMLListboxComponentNode(string $aComponentNodeId_str):CCXMLNode
	{
		return CCTranslationXMLListboxComponentNodeParser::i_parseNode($this->_getTranslationXMLComponentNativeNode($aComponentNodeId_str));
	}

	/**@return CCTranslationXMLTextComponentNode*/
	protected function __getTranslationXMLTextComponentNode(string $aComponentNodeId_str):CCXMLNode
	{
		return CCTranslationXMLTextComponentNodeParser::i_parseNode($this->_getTranslationXMLComponentNativeNode($aComponentNodeId_str));
	}

	/**@return CCTranslationXMLTextfieldComponentNode*/
	protected function __getTranslationXMLTextfieldComponentNode(string $aComponentNodeId_str):CCXMLNode
	{
		return CCTranslationXMLTextfieldComponentNodeParser::i_parseNode($this->_getTranslationXMLComponentNativeNode($aComponentNodeId_str));
	}

	private function _getTranslationXMLComponentNativeNode(string $aComponentNodeId_str):CSimpleXMLElementWrapper
	{
		return $this->__getTranslationXMLFormNode()->i_getNativeNode()->i_getXMLChildNodeByNodeName($aComponentNodeId_str);
	}
	//...TRANSLATIONS

	private function _generateFormRandomId():string
	{
		return self::_FORM_ID . self::$_fRandomIndex_int++;
	}

	/*private function _getJSDrawing():string
	{
		return
		'var JSForm = ' .$this->__getJSForm(). ';
		lJSForm_clss.JSSetFormAttrs(\'' .CJSTools::i_convertAssociativeArrayToJSObject($this->__getFormJSAttrs()). '\');
		lJSForm_clss.JSInitDOMForm();'.
		$this->__getJSFormInitFunc(). '(\'' .$this->__getJSFormId(). '\', lJSForm_clss);';
	}*/
}


?>