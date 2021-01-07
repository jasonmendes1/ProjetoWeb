<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),    
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'basePath' => '@api/modules/v1',
            'class' => 'api\modules\v1\Module'
        ]
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
            'enableCookieValidation' => true,
            'cookieValidationKey' => 'bargest',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/user'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                        'GET {id}/username' => 'usernameget', // 'xxxx' é 'actionXxxx'
                        'GET {id}/authkey' => 'authkeyget', // 'xxxx' é 'actionXxxx'
                        'GET {id}/email' => 'emailget', // 'xxxx' é 'actionXxxx'
                        'GET {id}/cliente' => 'cliente', // 'xxxx' é 'actionXxxx'
                        'GET {id}/funcionario' => 'funcionario', // 'xxxx' é 'actionXxxx'
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\d+>', //O standard tem que aparecer!
                    ],
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/userregisterandlogin'], 'pluralize' => false,

                    'extraPatterns' => [
                        'POST registerc' => 'registercliente', // 'xxxx' é 'actionXxxx'
                        'POST registerf' => 'registerfuncionario', // 'xxxx' é 'actionXxxx'
                        'POST login' => 'loginuser', // 'xxxx' é 'actionXxxx'
                    ]
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/cargo'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                        'POST cargocreate' => 'cargocreate', // 'XXX' é 'actionXXX'
                        'GET {id}/cargofuncionario/{idfuncionario}' => 'cargofuncionario', // 'XXX' é 'actionXXX'
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\d+>', //O standard tem que aparecer!
                        '{idfuncionario}' => '<idfuncionario:\\d+>', //O standard tem que aparecer!
                    ],
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/cliente'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                    ],

                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/desconto'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                    ]
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/ementa'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                    ]
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/funcionario'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                    ]
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/planonutricao'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                    ]
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/planotreino'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                    ]
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/subscricao'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                    ]
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/tiposubscricao'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                    ]
                ],
            ],        
        ]
    ],
    'params' => $params,
];



