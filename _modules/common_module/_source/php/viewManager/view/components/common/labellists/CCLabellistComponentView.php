<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


abstract class CCLabellistComponentView extends CCInfoComponentView
{
	//PARAM IDS...
	public const i_PARAM_ID_ITEMS_PARAMS				= 'items_params';
	//...PARAM IDS
	
	//CSS...
	private const _CSS_COMPONENT						= 'css_labellist_component';
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
				&& $this->__isComponentLabellistItemsParamsDefined();
	}

	/*override*/protected function __draw():void
	{
		$this->__drawHTMLComponentCaptionIfRequired();
		$this->__drawHTMLComponentPreNameIfRequired();
		$this->__drawHTMLComponentElement();
		$this->__drawHTMLComponentPostNameIfRequired();
		echo
		'<div class="' .self::__CSS_CONTAINER. '">';
			$this->__drawHTMLComponentDescriptionIfRequired();
			$this->__drawHTMLComponentHintIfRequired();
		echo
		'</div>';
	}

	//HTMLS...
	/*override*/protected function __drawHTMLComponentElement():void
	{
		echo
		'<ul id="' .$this->__getComponentId(). '"class="' .$this->__getComponentElementClasses(). '">';

			$lLabellistComponentItems_clss = new CCLabellistComponentItems();
			$lLabellistComponentItems_clss->i_drawHTMLItems($this->__getComponentLabellistItemsParams());

		echo
		'</ul>';
	}
	//...HTMLS
	
	//PARAMS...
	/*override*/protected function __getComponentClasses():string
	{
		return self::_CSS_COMPONENT. ' ' .parent::__getComponentClasses();
	}

	//ITEMS PARAMS...
	private function _getComponentLabellistItemsParamsVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_ITEMS_PARAMS, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentLabellistItemsParamsDefined():bool
	{
		return CVariableTools::i_isArray($this->_getComponentLabellistItemsParamsVar(false));
	}

	protected function __getComponentLabellistItemsParams():array
	{
		return $this->_getComponentLabellistItemsParamsVar();
	}
	//...ITEMS PARAMS
	//...PARAMS
}


?>