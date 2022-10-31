<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMAccessProhibitionPageSectionsView extends CMAccessPageSectionsView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
	
	protected function __drawContentSection()
	{
		/*$lAccessProhibitionMessageTranslationData_clss = $this->__getMessagesTranslationData()->getAccessProhibitionMessageTranslationData();

		$lLangId_str = $this->__getMainData()->getParam(CParamConst::LANG_ID);

		$lAccessProhibitionMessageFileName_str = CTools::replace(CFileConst::TRANSLATIONS_ACCESSES_MESSAGES_COMMON_DIRECTORY_NAME . CFileConst::ACCESS_PROHIBITION_MESSAGE_FILE_NAME, $lLangId_str, CTools::REPLACING_PATTERN_LANG_ID);

		$lParamFileNames_str_arr = array($lAccessProhibitionMessageFileName_str);
		$lParamReplacingParams_obj_arr = array(CTools::REPLACING_PATTERN_EMAIL => CMainConst::SITE_SUPPORT_EMAIL);

		$lParams_obj_arr	= array(CInformationMessageInfoView::PARAM_NAME						=> $lAccessProhibitionMessageTranslationData_clss->getMessageName(),
									CInformationMessageInfoView::PARAM_FILE_NAMES				=> $lParamFileNames_str_arr,
									CInformationMessageInfoView::PARAM_REPLACING_PARAMS			=> $lParamReplacingParams_obj_arr,
									CInformationMessageInfoView::PARAM_IS_CLOSE_BUTTON_ALLOWED	=> false);
		$this->__getModulesView()->getInfosView()->getMessagesInfoView()->getInformationMessageInfoView()->draw($lParams_obj_arr);*/
	}
}


?>