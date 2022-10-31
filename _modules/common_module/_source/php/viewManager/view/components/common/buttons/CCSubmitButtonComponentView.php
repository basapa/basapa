<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CCSubmitButtonComponentView extends CCButtonComponentView
{
	//JS PHP AGREEMENTS...
	public const i_JS_COMPONENT_ATTR_ELEMENT_BLOCKING_ID	= 'COMPONENT_ATTR_ELEMENT_BLOCKING_ID';
	//...JS PHP AGREEMENTS

	//PARAM IDS...
	public const i_PARAM_ID_OPT_COMPONENT_REQUEST_ID	= 'request_id';
	//...PARAM IDS

	//IDS...
	private const _ID_COMPONENT_ELEMENT_BLOCKING		= 'component_element_blocking_id_';
	//...IDS
	
	//CSS...
	private const _CSS_COMPONENT							= 'css_submit_button_component';
	private const _CSS_COMPONENT_ELEMENT_BLOCKING			= 'css_element_blocking';
	private const _CSS_COMPONENT_ELEMENT_BLOCKING_INDICATOR	= 'css_element_blocking_indicator';
	//...CSS

	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//JS...
	/*override*/protected function __getJSComponent():string
	{
		return 'bsp.components_ns.buttons_ns.i_importJSCSubmitButtonComponentViewClass()';
	}

	/*override*/protected function __getJSComponentAttrs():array
	{
		$lJSComponentAttrs_a_arr	= [	CCSubmitButtonComponentView::i_JS_COMPONENT_ATTR_ELEMENT_BLOCKING_ID => $this->_getComponentElementBlockingId()];

		return CArrayTools::i_merge(parent::__getJSComponentAttrs(), $lJSComponentAttrs_a_arr);
	}
	//...JS

	//HTMLS...
	/*override*/protected function __drawHTMLComponentElement():void
	{
		echo
		'<button type="submit"' .$this->_addComponentElementClasses() . $this->_addComponentElementStyles() . $this->_addComponentElementId() . $this->_addComponentElementNameIfRequired() . $this->_addComponentRequestIdIfRequired(). '>';
			$this->__drawHTMLComponentNameIfRequired();
		echo
		'</button>',
		'<span class="' .self::_CSS_COMPONENT_ELEMENT_BLOCKING. ' ' .self::_CSS_COMPONENT_ELEMENT_BLOCKING_INDICATOR. '" id="' .$this->_getComponentElementBlockingId(). '"></span>';
	}
	//...HTMLS

	private function _addComponentElementClasses():string
	{
		return ' class="' .$this->__getComponentElementClasses(). '"';
	}

	private function _addComponentElementId():string
	{
		return ' id="' .$this->__getComponentElementId(). '"';
	}

	private function _addComponentElementNameIfRequired():string
	{
		return $this->_isComponentRequestIdDefined() ? ' name="' .CCRequestParamConst::i_POST_PARAM_ID_REQUEST. '"' : '';
	}

	private function _addComponentElementStyles():string
	{
		return ' style="' .$this->__getComponentElementStyles(). '"';
	}

	private function _addComponentRequestIdIfRequired():string
	{
		return $this->_isComponentRequestIdDefined() ? ' value="' .$this->__getComponentRequestId(). '"' : '';
	}

	private function _getComponentElementBlockingId():string
	{
		return self::_ID_COMPONENT_ELEMENT_BLOCKING . $this->__getComponentId();
	}

	//PARAMS...
	/*override*/protected function __getComponentClasses():string
	{
		return self::_CSS_COMPONENT. ' ' .parent::__getComponentClasses();
	}

	//REQUEST...
	private function _getComponentRequestIdVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_REQUEST_ID, $aOptThrowIfNotExist_bl);
	}

	private function _isComponentRequestIdDefined():bool
	{
		return CVariableTools::i_isString($this->_getComponentRequestIdVar(false));
	}

	protected function __getComponentRequestId():string
	{
		return CVariableTools::i_toString($this->_getComponentRequestIdVar());
	}
	//...REQUEST
	//...PARAMS
}


?>