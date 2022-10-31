<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCJSONFileController extends CCFileController
{
	/***************************************************
	 * INTERFACE
	 */

	/*public function i_parseXMLFile($aFileName_str)
	{
		$lXMLDocument_sxmle = $this->__loadFile($aFileName_str);
		return $lXMLDocument_sxmle;
	}*/

	/*public function i_addNode($aFileName_str, $aNewNode_clss)
	{
		$lXMLDocument_sxmle = $this->__loadFile($aFileName_str);
		$lXMLDocument_sxmle = $this->__addNode($lXMLDocument_sxmle, $aNewNode_clss);
		$lXMLDocument_sxmle->asXML($aFileName_str);
	}

	public function i_updateNode($aFileName_str, $aNewNode_clss)
	{
		new CAbstractException('updateNode');
	}*/
	
	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}
}


?>