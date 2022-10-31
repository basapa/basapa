<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CCLabellistComponentItems
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_drawHTMLItems(array $aComponentItemsParams_a_arr):void
	{
		$this->_drawHTMLItems($aComponentItemsParams_a_arr);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	private function _drawHTMLItems(array $aComponentItemsParams_a_arr):void
	{
		$lLabellistComponentItem_clss = new CCLabellistComponentItem();
		$lLabellistComponentMultipleItem_clss = new CCLabellistComponentMultipleItem();

		$lCount_int = CArrayTools::i_count($aComponentItemsParams_a_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lComponentItemParams_a_arr = $aComponentItemsParams_a_arr[$i];
			if (isset($lComponentItemParams_a_arr[CCLabellistComponentMultipleItem::i_PARAM_ID_SUB_ITEMS_PARAMS]))
			{
				$lLabellistComponentMultipleItem_clss->i_drawHTMLItem($lComponentItemParams_a_arr);
			}
			else
			{
				$lLabellistComponentItem_clss->i_drawHTMLItem($lComponentItemParams_a_arr);
			}
		}
	}
}


?>