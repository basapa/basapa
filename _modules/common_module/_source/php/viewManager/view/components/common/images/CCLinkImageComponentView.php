<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CCLinkImageComponentView extends CCImageComponentView
{
	//PARAM IDS...
	public const i_PARAM_ID_COMPONENT_HREF				= 'href';
	//...PARAM IDS

	//CSS...
	private const _CSS_COMPONENT						= 'css_link_image_component';
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
				&& $this->__isComponentHrefDefined();
	}

	//JS...
	/*override*/protected function __drawPreJS():void
	{
	}

	/*override*/protected function __drawPostJS():void
	{
	}

	/*override*/protected function __getJSComponent():string
	{
		return 'bsp.components_ns.images_ns.i_importJSCLinkImageComponentViewClass()';
	}
	//...JS
	
	//HTMLS...
	/*override*/protected function __drawHTMLComponentElement():void
	{
		$lComponentAltValue_str = $this->__isComponentAltDefined() ? $this->__getComponentAlt() : '';

		echo
		'<a href="' .$this->__getComponentHref(). '">',
			'<img class="' .$this->__getComponentElementClasses(). '" id="' .$this->__getComponentElementId(). '" style="' .$this->__getComponentElementStyles(). '" src="' .$this->__getComponentFileName(). '" title="' .$lComponentAltValue_str. '" alt="' .$lComponentAltValue_str. '" width="' .$this->__getComponentWidth(). '" height="' .$this->__getComponentHeight(). '" border="0">',
		'</a>';
	}
	//...HTMLS
	
	//PARAMS...
	/*override*/protected function __getComponentClasses():string
	{
		return self::_CSS_COMPONENT. ' ' .parent::__getComponentClasses();
	}

	//HREF...
	private function _getComponentHrefVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_COMPONENT_HREF, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentHrefDefined():bool
	{
		return CVariableTools::i_isString($this->_getComponentHrefVar(false));
	}

	protected function __getComponentHref():string
	{
		return CVariableTools::i_toString($this->_getComponentHrefVar());
	}
	//...HREF
	//...PARAMS
}


?>