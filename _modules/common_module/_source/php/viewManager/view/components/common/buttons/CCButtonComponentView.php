<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


abstract class CCButtonComponentView extends CCInfoComponentView
{
	//CSS...
	private const _CSS_COMPONENT						= 'css_button_component';
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
				&& $this->__isComponentNameDefined();
	}

	/*override*/protected function __draw():void
	{
		$this->__drawHTMLComponentCaptionIfRequired();
		echo
		'<div class="' .self::__CSS_CONTAINER. '">';
			$this->__drawHTMLComponentPreNameIfRequired();
			$this->__drawHTMLComponentElement();
			$this->__drawHTMLComponentPostNameIfRequired();
		echo
		'</div>',
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
	//...PARAMS
}


?>