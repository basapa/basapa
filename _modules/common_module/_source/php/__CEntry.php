<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:1000
*/
namespace basapa_ns;


final class __CEntry
{
	/***************************************************
	 * INTERFACE
	 */

	static public function i_run():void
	{
		self::_importCommonFiles();

		CMainManager::i_getInstance()->i_run();
	}

	static public function i_importCustomFiles(string $aSiteId_str):void
	{
		switch ($aSiteId_str)
		{
			/*case CSiteConst::i_SITE_ID_MAIN:
			{
				self::_importMainFiles();
			}break;*/

			case CSiteConst::i_SITE_ID_JOB:
			{
				self::_importJOBFiles();
			}break;

			default:
				new CException('i_importCustomFiles', 'Unsupported site id: ' .$aSiteId_str);
			break;
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	static private function _importCommonFiles():void
	{
		if (SOURCES_ASSEMBLY_TYPE === SOURCES_ASSEMBLY_TYPE_RELEASE)
		{
			require_once(ROOT_PHP_DIRECTORY. './common/common_release.php');
		}
		else
		{
			require_once(ROOT_PHP_DIRECTORY. './common_import.php');
		}
	}
	
	/*static private function _importMainFiles():void
	{
		if (SOURCES_ASSEMBLY_TYPE === SOURCES_ASSEMBLY_TYPE_RELEASE)
		{
			require_once(ROOT_PHP_DIRECTORY. './custom/main/main_release.php');
		}
		else
		{
			require_once(ROOT_PHP_DIRECTORY. './main_import.php');
		}
	}*/

	static private function _importJOBFiles():void
	{
		if (SOURCES_ASSEMBLY_TYPE === SOURCES_ASSEMBLY_TYPE_RELEASE)
		{
			require_once(ROOT_PHP_DIRECTORY. './custom/job/job_release.php');
		}
		else
		{
			require_once(ROOT_PHP_DIRECTORY. './job_import.php');
		}
	}
}


?>