<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCTranslationXMLLabelfieldComponentNode extends CCTranslationXMLComponentNode
{
	public const i_CHILD_NODE_INDEX_NAME				= self::__CHILD_NODES_COUNT;


	/***************************************************
	 * INTERFACE
	 */

	public function i_getName():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_NAME)->i_getNodeValue();
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>