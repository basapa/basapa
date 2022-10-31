<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


abstract class CCTextComponentView extends CCInfoComponentView
{
	//PARAM IDS...
	public const i_PARAM_ID_COMPONENT_VALUE				= 'value';
	//...PARAM IDS
	
	//CSS...
	private const _CSS_COMPONENT						= 'css_text_component';
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
				&& $this->__isComponentValueDefined();
	}

	/*override*/protected function __draw():void
	{
		$this->__drawHTMLComponentCaptionIfRequired();
		$this->__drawHTMLComponentPreNameIfRequired();
		$this->__drawHTMLComponentElement();
		$this->__drawHTMLComponentPostNameIfRequired();
		echo
		'<div class="' .self::__CSS_CONTAINER. '">';
			$this->__drawHTMLComponentDescriptionIfRequired();
			$this->__drawHTMLComponentHintIfRequired();
		echo
		'</div>';
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
	//...PARAMS
}


?>