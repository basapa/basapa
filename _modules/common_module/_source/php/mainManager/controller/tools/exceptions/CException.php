<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CException extends \Exception
{
	//EXCEPTION TYPES...
	public const i_EXCEPTION_TYPE_UNKNOWN				= -1;
	public const i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR	= 0;
	public const i_EXCEPTION_TYPE_EXTERNAL_LOGIC_ERROR	= 1;
	public const i_EXCEPTION_TYPE_UNSUPPORTED_PAGE		= 2;
	public const i_EXCEPTION_TYPE_CRITICAL_ERROR		= 3;
	//...EXCEPTION TYPES

	private $_fExceptionType_int;


	/**@throws CException*/
	public function __construct(string $aExceptionFuncName_str, string $aExceptionMessage_str, int $aOptExceptionType_int = CException::i_EXCEPTION_TYPE_UNKNOWN)
	{
		$this->_fExceptionType_int = $aOptExceptionType_int;
		
		$lExceptionMessage_str = '[' .$aExceptionFuncName_str. ']: ' .$aExceptionMessage_str;

		CLogFile::i_writeContentInLogFile($lExceptionMessage_str);

		parent::__construct($lExceptionMessage_str);
		
		throw $this;
	}

	/***************************************************
	 * INTERFACE
	 */

	/**@return CException*/
	static public function i_toClassType(&$a_clss)
	{
		return $a_clss;
	}

	public function i_getExceptionType():int
	{
		return $this->_fExceptionType_int;
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>