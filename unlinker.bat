::MAIN UNLINKER
::cd .\_modules\main_module
::call unlinker.bat "off_pause"
::cd ..\..\

::JOB UNLINKER
cd .\_modules\job_module
call unlinker.bat "off_pause"
cd ..\..\

::COMMON UNLINKER
cd .\_modules\common_module
call unlinker.bat "off_pause"
cd ..\..\

pause