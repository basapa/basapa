<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CCLinkButtonComponentView extends CCButtonComponentView
{
	//PARAM IDS...
	public const i_PARAM_ID_COMPONENT_HREF				= 'href';
	public const i_PARAM_ID_OPT_COMPONENT_IS_NO_FOLLOW	= 'is_nofollow';
	public const i_PARAM_ID_OPT_COMPONENT_IS_DOWNLOAD	= 'download';
	//...PARAM IDS
	
	//CSS...
	private const _CSS_COMPONENT						= 'css_link_button_component';
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
		return 'bsp.components_ns.buttons_ns.i_importJSCLinkButtonComponentViewClass()';
	}
	//...JS
	
	//HTMLS...
	/*override*/protected function __drawHTMLComponentElement():void
	{
		$lDownloadAttr_str = $this->__isComponentDownload() ? 'download' : '';

		echo
		'<a class="' .$this->__getComponentElementClasses(). '" id="' .$this->__getComponentElementId(). '" href="' .$this->__getComponentHref(). '"  rel="' .$this->__isComponentNoFollow(). '" style="' .$this->__getComponentElementStyles(). '" ' .$lDownloadAttr_str. '>';
			$this->__drawHTMLComponentNameIfRequired();
		echo
		'</a>';
	}
	//...HTMLS

	//PARAMS...
	/*override*/protected function __getComponentClasses():string
	{
		return self::_CSS_COMPONENT . ' ' .parent::__getComponentClasses();
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

	protected function __isComponentNoFollow():bool
	{
		//TODO: optimization required
		return CVariableTools::i_toBoolean($this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_IS_NO_FOLLOW, false, false));
	}

	protected function __isComponentDownload():bool
	{
		//TODO: optimization required
		return CVariableTools::i_toBoolean($this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_IS_DOWNLOAD, false, false));
	}
	//...PARAMS
}


?>