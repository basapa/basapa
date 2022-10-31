::COMMON LINKER
cd .\_modules\common_module
call linker.bat "off_pause"
cd ..\..\

::MAIN LINKER
::cd .\_modules\main_module
::call linker.bat "off_pause"
::cd ..\..\

::JOB LINKER
cd .\_modules\job_module
call linker.bat "off_pause"
cd ..\..\

pause