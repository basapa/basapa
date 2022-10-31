<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCTranslationJSONDateTimeToolMounthsNode extends CCJSONNode
{
	private $_fItems_a_arr;


	/***************************************************
	 * INTERFACE
	 */

	public function i_setItems(array $aItems_a_arr):void
	{
		$this->_fItems_a_arr = $aItems_a_arr;
	}

	public function i_getName($aIndex_int):string
	{
		return $this->_fItems_a_arr[$aIndex_int]['name'];
	}

	public function i_getNameAsDatePart($aIndex_int):string
	{
		return $this->_fItems_a_arr[$aIndex_int]['as_date_part'];
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>