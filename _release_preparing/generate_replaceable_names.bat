::CMD[PARAMS]
::GENERATE_JS_REPLACEABLE_NAMES[IN_DIRECTORY, OUT_DIRECTORY, IN_FILE, OUT_FILE, AUX_IN_DIRECTORY, AUX_IN_FILE]
::GENERATE_CSS_REPLACEABLE_NAMES[IN_DIRECTORY, OUT_DIRECTORY, IN_FILE, OUT_FILE, AUX_IN_DIRECTORY, AUX_IN_FILE]
::GENERATE_PHP_REPLACEABLE_NAMES[IN_DIRECTORY, OUT_DIRECTORY, IN_FILE, OUT_FILE, AUX_IN_DIRECTORY, AUX_IN_FILE]

set compiler=..\_tools\Packer.exe
set release_path=..\www\release

::JS
start /B /WAIT %compiler% CMD:GENERATE_JS_REPLACEABLE_NAMES IN_DIRECTORY:%release_path% OUT_DIRECTORY:.\ IN_FILE: OUT_FILE:.\replaceable_names\js_replaceable_names.txt AUX_IN_DIRECTORY:.\ AUX_IN_FILE:.\patterns\js_patterns.xml

::CSS
start /B /WAIT %compiler% CMD:GENERATE_CSS_REPLACEABLE_NAMES IN_DIRECTORY:%release_path% OUT_DIRECTORY:.\ IN_FILE: OUT_FILE:.\replaceable_names\css_replaceable_names.txt AUX_IN_DIRECTORY:.\ AUX_IN_FILE:.\patterns\css_patterns.xml

::PHP
start /B /WAIT %compiler% CMD:GENERATE_PHP_REPLACEABLE_NAMES IN_DIRECTORY:%release_path% OUT_DIRECTORY:.\ IN_FILE: OUT_FILE:.\replaceable_names\php_replaceable_names.txt AUX_IN_DIRECTORY:.\ AUX_IN_FILE:.\patterns\php_patterns.xml

pause