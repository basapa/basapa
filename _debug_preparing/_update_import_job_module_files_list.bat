::CMD[PARAMS]
::CREATE_JS_CLASSES_IMPORT_FILE[OUT_DIRECTORY, OUT_FILE, SOURCE_DIRECTORY, AUX_SOURCE_DIRECTORY]
::CREATE_CSS_CLASSES_IMPORT_FILE[OUT_DIRECTORY, OUT_FILE, SOURCE_DIRECTORY, AUX_SOURCE_DIRECTORY]
::CREATE_PHP_CLASSES_IMPORT_FILE[OUT_DIRECTORY, OUT_FILE, SOURCE_DIRECTORY, AUX_SOURCE_DIRECTORY]

set compiler=..\_tools\Importer.exe
set source_path=..\_modules\job_module\_source
set file_name=job_import

::JS
set js_source_path=%source_path%\js\custom\job

del %js_source_path%\%file_name%.js
start /B %compiler% CMD:CREATE_JS_CLASSES_IMPORT_FILE OUT_DIRECTORY:%js_source_path% OUT_FILE:.\%file_name%.js SOURCE_DIRECTORY:%js_source_path% AUX_SOURCE_DIRECTORY:\_source\js\custom\job

::CSS
set css_source_path=%source_path%\css\custom\job

del %css_source_path%\%file_name%.css
start /B %compiler% CMD:CREATE_CSS_CLASSES_IMPORT_FILE OUT_DIRECTORY:%css_source_path% OUT_FILE:.\%file_name%.css SOURCE_DIRECTORY:%css_source_path% AUX_SOURCE_DIRECTORY:.

::PHP
set php_source_path=%source_path%\php

del %php_source_path%\%file_name%.php
start /B %compiler% CMD:CREATE_PHP_CLASSES_IMPORT_FILE OUT_DIRECTORY:%php_source_path% OUT_FILE:.\%file_name%.php SOURCE_DIRECTORY:%php_source_path% AUX_SOURCE_DIRECTORY:.

if "%1"=="" pause