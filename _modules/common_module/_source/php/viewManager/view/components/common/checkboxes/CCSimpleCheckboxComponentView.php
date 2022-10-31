<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CCSimpleCheckboxComponentView extends CCCheckboxComponentView
{
	//CSS...
	private const _CSS_COMPONENT						= 'css_simple_checkbox_component';
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

	/*override*/protected function __getJSComponent():string
	{
		return 'bsp.components_ns.checkboxes_ns.i_importJSCSimpleCheckboxComponentClass()';
	}
	//...JS
	
	//HTMLS...
	/*override*/protected function __drawHTMLComponentElement():void
	{
		echo
		'<input class="' .$this->__getComponentElementClasses(). '" id="' .$this->__getComponentElementId(). '" style="' .$this->__getComponentElementStyles(). '" type="checkbox" ' .$this->__getComponentValue(). ' name="' .$this->__getComponentId(). '" value="1">';
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