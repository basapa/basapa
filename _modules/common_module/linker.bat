mklink /j ..\..\www\release .\release

::RESOURCES
mklink /j ..\..\www\resources .\resources

::SITEMAPS
mklink /j ..\..\www\sitemaps .\sitemaps

::SOURCE
mklink /j ..\..\www\_external_source .\_external_source
mklink /j ..\..\www\_source .\_source

if "%1" == "" pause