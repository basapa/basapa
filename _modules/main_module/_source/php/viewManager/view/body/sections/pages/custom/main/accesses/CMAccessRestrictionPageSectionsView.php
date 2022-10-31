<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMAccessRestrictionPageSectionsView extends CMAccessPageSectionsView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
	
	protected function __drawContentSection()
	{
		/*$lAccessRestrictionMessageTranslationData_clss = $this->__getMessagesTranslationData()->getAccessRestrictionMessageTranslationData();

		$lLangId_str = $this->__getMainData()->getParam(CParamConst::LANG_ID);

		$lAccessRestrictionMessageFileName_str = CTools::replace(CFileConst::TRANSLATIONS_ACCESSES_MESSAGES_COMMON_DIRECTORY_NAME . CFileConst::ACCESS_RESTRICTION_MESSAGE_FILE_NAME, $lLangId_str, CTools::REPLACING_PATTERN_LANG_ID);

		$lParamFileNames_str_arr = array($lAccessRestrictionMessageFileName_str);
		$lParamReplacingParams_obj_arr = array(CTools::REPLACING_PATTERN_SITE_FULL_NAME => SITE_FULL_NAME);

		$lParams_obj_arr	= array(CInformationMessageInfoView::PARAM_NAME						=> $lAccessRestrictionMessageTranslationData_clss->getMessageName(),
									CInformationMessageInfoView::PARAM_FILE_NAMES				=> $lParamFileNames_str_arr,
									CInformationMessageInfoView::PARAM_REPLACING_PARAMS			=> $lParamReplacingParams_obj_arr,
									CInformationMessageInfoView::PARAM_IS_CLOSE_BUTTON_ALLOWED	=> false);
		$this->__getModulesView()->getInfosView()->getMessagesInfoView()->getInformationMessageInfoView()->draw($lParams_obj_arr);*/
	}
}


?>