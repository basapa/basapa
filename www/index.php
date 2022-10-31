<?php
/**
 * Basapa Website Framework
 * PHP Version 7.3.4
 *
 * @see https://github.com/basapa/basapa/ Basapa GitHub project
 *
 * @author    Andrei Biriukov <studio2018@gmail.com>
 * @copyright 2022 Andrei Biriukov
 * @license   http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */
declare(strict_types=1);

namespace basapa_ns;


//CONSTS...
//server types...
define('SERVER_TYPE_LOCAL',				0);
define('SERVER_TYPE_REMOTE',			1);
//...server types

//database types...
define('DATABASE_TYPE_MYSQL',			0);
//...database types

//payment modes...
define('PAYMENT_MODE_TEST',				0);
define('PAYMENT_MODE_REAL',				1);
//...payment modes

//cache types...
define('CACHE_TYPE_NO_CACHE',			0);
define('CACHE_TYPE_MEMCACHE',			1);
//...cache types

//sources assembly types...
define('SOURCES_ASSEMBLY_TYPE_DEBUG',	0);
define('SOURCES_ASSEMBLY_TYPE_RELEASE',	1);
//...sources assembly types

//sources execution modes...
define('SOURCES_EXECUTION_MODE_DEBUG',	0);
define('SOURCES_EXECUTION_MODE_RELEASE',1);
//...sources execution modes

define('PROJECT_NAME',					'basapa');

define('_USE_RELEASE_CONFIG',			false);
//...CONSTS


//CONFIGS...
if (_USE_RELEASE_CONFIG)
{
	//RELEASE (!!!DO NOT MODIFY)...
	define('SOURCES_EXECUTION_MODE',	SOURCES_EXECUTION_MODE_RELEASE);
	define('SOURCES_ASSEMBLY_TYPE',		SOURCES_ASSEMBLY_TYPE_RELEASE);
	define('SERVER_TYPE',				SERVER_TYPE_REMOTE);
	define('DATABASE_TYPE',				DATABASE_TYPE_MYSQL);
	define('CACHE_TYPE',				CACHE_TYPE_MEMCACHE);
	define('PAYMENT_MODE',				PAYMENT_MODE_REAL);
	//...RELEASE (!!!DO NOT MODIFY)
}
else
{
	//DEBUG...
	define('SOURCES_EXECUTION_MODE',	SOURCES_EXECUTION_MODE_DEBUG);
	define('SOURCES_ASSEMBLY_TYPE',		SOURCES_ASSEMBLY_TYPE_DEBUG);
	define('SERVER_TYPE',				SERVER_TYPE_LOCAL);
	define('DATABASE_TYPE',				DATABASE_TYPE_MYSQL);
	define('CACHE_TYPE',				CACHE_TYPE_MEMCACHE);
	define('PAYMENT_MODE',				PAYMENT_MODE_TEST);
	//...DEBUG
}

//define('SITE_NAME',						SERVER_TYPE === SERVER_TYPE_REMOTE ? 'basapa.ru' : 'basapa.loc');
define('SITE_NAME',						SERVER_TYPE === SERVER_TYPE_REMOTE ? 'basapa.ru' : '127.0.0.4');
define('SITE_FULL_NAME',				'http://' .SITE_NAME. '/');
//...CONFIGS


if (SOURCES_ASSEMBLY_TYPE == SOURCES_ASSEMBLY_TYPE_RELEASE)
{
	define('RELEASE_COMMON_VERSION',	'2022_10_31');
	define('RELEASE_MAIN_VERSION',		'2022_10_31');
	define('RELEASE_JOB_VERSION',		'2022_10_31');
}


//PHP SOURCE DIRECTORY SETTINGS...
define('ROOT_PHP_DIRECTORY',			SOURCES_ASSEMBLY_TYPE === SOURCES_ASSEMBLY_TYPE_RELEASE ? 'release/' : '_source/php/');
define('ROOT_EXTERNAL_PHP_DIRECTORY',	'_external_source/php/');
//...PHP SOURCE DIRECTORY SETTINGS


//PHP SETTINGS...
error_reporting(SOURCES_EXECUTION_MODE === SOURCES_EXECUTION_MODE_DEBUG ? E_ALL : 0);

ini_set('display_startup_errors',		SOURCES_EXECUTION_MODE === SOURCES_EXECUTION_MODE_DEBUG ? '1' : '0');
ini_set('display_errors',				SOURCES_EXECUTION_MODE === SOURCES_EXECUTION_MODE_DEBUG ? '1' : '0');
ini_set('track_errors',					SOURCES_EXECUTION_MODE === SOURCES_EXECUTION_MODE_DEBUG ? '1' : '0');
//...PHP SETTINGS


require_once(ROOT_PHP_DIRECTORY. './__CEntry.php');


use basapa_ns;


__CEntry::i_run();


?>