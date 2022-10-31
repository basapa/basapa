<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCRadiobuttonComponentItem extends CCComponentItem
{
	//PARAMS IDS...
	public const i_PARAM_ID_ITEM_PRE_NAME				= 'pre_name';
	public const i_PARAM_ID_ITEM_POST_NAME				= 'post_name';
	//...PARAMS IDS
	
	//ITEM STATES...
	/*override*/protected const __ITEM_STATES			= [	'',
															'disabled',
															'checked'];
	//...ITEM STATES
	
	//CSS...
	private const _CSS_COMPONENT_ITEM_PRE_NAME			= 'css_item_pre_name';
	private const _CSS_COMPONENT_ITEM_POST_NAME			= 'css_item_post_name';
	//...CSS
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __validateParams():bool
	{
		return $this->__isItemComponentIdDefined()
				&&
				(
					$this->__isItemNameDefined()
					|| $this->__isItemPreNameDefined()
					|| $this->__isItemPostNameDefined()
				)
				&& $this->__isItemValueDefined()
				&& $this->__isItemStateDefined();
	}

	//HTMLS...
	/*override*/protected function __drawHTMLItem():void
	{
		echo
		'<label class="' .$this->__getItemClasses(). '" for="' .$this->__getItemComponentElementId(). '">';
			$this->__drawHTMLItemPreNameIfRequired();//----remame required
			$this->__drawHTMLItemElement();
			$this->__drawHTMLItemPostNameIfRequired();
			$this->__drawHTMLItemName();
		echo
		'</label>';
	}

	/*override*/protected function __drawHTMLItemElement():void
	{
		echo
		'<input class="' .self::__CSS_COMPONENT_ITEM_ELEMENT. '" id="' .$this->__getItemComponentElementId(). '" type="radio" ' .self::__ITEM_STATES[$this->__getItemState()]. ' name="' .$this->__getItemComponentId(). '" value="' .$this->__getItemValue(). '">';
	}

	protected function __drawHTMLItemPreNameIfRequired():void
	{
		if ($this->__isItemPreNameDefined())
		{
			echo
			$this->__applyHTMLParamValueWrap($this->__getItemPreName(), self::_CSS_COMPONENT_ITEM_PRE_NAME);
		}
	}

	protected function __drawHTMLItemPostNameIfRequired():void
	{
		if ($this->__isItemPostNameDefined())
		{
			echo
			$this->__applyHTMLParamValueWrap($this->__getItemPostName(), self::_CSS_COMPONENT_ITEM_POST_NAME);
		}
	}
	//...HTMLS

	//PARAMS...
	//PRE NAME...
	private function _getItemPreNameVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_ITEM_PRE_NAME, $aOptThrowIfNotExist_bl);
	}

	protected function __isItemPreNameDefined():bool
	{
		return CVariableTools::i_isString($this->_getItemPreNameVar(false));
	}

	protected function __getItemPreName():string
	{
		return CVariableTools::i_toString($this->_getItemPreNameVar());
	}
	//...PRE NAME

	//POST NAME...
	private function _getItemPostNameVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_ITEM_POST_NAME, $aOptThrowIfNotExist_bl);
	}

	protected function __isItemPostNameDefined():bool
	{
		return CVariableTools::i_isString($this->_getItemPreNameVar(false));
	}

	protected function __getItemPostName():string
	{
		return CVariableTools::i_toString($this->_getItemPreNameVar());
	}
	//...POST NAME
	//...PARAMS
}


?>