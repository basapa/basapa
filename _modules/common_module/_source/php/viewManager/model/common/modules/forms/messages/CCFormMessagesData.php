<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCFormMessagesData
{
	public const i_FORM_MESSAGE_ID_EMPTY_DATA			= 0;
	public const i_FORM_MESSAGE_ID_SUCCESS				= 1;
	public const i_FORM_MESSAGE_ID_FAILED				= 2;
	protected const __FORM_MESSAGES_COUNT				= 3;

	private $_fFormMessageData_clss_arr;
	private $_fFormMessageData_obj_arr;


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_addFormMessageData(CCFormMessageData $aFormMessageData_clss):void
	{
		$this->_fFormMessageData_clss_arr[] = $aFormMessageData_clss;

		$lFormMessageId_int = $aFormMessageData_clss->i_getFormMessageId();

		if (isset($this->_fFormMessageData_obj_arr[$lFormMessageId_int]))
		{
			new CException('i_addFormMessageData', 'Form message data already added: ' .$lFormMessageId_int);
		}

		$this->_fFormMessageData_obj_arr[$lFormMessageId_int] = $aFormMessageData_clss;
	}

	public function i_getFormMessagesDataCount():int
	{
		return CArrayTools::i_count($this->i_getFormMessagesData());
	}

	public function i_getFormMessagesData()
	{
		if (!$this->i_areFormMessagesDataDefined())
		{
			new CException('i_getFormMessagesData', 'Form messages data not defined!');
		}

		return $this->_fFormMessageData_clss_arr;
	}

	public function i_areFormMessagesDataDefined()
	{
		return isset($this->_fFormMessageData_clss_arr);
	}

	public function i_getFormMessageData(int $aIndex_int):CCFormMessageData
	{
		if (!CVariableTools::i_isInt($aIndex_int))
		{
			new CException('i_getFormMessageData', 'Invalid form message id arg type!');
		}

		if (!isset($this->_fFormMessageData_clss_arr[$aIndex_int]))
		{
			new CException('i_getFormMessageData', 'Invalid form message index: ' .$aIndex_int);
		}

		return $this->_fFormMessageData_clss_arr[$aIndex_int];
	}

	public function i_getFormMessageDataByFormMessageId(int $aFormMessageId_int):CCFormMessageData
	{
		if (!CVariableTools::i_isInt($aFormMessageId_int))
		{
			new CException('i_getFormMessageDataByFormMessageId', 'Invalid form message id arg type!');
		}

		if (!isset($this->_fFormMessageData_obj_arr[$aFormMessageId_int]))
		{
			new CException('i_getFormMessageDataByFormMessageId', 'Invalid form message id: ' .$aFormMessageId_int);
		}

		return $this->_fFormMessageData_obj_arr[$aFormMessageId_int];
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/
}


?>