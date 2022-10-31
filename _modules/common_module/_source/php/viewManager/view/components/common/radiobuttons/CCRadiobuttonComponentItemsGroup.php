<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCRadiobuttonComponentItemsGroup extends CCComponentItemsGroup
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
		'<fieldset id="' .$this->__getGroupId(). '" class="' .$this->__getGroupClasses(). '">
			<legend>' .$this->__getGroupName(). '</legend>';

			$lRadiobuttonComponentItem_clss = new CCRadiobuttonComponentItem();
			
			$lGroupItemsParams_a_arr = $this->__getGroupItemsParams();
			
			$lCount_int = CArrayTools::i_count($lGroupItemsParams_a_arr);
			for ($i = 0; $i < $lCount_int; $i++)
			{
				$lRadiobuttonComponentItem_clss->i_drawHTMLItem($lGroupItemsParams_a_arr[$i]);
			}

		echo
		'</fieldset>';
	}
	//...HTMLS
}


?>