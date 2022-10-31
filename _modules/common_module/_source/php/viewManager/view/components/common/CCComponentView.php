<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


abstract class CCComponentView
{
	//ID PREFIXES...
	public const i_ID_PREFIX_COMPONENT_ELEMENT			= 'element_';
	public const i_ID_PREFIX_COMPONENT_CAPTION			= 'caption_';
	public const i_ID_PREFIX_COMPONENT_DESCRIPTION		= 'description_';
	public const i_ID_PREFIX_COMPONENT_HINT				= 'hint_';
	//...ID PREFIXES
	
	//JS PHP AGREEMENTS...
	public const i_JS_ID_PREFIX_COMPONENT_ELEMENT		= self::i_ID_PREFIX_COMPONENT_ELEMENT;
	public const i_JS_ID_PREFIX_COMPONENT_CAPTION		= self::i_ID_PREFIX_COMPONENT_CAPTION;
	public const i_JS_ID_PREFIX_COMPONENT_DESCRIPTION	= self::i_ID_PREFIX_COMPONENT_DESCRIPTION;
	public const i_JS_ID_PREFIX_COMPONENT_HINT			= self::i_ID_PREFIX_COMPONENT_HINT;

	public const i_JS_COMPONENT_ATTR_ID					= 'COMPONENT_ATTR_ID';
	//...JS PHP AGREEMENTS
	
	//PARAM IDS...
	public const i_PARAM_ID_OPT_COMPONENT_ID				= 'id';
	public const i_PARAM_ID_OPT_COMPONENT_CLASSES			= 'classes';
	public const i_PARAM_ID_OPT_COMPONENT_STYLES			= 'styles';
	public const i_PARAM_ID_OPT_COMPONENT_CAPTION			= 'caption';
	public const i_PARAM_ID_OPT_COMPONENT_DESCRIPTION		= 'description';
	public const i_PARAM_ID_OPT_COMPONENT_HINT				= 'hint';
	public const i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	= 'element_classes';
	public const i_PARAM_ID_OPT_COMPONENT_ELEMENT_STYLES	= 'element_styles';
	public const i_PARAM_ID_OPT_JS_COMPONENT_ID				= 'js_component_id';
	public const i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		= 'js_component_init_func';
	//...PARAM IDS
	
	//IDS...
	private const _ID_COMPONENT							= 'component_id_';
	//...IDS
	
	//CSS...
	protected const __CSS_CONTAINER						= 'css_container';
	private const _CSS_COMPONENT						= 'css_component';
	private const _CSS_COMPONENT_ELEMENT				= 'css_element';
	private const _CSS_COMPONENT_CAPTION				= 'css_caption';
	private const _CSS_COMPONENT_DESCRIPTION			= 'css_description';
	private const _CSS_COMPONENT_HINT					= 'css_hint';
	private const _CSS_COMPONENT_HINT_POINTER			= 'css_hint_pointer';
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

	public function i_draw(array $aOptParams_a_arr = null/*, bool $aOptIsManuallyJSDrawingMode_bl = false, string &$aOptJSDrawingContent_str = ''*/):void
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
		'<div class="' .$this->__getComponentClasses(). '" id="' .$this->__getComponentId(). '" style="' .$this->__getComponentStyles(). '">';
			$this->__draw();
		echo
		'</div>';

		if (
				$lIsJSSupportAllowed_bl
				//&& !$aOptIsManuallyJSDrawingMode_bl
			)
		{
			echo
			'<script type="text/javascript">';
				$this->__drawPostJS();
			echo
			'</script>';
		}

		/*if ($aOptIsManuallyJSDrawingMode_bl)
		{
			$aOptJSDrawingContent_str = $this->_getJSDrawing();
		}*/
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*/protected function __init():void
	{
		$this->_fRandomId_str = $this->_generateComponentRandomId();
	}
	
	protected function __getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}
	
	/*virtual*/protected function __validateParams():bool
	{
		return true;
	}
	
	abstract protected function __draw():void;

	//JS...
	protected function __isJSSupportAllowed():bool
	{
		return $this->__isJSComponentIdDefined()
				&& $this->__isJSComponentInitFuncDefined();
	}

	/*virtual*/protected function __drawPreJS():void
	{
	}

	/*virtual*/protected function __drawPostJS():void
	{
		echo
		'var lClassImport_obj = ' .$this->__getJSComponent(). ';
		var lComponent_clss = new lClassImport_obj();
		lComponent_clss.i_setComponentAttrs(\'' .CJSTools::i_convertAssociativeArrayToJSObject($this->__getJSComponentAttrs()). '\');
		lComponent_clss.i_initDOMComponent();'.
		$this->__getJSComponentInitFunc(). '(\'' .$this->__getJSComponentId(). '\', lComponent_clss);';
	}
	
	abstract protected function __getJSComponent():string;

	/*virtual*/protected function __getJSComponentAttrs():array
	{
		return [self::i_JS_COMPONENT_ATTR_ID => $this->__getComponentId()];
	}
	//...JS
	
	//HTMLS...
	abstract protected function __drawHTMLComponentElement():void;

	/*virtual*/protected function __drawHTMLComponentCaptionIfRequired(string $aOptPreString_str = '', string $aOptPostString_str = ''):void
	{
		if ($this->__isComponentCaptionDefined())
		{
			$l_str = $this->__getComponentCaption();
			if (!empty($l_str))
			{
				$l_str = $aOptPreString_str . $l_str . $aOptPostString_str;

				echo
				$this->__applyHTMLParamValueWrap($l_str, self::_CSS_COMPONENT_CAPTION, self::i_ID_PREFIX_COMPONENT_CAPTION);
			}
		}
	}

	protected function __drawHTMLComponentDescriptionIfRequired():void
	{
		if ($this->__isComponentDescriptionDefined())
		{
			$l_str = $this->__getComponentDescription();
			if (!empty($l_str))
			{
				echo
				$this->__applyHTMLParamValueWrap($l_str, self::_CSS_COMPONENT_DESCRIPTION, self::i_ID_PREFIX_COMPONENT_DESCRIPTION);
			}
		}
	}
	
	protected function __drawHTMLComponentHintIfRequired():void
	{
		if ($this->__isComponentHintDefined())
		{
			$l_str = $this->__getComponentHint();
			if (!empty($l_str))
			{
				$l_str .= '<span class="' .self::_CSS_COMPONENT_HINT_POINTER. '"></span>';

				echo
				$this->__applyHTMLParamValueWrap($l_str, self::_CSS_COMPONENT_HINT, self::i_ID_PREFIX_COMPONENT_HINT);
			}
		}
	}
	//...HTMLS

	protected function __applyNoIndexWrap(string $a_str):string
	{
		return '<!--noindex-->' .$a_str. '<!--/noindex-->';
	}

	protected function __applyHTMLParamValueWrap(string $aParamValue_str, string $aCSSClassName_str, string $aOptParamValueIdPrefix_str = ''):string
	{
		$lSpanId_str = !empty($aOptParamValueIdPrefix_str) ? 'id="' .$aOptParamValueIdPrefix_str . $this->__getComponentId(). '"' : '';
		
		return '<span ' .$lSpanId_str. ' class="' .$aCSSClassName_str. '">' .$aParamValue_str. '</span>';
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
	/*virtual*/protected function __getComponentId():string
	{
		//TODO: optimization required
		return CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_ID, false, $this->_fRandomId_str));
	}
	
	/*virtual*/protected function __getComponentClasses():string
	{
		//TODO: optimization required
		return self::_CSS_COMPONENT. ' ' .CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_CLASSES, false, ''));
	}

	protected function __getComponentStyles():string
	{
		//TODO: optimization required
		return CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_STYLES, false, ''));
	}

	protected function __getComponentElementClasses():string
	{
		//TODO: optimization required
		return self::_CSS_COMPONENT_ELEMENT. ' ' .CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES, false, ''));
	}

	protected function __getComponentElementStyles():string
	{
		//TODO: optimization required
		return CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_ELEMENT_STYLES, false, ''));
	}
	
	//CAPTION...
	private function _getComponentCaptionVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_CAPTION, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentCaptionDefined():bool
	{
		return CVariableTools::i_isString($this->_getComponentCaptionVar(false));
	}
	
	protected function __getComponentCaption():string
	{
		return CVariableTools::i_toString($this->_getComponentCaptionVar());
	}
	//...CAPTION

	//DESCRIPTION...
	private function _getComponentDescriptionVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_DESCRIPTION, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentDescriptionDefined():bool
	{
		return CVariableTools::i_isString($this->_getComponentDescriptionVar(false));
	}
	
	protected function __getComponentDescription():string
	{
		return CVariableTools::i_toString($this->_getComponentDescriptionVar());
	}
	//...DESCRIPTION
	
	//HINT...
	private function _getComponentHintVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_HINT, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentHintDefined():bool
	{
		return CVariableTools::i_isString($this->_getComponentHintVar(false));
	}
	
	protected function __getComponentHint():string
	{
		return CVariableTools::i_toString($this->_getComponentHintVar());
	}
	//...HINT
	
	//JS COMPONENT ID...
	private function _getJSComponentIdVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_OPT_JS_COMPONENT_ID, $aOptThrowIfNotExist_bl);
	}

	protected function __isJSComponentIdDefined():bool
	{
		return CVariableTools::i_isString($this->_getJSComponentIdVar(false));
	}
	
	protected function __getJSComponentId():string
	{
		return CVariableTools::i_toString($this->_getJSComponentIdVar());
	}
	//...JS COMPONENT ID
	
	//JS COMPONENT INIT FUNC...
	private function _getJSComponentInitFuncVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC, $aOptThrowIfNotExist_bl);
	}

	protected function __isJSComponentInitFuncDefined():bool
	{
		return CVariableTools::i_isString($this->_getJSComponentInitFuncVar(false));
	}
	
	protected function __getJSComponentInitFunc():string
	{
		return CVariableTools::i_toString($this->_getJSComponentInitFuncVar());
	}
	//...JS COMPONENT INIT FUNC
	//...PARAMS

	protected function __getComponentElementId():string
	{
		return self::i_ID_PREFIX_COMPONENT_ELEMENT . $this->__getComponentId();
	}

	/*private function _getJSDrawing():string
	{
		return
		'var JSComponent = ' .$this->__getJSComponent(). ';
		var lJSComponent_clss = new JSComponent();
		lJSComponent_clss.jsSetComponentAttrs(\'' .CJSTools::i_convertAssociativeArrayToJSObject($this->__getJSComponentAttrs()). '\');
		lJSComponent_clss.jsInitDOMComponent();'.
		$this->__getJSComponentInitFunc(). '(\'' .$this->__getJSComponentId(). '\', lJSComponent_clss);';
	}*/

	private function _generateComponentRandomId():string
	{
		return self::_ID_COMPONENT . self::$_fRandomIndex_int++;
	}
}


?>