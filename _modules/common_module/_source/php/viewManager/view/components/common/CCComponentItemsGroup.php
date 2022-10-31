<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


abstract class CCComponentItemsGroup
{
	//PARAMS IDS...
	public const i_PARAM_ID_GROUP_COMPONENT_ID			= 'component_id';
	public const i_PARAM_ID_GROUP_INDEX					= 'index';
	public const i_PARAM_ID_GROUP_NAME					= 'name';
	public const i_PARAM_ID_GROUP_ITEMS_PARAMS			= 'items_params';
	public const i_PARAM_ID_OPT_GROUP_CLASSES			= 'classes';
	//...PARAMS IDS
	
	//IDS...
	private const _GROUP_ID_PREFIX						= 'group_id_';
	//...IDS
	
	//CSS...
	private const _CSS_GROUP							= 'css_items_group';
	//...CSS

	private $_fParams_a_arr;
	
	
	/*public function __construct()
	{
		$this->__init();
	}*/
	
	/***************************************************
	 * INTERFACE
	 */

	public function i_drawHTMLItemsGroup(array $aParams_a_arr):void
	{
		$this->_fParams_a_arr = $aParams_a_arr;

		if (!$this->__validateParams())
		{
			new CException('i_drawHTMLItemsGroup', 'Invalid params: ' .CArrayTools::i_toString($aParams_a_arr));
		}

		$this->__drawHTMLItemsGroup();
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	/*virtual*/protected function __validateParams():bool
	{
		return $this->__isGroupComponentIdDefined()
				&& $this->__isGroupIndexDefined()
				&& $this->__isGroupNameDefined()
				&& $this->__isGroupItemsParamsDefined();
	}

	//HTMLS...
	abstract protected function __drawHTMLItemsGroup():void;
	//...HTMLS

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

	protected function __getGroupId():string
	{
		return self::_GROUP_ID_PREFIX . $this->__getGroupComponentId() . $this->__getGroupIndex();
	}
	
	//PARAMS...
	//COMPONENT ID...
	private function _getGroupComponentIdVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_GROUP_COMPONENT_ID, $aOptThrowIfNotExist_bl);
	}

	protected function __isGroupComponentIdDefined():bool
	{
		return CVariableTools::i_isString($this->_getGroupComponentIdVar(false));
	}

	protected function __getGroupComponentId():string
	{
		return CVariableTools::i_toString($this->_getGroupComponentIdVar());
	}
	//...COMPONENT ID

	//INDEX...
	private function _getGroupIndexVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_GROUP_INDEX, $aOptThrowIfNotExist_bl);
	}

	protected function __isGroupIndexDefined():bool
	{
		return CVariableTools::i_isString($this->_getGroupIndexVar(false));
	}

	protected function __getGroupIndex():string
	{
		return CVariableTools::i_toString($this->_getGroupIndexVar());
	}
	//...INDEX

	//NAME...
	private function _getGroupNameVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_GROUP_NAME, $aOptThrowIfNotExist_bl);
	}

	protected function __isGroupNameDefined():bool
	{
		return CVariableTools::i_isString($this->_getGroupNameVar(false));
	}

	protected function __getGroupName():string
	{
		return CVariableTools::i_toString($this->_getGroupNameVar());
	}
	//...NAME
	
	//ITEMS PARAMS...
	private function _getGroupItemsParamsVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_GROUP_ITEMS_PARAMS, $aOptThrowIfNotExist_bl);
	}

	protected function __isGroupItemsParamsDefined():bool
	{
		return CVariableTools::i_isArray($this->_getGroupItemsParamsVar(false));
	}

	protected function __getGroupItemsParams():array
	{
		return $this->_getGroupItemsParamsVar();
	}
	//...ITEMS PARAMS
	
	protected function __getGroupClasses():string
	{
		//TODO: optimization required
		return self::_CSS_GROUP. ' ' .CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_GROUP_CLASSES, false, ''));
	}
	//...PARAMS
}


?>