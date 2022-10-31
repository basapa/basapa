<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CFileSystemTools
{
	//UPLOAD FILE ERROR_CODES (do not modify)...
	public const i_UPLOAD_FILE_ERROR_CODE_NO_ERROR		= UPLOAD_ERR_OK;
	//...UPLOAD FILE ERROR_CODES (do not modify)

	//ACCESS MODES (do not modify)...
	public const i_FILE_SYSTEM_ACCESS_MODE_WRE_FOR_ALL	= 0777;
	public const i_FILE_SYSTEM_ACCESS_MODE_WR_FOR_OWNER	= 0600;
	//...ACCESS MODES (do not modify)

	//SCANDIR SORTS (do not modify)...
	public const i_FILE_SYSTEM_SORT_MODE_ASC			= SCANDIR_SORT_ASCENDING;
	public const i_FILE_SYSTEM_SORT_MODE_DESC			= SCANDIR_SORT_DESCENDING;
	//...SCANDIR SORTS (do not modify)


	/***************************************************
	 * INTERFACE
	 */
	
	//DIRECTORIES...
	static public function i_isDirectoryExist(string $aFullDirectoryName_str):bool
	{
		return self::i_isDirectory($aFullDirectoryName_str);
	}
	
	static public function i_isDirectory(string $aFullDirectoryName_str):bool
	{
		return is_dir($aFullDirectoryName_str);
	}
	
	static public function i_createDirectory(string $aFullDirectoryName_str, int $aOptDirectoryAccessMode_int = self::i_FILE_SYSTEM_ACCESS_MODE_WRE_FOR_ALL):void
	{
		self::_throwIfDirectoryExist($aFullDirectoryName_str);
		$lRet_bl = mkdir($aFullDirectoryName_str, $aOptDirectoryAccessMode_int);
		self::_throwIfRetFailed($lRet_bl);
	}
	
	static public function i_renameDirectory(string $aOldFullDirectoryName_str, string $aNewFullDirectoryName_str):void
	{
		self::_throwIfDirectoryNotExist($aOldFullDirectoryName_str);
		self::_throwIfDirectoryExist($aNewFullDirectoryName_str);
		$lRet_bl = rename($aOldFullDirectoryName_str, $aNewFullDirectoryName_str);
		self::_throwIfRetFailed($lRet_bl);
	}
	
	static public function i_deleteDirectory(string $aFullDirectoryName_str):void
	{
		self::_throwIfDirectoryNotExist($aFullDirectoryName_str);
		$lRet_bl = rmdir($aFullDirectoryName_str);
		self::_throwIfRetFailed($lRet_bl);
	}

	static public function i_getAllDirectoriesNames(string $aFullDirectoryName_str, int $aOptFileSystemSortMode_int = self::i_FILE_SYSTEM_SORT_MODE_ASC):array
	{
		$lDirectoriesNames_str_arr = [];

		$lAllFilesNamesAndAllDirectoriesNames_str_arr = self::i_getAllFilesNamesAndAllDirectoriesNames($aFullDirectoryName_str, $aOptFileSystemSortMode_int);
		foreach ($lAllFilesNamesAndAllDirectoriesNames_str_arr as $lFileNameOrDirectoryName_str)
		{
			if (self::i_isDirectory($aFullDirectoryName_str. '/' .$lFileNameOrDirectoryName_str))
			{
				$lDirectoriesNames_str_arr[] = $lFileNameOrDirectoryName_str;
			}
		}

		return $lDirectoriesNames_str_arr;
	}

	static public function i_concatAsFullDirectoryName(array $aDirectoriesNamesParts_str_arr):string
	{
		$lFullDirectoryName_str = '';

		foreach ($aDirectoriesNamesParts_str_arr as $DirectoryNamePart_str)
		{
			if (!CVariableTools::i_isString($DirectoryNamePart_str))
			{
				new CException('i_concatAsFullDirectoryName', 'Value not string: ' .$DirectoryNamePart_str, CException::i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR);
			}

			$lFullDirectoryName_str .= empty($lFullDirectoryName_str) ? $DirectoryNamePart_str : '/'. $DirectoryNamePart_str;
		}

		return $lFullDirectoryName_str;
	}
	//...DIRECTORIES
	
	//FILES...
	static public function i_getAllFilesNames(string $aFullDirectoryName_str, int $aOptFileSystemSortMode_int = self::i_FILE_SYSTEM_SORT_MODE_ASC):array
	{
		$lFilesNames_str_arr = [];

		$lAllFilesNamesAndAllDirectoriesNames_str_arr = self::i_getAllFilesNamesAndAllDirectoriesNames($aFullDirectoryName_str, $aOptFileSystemSortMode_int);
		foreach ($lAllFilesNamesAndAllDirectoriesNames_str_arr as $lFileNameOrDirectoryName_str)
		{
			if (self::i_isFile($lFileNameOrDirectoryName_str))
			{
				$lFilesNames_str_arr[] = $lFileNameOrDirectoryName_str;
			}
		}

		return $lFilesNames_str_arr;
	}

	static public function i_isFileExist(string $aFullFileName_str):bool
	{
		return self::i_isFile($aFullFileName_str);
	}
	
	static public function i_isFile(string $aFullFileName_str):bool
	{
		return is_file($aFullFileName_str);
	}
	
	static public function i_getFileName(string $aFullFileName_str, int $aOptNestedDirectoriesCount_int = 0, bool $aOptThrowIfFileNotExist_bl = true):string
	{
		$aOptThrowIfFileNotExist_bl && self::_throwIfFileNotExist($aFullFileName_str);
		$l_str_arr = CStringTools::i_split($aFullFileName_str, "/");

		$l_str = end($l_str_arr);

		if ($aOptNestedDirectoriesCount_int > 0)
		{
			$lIndex_int = 0;

			$lCount_int = CArrayTools::i_count($l_str_arr);

			if ($aOptNestedDirectoriesCount_int > $lCount_int - 1)
			{
				new CException('i_getFileName', 'ILE!', CException::i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR);
			}

			for ($i = $lCount_int - 2; $i >= 0; $i--)
			{
				$l_str = $l_str_arr[$i]. '/' .$l_str;

				$lIndex_int++;
				if ($lIndex_int === $aOptNestedDirectoriesCount_int)
				{
					break;
				}
			}
		}

		return $l_str;
	}

	static public function i_getFileSizeInBytes(string $aFullFileName_str):int
	{
		self::_throwIfFileNotExist($aFullFileName_str);
		$lRet_mixed = filesize($aFullFileName_str);
		self::_throwIfRetFailed($lRet_mixed);
		return $lRet_mixed;
	}
	
	static public function i_getFileExtension(string $aFullFileName_str, bool $aOptThrowIfFileNotExist_bl = true):string
	{
		$l_str_arr = CStringTools::i_split(self::i_getFileName($aFullFileName_str, 0, $aOptThrowIfFileNotExist_bl), ".");
		return end($l_str_arr);
	}

	static public function i_getFileNameWithoutExtension(string $aFullFileName_str, bool $aOptThrowIfFileNotExist_bl = true):string
	{
		$l_str_arr = CStringTools::i_split(self::i_getFileName($aFullFileName_str, 0, $aOptThrowIfFileNotExist_bl), ".");
		return reset($l_str_arr);
	}

	static public function i_getFileLastAccessTime(string $aFullFileName_str):int
	{
		self::_throwIfFileNotExist($aFullFileName_str);
		$lRet_mixed = fileatime($aFullFileName_str);
		self::_throwIfRetFailed($lRet_mixed);
		return $lRet_mixed;
	}
	
	static public function i_getFileLastChangeTime(string $aFullFileName_str):int
	{
		self::_throwIfFileNotExist($aFullFileName_str);
		$lRet_mixed = filemtime($aFullFileName_str);
		self::_throwIfRetFailed($lRet_mixed);
		return $lRet_mixed;
	}
	
	static public function i_isUploadedFile(string $aFullFileName_str):bool
	{
		return is_uploaded_file($aFullFileName_str);
	}
	
	static public function i_moveUploadedFile(string $aFullFileName_str, string $aNewFullFileName_str):void
	{
		if (!self::i_isUploadedFile($aFullFileName_str))
		{
			new CException('i_moveUploadedFile', 'File must be uploaded: ' .$aFullFileName_str);
		}
		$lRet_bl = move_uploaded_file($aFullFileName_str, $aNewFullFileName_str);
		self::_throwIfRetFailed($lRet_bl);
	}
	
	static public function i_getUploadedFullFileName(array $aFILES_a_arr):string
	{
		if (!isset($aFILES_a_arr['tmp_name']))
		{
			new CException('i_getUploadedFullFileName', 'Necessary param not found: ' .CArrayTools::i_toString($aFILES_a_arr));
		}
		return $aFILES_a_arr['tmp_name'];
	}

	static public function i_getUploadedFileOriginalName(array $aFILES_a_arr):string
	{
		if (!isset($aFILES_a_arr['name']))
		{
			new CException('i_getUploadedFileOriginalName', 'Necessary param not found: ' .CArrayTools::i_toString($aFILES_a_arr));
		}
		return CStringTools::i_toLowerCase($aFILES_a_arr['name']);
	}

	static public function i_getUploadedFileSizeInBytes(array $aFILES_a_arr):int
	{
		if (!isset($aFILES_a_arr['size']))
		{
			new CException('i_getUploadedFileSizeInBytes', 'Necessary param not found: ' .CArrayTools::i_toString($aFILES_a_arr));
		}
		return $aFILES_a_arr['size'];
	}
	
	static public function i_getUploadedFileError(array $aFILES_a_arr):int
	{
		if (!isset($aFILES_a_arr['error']))
		{
			new CException('i_getUploadedFileError', 'Necessary param not found: ' .CArrayTools::i_toString($aFILES_a_arr));
		}
		return $aFILES_a_arr['error'];
	}
	
	static public function i_setFileAccessMode(string $aFullFileName_str, int $aFileAccessMode_int)
	{
		self::_throwIfFileNotExist($aFullFileName_str);
		$lRet_bl = chmod($aFullFileName_str, $aFileAccessMode_int);
		self::_throwIfRetFailed($lRet_bl);
	}
	
	static public function i_getFileAccessMode(string $aFullFileName_str):int
	{
		self::_throwIfFileNotExist($aFullFileName_str);
		return fileperms($aFullFileName_str);
	}
	
	static public function i_isFileRAccessMode(string $aFullFileName_str):bool
	{
		self::_throwIfFileNotExist($aFullFileName_str);
		return is_readable($aFullFileName_str);
	}
	
	static public function i_isFileWAccessMode(string $aFullFileName_str):bool
	{
		self::_throwIfFileNotExist($aFullFileName_str);
		return is_writable($aFullFileName_str);
	}
	
	static public function i_isFileEAccessMode(string $aFullFileName_str):bool
	{
		self::_throwIfFileNotExist($aFullFileName_str);
		return is_executable($aFullFileName_str);
	}

	static public function i_copyFile(string $aOldFullFileName_str, string $aNewFullFileName_str):void
	{
		self::_throwIfFileNotExist($aOldFullFileName_str);
		self::_throwIfFileExist($aNewFullFileName_str);
		$lRet_bl = copy($aOldFullFileName_str, $aNewFullFileName_str);
		self::_throwIfRetFailed($lRet_bl);
	}

	static public function i_renameFile(string $aOldFullFileName_str, string $aNewFullFileName_str):void
	{
		self::_throwIfFileNotExist($aOldFullFileName_str);
		self::_throwIfFileExist($aNewFullFileName_str);
		$lRet_bl = rename($aOldFullFileName_str, $aNewFullFileName_str);
		self::_throwIfRetFailed($lRet_bl);
	}
	
	static public function i_deleteFile(string $aFullFileName_str):void
	{
		self::_throwIfFileNotExist($aFullFileName_str);
		$lRet_bl = unlink($aFullFileName_str);
		self::_throwIfRetFailed($lRet_bl);
	}

	static public function i_getFileFullDirectoryName(string $aFullFileName_str, int $aOptNestedLevelsCount_int = 1):string
	{
		self::_throwIfFileNotExist($aFullFileName_str);
		$lRet_var = dirname($aFullFileName_str, $aOptNestedLevelsCount_int);
		self::_throwIfRetFailed($lRet_var);
		return $lRet_var;
	}

	static public function i_concatAsFullFileName(string $aFullDirectoryName_str, string $aFileName_str):string
	{
		return $aFullDirectoryName_str. '/' .$aFileName_str;
	}
	//...FILES

	static public function i_getAllFilesNamesAndAllDirectoriesNames(string $aFullDirectoryName_str, int $aOptFileSystemSortMode_int = self::i_FILE_SYSTEM_SORT_MODE_ASC):array
	{
		self::_throwIfDirectoryNotExist($aFullDirectoryName_str);
		$lRet_var = scandir($aFullDirectoryName_str, $aOptFileSystemSortMode_int);
		self::_throwIfRetFailed($lRet_var);
		return $lRet_var;
	}

	/*
	 * INTERFACE
	 ***************************************************/
	
	//DIRECTORIES...
	static private function _throwIfDirectoryNotExist(string $aFullDirectoryName_str)
	{
		if (!self::i_isDirectoryExist($aFullDirectoryName_str))
		{
			new CException('_throwIfDirectoryNotExist', 'Directory not exist: ' .$aFullDirectoryName_str);
		}
	}
	
	static private function _throwIfDirectoryExist(string $aFullDirectoryName_str)
	{
		if (self::i_isDirectoryExist($aFullDirectoryName_str))
		{
			new CException('_throwIfDirectoryExist', 'Directory already exist: ' .$aFullDirectoryName_str);
		}
	}
	//...DIRECTORIES
	
	//FILES...
	static private function _throwIfFileNotExist(string $aFullFileName_str)
	{
		if (!self::i_isFileExist($aFullFileName_str))
		{
			new CException('_throwIfFileNotExist', 'File not exist: ' .$aFullFileName_str);
		}
	}
	
	static private function _throwIfFileExist(string $aFullFileName_str)
	{
		if (self::i_isFileExist($aFullFileName_str))
		{
			new CException('_throwIfFileNotExist', 'File already exist: ' .$aFullFileName_str);
		}
	}
	//...FILES
	
	static private function _throwIfRetFailed($aRet_mixed)
	{
		if ($aRet_mixed === false)
		{
			new CException('_throwIfRetFailed', 'Ret value: ' .$aRet_mixed);
		}
	}
}


?>