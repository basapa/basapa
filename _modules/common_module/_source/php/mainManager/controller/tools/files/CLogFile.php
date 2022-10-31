<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CLogFile
{
	private const _DEBUG_LOG_FULL_FILE_NAME				= 'logs/debug_log.txt';
	private const _RELEASE_LOG_FULL_FILE_NAME_PATTERN	= 'logs/#FILE_NAME#.txt';


	/***************************************************
	 * INTERFACE
	 */

	static public function i_writeContentInLogFile(string $a_str):void
	{
		$l_str = CDateTimeTools::i_getFormattedDateTime('[YYYY/MM/DD - hh:mm:ss]');
		$l_str .= "\t" .$a_str. "\r\n";

		self::_writeContentInLogFile($l_str);
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	static private function _writeContentInLogFile(string $a_str):void
	{
		if (SOURCES_EXECUTION_MODE === SOURCES_EXECUTION_MODE_DEBUG)
		{
			$lFullFileName_str = self::_DEBUG_LOG_FULL_FILE_NAME;
		}
		else
		{
			$lFullFileName_str = CStringTools::i_replace(self::_RELEASE_LOG_FULL_FILE_NAME_PATTERN, CMainManager::i_getInstance()->i_getMainData()->i_getHostData()->i_getServerParamRemoteAddr(), '#FILE_NAME#');
		}

		CFileTools::i_writeContentInFile($lFullFileName_str, $a_str);
	}
}


?>