<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCXMLNode
{
	public const i_NODE_FULL_NAME_BEGINNING_MARK		= './';
	public const i_NODE_FULL_NAME_SEPARATOR				= '/';
	
	private $_fNodeName_str;
	private $_fNodeValue_str;

	private $_fParentNode_clss;
	private $_fNodeAttributes_a_arr;
	private $_fNodes_clss_arr;

	private $_fNativeNode_clss;


	public function __construct(string $aOptNodeName_str = '', CCXMLNode $aOptParentNode_clss = null)
	{
		$this->__init($aOptNodeName_str, $aOptParentNode_clss);
	}

	/***************************************************
	 * INTERFACE
	 */

	public function i_getNodeFullName():string
	{
		return isset($this->_fParentNode_clss) ? $this->i_getParentNode()->i_getNodeFullName() . self::i_NODE_FULL_NAME_SEPARATOR . $this->_fNodeName_str : self::i_NODE_FULL_NAME_BEGINNING_MARK . $this->_fNodeName_str;
	}

	public function i_getNodeName():string
	{
		return $this->_fNodeName_str;
	}

	public function i_getNodeValue():string
	{
		return $this->_fNodeValue_str;
	}

	public function i_setNodeValue(string $aValue_str):void
	{
		$this->_fNodeValue_str = $aValue_str;
	}

	public function i_getNativeNode():CSimpleXMLElementWrapper
	{
		return $this->_fNativeNode_clss;
	}

	public function i_setNativeNode(CSimpleXMLElementWrapper $aNode_clss):void
	{
		$this->_fNativeNode_clss = $aNode_clss;
	}

	public function i_isNodeAttributesDefined():bool
	{
		return isset($this->_fNodeAttributes_a_arr);
	}
	
	public function i_getNodeAttributes(bool $aOptThrowIfNotExist_bl = true, $aOptRetValueIfNotExist_var = null):array
	{
		if (!$this->i_isNodeAttributesDefined())
		{
			if ($aOptThrowIfNotExist_bl)
			{
				new CException('i_getNodeAttributes', 'Node attributes not defined!');
			}
			return $aOptRetValueIfNotExist_var;
		}
		return $this->_fNodeAttributes_a_arr;
	}

	public function i_isNodeAttributeDefined(string $aName_str):bool
	{
		return isset($this->_fNodeAttributes_a_arr[$aName_str]);
	}

	public function i_getNodeAttributeValue(string $aName_str, bool $aOptThrowIfNotExist_bl = true, $aOptRetValueIfNotExist_var = null):?string
	{
		if (!$this->i_isNodeAttributeDefined($aName_str))
		{
			if ($aOptThrowIfNotExist_bl)
			{
				new CException('i_getNodeAttributeValue', 'Node attribute not defined: ' .$aName_str);
			}
			return $aOptRetValueIfNotExist_var;
		}
		return $this->_fNodeAttributes_a_arr[$aName_str];
	}

	public function i_addNodeAttribute(string $aName_str, string $aValue_str, bool $aOptThrowIfExist_bl = true):void
	{
		if (
				$this->i_isNodeAttributeDefined($aName_str)
				&& $aOptThrowIfExist_bl
			)
		{
			new CException('i_addNodeAttribute', 'Node attribute already exist: ' .$aName_str);
		}
		$this->_fNodeAttributes_a_arr[$aName_str] = $aValue_str;
	}

	public function i_setNodeAttributes(?array $aNodeAttributes_a_arr):void
	{
		$this->_fNodeAttributes_a_arr = $aNodeAttributes_a_arr;
	}

	public function i_getNodeAttributesCount():int
	{
		return count($this->_fNodeAttributes_a_arr);
	}

	public function i_isNodesDefined():bool
	{
		return isset($this->_fNodes_clss_arr);
	}

	public function i_getNodes(bool $aOptThrowIfNotExist_bl = true, $aOptRetValueIfNotExist_var = null):array
	{
		if (!$this->i_isNodesDefined())
		{
			if ($aOptThrowIfNotExist_bl)
			{
				new CException('i_getNodes', 'Nodes not defined!');
			}
			return $aOptRetValueIfNotExist_var;
		}
		return $this->_fNodes_clss_arr;
	}

	public function i_isNodeDefined($aIndex_int):bool
	{
		return isset($this->_fNodes_clss_arr[$aIndex_int]);
	}

	public function i_getNode($aIndex_int):CCXMLNode
	{
		if (!$this->i_isNodeDefined($aIndex_int))
		{
			new CException('i_getNode', 'Invalid node index: ' .$aIndex_int. '; node name: ' .$this->i_getNodeName());
		}
		return $this->_fNodes_clss_arr[$aIndex_int];
	}

	public function i_addNode($aNode_clss):void
	{
		$this->_fNodes_clss_arr[] = $aNode_clss;
	}

	public function i_insertNode($aNode_clss, $aIndex_int, bool $aOptThrowIfExist_bl = true):void
	{
		if (
				$this->i_isNodeDefined($aIndex_int)
				&& $aOptThrowIfExist_bl
			)
		{
			new CException('i_insertNode', 'Node index already exist: ' .$aIndex_int. '; node name: ' .$this->i_getNodeName());
		}
		$this->_fNodes_clss_arr[$aIndex_int] = $aNode_clss;
	}

	public function i_getNodesCount():int
	{
		return count($this->_fNodes_clss_arr);
	}

	public function i_isParentNodeDefined():bool
	{
		return isset($this->_fParentNode_clss);
	}

	public function i_getParentNode(bool $aOptThrowIfNotExist_bl = true, $aOptRetValueIfNotExist_var = null):CCXMLNode
	{
		if (!$this->i_isParentNodeDefined())
		{
			if ($aOptThrowIfNotExist_bl)
			{
				new CException('i_getParentNode', 'Parent node not exist: ' .$this->i_getNodeName(), CException::i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR);
			}
			return $aOptRetValueIfNotExist_var;
		}
		return $this->_fParentNode_clss;
	}

	/*
	 * INTERFACE
	 ***************************************************/
	
	/*virtual*/protected function __init(string $aOptNodeName_str, ?CCXMLNode $aOptParentNode_clss):void
	{
		$this->_fNodeName_str = $aOptNodeName_str;
		$this->_fParentNode_clss = $aOptParentNode_clss;
	}
}


?>