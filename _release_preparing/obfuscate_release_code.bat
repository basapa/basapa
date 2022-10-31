::CMD[PARAMS]
::OBFUSCATE_JS_RELEASE_CODE[IN_DIRECTORY, OUT_DIRECTORY, IN_FILE, OUT_FILE, AUX_IN_DIRECTORY, AUX_IN_FILE, OBFUSCATE_SUFFIX, LOG_OUT_FILE]
::OBFUSCATE_CSS_RELEASE_CODE[IN_DIRECTORY, OUT_DIRECTORY, IN_FILE, OUT_FILE, AUX_IN_DIRECTORY, AUX_IN_FILE, OBFUSCATE_SUFFIX, LOG_OUT_FILE]
::OBFUSCATE_PHP_RELEASE_CODE[IN_DIRECTORY, OUT_DIRECTORY, IN_FILE, OUT_FILE, AUX_IN_DIRECTORY, AUX_IN_FILE, OBFUSCATE_SUFFIX, LOG_OUT_FILE]

set compiler=..\_tools\Packer.exe
set common_release_path=..\www\release\common
::set main_release_path=..\www\release\custom\main
set job_release_path=..\www\release\custom\job
set common_release_file_name=common_release
::set main_release_file_name=main_release
set job_release_file_name=job_release
set entry_class=__CEntry.php

set obfuscate_level=1

::JS
start /B /WAIT %compiler% CMD:OBFUSCATE_JS_RELEASE_CODE IN_DIRECTORY:%common_release_path% OUT_DIRECTORY:%common_release_path% IN_FILE:.\%common_release_file_name%.js OUT_FILE:.\%common_release_file_name%.js AUX_IN_DIRECTORY:.\ AUX_IN_FILE:.\replaceable_names\js_replaceable_names.txt OBFUSCATE_SUFFIX:0 OBFUSCATE_LEVEL:%obfuscate_level% LOG_OUT_FILE:.\logs\common_js_log.txt
::start /B %compiler% CMD:OBFUSCATE_JS_RELEASE_CODE IN_DIRECTORY:%main_release_path% OUT_DIRECTORY:%main_release_path% IN_FILE:.\%main_release_file_name%.js OUT_FILE:.\%main_release_file_name%.js AUX_IN_DIRECTORY:.\ AUX_IN_FILE:.\replaceable_names\js_replaceable_names.txt OBFUSCATE_SUFFIX:0 OBFUSCATE_LEVEL:%obfuscate_level% LOG_OUT_FILE:.\logs\js_log.txt
start /B /WAIT %compiler% CMD:OBFUSCATE_JS_RELEASE_CODE IN_DIRECTORY:%job_release_path% OUT_DIRECTORY:%job_release_path% IN_FILE:.\%job_release_file_name%.js OUT_FILE:.\%job_release_file_name%.js AUX_IN_DIRECTORY:.\ AUX_IN_FILE:.\replaceable_names\js_replaceable_names.txt OBFUSCATE_SUFFIX:0 OBFUSCATE_LEVEL:%obfuscate_level% LOG_OUT_FILE:.\logs\job_js_log.txt

::CSS
start /B /WAIT %compiler% CMD:OBFUSCATE_CSS_RELEASE_CODE IN_DIRECTORY:%common_release_path% OUT_DIRECTORY:%common_release_path% IN_FILE:.\%common_release_file_name%.css OUT_FILE:.\%common_release_file_name%.css AUX_IN_DIRECTORY:.\ AUX_IN_FILE:.\replaceable_names\css_replaceable_names.txt OBFUSCATE_SUFFIX:1 OBFUSCATE_LEVEL:%obfuscate_level% LOG_OUT_FILE:.\logs\common_css_log.txt
::start /B %compiler% CMD:OBFUSCATE_CSS_RELEASE_CODE IN_DIRECTORY:%main_release_path% OUT_DIRECTORY:%main_release_path% IN_FILE:.\%main_release_file_name%.css OUT_FILE:.\%main_release_file_name%.css AUX_IN_DIRECTORY:.\ AUX_IN_FILE:.\replaceable_names\css_replaceable_names.txt OBFUSCATE_SUFFIX:1 OBFUSCATE_LEVEL:%obfuscate_level% LOG_OUT_FILE:.\logs\css_log.txt
start /B /WAIT %compiler% CMD:OBFUSCATE_CSS_RELEASE_CODE IN_DIRECTORY:%job_release_path% OUT_DIRECTORY:%job_release_path% IN_FILE:.\%job_release_file_name%.css OUT_FILE:.\%job_release_file_name%.css AUX_IN_DIRECTORY:.\ AUX_IN_FILE:.\replaceable_names\css_replaceable_names.txt OBFUSCATE_SUFFIX:1 OBFUSCATE_LEVEL:%obfuscate_level% LOG_OUT_FILE:.\logs\job_css_log.txt

::PHP
start /B /WAIT %compiler% CMD:OBFUSCATE_PHP_RELEASE_CODE IN_DIRECTORY:%common_release_path% OUT_DIRECTORY:%common_release_path% IN_FILE:.\%common_release_file_name%.php OUT_FILE:.\%common_release_file_name%.php AUX_IN_DIRECTORY:.\ AUX_IN_FILE:.\replaceable_names\js_replaceable_names.txt OBFUSCATE_SUFFIX:0 OBFUSCATE_LEVEL:%obfuscate_level% LOG_OUT_FILE:.\logs\common_php_js_log.txt
::start /B %compiler% CMD:OBFUSCATE_PHP_RELEASE_CODE IN_DIRECTORY:%main_release_path% OUT_DIRECTORY:%main_release_path% IN_FILE:.\%main_release_file_name%.php OUT_FILE:.\%main_release_file_name%.php AUX_IN_DIRECTORY:.\ AUX_IN_FILE:.\replaceable_names\js_replaceable_names.txt OBFUSCATE_SUFFIX:0 OBFUSCATE_LEVEL:%obfuscate_level% LOG_OUT_FILE:.\logs\php_js_log.txt
start /B /WAIT %compiler% CMD:OBFUSCATE_PHP_RELEASE_CODE IN_DIRECTORY:%job_release_path% OUT_DIRECTORY:%job_release_path% IN_FILE:.\%job_release_file_name%.php OUT_FILE:.\%job_release_file_name%.php AUX_IN_DIRECTORY:.\ AUX_IN_FILE:.\replaceable_names\js_replaceable_names.txt OBFUSCATE_SUFFIX:0 OBFUSCATE_LEVEL:%obfuscate_level% LOG_OUT_FILE:.\logs\job_php_js_log.txt

start /B /WAIT %compiler% CMD:OBFUSCATE_PHP_RELEASE_CODE IN_DIRECTORY:%common_release_path% OUT_DIRECTORY:%common_release_path% IN_FILE:.\%common_release_file_name%.php OUT_FILE:.\%common_release_file_name%.php AUX_IN_DIRECTORY:.\ AUX_IN_FILE:.\replaceable_names\css_replaceable_names.txt OBFUSCATE_SUFFIX:1 OBFUSCATE_LEVEL:%obfuscate_level% LOG_OUT_FILE:.\logs\common_php_css_log.txt
::start /B %compiler% CMD:OBFUSCATE_PHP_RELEASE_CODE IN_DIRECTORY:%main_release_path% OUT_DIRECTORY:%main_release_path% IN_FILE:.\%main_release_file_name%.php OUT_FILE:.\%main_release_file_name%.php AUX_IN_DIRECTORY:.\ AUX_IN_FILE:.\replaceable_names\css_replaceable_names.txt OBFUSCATE_SUFFIX:1 OBFUSCATE_LEVEL:%obfuscate_level% LOG_OUT_FILE:.\logs\php_css_log.txt
start /B /WAIT %compiler% CMD:OBFUSCATE_PHP_RELEASE_CODE IN_DIRECTORY:%job_release_path% OUT_DIRECTORY:%job_release_path% IN_FILE:.\%job_release_file_name%.php OUT_FILE:.\%job_release_file_name%.php AUX_IN_DIRECTORY:.\ AUX_IN_FILE:.\replaceable_names\css_replaceable_names.txt OBFUSCATE_SUFFIX:1 OBFUSCATE_LEVEL:%obfuscate_level% LOG_OUT_FILE:.\logs\job_php_css_log.txt

start /B /WAIT %compiler% CMD:OBFUSCATE_PHP_RELEASE_CODE IN_DIRECTORY:..\www\release OUT_DIRECTORY:..\www\release IN_FILE:.\%entry_class% OUT_FILE:.\%entry_class% AUX_IN_DIRECTORY:.\ AUX_IN_FILE:.\replaceable_names\php_replaceable_names.txt OBFUSCATE_SUFFIX:2 OBFUSCATE_LEVEL:%obfuscate_level% LOG_OUT_FILE:.\logs\entry_php_log.txt

start /B /WAIT %compiler% CMD:OBFUSCATE_PHP_RELEASE_CODE IN_DIRECTORY:%common_release_path% OUT_DIRECTORY:%common_release_path% IN_FILE:.\%common_release_file_name%.php OUT_FILE:.\%common_release_file_name%.php AUX_IN_DIRECTORY:.\ AUX_IN_FILE:.\replaceable_names\php_replaceable_names.txt OBFUSCATE_SUFFIX:2 OBFUSCATE_LEVEL:%obfuscate_level% LOG_OUT_FILE:.\logs\common_php_log.txt
::start /B %compiler% CMD:OBFUSCATE_PHP_RELEASE_CODE IN_DIRECTORY:%main_release_path% OUT_DIRECTORY:%main_release_path% IN_FILE:.\%main_release_file_name%.php OUT_FILE:.\%main_release_file_name%.php AUX_IN_DIRECTORY:.\ AUX_IN_FILE:.\replaceable_names\php_replaceable_names.txt OBFUSCATE_SUFFIX:2 OBFUSCATE_LEVEL:%obfuscate_level% LOG_OUT_FILE:.\logs\php_log.txt
start /B /WAIT %compiler% CMD:OBFUSCATE_PHP_RELEASE_CODE IN_DIRECTORY:%job_release_path% OUT_DIRECTORY:%job_release_path% IN_FILE:.\%job_release_file_name%.php OUT_FILE:.\%job_release_file_name%.php AUX_IN_DIRECTORY:.\ AUX_IN_FILE:.\replaceable_names\php_replaceable_names.txt OBFUSCATE_SUFFIX:2 OBFUSCATE_LEVEL:%obfuscate_level% LOG_OUT_FILE:.\logs\job_php_log.txt

pause