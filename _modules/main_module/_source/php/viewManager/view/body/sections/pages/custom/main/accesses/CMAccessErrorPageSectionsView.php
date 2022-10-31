<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMAccessErrorPageSectionsView extends CMAccessPageSectionsView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __drawContentSection()
	{
		/*$lAccessErrorMessageTranslationData_clss = $this->__getMessagesTranslationData()->getAccessErrorMessageTranslationData();

		$lLangId_str = $this->__getMainData()->getParam(CParamConst::LANG_ID);

		$lAccessErrorMessageFileName_str = CTools::replace(CFileConst::TRANSLATIONS_ACCESSES_MESSAGES_COMMON_DIRECTORY_NAME . CFileConst::ACCESS_ERROR_MESSAGE_FILE_NAME, $lLangId_str, CTools::REPLACING_PATTERN_LANG_ID);

		$lParamFileNames_str_arr = array($lAccessErrorMessageFileName_str);
		$lParamReplacingParams_obj_arr = array(CTools::REPLACING_PATTERN_EMAIL => CMainConst::SITE_SUPPORT_EMAIL);

		$lParams_obj_arr	= array(CInformationMessageInfoView::PARAM_NAME						=> $lAccessErrorMessageTranslationData_clss->getMessageName(),
									CInformationMessageInfoView::PARAM_FILE_NAMES				=> $lParamFileNames_str_arr,
									CInformationMessageInfoView::PARAM_REPLACING_PARAMS			=> $lParamReplacingParams_obj_arr,
									CInformationMessageInfoView::PARAM_IS_CLOSE_BUTTON_ALLOWED	=> false);
		$this->__getModulesView()->getInfosView()->getMessagesInfoView()->getInformationMessageInfoView()->draw($lParams_obj_arr);*/
	}
}


?>