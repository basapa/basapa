<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCTranslationJSONDateTimeToolDaysOfTheWeekNode extends CCJSONNode
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

	/*
	 * INTERFACE
	 ***************************************************/
}


?>