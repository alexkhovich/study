<?php
return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    /*'bootstrap' => [
        'log',
    ],*/
    'timeZone' => 'Europe/Minsk',
    'controllerNamespace' => 'console\controllers',
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => [
                '@console/migrations'
            ],
        ],
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
];