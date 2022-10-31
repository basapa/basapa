<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CCSimpleTextfieldComponentView extends CCTextfieldComponentView
{
	//CSS...
	private const _CSS_COMPONENT						= 'css_simple_textfield_component';
	//...CSS
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
	
	//JS...
	/*override*/protected function __drawPreJS():void
	{
	}

	/*override*/protected function __drawPostJS():void
	{
	}

	/*override*/ protected function __getJSComponent():string
	{
		return 'bsp.components_ns.textfields_ns.i_importJSCSimpleTextfieldComponentViewClass()';
	}
	//...JS
	
	//HTMLS...
	/*override*/protected function __drawHTMLComponentElement():void
	{
		echo
		'<input class="' .$this->__getComponentElementClasses(). '" id="' .$this->__getComponentElementId(). '" style="' .$this->__getComponentElementStyles(). '" type="text" name="' .$this->__getComponentId(). '" maxlength="' .$this->__getComponentMaxCharsCount(). '" placeholder="' .$this->__getComponentPlaceholder(). '" value="' .$this->__getComponentValue(). '">';
	}
	//...HTMLS
	
	//PARAMS...
	/*override*/protected function __getComponentClasses():string
	{
		return self::_CSS_COMPONENT. ' ' .parent::__getComponentClasses();
	}
	//...PARAMS
}


?>