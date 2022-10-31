<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCLabellistComponentMultipleItem extends CCLabellistComponentItem
{
	//PARAMS IDS...
	public const i_PARAM_ID_SUB_ITEMS_PARAMS			= 'sub_items_params';
	//...PARAMS IDS


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __validateParams():bool
	{
		return parent::__validateParams()
				&& $this->_isMultipleItemSubItemsParamsDefined();
	}

	//HTMLS...
	/*override*/protected function __drawHTMLItem():void
	{
		$lItemState_int = $this->__getItemState();

		echo
		'<li class="' .self::__CSS_COMPONENT_ITEM_STATES[$lItemState_int]. ' ' .$this->__getItemClasses(). '">';
			$this->__drawHTMLItemElement();

			echo
			'<ul>';

				$lLabellistComponentItem_clss = new CCLabellistComponentItem();

				$lComponentLabellistItemsParams_a_arr_arr = $this->_getMultipleItemSubItemsParams();

				$lCount_int = CArrayTools::i_count($lComponentLabellistItemsParams_a_arr_arr);
				for ($i = 0; $i < $lCount_int; $i++)
				{
					$lLabellistComponentItem_clss->i_drawHTMLItem($lComponentLabellistItemsParams_a_arr_arr[$i]);
				}

			echo
			'</ul>
		</li>';
	}
	//...HTMLS

	//PARAMS...
	//SUB ITEMS PARAMS...
	private function _getMultipleItemSubItemsParamsVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_SUB_ITEMS_PARAMS, $aOptThrowIfNotExist_bl);
	}

	private function _isMultipleItemSubItemsParamsDefined():bool
	{
		return CVariableTools::i_isArray($this->_getMultipleItemSubItemsParamsVar(false));
	}

	private function _getMultipleItemSubItemsParams():array
	{
		return $this->_getMultipleItemSubItemsParamsVar();
	}
	//...SUB ITEMS PARAMS
	//...PARAMS
}


?>