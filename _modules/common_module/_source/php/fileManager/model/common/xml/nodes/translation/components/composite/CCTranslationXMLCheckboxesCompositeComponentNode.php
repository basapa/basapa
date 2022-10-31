<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCTranslationXMLCheckboxesCompositeComponentNode extends CCTranslationXMLComponentNode
{
	public const i_CHILD_NODE_INITIAL_INDEX_CHECKBOX_	= self::__CHILD_NODES_COUNT;


	/***************************************************
	 * INTERFACE
	 */

	/**@return CCTranslationXMLCheckboxComponentNode*/
	public function i_getCheckboxData(int $aIndex_int):CCXMLNode
	{
		return $this->i_getNode(self::i_CHILD_NODE_INITIAL_INDEX_CHECKBOX_ + $aIndex_int);
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>