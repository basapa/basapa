<?php
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


class CMError404PageSectionsView extends CMErrorPageSectionsView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
	
	protected function __drawContentSection()
	{
		/*$lError404MessageTranslationData_clss = $this->__getMessagesTranslationData()->getError404MessageTranslationData();

		$lLangId_str = $this->__getMainData()->getParam(CParamConst::LANG_ID);

		$lError404MessageFileName_str = CTools::replace(CFileConst::TRANSLATIONS_ERRORS_MESSAGES_COMMON_DIRECTORY_NAME . CFileConst::ERROR_404_MESSAGE_FILE_NAME, $lLangId_str, CTools::REPLACING_PATTERN_LANG_ID);
		$lParamFileNames_str_arr = array($lError404MessageFileName_str);
		$lParamReplacingParams_obj_arr = array(CTools::REPLACING_PATTERN_SITE_FULL_NAME => SITE_FULL_NAME);

		$lParams_obj_arr	= array(CInformationMessageInfoView::PARAM_NAME						=> $lError404MessageTranslationData_clss->getMessageName(),
									CInformationMessageInfoView::PARAM_FILE_NAMES				=> $lParamFileNames_str_arr,
									CInformationMessageInfoView::PARAM_REPLACING_PARAMS			=> $lParamReplacingParams_obj_arr,
									CInformationMessageInfoView::PARAM_IS_CLOSE_BUTTON_ALLOWED	=> false);
		$this->__getModulesView()->getInfosView()->getMessagesInfoView()->getInformationMessageInfoView()->draw($lParams_obj_arr);*/
	}
}


?>