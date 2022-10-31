<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CSimpleXMLElementWrapper
{
	/**@var \SimpleXMLElement*/
	private $_fSimpleXMLElement_sxmle;

	
	public function __construct(\SimpleXMLElement $aOptSimpleXMLElement_sxmle = null)
	{
		if (isset($aOptSimpleXMLElement_sxmle))
		{
			$this->_fSimpleXMLElement_sxmle = $aOptSimpleXMLElement_sxmle;
		}
		
		//$this->_init();
	}
	
	/***************************************************
	 * INTERFACE
	 */

	public function i_getNativeSimpleXMLElement():\SimpleXMLElement
	{
		return $this->_fSimpleXMLElement_sxmle;
	}

	public function i_createXMLFromString(string $aXMLContent_str):void
	{
		if (isset($this->_fSimpleXMLElement_sxmle))
		{
			new CException('i_createXMLFromString', 'XML element already defined!');
		}
		
		$this->_fSimpleXMLElement_sxmle = CXMLFileTools::i_createXMLFromString($aXMLContent_str);
	}

	public function i_loadXMLFromFile(string $aFullFileName_str):void
	{
		if (isset($this->_fSimpleXMLElement_sxmle))
		{
			new CException('i_loadXMLFromFile', 'XML element already defined!');
		}
		
		$this->_fSimpleXMLElement_sxmle = CXMLFileTools::i_loadXMLFromFile($aFullFileName_str);
	}

	public function i_setXMLNodeValue(string $aXMLNodeValue_str):void
	{
		CXMLFileTools::i_setXMLNodeValue($this->_fSimpleXMLElement_sxmle, $aXMLNodeValue_str);
	}

	public function i_addNewXMLNodeToEnd(string $aXMLNodeName_str, string $aXMLNodeValue_str):void
	{
		CXMLFileTools::i_addXMLNodeToEnd($this->_fSimpleXMLElement_sxmle, $aXMLNodeName_str, $aXMLNodeValue_str);
	}

	public function i_getXMLNodeAttributes():?array
	{
		return CXMLFileTools::i_getNodeAttributes($this->_fSimpleXMLElement_sxmle);
	}

	public function i_getXMLNodeChildsAsSimpleXMLElement():CSimpleXMLElementWrapper
	{
		return new CSimpleXMLElementWrapper(CXMLFileTools::i_getNodeChilds($this->_fSimpleXMLElement_sxmle));
	}
	
	public function i_getXMLNodeChildsCount():int
	{
		return CXMLFileTools::i_getNodeChildsCount($this->_fSimpleXMLElement_sxmle);
	}
	
	public function i_getXMLChildNodeByNodeName(string $aNodeName_str, int $aOptIndex_int = -1):CSimpleXMLElementWrapper
	{
		$l_sxmle = $this->_fSimpleXMLElement_sxmle->{$aNodeName_str};
		if ($aOptIndex_int !== -1)
		{
			$l_sxmle = $l_sxmle[$aOptIndex_int];
		}

		return new CSimpleXMLElementWrapper($l_sxmle);
	}
	
	public function i_getXMLNodeName():string
	{
		return CXMLFileTools::i_getNodeName($this->_fSimpleXMLElement_sxmle);
	}

	public function i_getXMLNodeValue(bool $aOptIncludeChildsNodes_bl = false):string
	{
		return CXMLFileTools::i_getNodeValue($this->_fSimpleXMLElement_sxmle, $aOptIncludeChildsNodes_bl);
	}

	public function i_saveXMLInFile(string $aFullFileName_str):void
	{
		CXMLFileTools::i_saveXMLFile($this->_fSimpleXMLElement_sxmle, $aFullFileName_str);
	}

	/*
	 * INTERFACE
	 ***************************************************/
	
	/*private function _init():void
	{
	}*/
}


?>