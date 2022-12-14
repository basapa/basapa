::CMD[PARAMS]
::COPY_DIRECTORY[IN_DIRECTORY, OUT_DIRECTORY]
::RENAME_DIRECTORIES[IN_DIRECTORY_NAME_PATTERN, OUT_DIRECTORY, OUT_DIRECTORY_NAME_PATTERN]
::RENAME_FILES[OUT_DIRECTORY, IN_FILE_NAME_PATTERN, OUT_FILE_NAME_PATTERN]
::REPLACE_FILES_CONTENT[OUT_DIRECTORY, IN_FILE_CONTENT_PATTERN, OUT_FILE_CONTENT_PATTERN]

set compiler=..\_tools\Renamer.exe
set module_in_name=realty_module
set module_out_name=job_module

start /wait %compiler% CMD:COPY_DIRECTORY IN_DIRECTORY:%module_in_name% OUT_DIRECTORY:%module_out_name%

start /wait %compiler% CMD:RENAME_DIRECTORIES IN_DIRECTORY_NAME_PATTERN:(realty)$ IN_DIRECTORY:%module_out_name% OUT_DIRECTORY_NAME_PATTERN:job

start /wait %compiler% CMD:RENAME_FILES IN_FILE_NAME_PATTERN:(realty) IN_DIRECTORY:%module_out_name% OUT_FILE_NAME_PATTERN:job
start /wait %compiler% CMD:RENAME_FILES IN_FILE_NAME_PATTERN:_rlt_ IN_DIRECTORY:%module_out_name% OUT_FILE_NAME_PATTERN:_job_
start /wait %compiler% CMD:RENAME_FILES IN_FILE_NAME_PATTERN:CRLT IN_DIRECTORY:%module_out_name% OUT_FILE_NAME_PATTERN:CJOB
start /wait %compiler% CMD:RENAME_FILES IN_FILE_NAME_PATTERN:IRLT IN_DIRECTORY:%module_out_name% OUT_FILE_NAME_PATTERN:IJOB

start /wait %compiler% CMD:REPLACE_FILES_CONTENT IN_FILE_CONTENT_PATTERN:realty IN_DIRECTORY:%module_out_name% OUT_FILE_CONTENT_PATTERN:job
start /wait %compiler% CMD:REPLACE_FILES_CONTENT IN_FILE_CONTENT_PATTERN:Realty IN_DIRECTORY:%module_out_name% OUT_FILE_CONTENT_PATTERN:Job
start /wait %compiler% CMD:REPLACE_FILES_CONTENT IN_FILE_CONTENT_PATTERN:REALTY IN_DIRECTORY:%module_out_name% OUT_FILE_CONTENT_PATTERN:JOB
start /wait %compiler% CMD:REPLACE_FILES_CONTENT IN_FILE_CONTENT_PATTERN:CRLT IN_DIRECTORY:%module_out_name% OUT_FILE_CONTENT_PATTERN:CJOB
start /wait %compiler% CMD:REPLACE_FILES_CONTENT IN_FILE_CONTENT_PATTERN:IRLT IN_DIRECTORY:%module_out_name% OUT_FILE_CONTENT_PATTERN:IJOB

pause