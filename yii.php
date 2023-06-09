#!/usr/bin/env php
<?php
/**
 * Yii console bootstrap file.
 */

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/config/bootstrap.php';

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/config/main.php',
    require __DIR__ . '/config/main-local.php',
    require __DIR__ . '/console/config/main.php',
);

$application = new yii\console\Application($config);
$exitCode = $application->run();
exit($exitCode);
