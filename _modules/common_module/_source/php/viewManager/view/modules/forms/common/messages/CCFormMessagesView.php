<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCFormMessagesView
{
	private const _FORM_MESSAGE_MARKER					= '▪ ';


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_draw():void
	{
		$lFormMessagesData_clss = $this->__getFormMessagesData();
		if (!$lFormMessagesData_clss->i_areFormMessagesDataDefined())
		{
			return;
		}

		$l_a_arr = null;

		$lCount_int = $lFormMessagesData_clss->i_getFormMessagesDataCount();
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lFormMessageData_clss = $lFormMessagesData_clss->i_getFormMessageData($i);
			$lFormMessageId_int = $lFormMessageData_clss->i_getFormMessageId();
			$lFormMessageType_int = $lFormMessageData_clss->i_getFormMessageType();
			$lFormMessageText_str = $lFormMessageData_clss->i_getFormMessageText();

			$l_a_arr[$lFormMessageType_int] = isset($l_a_arr[$lFormMessageType_int]) ? $l_a_arr[$lFormMessageType_int] : '';
			$l_a_arr[$lFormMessageType_int] .= self::_FORM_MESSAGE_MARKER . $lFormMessageText_str;

			if (SOURCES_EXECUTION_MODE === SOURCES_EXECUTION_MODE_DEBUG)
			{
				$l_a_arr[$lFormMessageType_int] .= ' [message id: ' .$lFormMessageId_int. ']';
			}

			$l_a_arr[$lFormMessageType_int] .= '<br>';
		}

		if (isset($l_a_arr))
		{
			$lMessagesInfoView_clss = CViewManager::i_getInstance()->i_getModulesView()->i_getInfosView()->i_getMessagesInfoView();

			foreach ($l_a_arr as $lFormMessageType_int => $lFormMessageText_str)
			{
				switch ($lFormMessageType_int)
				{
					case CCFormMessageData::i_FORM_MESSAGE_TYPE_SUCCESS:
					{
						$lParams_a_arr	= [	CCMessageInfoView::i_PARAM_ID_MESSAGE_TITLE	=> $this->__getTranslationXMLFormNode()->i_getFormMessagesData()->i_getSuccessMessagesCaption(),
											CCMessageInfoView::i_PARAM_ID_MESSAGE_TEXT	=> $lFormMessageText_str/*,
											CCMessageInfoView::PARAM_IS_CLOSE_BUTTON_ALLOWED	=> true*/];
						$lMessagesInfoView_clss->i_getSuccessMessageInfoView()->i_draw($lParams_a_arr);
					}break;

					case CCFormMessageData::i_FORM_MESSAGE_TYPE_WARNING:
					{
						$lParams_a_arr	= [	CCMessageInfoView::i_PARAM_ID_MESSAGE_TITLE	=> $this->__getTranslationXMLFormNode()->i_getFormMessagesData()->i_getWarningMessagesCaption(),
											CCMessageInfoView::i_PARAM_ID_MESSAGE_TEXT	=> $lFormMessageText_str/*,
											CCMessageInfoView::PARAM_IS_CLOSE_BUTTON_ALLOWED	=> true*/];
						$lMessagesInfoView_clss->i_getWarningMessageInfoView()->i_draw($lParams_a_arr);
					}break;

					case CCFormMessageData::i_FORM_MESSAGE_TYPE_ERROR:
					{
						$lParams_a_arr	= [	CCMessageInfoView::i_PARAM_ID_MESSAGE_TITLE	=> $this->__getTranslationXMLFormNode()->i_getFormMessagesData()->i_getErrorMessagesCaption(),
											CCMessageInfoView::i_PARAM_ID_MESSAGE_TEXT	=> $lFormMessageText_str/*,
											CCMessageInfoView::PARAM_IS_CLOSE_BUTTON_ALLOWED	=> true*/];
						$lMessagesInfoView_clss->i_getErrorMessageInfoView()->i_draw($lParams_a_arr);
					}break;
				}
			}
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getViewData()
	{
		$lSiteId_str = CMainManager::i_getInstance()->i_getMainData()->i_getGETParamSiteId();
		
		return CViewManager::i_getInstance()->i_getViewsData()->i_getViewData($lSiteId_str);
	}

	protected function __getXMLFileData()
	{
		$lSiteId_str = CMainManager::i_getInstance()->i_getMainData()->i_getGETParamSiteId();

		return CFileManager::i_getInstance()->i_getFilesData()->i_getXMLFilesData()->i_getXMLFileData($lSiteId_str);
	}

	/*virtual*/protected function __getFormMessagesData():CCFormMessagesData
	{
		return new CCFormMessagesData();
	}

	//TRANSLATIONS...
	/**@return CCTranslationXMLFormNode*/
	/*virtual*/protected function __getTranslationXMLFormNode():CCXMLNode
	{
		return CCTranslationXMLFormNodeParser::i_parseNode($this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getTranslationXMLFormsNativeNode()->i_getXMLChildNodeByNodeName($this->__getFormNodeName()));
	}

	/*virtual*/protected function __getFormNodeName():string
	{
		return '';
}
	//...TRANSLATIONS
}


?>