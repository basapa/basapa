<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


abstract class CCListboxComponentView extends CCFormComponentView
{
	//PARAMS IDS...
	public const i_PARAM_ID_ITEMS_DATA					= 'items_data';
	//...PARAMS IDS
	
	//ITEM DATA PARAMS IDS...
	public const i_ITEM_DATA_PARAM_ID_TYPE				= 'type';
	public const i_ITEM_DATA_PARAM_ID_PARAMS			= 'params';
	//...ITEM DATA PARAMS IDS
	
	//ITEM DATA TYPES...
	public const i_ITEM_DATA_TYPE_SINGLE				= 0;
	public const i_ITEM_DATA_TYPE_GROUP					= 1;
	//...ITEM DATA TYPES

	//CSS...
	private const _CSS_COMPONENT						= 'css_listbox_component';
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
				&& $this->__isComponentItemsDataDefined();
	}

	/*override*/protected function __draw():void
	{
		$this->__drawHTMLComponentCaptionIfRequired();
		echo
		'<label for="' .$this->__getComponentId(). '">';
			$this->__drawHTMLComponentNameIfRequired();
			$this->__drawHTMLComponentPreNameIfRequired();
			$this->__drawHTMLComponentElement();
			$this->__drawHTMLComponentPostNameIfRequired();
			$this->__drawHTMLComponentHintIfRequired();
			$this->__drawHTMLComponentErrorMessageIfRequired();
		echo
		'</label>',
		'<div class="' .self::__CSS_CONTAINER. '">';
			$this->__drawHTMLComponentDescriptionIfRequired();
		echo
		'</div>';
	}

	/*override*/protected function __drawHTMLComponentElement():void
	{
		$lComponentId_str = $this->__getComponentId();

		echo
		'<select id="' .$this->__getComponentElementId(). '" class="' .$this->__getComponentElementClasses(). '" name="' .$lComponentId_str. '">';

			$lComponentItemsData_a_arr = $this->__getComponentItemsData();

			$lCount_int = CArrayTools::i_count($lComponentItemsData_a_arr);
			for ($i = 0; $i < $lCount_int; $i++)
			{
				$lComponentItemData_a_arr = $lComponentItemsData_a_arr[$i];
				$lComponentItemDataType_int = $lComponentItemData_a_arr[self::i_ITEM_DATA_PARAM_ID_TYPE];
				$lComponentItemDataParams_a_arr = $lComponentItemData_a_arr[self::i_ITEM_DATA_PARAM_ID_PARAMS];

				if ($lComponentItemDataType_int === self::i_ITEM_DATA_TYPE_SINGLE)
				{
					$lListboxComponentItem_clss = new CCListboxComponentItem();
					$lListboxComponentItem_clss->i_drawHTMLItem($lComponentItemDataParams_a_arr);
				}
				else if ($lComponentItemDataType_int === self::i_ITEM_DATA_TYPE_GROUP)
				{
					$lListboxComponentItemsGroup_clss = new CCListboxComponentItemsGroup();
					$lListboxComponentItemsGroup_clss->i_drawHTMLItemsGroup($lComponentItemDataParams_a_arr);
				}
				else
				{
					new CException('__drawHTMLComponentElement', 'Unsupported component item data type: ' .$lComponentItemDataType_int);
				}
			}

		echo
		'</select>';
	}

	//PARAMS...
	/*override*/protected function __getComponentClasses():string
	{
		return self::_CSS_COMPONENT. ' ' .parent::__getComponentClasses();
	}

	//ITEMS DATA...
	private function _getComponentItemsDataVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_ITEMS_DATA, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentItemsDataDefined():bool
	{
		return CVariableTools::i_isArray($this->_getComponentItemsDataVar(false));
	}

	protected function __getComponentItemsData():array
	{
		return $this->_getComponentItemsDataVar();
	}
	//...ITEMS DATA
	//...PARAMS
}


?>