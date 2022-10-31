<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CCSimpleTextareaComponentView extends CCTextareaComponentView
{
	//CSS...
	private const _CSS_COMPONENT						= 'css_simple_textarea_component';
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
		return 'bsp.components_ns.textareas_ns.i_importJSCSimpleTextareaComponentViewClass()';
	}
	//...JS
	
	//HTMLS...
	/*override*/protected function __drawHTMLComponentElement():void
	{
		$lComponentId_str = $this->__getComponentId();

		echo
		'<textarea class="' .$this->__getComponentElementClasses(). '" style="' .$this->__getComponentElementStyles(). '" id="' .$lComponentId_str. '" name="' .$lComponentId_str. '" maxlength="' .$this->__getComponentMaxCharsCount(). '" placeholder="' .$this->__getComponentPlaceholder(). '">',
			$this->__getComponentValue(),
		'</textarea>';
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