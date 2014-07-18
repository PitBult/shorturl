<?php
//defined('YII_DEBUG') or define('YII_DEBUG',true);
// change the following paths if necessary
$yii=dirname(__FILE__).'/../../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
//define('YII_ENABLE_ERROR_HANDLER',false);
//define('YII_ENABLE_EXCEPTION_HANDLER',false);

require_once($yii);
Yii::createWebApplication($config)->run();
