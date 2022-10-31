<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CXMLFileTools
{
	/***************************************************
	 * INTERFACE
	 */
	
	static public function i_createXMLFromDOMElement(\DOMNode $aXML_obj):\SimpleXMLElement
	{
		$l_var = simplexml_import_dom($aXML_obj);
		if ($l_var === false)
		{
			$lErrors_str = '';

			foreach(libxml_get_errors() as $lError_str)
			{
				$lErrors_str .= $lError_str->message. ' | ';
			}

			new CException('i_createXMLFromDOMElement', 'XML creating failed: ' .$lErrors_str);
		}
		
		return $l_var;
	}
	
	static public function i_createXMLFromString(string $aXMLContent_str):\SimpleXMLElement
	{
		$l_var = simplexml_load_string($aXMLContent_str);
		if ($l_var === false)
		{
			$lErrors_str = '';
			
			foreach(libxml_get_errors() as $lError_str)
			{
				$lErrors_str .= $lError_str->message. ' | ';
			}
			
			new CException('i_createXMLFromString', 'XML creating failed: ' .$lErrors_str);
		}
		
		return $l_var;
	}

	static public function i_loadXMLFromFile(string $aFullFileName_str):\SimpleXMLElement
	{
		self::_throwIfFileNotExist($aFullFileName_str);

		$l_var = simplexml_load_file($aFullFileName_str, 'SimpleXMLElement', LIBXML_NOENT);
		if ($l_var === false)
		{
			$lErrors_str = '';
			
			foreach(libxml_get_errors() as $lError_str)
			{
				$lErrors_str .= $lError_str->message. ' | ';
			}
			
			new CException('i_loadXMLFromFile', 'File loading failed: ' .$lErrors_str);
		}
		
		return $l_var;
	}

	static public function i_isXMLElementExist(\SimpleXMLElement $aXMLDoc_obj):bool
	{
		return isset($aXMLDoc_obj);
	}

	static public function i_createXMLNode(\SimpleXMLElement &$aXMLDoc_obj, string $aXMLNodeName_str, string $aOptXMLNodeValue_str = ''):void
	{
		new CException('i_createXMLNode', 'Not implemented!');
	}

	static public function i_createXMLNodeAsString(string $aXMLNodeName_str, string $aOptXMLNodeValue_str = ''):string
	{
		return '<' .$aXMLNodeName_str. '>' .$aOptXMLNodeValue_str. '</' .$aXMLNodeName_str. '>';
	}

	static public function i_setXMLNodeValue(\SimpleXMLElement $aXML_obj, string $aXMLNodeValue_str)
	{
		$aXML_obj->nodeValue = $aXMLNodeValue_str;
	}

	static public function i_addXMLNodeToStart(\SimpleXMLElement &$aXML_obj, \DOMNode $aXMLNode_obj):void
	{
		new CException('i_addXMLNodeToStart', 'Not implemented!');
	}

	static public function i_addXMLNewNodeToStart(\SimpleXMLElement &$aXML_obj, string $aXMLNodeName_str, string $aXMLNodeValue_str):void
	{
		new CException('i_addXMLNewNodeToStart', 'Not implemented!');
	}

	static public function i_addXMLNodeToEnd(\SimpleXMLElement &$aXML_obj, string $aXMLNodeName_str, string $aXMLNodeValue_str):void
	{
		$aXML_obj->addChild($aXMLNodeName_str, $aXMLNodeValue_str);
	}

	static public function i_addXMLNewNodeToEnd(\SimpleXMLElement &$aXML_obj, string $aXMLNodeName_str, string $aXMLNodeValue_str):void
	{
		$aXML_obj->addChild($aXMLNodeName_str, $aXMLNodeValue_str);
	}
	
	static public function i_getNodeAttributes(\SimpleXMLElement &$aXML_obj):?array
	{
		$lNodeAttributes_a_arr = null;
		
		$lNodeAttributes_sxmle = $aXML_obj->attributes();
		if (isset($lNodeAttributes_sxmle))
		{
			$lNodeAttributes_a_arr = null;
			
			foreach ($lNodeAttributes_sxmle as $lNodeAttributeName_str => $lNodeAttributeValue_sxmle)
			{
				$lNodeAttributes_a_arr[$lNodeAttributeName_str] = $lNodeAttributeValue_sxmle->__toString();
			}
		}
		
		return $lNodeAttributes_a_arr;
	}
	
	static public function i_getNodeChilds(\SimpleXMLElement &$aXML_obj):\SimpleXMLElement
	{
		return $aXML_obj->children();
	}
	
	static public function i_getNodeChildsCount(\SimpleXMLElement &$aXML_obj):int
	{
		return $aXML_obj->count();
	}
	
	static public function i_getNodeName(\SimpleXMLElement &$aXML_obj):string
	{
		self::_throwIfXMLDataNotExist($aXML_obj);
		
		return $aXML_obj->getName();
	}
	
	static public function i_getNodeValue(\SimpleXMLElement &$aXML_obj, bool $aOptIncludeChildsNodes_bl = false):string
	{
		self::_throwIfXMLDataNotExist($aXML_obj);
		
		$l_str = '';
		
		if ($aOptIncludeChildsNodes_bl)
		{
			$lNodeChilds_sxmle = self::i_getNodeChilds($aXML_obj);
			foreach ($lNodeChilds_sxmle as $lNode_sxmle)
			{
				$l_str .= self::i_getNodeValue($lNode_sxmle, $aOptIncludeChildsNodes_bl);
			}
		}
		else
		{
			$l_str = $aXML_obj->__toString();
		}
		
		return $l_str;
	}
	
	static public function i_removeXMLNode(\SimpleXMLElement &$aXML_obj, \SimpleXMLElement $aXMLNode_obj):void
	{
		new CException('i_removeXMLElement', 'Not implemented!');
	}

	static public function i_saveXMLFile(\SimpleXMLElement $aXML_obj, string $aFullFileName_str):void
	{
		self::_throwIfXMLDataNotExist($aXML_obj);

		$aXML_obj->asXML($aFullFileName_str);
	}

	/*
	 * INTERFACE
	 ***************************************************/
	
	static private function _throwIfXMLDataNotExist(\SimpleXMLElement $aXML_obj)
	{
		if (!self::i_isXMLElementExist($aXML_obj))
		{
			new CException('_throwIfFileNotExist', 'XML data not exist!');
		}
	}
	
	static private function _throwIfFileNotExist(string $aFullFileName_str)
	{
		if (!CFileSystemTools::i_isFileExist($aFullFileName_str))
		{
			new CException('_throwIfFileNotExist', 'XML file not exist: ' .$aFullFileName_str);
		}
	}

	static private function _throwIfFileExist(string $aFullFileName_str)
	{
		if (CFileSystemTools::i_isFileExist($aFullFileName_str))
		{
			new CException('_throwIfFileExist', 'XML file not exist: ' .$aFullFileName_str);
		}
	}
}


?>