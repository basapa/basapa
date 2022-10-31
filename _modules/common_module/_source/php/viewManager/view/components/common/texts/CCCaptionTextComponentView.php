<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CCCaptionTextComponentView extends CCTextComponentView
{
	//PARAM IDS...
	public const i_PARAM_ID_COMPONENT_SIZE				= 'size';
	//...PARAM IDS
	
	//COMPONENT SIZES...
	public const i_SIZE_1								= '1';
	public const i_SIZE_2								= '2';
	public const i_SIZE_3								= '3';
	public const i_SIZE_4								= '4';
	public const i_SIZE_5								= '5';
	//...COMPONENT SIZES
	
	//CSS...
	private const _CSS_COMPONENT						= 'css_caption_text_component';
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
				&& $this->__isComponentSizeDefined();
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
		return 'bsp.components_ns.texts_ns.i_importJSCCaptionTextComponentViewClass()';
	}
	//...JS
	
	//HTMLS...
	/*override*/protected function __drawHTMLComponentElement():void
	{
		$lComponentSize_str = $this->__getComponentSize();

		echo
		'<h' .$lComponentSize_str. ' class="' .$this->__getComponentElementClasses(). '" id="' .$this->__getComponentElementId(). '" style="' .$this->__getComponentElementStyles(). '">',
			$this->__getComponentValue(),
		'</h' .$lComponentSize_str. '>';
	}
	//...HTMLS
	
	//PARAMS...
	/*override*/protected function __getComponentClasses():string
	{
		return self::_CSS_COMPONENT. ' ' .parent::__getComponentClasses();
	}
	
	//SIZE...
	private function _getComponentSizeVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_COMPONENT_SIZE, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentSizeDefined():bool
	{
		return CVariableTools::i_isString($this->_getComponentSizeVar(false));
	}

	protected function __getComponentSize():string
	{
		return CVariableTools::i_toString($this->_getComponentSizeVar());
	}
	//...SIZE
	//...PARAMS
}


?>