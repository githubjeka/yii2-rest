<?php
$_SERVER['SCRIPT_FILENAME'] = YII_TEST_REST_ENTRY_FILE;
$_SERVER['SCRIPT_NAME'] = YII_REST_TEST_ENTRY_URL;

/**
 * Application configuration for rest functional tests
 */
return yii\helpers\ArrayHelper::merge(
    require(YII_APP_BASE_PATH . '/rest/config/main.php'),
    require(YII_APP_BASE_PATH . '/rest/config/main-local.php'),
    require(YII_APP_BASE_PATH . '/common/config/main.php'),
    require(YII_APP_BASE_PATH . '/common/config/main-local.php'),
    require(dirname(__DIR__) . '/config.php'),
    require(dirname(__DIR__) . '/functional.php'),
    require(__DIR__ . '/config.php'),
    [
    ]
);
