<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


abstract class CCRadiobuttonComponentView extends CCFormComponentView
{
	//PARAM IDS...
	public const i_PARAM_ID_ITEMS_DATA					= 'items_data';
	//...PARAM IDS
	
	//ITEM DATA PARAMS IDS...
	public const i_ITEM_DATA_PARAM_ID_TYPE				= 'type';
	public const i_ITEM_DATA_PARAM_ID_PARAMS			= 'params';
	//...ITEM DATA PARAMS IDS
	
	//ITEM DATA TYPES...
	public const i_ITEM_DATA_TYPE_SINGLE				= 0;
	public const i_ITEM_DATA_TYPE_GROUP					= 1;
	//...ITEM DATA TYPES
	
	//CSS...
	private const _CSS_COMPONENT						= 'css_radiobutton_component';
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
		$this->__drawHTMLComponentNameIfRequired();
		$this->__drawHTMLComponentPreNameIfRequired();
		$this->__drawHTMLComponentElement();
		$this->__drawHTMLComponentPostNameIfRequired();
		$this->__drawHTMLComponentErrorMessageIfRequired();
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
		$lRadiobuttonComponentItem_clss = new CCRadiobuttonComponentItem();
		$lRadiobuttonComponentItemsGroup_clss = new CCRadiobuttonComponentItemsGroup();

		$lComponentItemsData_a_arr = $this->__getComponentItemsData();

		echo
		'<span class="' .$this->__getComponentElementClasses(). '" style="' .$this->__getComponentElementStyles(). '">';
			$lCount_int = CArrayTools::i_count($lComponentItemsData_a_arr);
			for ($i = 0; $i < $lCount_int; $i++)
			{
				$lComponentItemData_a_arr = $lComponentItemsData_a_arr[$i];
				$lComponentItemDataType_int = $lComponentItemData_a_arr[self::i_ITEM_DATA_PARAM_ID_TYPE];
				$lComponentItemDataParams_a_arr = $lComponentItemData_a_arr[self::i_ITEM_DATA_PARAM_ID_PARAMS];

				if ($lComponentItemDataType_int === self::i_ITEM_DATA_TYPE_SINGLE)
				{
					$lRadiobuttonComponentItem_clss->i_drawHTMLItem($lComponentItemDataParams_a_arr);
				}
				else if ($lComponentItemDataType_int === self::i_ITEM_DATA_TYPE_GROUP)
				{
					$lRadiobuttonComponentItemsGroup_clss->i_drawHTMLItemsGroup($lComponentItemDataParams_a_arr);
				}
				else
				{
					new CException('__drawHTMLComponentElement', 'Unsupported component item data type: ' .$lComponentItemDataType_int);
				}
			}
		echo
		'</span>';
	}
	//...HTMLS
	
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