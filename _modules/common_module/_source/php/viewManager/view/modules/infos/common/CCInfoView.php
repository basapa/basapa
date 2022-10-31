<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


abstract class CCInfoView
{
	//JS PHP AGREEMENTS...
	public const i_JS_INFO_ATTR_ID						= 'INFO_ATTR_ID';
	//...JS PHP AGREEMENTS
	
	//PARAM IDS...
	public const i_PARAM_ID_OPT_INFO_ID					= 'id';
	public const i_PARAM_ID_OPT_INFO_CLASSES			= 'classes';
	//...PARAM IDS
	
	//IDS...
	private const _INFO_ID								= 'info_id_';
	//...IDS
	
	//CSS...
	private const _CSS_INFO								= 'css_info';
	private const _CSS_INFO_HEADER						= 'css_header';
	private const _CSS_INFO_BODY						= 'css_body';
	private const _CSS_INFO_FOOTER						= 'css_footer';
	//...CSS

	//CLASSES...
	protected const __ROUNDED_HIGH_COMMON_CLASS			= 'css_rounded_high';
	protected const __ROUNDED_MEDIUM_COMMON_CLASS		= 'css_rounded_medium';
	protected const __ROUNDED_LOW_COMMON_CLASS			= 'css_rounded_low';

	protected const __GREEN_COLOR_COMMON_CLASS			= 'css_green';

	protected const __SHOW_COMMON_CLASS					= 'css_show';
	//...CLASSES


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
		'<div class="' .$this->__getInfoClasses(). '" id="' .$this->__getInfoId(). '">';
			$this->__draw();
		echo
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
		$this->_fRandomId_str = $this->_generateInfoRandomId();
	}

	protected function __getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}

	protected function __getUserData()
	{
		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		return $this->__getMainData()->i_getUserData()->i_getUserData($lSiteId_str);
	}

	protected function __getFilesData()
	{
		return CFileManager::i_getInstance()->i_getFilesData();
	}

	protected function __getXMLFileData()
	{
		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		return $this->__getFilesData()->i_getXMLFilesData()->i_getXMLFileData($lSiteId_str);
	}

	protected function __getCookieData()
	{
		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		return $this->__getFilesData()->i_getCookiesData()->i_getCookieData($lSiteId_str);
	}

	protected function __getDatabaseData()
	{
		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		return CDatabaseManager::i_getInstance()->i_getDatabasesData()->i_getDatabaseData($lSiteId_str);
	}

	protected function __getComponentsView()
	{
		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		return CViewManager::i_getInstance()->i_getComponentsView()->i_getComponentsView($lSiteId_str);
	}

	/*virtual*/protected function __validateParams():bool
	{
		return true;
	}

	//JS...
	/*virtual*/protected function __isJSSupportAllowed():bool
	{
		return false;
	}
	
	/*virtual*/protected function __getInfoJSAttrs():array
	{
		return [self::i_JS_INFO_ATTR_ID => $this->__getInfoId()];
	}

	abstract protected function __getJSInfoImport():string;

	abstract protected function __getJSInfo():string;

	protected function __getJSInfoComponentInitFunc():string
	{
		return $this->__getJSInfo(). '.i_initInfoComponent';
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
	
	/*virtual*/protected function __draw():void
	{
		$this->__drawHeader();
		$this->__drawBody();
		$this->__drawFooter();
	}

	protected function __drawHeader():void
	{
		echo
		'<div class="' .self::_CSS_INFO_HEADER. '">';
			$this->__drawHeaderContent();
		echo
		'</div>';
	}

	protected function __drawBody():void
	{
		echo
		'<div class="' .self::_CSS_INFO_BODY. '" style=" ' .$this->__getInfoBodyStyles(). ' ">';
			$this->__drawBodyContent();
		echo
		'</div>';
	}

	protected function __drawFooter():void
	{
		echo
		'<div class="' .self::_CSS_INFO_FOOTER. '">';
			$this->__drawFooterContent();
		echo
		'</div>';
	}

	/*virtual*/protected function __getInfoBodyStyles():string
	{
		return '';
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
	/*virtual*/protected function __getInfoId():string
	{
		//TODO: optimization required
		return CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_INFO_ID, false, $this->_fRandomId_str));
	}

	/*virtual*/protected function __getInfoClasses():string
	{
		//TODO: optimization required
		return self::_CSS_INFO. ' ' .CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_INFO_CLASSES, false, ''));
	}
	//...PARAMS

	//TRANSLATIONS...
	/**@return CCTranslationXMLInfoNode*/
	/*virtual*/protected function __getTranslationXMLInfoNode():CCXMLNode
	{
		return CCTranslationXMLInfoNodeParser::i_parseNode($this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getTranslationXMLInfosNativeNode()->i_getXMLChildNodeByNodeName($this->__getInfoNodeName()));
	}

	/*virtual*/protected function __getInfoNodeName():string
	{
		return '';
	}

	/**@return CCTranslationXMLRadiobuttonComponentNode*/
	protected function __getTranslationXMLRadiobuttonComponentNode(string $aComponentNodeId_str):CCXMLNode
	{
		return CCTranslationXMLRadiobuttonComponentNodeParser::i_parseNode($this->_getTranslationXMLComponentNativeNode($aComponentNodeId_str));
	}

	/**@return CCTranslationXMLButtonComponentNode*/
	protected function __getTranslationXMLButtonComponentNode(string $aComponentNodeId_str):CCXMLNode
	{
		return CCTranslationXMLButtonComponentNodeParser::i_parseNode($this->_getTranslationXMLComponentNativeNode($aComponentNodeId_str));
	}

	/**@return CCTranslationXMLLabellistComponentNode*/
	protected function __getTranslationXMLLabellistComponentNode(string $aComponentNodeId_str):CCXMLNode
	{
		return CCTranslationXMLLabellistComponentNodeParser::i_parseNode($this->_getTranslationXMLComponentNativeNode($aComponentNodeId_str));
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
		return $this->__getTranslationXMLInfoNode()->i_getNativeNode()->i_getXMLChildNodeByNodeName($aComponentNodeId_str);
	}
	//...TRANSLATIONS

	private function _generateInfoRandomId():string
	{
		return self::_INFO_ID . self::$_fRandomIndex_int++;
	}
}


?>