rmdir ..\..\www\release\custom\job

del ..\..\www\_source\php\job_import.php

::RESOURCES
rmdir ..\..\www\resources\internals\htmls\custom\job
rmdir ..\..\www\resources\internals\images\custom\job
rmdir ..\..\www\resources\internals\translations\custom\job
rmdir ..\..\www\resources\internals\fonts\custom\job
rmdir ..\..\www\resources\externals\htmls\custom\job
rmdir ..\..\www\resources\externals\images\custom\job

::SITEMAPS
rmdir ..\..\www\sitemaps\custom\job

::CSS
rmdir ..\..\www\_source\css\custom\job

::JS
rmdir ..\..\www\_source\js\custom\job

::JS FILE
rmdir ..\..\www\_source\js\fileManager\controller\custom\job
rmdir ..\..\www\_source\js\fileManager\model\custom\job

::JS MAIN
rmdir ..\..\www\_source\js\mainManager\model\custom\job

::JS VIEW
rmdir ..\..\www\_source\js\viewManager\controller\custom\job
rmdir ..\..\www\_source\js\viewManager\model\custom\job

::PHP
rmdir ..\..\www\_source\php\__custom\job

::PHP AJAX
rmdir ..\..\www\_source\php\ajaxManager\controller\custom\job
rmdir ..\..\www\_source\php\ajaxManager\model\custom\job

::PHP DATABASE
rmdir ..\..\www\_source\php\databaseManager\controller\custom\job
rmdir ..\..\www\_source\php\databaseManager\controller\mysql\custom\job
rmdir ..\..\www\_source\php\databaseManager\model\custom\job

::PHP FILE
rmdir ..\..\www\_source\php\fileManager\controller\custom\job
rmdir ..\..\www\_source\php\fileManager\controller\json\custom\job
rmdir ..\..\www\_source\php\fileManager\controller\xml\custom\job
rmdir ..\..\www\_source\php\fileManager\model\custom\job

::PHP HTACCESS
rmdir ..\..\www\_source\php\htaccessManager\controller\custom\job
rmdir ..\..\www\_source\php\htaccessManager\model\custom\job

::PHP MAIN
rmdir ..\..\www\_source\php\mainManager\controller\exceptions\custom\job
rmdir ..\..\www\_source\php\mainManager\controller\requests\custom\job
rmdir ..\..\www\_source\php\mainManager\controller\responses\custom\job
rmdir ..\..\www\_source\php\mainManager\model\custom\job

::PHP SCHEDULE
rmdir ..\..\www\_source\php\scheduleManager\controller\custom\job
rmdir ..\..\www\_source\php\scheduleManager\model\custom\job

::PHP VIEW
rmdir ..\..\www\_source\php\viewManager\controller\custom\job
rmdir ..\..\www\_source\php\viewManager\model\custom\job
rmdir ..\..\www\_source\php\viewManager\view\body\sections\custom\job
rmdir ..\..\www\_source\php\viewManager\view\body\sections\pages\custom\job
rmdir ..\..\www\_source\php\viewManager\view\head\favicons\custom\job
rmdir ..\..\www\_source\php\viewManager\view\head\javascripts\custom\job
rmdir ..\..\www\_source\php\viewManager\view\head\metas\custom\job
rmdir ..\..\www\_source\php\viewManager\view\head\styles\custom\job
rmdir ..\..\www\_source\php\viewManager\view\head\titles\custom\job
rmdir ..\..\www\_source\php\viewManager\view\components\custom\job
rmdir ..\..\www\_source\php\viewManager\view\modules\forms\custom\job
rmdir ..\..\www\_source\php\viewManager\view\modules\infos\custom\job
rmdir ..\..\www\_source\php\viewManager\view\modules\dialogs\custom\job

if "%1" == "" pause