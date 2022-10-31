<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCSupportFormDialogAjaxController extends CCAjaxController
{
	/***************************************************
	 * INTERFACE
	 */

	/*override*/public function i_send():void
	{
		/*$lMainData_clss = $this->__getMainData();
		$lSiteId_str = $lMainData_clss->i_getURLParam(CCRequestParamConst::i_GET_PARAM_ID_SITE);
		$lLangId_str = $lMainData_clss->i_getURLParam(CCRequestParamConst::i_GET_PARAM_ID_LANG);

		$lTranslationFullFileName_str = CStringTools::i_replace(CCFileConst::i_INTERNALS_TRANSLATIONS_DIRECTORY_NAME . CCFileConst::i_TRANSLATIONS_XML_FILE_NAME, $lLangId_str, CStringTools::i_REPLACING_PATTERN_LANG_ID);
		$lNecessaryNodesFullNames_str_arr = [CCTranslationXMLFileNodesFullName::i_SUPPORT_FORM_NODE_FULL_NAME];

		$lTranslationXMLData_clss = CFileManager::i_getInstance()->i_getXMLFilesController()->i_getXMLFilesController($lSiteId_str)->i_getTranslationXMLFileController()->i_parseXMLFile($lTranslationFullFileName_str, $lNecessaryNodesFullNames_str_arr);

		CTranslationManager::i_getInstance()->i_getTranslationsData()->i_getTranslationData($lSiteId_str)->i_setTranslationData($lTranslationXMLData_clss);

		CViewManager::i_getInstance()->i_getModulesView()->i_getDialogsView()->i_getDialogsView($lSiteId_str)->i_getSupportFormDialogView()->i_draw();
	}*/

	/*public function i_submitFormDialogData()
	{
		$lMainData_clss = $this->__getMainData();
		$lSiteId_str = $lMainData_clss->i_getURLParam(CCRequestParamConst::i_GET_PARAM_ID_SITE);
		$lLangId_str = $lMainData_clss->i_getURLParam(CCRequestParamConst::i_GET_PARAM_ID_LANG);

		CMainManager::i_getInstance()->i_getMainController()->i_getRequestsController()->i_getRequestsController($lSiteId_str)->i_getSupportRequestController()->i_update();

		$this->i_receiveFormDialogHTML();*/
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getAjaxRequestId():string
	{
		return '';
	}
}


?>