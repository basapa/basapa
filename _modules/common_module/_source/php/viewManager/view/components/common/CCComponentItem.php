<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


abstract class CCComponentItem
{
	//PARAMS IDS...
	public const i_PARAM_ID_OPT_ITEM_COMPONENT_ID		= 'component_id';
	public const i_PARAM_ID_OPT_ITEM_ID					= 'id';
	public const i_PARAM_ID_ITEM_NAME					= 'name';
	public const i_PARAM_ID_OPT_ITEM_HINT				= 'hint';
	public const i_PARAM_ID_ITEM_VALUE					= 'value';
	public const i_PARAM_ID_ITEM_STATE					= 'state';
	public const i_PARAM_ID_OPT_ITEM_CLASSES			= 'classes';
	//...PARAMS IDS
	
	//ITEM STATES...
	public const i_ITEM_STATE_ENABLED					= 0;
	public const i_ITEM_STATE_DISABLED					= 1;
	public const i_ITEM_STATE_SELECTED					= 2;
	/*virtual*/protected const __ITEM_STATES			= [	'enabled',
															'disabled',
															'selected'];
	//...ITEM STATES
	
	//IDS...
	private const _COMPONENT_ITEM_ID_PREFIX				= '_item_id_';
	private const _COMPONENT_ITEM_ELEMENT_ID_PREFIX		= '_item_element_id_';
	//...IDS
	
	//CSS...
	protected const __CSS_COMPONENT_ITEM_ELEMENT		= 'css_item_element';
	private const _CSS_ITEM								= 'css_item';
	private const _CSS_COMPONENT_ITEM_NAME				= 'css_item_name';
	private const _CSS_COMPONENT_ITEM_HINT				= 'css_item_hint';
	private const _CSS_COMPONENT_ITEM_STATE_DISABLED	= 'css_disabled';
	private const _CSS_COMPONENT_ITEM_STATE_SELECTED	= 'css_selected';
	private const _CSS_COMPONENT_ITEM_STATE_ENABLED		= 'css_enabled';
	protected const __CSS_COMPONENT_ITEM_STATES			= [	self::_CSS_COMPONENT_ITEM_STATE_ENABLED,
															self::_CSS_COMPONENT_ITEM_STATE_DISABLED,
															self::_CSS_COMPONENT_ITEM_STATE_SELECTED];
	//...CSS

	static private $_fRandomIndex_int = 0;
	private $_fRandomId_str;

	private $_fParams_a_arr;
	
	
	public function __construct()
	{
		$this->__init();
	}

	/***************************************************
	 * INTERFACE
	 */

	public function i_drawHTMLItem(array $aParams_a_arr):void
	{
		$this->_fParams_a_arr = $aParams_a_arr;

		if (!$this->__validateParams())
		{
			new CException('i_drawHTMLItem', 'Invalid params: ' .CArrayTools::i_toString($aParams_a_arr));
		}

		$this->__drawHTMLItem();
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*/protected function __init():void
	{
		$this->_fRandomId_str = $this->_generateComponentItemRandomId();
	}

	/*virtual*/protected function __validateParams():bool
	{
		return $this->__isItemNameDefined()
				&& $this->__isItemValueDefined()
				&& $this->__isItemStateDefined();
	}

	//HTMLS...
	abstract protected function __drawHTMLItem():void;

	abstract protected function __drawHTMLItemElement():void;

	protected function __drawHTMLItemName():void
	{
		echo
		$this->__applyHTMLParamValueWrap($this->__getItemName(), self::_CSS_COMPONENT_ITEM_NAME);
	}

	protected function __drawHTMLItemHintIfRequired():void
	{
		if ($this->__isItemHintDefined())
		{
			echo
			$this->__applyHTMLParamValueWrap($this->__getItemHint(), self::_CSS_COMPONENT_ITEM_HINT);
		}
	}
	//...HTMLS

	protected function __applyHTMLParamValueWrap(string $aParamValue_str, string $aCSSClassName_str, string $aOptParamValueIdPrefix_str = ''):string
	{
		$lSpanId_str = !empty($aOptParamValueIdPrefix_str) ? 'id="' .$aOptParamValueIdPrefix_str . $this->__getItemId(). '"' : '';
		
		return '<span ' .$lSpanId_str. ' class="' .$aCSSClassName_str. '">' .$aParamValue_str. '</span>';
	}
	
	protected function __isParamValueDefined(string $aParamId_str):bool
	{
		return isset($this->_fParams_a_arr[$aParamId_str]);
	}

	protected function __getParamValue(string $aParamId_str, bool $aOptThrowIfNotExist_bl = true, $aOptParamValueIfNotExist_var = null)
	{
		if (!$this->__isParamValueDefined($aParamId_str))
		{
			if ($aOptThrowIfNotExist_bl)
			{
				new CException('__getParamValue', 'Param not exist: ' .$aParamId_str);
			}
			return $aOptParamValueIfNotExist_var;
		}
		return $this->_fParams_a_arr[$aParamId_str];
	}

	protected function __getItemComponentElementId():string
	{
		if (!$this->__isItemComponentIdDefined())
		{
			return '';//----temporary solution
		}

		return self::_COMPONENT_ITEM_ELEMENT_ID_PREFIX . $this->__getItemComponentId() . $this->__getItemId();
	}
	
	//PARAMS...
	//COMPONENT ID...
	private function _getItemComponentIdVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_OPT_ITEM_COMPONENT_ID, $aOptThrowIfNotExist_bl);
	}

	protected function __isItemComponentIdDefined():bool
	{
		return CVariableTools::i_isString($this->_getItemComponentIdVar(false));
	}

	protected function __getItemComponentId():string
	{
		return CVariableTools::i_toString($this->_getItemComponentIdVar());
	}
	//...COMPONENT ID

	//ID...
	protected function __getItemId():string
	{
		//TODO: optimization required
		return CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_ITEM_ID, false, $this->_fRandomId_str));
	}
	//...ID

	//NAME...
	private function _getItemNameVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_ITEM_NAME, $aOptThrowIfNotExist_bl);
	}

	protected function __isItemNameDefined():bool
	{
		return CVariableTools::i_isString($this->_getItemNameVar(false));
	}

	protected function __getItemName():string
	{
		return CVariableTools::i_toString($this->_getItemNameVar());
	}
	//...NAME

	//HINT...
	private function _getItemHintVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_OPT_ITEM_HINT, $aOptThrowIfNotExist_bl);
	}

	protected function __isItemHintDefined():bool
	{
		return CVariableTools::i_isString($this->_getItemHintVar(false));
	}

	protected function __getItemHint():string
	{
		return CVariableTools::i_toString($this->_getItemHintVar());
	}
	//...HINT

	//VALUE...
	private function _getItemValueVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_ITEM_VALUE, $aOptThrowIfNotExist_bl);
	}

	protected function __isItemValueDefined():bool
	{
		return CVariableTools::i_isString($this->_getItemValueVar(false));
	}

	protected function __getItemValue():string
	{
		return CVariableTools::i_toString($this->_getItemValueVar());
	}
	//...VALUE

	//STATE...
	private function _getItemStateVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_ITEM_STATE, $aOptThrowIfNotExist_bl);
	}

	protected function __isItemStateDefined():bool
	{
		return CVariableTools::i_isInt($this->_getItemStateVar(false));
	}

	protected function __getItemState():int
	{
		return CVariableTools::i_toInt($this->_getItemStateVar());
	}
	//...STATE

	protected function __getItemClasses():string
	{
		//TODO: optimization required
		return self::_CSS_ITEM. ' ' .CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_ITEM_CLASSES, false, ''));
	}
	//...PARAMS

	private function _generateComponentItemRandomId():string
	{
		return self::_COMPONENT_ITEM_ID_PREFIX . self::$_fRandomIndex_int++;
	}
}


?>