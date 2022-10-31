<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCTranslationJSONDateTimeToolNode extends CCTranslationJSONToolNode
{
	public const i_NODE_INDEX_DAYS_OF_THE_WEEK			= 0;
	public const i_NODE_INDEX_MOUNTHS					= 1;


	/***************************************************
	 * INTERFACE
	 */

	public function i_getDaysOfTheWeek():CCTranslationJSONDateTimeToolDaysOfTheWeekNode
	{
		return $this->i_getNode(self::i_NODE_INDEX_DAYS_OF_THE_WEEK)->i_getNodeValue();
	}

	public function i_getMounths():CCTranslationJSONDateTimeToolMounthsNode
	{
		return $this->i_getNode(self::i_NODE_INDEX_MOUNTHS)->i_getNodeValue();
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>