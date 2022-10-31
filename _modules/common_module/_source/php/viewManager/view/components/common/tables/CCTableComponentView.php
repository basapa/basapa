<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


abstract class CCTableComponentView extends CCFormComponentView
{
	//PARAMS IDS...
	public const i_PARAM_ID_ITEMS_DATA					= 'items_data';
	//...PARAMS IDS

	//ITEM DATA PARAMS IDS...
	public const i_ITEM_DATA_PARAM_ID_TYPE				= 'type';
	public const i_ITEM_DATA_PARAM_ID_PARAMS			= 'params';
	//...ITEM DATA PARAMS IDS

	//ITEM DATA TYPES...
	public const i_ITEM_DATA_TYPE_SIMPLE_TEXT			= 0;
	public const i_ITEM_DATA_TYPE_LINK_TEXT				= 1;
	public const i_ITEM_DATA_TYPE_SIMPLE_LISTBOX		= 2;
	//...ITEM DATA TYPES

	//CSS...
	private const _CSS_COMPONENT						= 'css_table_component';
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
		'<div for="' .$this->__getComponentId(). '">';
			$this->__drawHTMLComponentElement();
			$this->__drawHTMLComponentHintIfRequired();
		echo
		'</div>',
		'<div class="' .self::__CSS_CONTAINER. '">';
			$this->__drawHTMLComponentDescriptionIfRequired();
		echo
		'</div>';
	}

	/*override*/protected function __drawHTMLComponentElement():void
	{
		echo
		'<table id="' .$this->__getComponentElementId(). '" class="' .$this->__getComponentElementClasses(). '">';

			$lComponentItemsData_a_arr = $this->__getComponentItemsData();

			$lComponentItemsDataCount_int = CArrayTools::i_count($lComponentItemsData_a_arr);
			for ($i = 0; $i < $lComponentItemsDataCount_int; $i++)
			{
				echo
				'<tr>';

				$lCount_int = CArrayTools::i_count($lComponentItemsData_a_arr[$i]);
				for ($j = 0; $j < $lCount_int; $j++)
				{
					echo
					'<td>';

					$lComponentItemData_a_arr = $lComponentItemsData_a_arr[$i][$j];
					$lComponentItemDataType_int = $lComponentItemData_a_arr[self::i_ITEM_DATA_PARAM_ID_TYPE];
					$lComponentItemDataParams_a_arr = $lComponentItemData_a_arr[self::i_ITEM_DATA_PARAM_ID_PARAMS];

					if ($lComponentItemDataType_int === self::i_ITEM_DATA_TYPE_SIMPLE_TEXT)
					{
						$lComponentView_clss = new CCSimpleTextComponentView();
					}
					else if ($lComponentItemDataType_int === self::i_ITEM_DATA_TYPE_LINK_TEXT)
					{
						$lComponentView_clss = new CCLinkTextComponentView();
					}
					else if ($lComponentItemDataType_int === self::i_ITEM_DATA_TYPE_SIMPLE_LISTBOX)
					{
						$lComponentView_clss = new CCSimpleListboxComponentView();
					}
					else
					{
						new CException('__drawHTMLComponentElement', 'Unsupported component item data type: ' .$lComponentItemDataType_int);
					}

					$lComponentView_clss->i_draw($lComponentItemDataParams_a_arr);

					echo
					'</td>';
				}

				echo
				'</tr>';
			}

		echo
		'</table>';
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