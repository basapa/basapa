<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCListboxComponentItemsGroup extends CCComponentItemsGroup
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//HTMLS...
	/*override*/protected function __drawHTMLItemsGroup():void
	{
		echo
		'<optgroup id="' .$this->__getGroupId(). '" label="' .$this->__getGroupName(). '" class="' .$this->__getGroupClasses(). '">';

			$lListboxComponentItem_clss = new CCListboxComponentItem();
			
			$lGroupItemsParams_a_arr = $this->__getGroupItemsParams();
			
			$lCount_int = CArrayTools::i_count($lGroupItemsParams_a_arr);
			for ($i = 0; $i < $lCount_int; $i++)
			{
				$lListboxComponentItem_clss->i_drawHTMLItem($lGroupItemsParams_a_arr[$i]);
			}

		echo
		'</optgroup>';
	}
	//...HTMLS
}


?>