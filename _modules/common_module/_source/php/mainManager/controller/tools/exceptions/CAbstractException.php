<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CAbstractException extends CException
{
	public function __construct(string $aFuncName_str)
	{
		parent::__construct($aFuncName_str, 'Abstract function!', CException::i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR);

		throw $this;
	}

	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
}


?>