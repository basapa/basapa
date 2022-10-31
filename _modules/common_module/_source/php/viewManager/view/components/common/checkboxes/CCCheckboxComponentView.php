<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


abstract class CCCheckboxComponentView extends CCFormComponentView
{
	//PARAM IDS...
	public const i_PARAM_ID_OPT_COMPONENT_VALUE			= 'value';
	//...PARAM IDS

	//COMPONENT VALUES...
	public const i_VALUE_IS_CHECKED						= 'checked';
	public const i_VALUE_IS_NON_CHECKED					= '';
	//...COMPONENT VALUES

	//CSS...
	private const _CSS_COMPONENT						= 'css_checkbox_component';
	//...CSS
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __draw():void
	{
		$this->__drawHTMLComponentCaptionIfRequired();
		echo
		'<label for="' .$this->__getComponentElementId(). '">';
			$this->__drawHTMLComponentNameIfRequired();
			$this->__drawHTMLComponentPreNameIfRequired();
			$this->__drawHTMLComponentElement();
			$this->__drawHTMLComponentPostNameIfRequired();
			$this->__drawHTMLComponentErrorMessageIfRequired();
		echo
		'</label>',
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

	protected function __getComponentValue():string
	{
		//TODO: optimization required
		return CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_VALUE, false, self::i_VALUE_IS_NON_CHECKED));
	}
	//...PARAMS
}


?>