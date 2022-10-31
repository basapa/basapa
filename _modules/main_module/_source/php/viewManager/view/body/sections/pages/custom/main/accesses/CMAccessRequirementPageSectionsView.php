<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMAccessRequirementPageSectionsView extends CMAccessPageSectionsView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __drawContentSection()
	{
		/*$lAccessRequirementMessageTranslationData_clss = $this->__getMessagesTranslationData()->getAccessRequirementMessageTranslationData();

		$lLangId_str = $this->__getMainData()->getParam(CParamConst::LANG_ID);

		$lAccessRequirementMessageFileName_str = CTools::replace(CFileConst::TRANSLATIONS_ACCESSES_MESSAGES_COMMON_DIRECTORY_NAME . CFileConst::ACCESS_REQUIREMENT_MESSAGE_FILE_NAME, $lLangId_str, CTools::REPLACING_PATTERN_LANG_ID);
		$lParamFileNames_str_arr = array($lAccessRequirementMessageFileName_str);

		$lParams_obj_arr	= array(CInformationMessageInfoView::PARAM_NAME						=> $lAccessRequirementMessageTranslationData_clss->getMessageName(),
									CInformationMessageInfoView::PARAM_FILE_NAMES				=> $lParamFileNames_str_arr,
									CInformationMessageInfoView::PARAM_IS_CLOSE_BUTTON_ALLOWED	=> false);
		$this->__getModulesView()->getInfosView()->getMessagesInfoView()->getInformationMessageInfoView()->draw($lParams_obj_arr);*/
	}
}


?>