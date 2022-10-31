<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


abstract class CCTextareaComponentView extends CCFormComponentView
{
	//PARAM IDS...
	public const i_PARAM_ID_COMPONENT_VALUE				= 'value';
	public const i_PARAM_ID_COMPONENT_MAX_CHARS_COUNT	= 'max_chars_count';
	public const i_PARAM_ID_OPT_COMPONENT_PLACEHOLDER	= 'placeholder';
	//...PARAM IDS
	
	//IDS...
	private const _ID_COMPONENT_ELEMENT_LOCKING			= 'element_locking_id_';
	//...IDS
	
	//CSS...
	private const _CSS_COMPONENT						= 'css_textarea_component';
	private const _CSS_COMPONENT_ELEMENT_LOCKING		= 'css_element_locking';
	//...CSS
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __validateParams():bool
	{
		return parent::__validateParams()
				&& $this->__isComponentValueDefined()
				&& $this->__isComponentMaxCharsCountDefined();
	}

	/*override*/protected function __draw():void
	{
		$this->__drawHTMLComponentCaptionIfRequired();
		echo
		'<label for="' .$this->__getComponentId(). '">';
			$this->__drawHTMLComponentNameIfRequired();
			$this->__drawHTMLComponentPreNameIfRequired();
			$this->__drawHTMLComponentElement();
			$this->__drawHTMLComponentPostNameIfRequired();
			$this->__drawHTMLComponentHintIfRequired();
			$this->__drawHTMLComponentErrorMessageIfRequired();
		echo
		'</label>';
		$this->__drawHTMLComponentElementLocking();
		echo
		'<div class="' .self::__CSS_CONTAINER. '">';
			$this->__drawHTMLComponentDescriptionIfRequired();
		echo
		'</div>';
	}
	
	//HTMLS...
	protected function __drawHTMLComponentElementLocking():void
	{
		echo
		'<span class="' .$this->__getComponentElementLockingIndicatorClass(). '" id="' .$this->__getComponentElementLockingId(). '"></span>';
	}
	//...HTMLS
	
	protected function __getComponentElementLockingId():string
	{
		return self::_ID_COMPONENT_ELEMENT_LOCKING . $this->__getComponentId();
	}
	
	/*virtual*/protected function __getComponentElementLockingIndicatorClass():string
	{
		return self::_CSS_COMPONENT_ELEMENT_LOCKING;
	}

	//PARAMS...
	/*override*/protected function __getComponentClasses():string
	{
		return self::_CSS_COMPONENT. ' ' .parent::__getComponentClasses();
	}
	
	//VALUE...
	private function _getComponentValueVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_COMPONENT_VALUE, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentValueDefined():bool
	{
		return CVariableTools::i_isString($this->_getComponentValueVar(false));
	}

	protected function __getComponentValue():string
	{
		return CVariableTools::i_toString($this->_getComponentValueVar());
	}
	//...VALUE
	
	//MAX CHARS COUNT...
	private function _getComponentMaxCharsCountVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_COMPONENT_MAX_CHARS_COUNT, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentMaxCharsCountDefined():bool
	{
		return CVariableTools::i_isInt($this->_getComponentMaxCharsCountVar(false));
	}

	protected function __getComponentMaxCharsCount():int
	{
		return CVariableTools::i_toInt($this->_getComponentMaxCharsCountVar());
	}
	//...MAX CHARS COUNT

	protected function __getComponentPlaceholder():string
	{
		//TODO: optimization required
		return CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_PLACEHOLDER, false, ''));
	}
	//...PARAMS
}


?>