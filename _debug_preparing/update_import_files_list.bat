::COMMON LINKER
call _update_import_common_module_files_list.bat "off_pause"

::MAIN LINKER
call _update_import_main_module_files_list.bat "off_pause"

::JOB LINKER
call _update_import_job_module_files_list.bat "off_pause"

pause