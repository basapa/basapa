<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CDOMXMLFileTools
{
	//ENCODING TYPES...
	//public const i_XML_ENCODING_TYPE_UTF8				= CMainConst::i_DEFAULT_ENCODING_TYPE;
	//...ENCODING TYPES


	/***************************************************
	 * INTERFACE
	 */

	/*static public function i_createXMLFromSimpleXMLElement(\SimpleXMLElement $aXMLDoc_obj):\DOMDocument
	{
		$l_var = dom_import_simplexml($aXMLDoc_obj);
		if ($l_var === false)
		{
			new CException('i_createXMLFromSimpleXMLElement', 'XML creating failed: ' .$lErrors_str);
		}
		
		return $l_var;
	}
	
	static public function i_createXMLFromString(string $aXMLContent_str):\DOMDocument
	{
		$l_domd = self::i_createXMLNode();
		$l_domd->loadXML($aXMLContent_str);
		return $l_domd;
	}

	static public function i_createXML():\DOMDocument
	{
		$l_domd = new \DOMDocument('1.0', self::i_XML_ENCODING_TYPE_UTF8);
		return $l_domd;
	}

	static public function i_loadXMLFile(string $aFullFileName_str):\DOMDocument
	{
		self::_throwIfFileNotExist($aFullFileName_str);

		$l_domd = self::i_createXMLNode();
		$l_domd->load($aFullFileName_str);
		return $l_domd;
	}

	static public function i_isXMLObjectExist(\DOMNode $aXMLDoc_obj):bool
	{
		return isset($aXMLDoc_obj);
	}

	static public function i_createXMLNode(\DOMDocument &$aXMLDoc_obj, string $aXMLNodeName_str, string $aOptXMLNodeValue_str = ''):\DOMElement
	{
		return $aXMLDoc_obj->createElement($aXMLNodeName_str, $aOptXMLNodeValue_str);
	}

	static public function i_createXMLNodeAsString(string $aXMLNodeName_str, string $aOptXMLNodeValue_str = ''):string
	{
		return '<' .$aXMLNodeName_str. '>' .$aOptXMLNodeValue_str. '</' .$aXMLNodeName_str. '>';
	}

	static public function i_setXMLNodeValue(\DOMNode $aXML_obj, string $aXMLNodeValue_str)
	{
		self::_throwIfXMLDataNotExist($aXML_obj);
		
		$aXML_obj->nodeValue = $aXMLNodeValue_str;
	}

	static public function i_addXMLNodeToStart(\DOMNode &$aXML_obj, \DOMNode $aXMLNode_obj):void
	{
		self::_throwIfXMLDataNotExist($aXML_obj);
		
		$aXML_obj->insertBefore($aXMLNode_obj, $aXML_obj->firstChild);
	}

	static public function i_addXMLNewNodeToStart(\DOMNode &$aXML_obj, string $aXMLNodeName_str, string $aXMLNodeValue_str, \DOMDocument &$aXMLDoc_obj):void
	{
		self::_throwIfXMLDataNotExist($aXML_obj);
		
		$l_dome = self::i_createXMLNode($aXMLDoc_obj, $aXMLNodeName_str, $aXMLNodeValue_str);

		$aXML_obj->insertBefore($l_dome, $aXML_obj->firstChild);
	}

	static public function i_addXMLNodeToEnd(\DOMNode &$aXML_obj, \DOMNode $aXMLNode_obj)
	{
		self::_throwIfXMLDataNotExist($aXML_obj);
		
		$aXML_obj->appendChild($aXMLNode_obj);
	}

	static public function i_addXMLNewNodeToEnd(\DOMNode &$aXML_obj, string $aXMLNodeName_str, string $aXMLNodeValue_str, \DOMDocument &$aXMLDoc_obj)
	{
		self::_throwIfXMLDataNotExist($aXML_obj);
		
		$l_dome = self::i_createXMLNode($aXMLDoc_obj, $aXMLNodeName_str, $aXMLNodeValue_str);

		$aXML_obj->appendChild($l_dome);
	}

	static public function i_removeXMLNode(\DOMNode &$aXML_obj, \DOMNode $aXMLNode_obj)
	{
		self::_throwIfXMLDataNotExist($aXML_obj);
		
		$aXML_obj->removeChild($aXMLNode_obj);
	}

	static public function i_saveXMLFile(\DOMDocument $aXML_obj, string $aFullFileName_str)
	{
		self::_throwIfXMLDataNotExist($aXML_obj);

		$aXML_obj->save($aFullFileName_str);
	}*/

	/*
	 * INTERFACE
	 ***************************************************/
	
	/*static private function _throwIfXMLDataNotExist(\DOMNode $aXML_obj)
	{
		if (!self::i_isXMLObjectExist($aXML_obj))
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
	}*/
}


?>