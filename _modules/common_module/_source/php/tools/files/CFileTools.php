<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CFileTools
{
	//FILE OPENING MODES (do not modify)...
	public const i_FILE_OPENING_MODE_ADD_TO_START		= 'r+';
	public const i_FILE_OPENING_MODE_ADD_TO_END			= 'a+';
	//...FILE OPENING MODES (do not modify)

	
	/***************************************************
	 * INTERFACE
	 */
	
	static public function i_openNewFile(string $aFullFileName_str):resource
	{
		self::_throwIfFileExist($aFullFileName_str);
		$lRet_mixed = fopen($aFullFileName_str, 'w+');
		self::_throwIfRetFailed($lRet_mixed);
		return $lRet_mixed;
	}
	
	static public function i_openExistingFile(string $aFullFileName_str, string $aOptFileOpeningMode_str = self::i_FILE_OPENING_MODE_ADD_TO_END):resource
	{
		self::_throwIfFileNotExist($aFullFileName_str);
		$lRet_mixed = fopen($aFullFileName_str, $aOptFileOpeningMode_str);
		self::_throwIfRetFailed($lRet_mixed);
		return $lRet_mixed;
	}
	
	static public function i_lockWFile(resource $aFileHandle_res):void
	{
		$lRet_bl = flock($aFileHandle_res, LOCK_EX);
		self::_throwIfRetFailed($lRet_bl);
	}

	static public function i_lockRFile(resource $aFileHandle_res):void
	{
		$lRet_bl = flock($aFileHandle_res, LOCK_SH);
		self::_throwIfRetFailed($lRet_bl);
	}

	static public function i_unlockFile(resource $aFileHandle_res):void
	{
		$lRet_bl = flock($aFileHandle_res, LOCK_UN);
		self::_throwIfRetFailed($lRet_bl);
	}
	
	static public function i_isFileOpened(resource $aFileHandle_res):bool
	{
		return CVariableTools::i_toBoolean($aFileHandle_res);
	}
	
	static public function i_isFileEnd(resource $aFileHandle_res):bool
	{
		return feof($aFileHandle_res);
	}
	
	static public function i_getFileAllContentAsString(string $aFullFileName_str, $aOptContext_res = null):string
	{
		self::_throwIfFileNotExist($aFullFileName_str);
		$lRet_mixed = file_get_contents($aFullFileName_str, false, $aOptContext_res);
		self::_throwIfRetFailed($lRet_mixed);
		return $lRet_mixed;
	}
	
	static public function i_getFileAllContentAsStrings(string $aFullFileName_str):array
	{
		self::_throwIfFileNotExist($aFullFileName_str);
		$lRet_mixed = file($aFullFileName_str, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		self::_throwIfRetFailed($lRet_mixed);
		return $lRet_mixed;
	}
	
	static public function i_getFileContentNextString(resource $aFileHandle_res):string
	{
		if (!self::i_isFileOpened($aFileHandle_res))
		{
			new CException('i_getFileContentNextString', 'File is not opened!');
		}
		$lRet_mixed = fgets($aFileHandle_res);
		self::_throwIfRetFailed($lRet_mixed);
		return $lRet_mixed;
	}

	static public function i_writeContentInFile(string $aFullFileName_str, string $aFileContent_str, bool $aOptUseAppendMode_bl = true):void
	{
		$lRet_mixed = file_put_contents($aFullFileName_str, $aFileContent_str, $aOptUseAppendMode_bl ? FILE_APPEND : 0);
		self::_throwIfRetFailed($lRet_mixed);
	}

	static public function i_readFileContentInBuffer(string $aFullFileName_str):void
	{
		self::_throwIfFileNotExist($aFullFileName_str);
		$lRet_mixed = readfile($aFullFileName_str);
		self::_throwIfRetFailed($lRet_mixed);
	}
	
	static public function i_readFileBinaryContentInString(resource $aFileHandle_res, int $aContentSizeInBytes_int):string
	{
		if (!self::i_isFileOpened($aFileHandle_res))
		{
			new CException('i_readFileBinaryContentInString', 'File is not opened!');
		}
		$lRet_mixed = fread($aFileHandle_res, $aContentSizeInBytes_int);
		self::_throwIfRetFailed($lRet_mixed);
		return $lRet_mixed;
	}
	
	static public function i_writeBinaryContentInFile(resource $aFileHandle_res, string $aFileContent_str):void
	{
		if (!self::i_isFileOpened($aFileHandle_res))
		{
			new CException('i_writeBinaryContentInFile', 'File is not opened!');
		}
		$lRet_mixed = fwrite($aFileHandle_res, $aFileContent_str);
		self::_throwIfRetFailed($lRet_mixed);
	}
	
	static public function i_closeFile(resource $aFileHandle_res):void
	{
		if (!self::i_isFileOpened($aFileHandle_res))
		{
			new CException('i_closeFile', 'File is not opened!');
		}
		$lRet_bl = fclose($aFileHandle_res);
		self::_throwIfRetFailed($lRet_bl);
	}

	static public function i_generateFileHash(string $aFullFileName_str):string
	{
		if (!CFileSystemTools::i_isFileExist($aFullFileName_str))
		{
			new CException('i_generateFileHash', 'File is not exist!');
		}
		return sha1_file($aFullFileName_str);
	}
	
	/*
	 * INTERFACE
	 ***************************************************/
	 
	static private function _throwIfFileNotExist(string $aFullFileName_str)
	{
		if (!CFileSystemTools::i_isFileExist($aFullFileName_str))
		{
			new CException('_throwIfFileNotExist', 'File not exist: ' .$aFullFileName_str);
		}
	}

	static private function _throwIfFileExist(string $aFullFileName_str)
	{
		if (CFileSystemTools::i_isFileExist($aFullFileName_str))
		{
			new CException('_throwIfFileExist', 'File already exist: ' .$aFullFileName_str);
		}
	}

	static private function _throwIfRetFailed($a_var)
	{
		if ($a_var === false)
		{
			new CException('_throwIfRetFailed', 'Return value: ' .$a_var);
		}
	}
}


?>