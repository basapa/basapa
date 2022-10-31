<?php
declare(strict_types=1);

namespace basapa_ns;


final class __CEntry
{
	

	static public function i_run():void
	{
		self::feh2();

		gru2::gkz2()->i_run();
	}

	static public function eqz2(string $gwc2):void
	{
		switch ($gwc2)
		{
			

			case hag2::gla2:
			{
				self::gds2();
			}break;

			default:
				new haf2('eqz2', 'Unsupported site id: ' .$gwc2);
			break;
		}
	}

	

	static private function feh2():void
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
	
	

	static private function gds2():void
	{
		if (SOURCES_ASSEMBLY_TYPE === SOURCES_ASSEMBLY_TYPE_RELEASE)
		{
			require_once(ROOT_PHP_DIRECTORY. './custom/JOB/JOB_release.php');
		}
		else
		{
			require_once(ROOT_PHP_DIRECTORY. './JOB_import.php');
		}
	}
}


?>