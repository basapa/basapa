<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


class CCSimpleImageComponentView extends CCImageComponentView
{
	//CSS...
	private const _CSS_COMPONENT						= 'css_simple_image_component';
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
		return 'bsp.components_ns.images_ns.i_importJSCSimpleImageComponentViewClass()';
	}
	//...JS

	//HTMLS...
	/*override*/protected function __drawHTMLComponentElement():void
	{
		$lComponentAltValue_str = $this->__isComponentAltDefined() ? $this->__getComponentAlt() : '';

		echo
		'<img class="' .$this->__getComponentElementClasses(). '" id="' .$this->__getComponentElementId(). '" style="' .$this->__getComponentElementStyles(). '" src="' .$this->__getComponentFileName(). '" title="' .$lComponentAltValue_str. '" alt="' .$lComponentAltValue_str. '" width="' .$this->__getComponentWidth(). '" height="' .$this->__getComponentHeight(). '" border="0">';
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