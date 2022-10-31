rmdir ..\..\www\release\custom\main

del ..\..\www\_source\php\main_import.php

::RESOURCES
rmdir ..\..\www\resources\internals\htmls\custom\main
rmdir ..\..\www\resources\internals\images\custom\main
rmdir ..\..\www\resources\internals\translations\custom\main
rmdir ..\..\www\resources\internals\fonts\custom\main
rmdir ..\..\www\resources\externals\htmls\custom\main
rmdir ..\..\www\resources\externals\images\custom\main

::SITEMAPS
rmdir ..\..\www\sitemaps\custom\main

::CSS
rmdir ..\..\www\_source\css\custom\main

::JS
rmdir ..\..\www\_source\js\custom\main

::PHP AJAX
rmdir ..\..\www\_source\php\ajaxManager\controller\custom\main
rmdir ..\..\www\_source\php\ajaxManager\model\custom\main

::PHP CACHE
rmdir ..\..\www\_source\php\cacheManager\controller\custom\main
rmdir ..\..\www\_source\php\cacheManager\model\custom\main

::PHP DATABASE
rmdir ..\..\www\_source\php\databaseManager\controller\custom\main
rmdir ..\..\www\_source\php\databaseManager\controller\mysql\custom\main
rmdir ..\..\www\_source\php\databaseManager\model\custom\main

::PHP FILE
rmdir ..\..\www\_source\php\fileManager\controller\custom\main
rmdir ..\..\www\_source\php\fileManager\controller\xml\custom\main
rmdir ..\..\www\_source\php\fileManager\model\custom\main

::PHP MAIN
rmdir ..\..\www\_source\php\mainManager\controller\exceptions\custom\main
rmdir ..\..\www\_source\php\mainManager\controller\requests\custom\main
rmdir ..\..\www\_source\php\mainManager\controller\responses\custom\main
rmdir ..\..\www\_source\php\mainManager\model\custom\main

::PHP SCHEDULE
rmdir ..\..\www\_source\php\scheduleManager\controller\custom\main
rmdir ..\..\www\_source\php\scheduleManager\model\custom\main

::PHP VIEW
rmdir ..\..\www\_source\php\viewManager\controller\custom\main
rmdir ..\..\www\_source\php\viewManager\model\custom\main
rmdir ..\..\www\_source\php\viewManager\view\body\sections\custom\main
rmdir ..\..\www\_source\php\viewManager\view\body\sections\pages\custom\main
rmdir ..\..\www\_source\php\viewManager\view\head\favicons\custom\main
rmdir ..\..\www\_source\php\viewManager\view\head\javascripts\custom\main
rmdir ..\..\www\_source\php\viewManager\view\head\metas\custom\main
rmdir ..\..\www\_source\php\viewManager\view\head\styles\custom\main
rmdir ..\..\www\_source\php\viewManager\view\head\titles\custom\main
rmdir ..\..\www\_source\php\viewManager\view\components\custom\main
rmdir ..\..\www\_source\php\viewManager\view\modules\forms\custom\main
rmdir ..\..\www\_source\php\viewManager\view\modules\infos\custom\main
rmdir ..\..\www\_source\php\viewManager\view\modules\dialogs\custom\main

if "%1" == "" pause