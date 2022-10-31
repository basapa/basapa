::CMD[PARAMS]
::GENERATE_JS_RELEASE_CODE[IN_DIRECTORY, OUT_DIRECTORY, IN_FILE, OUT_FILE, AUX_IN_DIRECTORY]
::GENERATE_CSS_RELEASE_CODE[IN_DIRECTORY, OUT_DIRECTORY, IN_FILE, OUT_FILE, AUX_IN_DIRECTORY]
::GENERATE_PHP_RELEASE_CODE[IN_DIRECTORY, OUT_DIRECTORY, IN_FILE, OUT_FILE, AUX_IN_DIRECTORY]

set compiler=..\_tools\Packer.exe
set source_path=..\_modules\job_module\_source
set release_path=..\_modules\job_module\release\custom\job

::JS
set js_source_path=%source_path%\..\

start /B /WAIT %compiler% CMD:GENERATE_JS_RELEASE_CODE IN_DIRECTORY:%js_source_path% OUT_DIRECTORY:%release_path% IN_FILE:.\_source\js\custom\job\job_import.js OUT_FILE:.\job_release.js AUX_IN_DIRECTORY:

::CSS
set css_source_path=%source_path%\css\custom\job

start /B /WAIT %compiler% CMD:GENERATE_CSS_RELEASE_CODE IN_DIRECTORY:%css_source_path% OUT_DIRECTORY:%release_path% IN_FILE:.\job_import.css OUT_FILE:.\job_release.css AUX_IN_DIRECTORY:%css_source_path%

::PHP
set php_source_path=%source_path%\php

start /B /WAIT %compiler% CMD:GENERATE_PHP_RELEASE_CODE IN_DIRECTORY:%php_source_path% OUT_DIRECTORY:%release_path% IN_FILE:.\job_import.php OUT_FILE:.\job_release.php AUX_IN_DIRECTORY:%php_source_path%

if "%1"=="" pause