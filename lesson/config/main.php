<?php
return [
    'id' => 'app-lesson',

    'language'=>'ru-RU',
    'name'=>'rest.local',
    'timeZone' => 'Europe/Minsk',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'lesson\controllers',
    'defaultRoute' => 'site',
    'components' => [
        'request' => [
            'baseUrl' => '',
            'csrfParam' => '_csrf-study-lesson',
        ],
        'user' => [
            'identityClass' => 'lesson\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => 'login',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                'lessons' => 'site/lessons',
                'lesson/<id:\d+>' => 'site/lesson',
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
];