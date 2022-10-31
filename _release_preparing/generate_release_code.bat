::COMMON LINKER
call _generate_release_code_common_module.bat "off_pause"

::MAIN LINKER
::call _generate_release_code_main_module.bat "off_pause"

::JOB LINKER
call _generate_release_code_job_module.bat "off_pause"

::PHP
copy ..\www\_source\php\__CEntry.php ..\www\release\__CEntry.php

pause