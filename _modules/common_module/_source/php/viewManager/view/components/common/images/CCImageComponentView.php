<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


abstract class CCImageComponentView extends CCInfoComponentView
{
	//PARAM IDS...
	public const i_PARAM_ID_COMPONENT_FILE_NAME			= 'file_name';
	public const i_PARAM_ID_COMPONENT_WIDTH				= 'width';
	public const i_PARAM_ID_COMPONENT_HEIGHT			= 'height';
	public const i_PARAM_ID_OPT_COMPONENT_ALT			= 'alt';
	//...PARAM IDS
	
	//CSS...
	private const _CSS_COMPONENT						= 'css_image_component';
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
				&& $this->__isComponentFileNameDefined()
				&& $this->__isComponentWidthDefined()
				&& $this->__isComponentHeightDefined();
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

	//FILE NAME...
	private function _getComponentFileNameVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_COMPONENT_FILE_NAME, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentFileNameDefined():bool
	{
		return CVariableTools::i_isString($this->_getComponentFileNameVar(false));
	}

	protected function __getComponentFileName():string
	{
		return CVariableTools::i_toString($this->_getComponentFileNameVar());
	}
	//...FILE NAME

	//WIDTH...
	private function _getComponentWidthVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_COMPONENT_WIDTH, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentWidthDefined():bool
	{
		return CVariableTools::i_isInt($this->_getComponentWidthVar(false));
	}

	protected function __getComponentWidth():int
	{
		return CVariableTools::i_toInt($this->_getComponentWidthVar());
	}
	//...WIDTH

	//HEIGHT...
	private function _getComponentHeightVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_COMPONENT_HEIGHT, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentHeightDefined():bool
	{
		return CVariableTools::i_isInt($this->_getComponentHeightVar(false));
	}

	protected function __getComponentHeight():int
	{
		return CVariableTools::i_toInt($this->_getComponentHeightVar());
	}
	//...HEIGHT

	//ALT...
	private function _getComponentAltVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_ALT, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentAltDefined():bool
	{
		return CVariableTools::i_isString($this->_getComponentAltVar(false));
	}

	protected function __getComponentAlt():string
	{
		return CVariableTools::i_toString($this->_getComponentAltVar());
	}
	//...ALT
	//...PARAMS
}


?>