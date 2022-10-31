<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


abstract class CCFormComponentView extends CCInfoComponentView
{
	//PARAM IDS...
	public const i_PARAM_ID_OPT_COMPONENT_FILLING_MODE				= 'filling_mode';
	public const i_PARAM_ID_OPT_COMPONENT_ERROR_MESSAGE				= 'error_message';
	public const i_PARAM_ID_OPT_IS_COMPONENT_ERROR_MESSAGE_ALLOWED	= 'is_error_message_allowed';
	//...PARAM IDS
	
	//FILLING MODES...
	public const i_FILLING_MODE_ID_NON_MANDATORY			= 0;
	public const i_FILLING_MODE_ID_MANDATORY				= 1;
	//public const i_FILLING_MODE_ID_AT_LEAST_ONE_MANDATORY	= 2;//small hack for group of components
	//...FILLING MODES

	//CSS...
	private const _CSS_COMPONENT						= 'css_form_component';
	private const _CSS_COMPONENT_ERROR_MESSAGE			= 'css_error_message';
	//...CSS
	
	private const _MANDATORY_FIELD_MARKER				= '<span class="css_mandatory_field">* </span>';


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//HTMLS...
	/*override*/protected function __drawHTMLComponentCaptionIfRequired(string $aOptPreString_str = '', string $aOptPostString_str = ''):void
	{
		if (
				$this->__isMandatoryComponentFillingMode()
				&& !$this->__isComponentNameDefined()
			)
		{
			$aOptPreString_str = self::_MANDATORY_FIELD_MARKER;
		}

		parent::__drawHTMLComponentCaptionIfRequired($aOptPreString_str, $aOptPostString_str);
	}

	/*override*/protected function __drawHTMLComponentNameIfRequired(string $aOptPreString_str = '', string $aOptPostString_str = ''):void
	{
		if ($this->__isMandatoryComponentFillingMode())
		{
			$aOptPreString_str = self::_MANDATORY_FIELD_MARKER;
		}

		parent::__drawHTMLComponentNameIfRequired($aOptPreString_str, $aOptPostString_str);
	}

	protected function __drawHTMLComponentErrorMessageIfRequired():void
	{
		if (
				$this->__isComponentErrorMessageDefined()
				&& $this->__isComponentErrorMessageAllowed()
				&& $this->__isComponentErrorMessageRequired()
			)
		{
			$l_str = $this->__getComponentErrorMessage();
			if (!empty($l_str))
			{
				echo
				$this->__applyHTMLParamValueWrap($l_str, self::_CSS_COMPONENT_ERROR_MESSAGE);
			}
		}
	}
	//...HTMLS

	protected function __isMandatoryComponentFillingMode():bool
	{
		return $this->__getComponentFillingMode() === self::i_FILLING_MODE_ID_MANDATORY;
	}

	/*virtual*/protected function __isComponentErrorMessageRequired():bool
	{
		return $this->__isMandatoryComponentFillingMode();
	}
	
	//PARAMS...
	/*override*/protected function __getComponentClasses():string
	{
		return self::_CSS_COMPONENT. ' ' .parent::__getComponentClasses();
	}
	
	protected function __getComponentFillingMode():int
	{
		//TODO: optimization required
		return CVariableTools::i_toInt($this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE, false, self::i_FILLING_MODE_ID_NON_MANDATORY));
	}
	
	//ERROR MESSAGE...
	private function _getComponentErrorMessageVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_ERROR_MESSAGE, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentErrorMessageDefined():bool
	{
		return CVariableTools::i_isString($this->_getComponentErrorMessageVar(false));
	}
	
	protected function __getComponentErrorMessage():string
	{
		return CVariableTools::i_toString($this->_getComponentErrorMessageVar());
	}
	//...ERROR MESSAGE
	
	protected function __isComponentErrorMessageAllowed():bool
	{
		return CVariableTools::i_toBoolean($this->__getParamValue(self::i_PARAM_ID_OPT_IS_COMPONENT_ERROR_MESSAGE_ALLOWED, false, false));
	}
	//...PARAMS
}


?>