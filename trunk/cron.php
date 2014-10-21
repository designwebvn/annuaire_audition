<?php
if(function_exists("date_default_timezone_set") and
    function_exists("date_default_timezone_get"))
    @date_default_timezone_set(@date_default_timezone_get());

// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/affiliate_cron.php';

defined('YII_DEBUG') or define('YII_DEBUG',true);
defined('IS_CRON') or define('IS_CRON',true);

// including Yii
require_once($yii);

// creating and running console application
Yii::createConsoleApplication($config)->run();