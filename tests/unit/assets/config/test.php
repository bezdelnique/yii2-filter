<?php
return [
    'id' => 'app-app-tests',
    'basePath' => dirname(__DIR__),
    'language' => 'en',
    'sourceLanguage' => 'en',
    'bootstrap' => [
        'log',
    ],
    // 'controllerNamespace' => 'app\controllers',
    'components' => [
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=192.168.9.2;dbname=yii2_filter_test',
            'username' => 'yii2_filter_test',
            'password' => 'test12345',
            'charset' => 'utf8',
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 3600,
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
    ],
    'params' => [],
];
