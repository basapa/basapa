<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCLabellistComponentItem extends CCComponentItem
{
	/*public const i_SYMBOL_SORTING_NO					= '▲▼';
	public const i_SYMBOL_SORTING_ASC					= '▲';
	public const i_SYMBOL_SORTING_DESC					= '▼';//----*/


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//HTMLS...
	/*virtual override*/protected function __drawHTMLItem():void
	{
		$lItemState_int = $this->__getItemState();

		echo
		'<li class="' .self::__CSS_COMPONENT_ITEM_STATES[$lItemState_int]. ' ' .$this->__getItemClasses(). '">';
			$this->__drawHTMLItemElement();
		echo
		'</li>';
	}

	/*override*/protected function __drawHTMLItemElement():void
	{
		$lItemState_int = $this->__getItemState();
		if ($lItemState_int === self::i_ITEM_STATE_DISABLED)
		{
			echo
			'<span class="' .self::__CSS_COMPONENT_ITEM_ELEMENT. '" id="' .$this->__getItemComponentElementId(). '">';
				$this->__drawHTMLItemName();
			echo
			'</span>';
		}
		else if (
					$lItemState_int === self::i_ITEM_STATE_SELECTED
					|| $lItemState_int === self::i_ITEM_STATE_ENABLED
				)
		{
			echo
			'<a class="' .self::__CSS_COMPONENT_ITEM_ELEMENT. '" id="' .$this->__getItemComponentElementId(). '" href="' .$this->__getItemValue(). '">';
				$this->__drawHTMLItemName();
				$this->__drawHTMLItemHintIfRequired();
			echo
			'</a>';
		}
	}
	//...HTMLS
}


?>