<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=lesson',
            'username' => 'lessonusr',
            'password' => '12345678',
            'charset' => 'utf8mb4',
            'tablePrefix' => 'tbl_',
        ],
    ],
];