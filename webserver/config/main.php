<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-werserver',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'webserver\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'enableSession' => false
            //'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
 /*
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        */
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ['class'=>'yii\rest\UrlRule','controller'=>'tag'],
                ['class'=>'yii\rest\UrlRule','controller'=>'app/document/article','extraPatterns'=>['GET search'=>'search']],
                ['class'=>'yii\rest\UrlRule','controller'=>'login','extraPatterns'=>['POST sign'=>'sign']],
                ['class'=>'yii\rest\UrlRule','controller'=>'camera']
            ],
        ],

    ],
    'params' => $params,
];
