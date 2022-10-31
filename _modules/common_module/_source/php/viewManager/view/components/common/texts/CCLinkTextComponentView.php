<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CCLinkTextComponentView extends CCTextComponentView
{
	//PARAM IDS...
	public const i_PARAM_ID_COMPONENT_HREF				= 'href';
	public const i_PARAM_ID_OPT_COMPONENT_ALT			= 'alt';
	public const i_PARAM_ID_OPT_COMPONENT_TARGET		= 'target';
	//...PARAM IDS

	//TARGET PARAM VALUES...
	public const i_TARGET_PARAM_VALUE_NEW_WINDOW		= '_blank';
	public const i_TARGET_PARAM_VALUE_CURRENT_WINDOW	= '_self';
	//...TARGET PARAM VALUES

	//CSS...
	private const _CSS_COMPONENT						= 'css_link_text_component';
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

	/*override*/ protected function __getJSComponent():string
	{
		return 'bsp.components_ns.texts_ns.i_importJSCLinkTextComponentViewClass()';
	}
	//...JS
	
	//HTMLS...
	/*override*/protected function __drawHTMLComponentElement():void
	{
		echo
		'<a class="' .$this->__getComponentElementClasses(). '" id="' .$this->__getComponentElementId(). '" style="' .$this->__getComponentElementStyles(). '" href="' .$this->__getComponentHref(). '" title="' .$this->__getComponentAlt(). '" target="' .$this->__getComponentTarget(). '">',
			$this->__getComponentValue(),
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

	protected function __getComponentTarget():string
	{
		//TODO: optimization required
		return CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_TARGET, false, self::i_TARGET_PARAM_VALUE_CURRENT_WINDOW));
	}

	protected function __getComponentAlt():string
	{
		//TODO: optimization required
		return CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_ALT, false, ''));
	}
	//...PARAMS
}


?>