<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCPanelInfoView extends CCInfoView
{
	//CSS...
	private const _CSS_INFO								= 'css_panel_info';
	//...CSS
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//JS...
	/*virtual override*/protected function __getJSInfoImport():string
	{
		return '';
	}

	/*virtual override*/protected function __getJSInfo():string
	{
		return '';
	}

	/*virtual override*/protected function __drawPreJS():void
	{
	}

	/*virtual override*/protected function __drawPostJS():void
	{
	}
	//...JS

	/*override*/protected function __draw():void
	{
		$this->__drawBody();
	}

	//PARAMS...
	/*virtual override*/protected function __getInfoClasses():string
	{
		return self::_CSS_INFO. ' ' .parent::__getInfoClasses();
	}
	//...PARAMS

	//TRANSLATIONS...
	/**@return CCTranslationXMLPanelInfoNode*/
	/*virtual*/protected function __getTranslationXMLInfoNode():CCXMLNode
	{
		return CCTranslationXMLPanelInfoNodeParser::i_parseNode($this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getTranslationXMLPanelsInfoNativeNode()->i_getXMLChildNodeByNodeName($this->__getInfoNodeName()));
	}
	//...TRANSLATIONS
}


?>