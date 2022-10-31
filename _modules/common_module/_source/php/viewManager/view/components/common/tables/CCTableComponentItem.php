<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCTableComponentItem extends CCComponentItem
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//HTMLS...
	/*override*/protected function __drawHTMLItem():void
	{
		$lItemState_int = $this->__getItemState();

		echo
		'<td ' .self::__ITEM_STATES[$lItemState_int]. ' class="' .self::__CSS_COMPONENT_ITEM_STATES[$lItemState_int]. ' ' .$this->__getItemClasses(). '" id="' .$this->__getItemComponentElementId(). '" value="' .$this->__getItemValue(). '">';
			$this->__drawHTMLItemElement();
		echo
		'</td>';
	}

	/*override*/protected function __drawHTMLItemElement():void
	{
		echo
		$this->__getItemName();//any tags will be ignored by option tag specifics
	}
	//...HTMLS
}


?>