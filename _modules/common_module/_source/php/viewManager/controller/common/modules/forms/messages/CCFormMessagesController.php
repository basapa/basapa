<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCFormMessagesController
{
	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_update():void
	{
		$lFormMessagesData_clss = $this->__getFormMessagesData();
		if ($lFormMessagesData_clss->i_areFormMessagesDataDefined())
		{
			$lCount_int = $lFormMessagesData_clss->i_getFormMessagesDataCount();
			for ($i = 0; $i < $lCount_int; $i++)
			{
				$lFormMessageData_clss = $lFormMessagesData_clss->i_getFormMessageData($i);
				$lFormMessageId_int = $lFormMessageData_clss->i_getFormMessageId();
				$lFormMessageType_int = $this->__getFormMessageType($lFormMessageId_int);
				$lFormMessageText_str = $this->__getFormMessageText($lFormMessageId_int);

				$lFormMessageData_clss->i_setFormMessageType($lFormMessageType_int);
				$lFormMessageData_clss->i_setFormMessageText($lFormMessageText_str);
			}
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}

	protected function __getViewData()
	{
		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();
		
		return CViewManager::i_getInstance()->i_getViewsData()->i_getViewData($lSiteId_str);
	}

	protected function __getXMLFileData()
	{
		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		return CFileManager::i_getInstance()->i_getFilesData()->i_getXMLFilesData()->i_getXMLFileData($lSiteId_str);
	}

	protected function __getFormMessageType(int $aFormMessageId_int):int
	{
		return $aFormMessageId_int === CCFormMessagesData::i_FORM_MESSAGE_ID_SUCCESS ? CCFormMessageData::i_FORM_MESSAGE_TYPE_SUCCESS : CCFormMessageData::i_FORM_MESSAGE_TYPE_ERROR;
	}

	/*virtual*/protected function __getFormMessageText(int $aFormMessageId_int):string
	{
		$lFormMessageText_str = '';

		switch ($aFormMessageId_int)
		{
			case CCFormMessagesData::i_FORM_MESSAGE_ID_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getTranslationXMLFormNode()->i_getFormMessagesData()->i_getEmptyMandatoryFieldsMessage();
			}break;

			case CCFormMessagesData::i_FORM_MESSAGE_ID_FAILED:
			{
				$lFormMessageText_str = $this->__getTranslationXMLFormNode()->i_getFormMessagesData()->i_getFailedMessage();
			}break;

			case CCFormMessagesData::i_FORM_MESSAGE_ID_SUCCESS:
			{
				$lFormMessageText_str = $this->__getTranslationXMLFormNode()->i_getFormMessagesData()->i_getSuccessMessage();
			}break;

			default:
				new CException('__getFormMessageText', 'Unsupported form message id: ' .$aFormMessageId_int);
			break;
		}

		return $lFormMessageText_str;
	}

	protected function __getTranslationXMLListboxComponentEmptyDataMessage(CCTranslationXMLListboxComponentNode $aTranslationXMLListboxComponentNode_clss):string
	{
		return $aTranslationXMLListboxComponentNode_clss->i_getMessagesData()->i_getDataEmptyMessage();
	}

	protected function __getTranslationXMLTextfieldComponentEmptyDataMessage(CCTranslationXMLTextfieldComponentNode $aTranslationXMLTextfieldComponentNode_clss):string
	{
		return $aTranslationXMLTextfieldComponentNode_clss->i_getMessagesData()->i_getDataEmptyMessage();
	}

	protected function __getTranslationXMLTextfieldComponentIllegalCharsMessage(CCTranslationXMLTextfieldComponentNode $aTranslationXMLTextfieldComponentNode_clss):string
	{
		$lNameText_str = $aTranslationXMLTextfieldComponentNode_clss->i_getName();
		$lFormMessageText_str = $aTranslationXMLTextfieldComponentNode_clss->i_getMessagesData()->i_getIllegalCharsMessage();
		return $this->__replaceNamePatternInIllegalCharsEventMessage($lFormMessageText_str, $lNameText_str);
	}

	protected function __getTranslationXMLTextfieldComponentWrongCharsCountMessage(CCTranslationXMLTextfieldComponentNode $aTranslationXMLTextfieldComponentNode_clss, int $aMinCharsCount_int, int $aMaxCharsCount_int):string
	{
		$lNameText_str = $aTranslationXMLTextfieldComponentNode_clss->i_getName();
		$lFormMessageText_str = $aTranslationXMLTextfieldComponentNode_clss->i_getMessagesData()->i_getWrongCharsCountMessage();
		return $this->__replaceNameAndMaxMinCharsCountsPatternInWrongCharsCountMessage($lFormMessageText_str, $lNameText_str, $aMinCharsCount_int, $aMaxCharsCount_int);
	}

	protected function __getTranslationXMLTextareaComponentEmptyDataMessage(CCTranslationXMLTextareaComponentNode $aTranslationXMLTextareaComponentNode_clss):string
	{
		return $aTranslationXMLTextareaComponentNode_clss->i_getMessagesData()->i_getDataEmptyMessage();
	}

	protected function __getTranslationXMLTextareaComponentIllegalCharsMessage(CCTranslationXMLTextareaComponentNode $aTranslationXMLTextareaComponentNode_clss):string
	{
		$lNameText_str = $aTranslationXMLTextareaComponentNode_clss->i_getName();
		$lFormMessageText_str = $aTranslationXMLTextareaComponentNode_clss->i_getMessagesData()->i_getIllegalCharsMessage();
		return $this->__replaceNamePatternInIllegalCharsEventMessage($lFormMessageText_str, $lNameText_str);
	}

	protected function __getTranslationXMLTextareaComponentWrongCharsCountMessage(CCTranslationXMLTextareaComponentNode $aTranslationXMLTextareaComponentNode_clss, int $aMinCharsCount_int, int $aMaxCharsCount_int):string
	{
		$lNameText_str = $aTranslationXMLTextareaComponentNode_clss->i_getName();
		$lFormMessageText_str = $aTranslationXMLTextareaComponentNode_clss->i_getMessagesData()->i_getWrongCharsCountMessage();
		return $this->__replaceNameAndMaxMinCharsCountsPatternInWrongCharsCountMessage($lFormMessageText_str, $lNameText_str, $aMinCharsCount_int, $aMaxCharsCount_int);
	}

	protected function __replaceNamePatternInEmptyDataEventMessage(string $aFieldMessageText_str, string $aFieldName_str):string
	{
		$lFieldMessageText_str = CStringTools::i_replace($aFieldMessageText_str, $aFieldName_str, CStringTools::i_REPLACING_PATTERN_NAME);
		return $lFieldMessageText_str;
	}

	protected function __replaceNameAndMaxMinCharsCountsPatternInWrongCharsCountMessage(string $aFieldMessageText_str, string $aFieldName_str, int $aFieldMinCharsCount_int, int $aFieldMaxCharsCount_int):string
	{
		$lFieldMessageText_str = CStringTools::i_replace($aFieldMessageText_str, $aFieldName_str, CStringTools::i_REPLACING_PATTERN_NAME);
		$lFieldMessageText_str = CStringTools::i_replace($lFieldMessageText_str, CVariableTools::i_toString($aFieldMinCharsCount_int), CStringTools::i_REPLACING_PATTERN_MIN_CHARS_COUNT);
		$lFieldMessageText_str = CStringTools::i_replace($lFieldMessageText_str, CVariableTools::i_toString($aFieldMaxCharsCount_int), CStringTools::i_REPLACING_PATTERN_MAX_CHARS_COUNT);
		return $lFieldMessageText_str;
	}

	protected function __replaceNamePatternInIllegalCharsEventMessage(string $aFieldMessageText_str, string $aFieldName_str):string
	{
		$lFieldMessageText_str = CStringTools::i_replace($aFieldMessageText_str, $aFieldName_str, CStringTools::i_REPLACING_PATTERN_NAME);
		return $lFieldMessageText_str;
	}

	/*virtual*/protected function __getFormMessagesData():CCFormMessagesData
	{
		return new CCFormMessagesData();
	}

	//TRANSLATIONS...
	/**@return CCTranslationXMLListboxComponentNode*/
	protected function __getTranslationXMLListboxComponentNode(string $aComponentNodeId_str):CCXMLNode
	{
		return CCTranslationXMLListboxComponentNodeParser::i_parseNode($this->_getTranslationXMLComponentNativeNode($aComponentNodeId_str));
	}

	/**@return CCTranslationXMLTextfieldComponentNode*/
	protected function __getTranslationXMLTextfieldComponentNode(string $aComponentNodeId_str):CCXMLNode
	{
		return CCTranslationXMLTextfieldComponentNodeParser::i_parseNode($this->_getTranslationXMLComponentNativeNode($aComponentNodeId_str));
	}

	/**@return CCTranslationXMLTextareaComponentNode*/
	protected function __getTranslationXMLTextareaComponentNode(string $aComponentNodeId_str):CCXMLNode
	{
		return CCTranslationXMLTextareaComponentNodeParser::i_parseNode($this->_getTranslationXMLComponentNativeNode($aComponentNodeId_str));
	}

	private function _getTranslationXMLComponentNativeNode(string $aComponentNodeId_str):CSimpleXMLElementWrapper
	{
		return $this->__getTranslationXMLFormNode()->i_getNativeNode()->i_getXMLChildNodeByNodeName($aComponentNodeId_str);
	}

	/**@return CCTranslationXMLFormNode*/
	/*virtual*/protected function __getTranslationXMLFormNode():CCXMLNode
	{
		return new CCTranslationXMLFormNode();
	}
	//...TRANSLATIONS
}


?>