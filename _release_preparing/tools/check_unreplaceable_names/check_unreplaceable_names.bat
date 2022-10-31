::CMD[PARAMS]
::GENERATE_PHP_UNREPLACEABLE_NAMES[IN_DIRECTORY, OUT_DIRECTORY, OUT_FILE, AUX_IN_DIRECTORY, AUX_IN_FILE]

set compiler=..\..\..\_tools\Packer.exe
set release_path=..\..\..\www\release

::PHP CSS JS
start /B /WAIT %compiler% CMD:GENERATE_PHP_UNREPLACEABLE_NAMES IN_DIRECTORY:%release_path% OUT_DIRECTORY:.\ OUT_FILE:.\php_unreplaceable_names.txt AUX_IN_DIRECTORY:.\ AUX_IN_FILE:.\patterns.xml

pause