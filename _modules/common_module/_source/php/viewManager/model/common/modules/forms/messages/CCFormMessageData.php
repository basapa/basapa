<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCFormMessageData
{
	public const i_FORM_MESSAGE_TYPE_SUCCESS			= 0;
	public const i_FORM_MESSAGE_TYPE_WARNING			= 1;
	public const i_FORM_MESSAGE_TYPE_ERROR				= 2;

	private $_fFormMessageId_int;
	private $_fFormMessageType_int;
	private $_fFormMessageText_str;


	public function __construct(int $aFormMessageId_int)
	{
		$this->__init($aFormMessageId_int);
	}

	/***************************************************
	 * INTERFACE
	 */

	public function i_getFormMessageId():int
	{
		return $this->_fFormMessageId_int;
	}

	public function i_getFormMessageType():int
	{
		return $this->_fFormMessageType_int;
	}

	public function i_setFormMessageType(int $aFormMessageType_int)
	{
		$this->_fFormMessageType_int = $aFormMessageType_int;
	}

	public function i_getFormMessageText():string
	{
		return $this->_fFormMessageText_str;
	}

	public function i_setFormMessageText(string $aFormMessageText_str)
	{
		$this->_fFormMessageText_str = $aFormMessageText_str;
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*/protected function __init(int $aFormMessageId_int):void
	{
		$this->_fFormMessageId_int = $aFormMessageId_int;
	}
}


?>