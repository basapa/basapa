<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCTranslationJSONToolNode
{
	private $_fNodes_clss_arr;


	/***************************************************
	 * INTERFACE
	 */

	public function i_getNode($aIndex_int):CCJSONNode
	{
		if (!$this->i_isNodeDefined($aIndex_int))
		{
			new CException('i_getNode', 'Invalid node index: ' .$aIndex_int. '; node name: ' .$this->i_getNodeName());
		}
		return $this->_fNodes_clss_arr[$aIndex_int];
	}

	public function i_isNodeDefined($aIndex_int):bool
	{
		return isset($this->_fNodes_clss_arr[$aIndex_int]);
	}
	
	public function i_isNodesDefined():bool
	{
		return isset($this->_fNodes_clss_arr);
	}

	public function i_addNode($aNode_clss):void
	{
		$this->_fNodes_clss_arr[] = $aNode_clss;
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>