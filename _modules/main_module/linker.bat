mklink /j ..\..\www\release\custom\main .\release\custom\main

mklink /h ..\..\www\_source\php\main_import.php .\_source\php\main_import.php

::RESOURCES
mklink /j ..\..\www\resources\internals\htmls\custom\main .\resources\internals\htmls\custom\main
mklink /j ..\..\www\resources\internals\images\custom\main .\resources\internals\images\custom\main
mklink /j ..\..\www\resources\internals\translations\custom\main .\resources\internals\translations\custom\main
mklink /j ..\..\www\resources\internals\fonts\custom\main .\resources\internals\fonts\custom\main
mklink /j ..\..\www\resources\externals\htmls\custom\main .\resources\externals\htmls\custom\main
mklink /j ..\..\www\resources\externals\images\custom\main .\resources\externals\images\custom\main

::SITEMAPS
mklink /j ..\..\www\sitemaps\custom\main .\sitemaps\custom\main

::CSS
mklink /j ..\..\www\_source\css\custom\main .\_source\css\custom\main

::JS
mklink /j ..\..\www\_source\js\custom\main .\_source\js\custom\main

::PHP AJAX
mklink /j ..\..\www\_source\php\ajaxManager\controller\custom\main .\_source\php\ajaxManager\controller\custom\main
mklink /j ..\..\www\_source\php\ajaxManager\model\custom\main .\_source\php\ajaxManager\model\custom\main

::PHP CACHE
mklink /j ..\..\www\_source\php\cacheManager\controller\custom\main .\_source\php\cacheManager\controller\custom\main
mklink /j ..\..\www\_source\php\cacheManager\model\custom\main .\_source\php\cacheManager\model\custom\main

::PHP DATABASE
mklink /j ..\..\www\_source\php\databaseManager\controller\custom\main .\_source\php\databaseManager\controller\custom\main
mklink /j ..\..\www\_source\php\databaseManager\controller\mysql\custom\main .\_source\php\databaseManager\controller\mysql\custom\main
mklink /j ..\..\www\_source\php\databaseManager\model\custom\main .\_source\php\databaseManager\model\custom\main

::PHP FILE
mklink /j ..\..\www\_source\php\fileManager\controller\custom\main .\_source\php\fileManager\controller\custom\main
mklink /j ..\..\www\_source\php\fileManager\controller\xml\custom\main .\_source\php\fileManager\controller\xml\custom\main
mklink /j ..\..\www\_source\php\fileManager\controller\json\custom\main .\_source\php\fileManager\controller\json\custom\main
mklink /j ..\..\www\_source\php\fileManager\model\custom\main .\_source\php\fileManager\model\custom\main

::PHP MAIN
mklink /j ..\..\www\_source\php\mainManager\controller\exceptions\custom\main .\_source\php\mainManager\controller\exceptions\custom\main
mklink /j ..\..\www\_source\php\mainManager\controller\requests\custom\main .\_source\php\mainManager\controller\requests\custom\main
mklink /j ..\..\www\_source\php\mainManager\controller\responses\custom\main .\_source\php\mainManager\controller\responses\custom\main
mklink /j ..\..\www\_source\php\mainManager\model\custom\main .\_source\php\mainManager\model\custom\main

::PHP SCHEDULE
mklink /j ..\..\www\_source\php\scheduleManager\controller\custom\main .\_source\php\scheduleManager\controller\custom\main
mklink /j ..\..\www\_source\php\scheduleManager\model\custom\main .\_source\php\scheduleManager\model\custom\main

::PHP VIEW
mklink /j ..\..\www\_source\php\viewManager\controller\custom\main .\_source\php\viewManager\controller\custom\main
mklink /j ..\..\www\_source\php\viewManager\model\custom\main .\_source\php\viewManager\model\custom\main
mklink /j ..\..\www\_source\php\viewManager\view\body\sections\custom\main .\_source\php\viewManager\view\body\sections\custom\main
mklink /j ..\..\www\_source\php\viewManager\view\body\sections\pages\custom\main .\_source\php\viewManager\view\body\sections\pages\custom\main
mklink /j ..\..\www\_source\php\viewManager\view\head\favicons\custom\main .\_source\php\viewManager\view\head\favicons\custom\main
mklink /j ..\..\www\_source\php\viewManager\view\head\javascripts\custom\main .\_source\php\viewManager\view\head\javascripts\custom\main
mklink /j ..\..\www\_source\php\viewManager\view\head\metas\custom\main .\_source\php\viewManager\view\head\metas\custom\main
mklink /j ..\..\www\_source\php\viewManager\view\head\styles\custom\main .\_source\php\viewManager\view\head\styles\custom\main
mklink /j ..\..\www\_source\php\viewManager\view\head\titles\custom\main .\_source\php\viewManager\view\head\titles\custom\main
mklink /j ..\..\www\_source\php\viewManager\view\components\custom\main .\_source\php\viewManager\view\components\custom\main
mklink /j ..\..\www\_source\php\viewManager\view\modules\forms\custom\main .\_source\php\viewManager\view\modules\forms\custom\main
mklink /j ..\..\www\_source\php\viewManager\view\modules\infos\custom\main .\_source\php\viewManager\view\modules\infos\custom\main
mklink /j ..\..\www\_source\php\viewManager\view\modules\dialogs\custom\main .\_source\php\viewManager\view\modules\dialogs\custom\main

if "%1" == "" pause