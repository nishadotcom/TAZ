<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'name' => 'TALOZO',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'home',
    'modules' => [
        'ws' => [
            'class' => 'frontend\modules\ws\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            /*'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],*/
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
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
            //'enableStrictParsing' => true,
            'rules' => [
                //['class' => 'yii\rest\UrlRule', 'controller' => 'apprest'],
				'login' => 'site/login',
				'signup' => 'site/signup',
                'logout' => 'site/logout',
                'become-seller' => 'site/become-seller',
                'profile-dashboard'=> 'site/profile-dashboard',
                'profile-update'=> 'site/profile-update',
                'contact-details'=> 'user-contact-detail/',
                'contact-details/add'=> 'user-contact-detail/create',
                'contact-details/update/<id>'=> 'user-contact-detail/update',
                'contact-details/delete/<id>'=> 'user-contact-detail/delete',

                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:[\w-]+>' => '<controller>/<action>',
                
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',

                //'<module:news>/<action:\w+>' => '<module>/default/<action>',
                //'<module:news>/<action:\w+>/<id:\d+>' => '<module>/default/<action>',
                '<module:ws>/<controller:\w+>' => '<module>/<controller>/index',
                '<module:ws>/<controller:\w+>/<action:\w+>/<id:[\w-]+>' => '<module>/<controller>/<action>'
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => ['@app/views' => '@app/../themes/taz'],
                'baseUrl' => '@web/themes/taz'
            ]
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'google' => [
                    'class'        => 'yii\authclient\clients\Google',
                    'clientId'     => '158115804302-lfdskqjecp0e12j2gih2i36p7audlndj.apps.googleusercontent.com',
                    'clientSecret' => 'd4J27WQicqleyj_6Soq4kAuB',//$config['oauth_google_clientSecret'],
                ],
                'facebook' => [
                        'class'        => 'yii\authclient\clients\Facebook',
                        'clientId'     => '966320816798502',
                        'clientSecret' => 'd2039e8ef01cbca8274e236bacaadfe3',
                ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => []
                ],
            ],
        ],
    ],

    'params' => $params,
];
