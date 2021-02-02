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
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/default'], 'pluralize' => false,],

                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/user'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                    ]
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/userregisterandlogin'], 'pluralize' => false,

                    'extraPatterns' => [
                        'POST register' => 'registeruser', // 'xxxx' é 'actionXxxx'
                        'POST verificaLogin' => 'verifica', // 'xxxx' é 'actionXxxx'
                    ]
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/cargo'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                        'POST cargocreate' => 'cargocreate', // 'XXX' é 'actionXXX'
                        'GET cargo' => 'cargo', // 'XXX' é 'actionXXX'
                    ]
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/cliente'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                        'GET {id}/primeironome' => 'primeironome', // 'XXX' é 'actionXXX'
                        'GET {id}/apelido' => 'apelido', // 'XXX' é 'actionXXX'
                        'GET {id}/datanasc' => 'datanasc', // 'XXX' é 'actionXXX'
                        'GET {id}/sexo' => 'sexo', // 'XXX' é 'actionXXX'
                        'GET {id}/numtele' => 'numtele', // 'XXX' é 'actionXXX'
                        'GET {id}/nif' => 'nif', // 'XXX' é 'actionXXX'
                        'GET {id}/altura' => 'altura', // 'XXX' é 'actionXXX'
                        'GET {id}/peso' => 'peso', // 'XXX' é 'actionXXX'
                        'GET {id}/massamuscular' => 'massamuscular', // 'XXX' é 'actionXXX'
                        'GET {id}/massagorda' => 'massagorda', // 'XXX' é 'actionXXX'
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\d+>', //O standard tem que aparecer!
                    ],
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/desconto'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                        'GET {id}/nome' => 'nome', // 'XXX' é 'actionXXX'
                        'GET {id}/quantidade' => 'quantidade', // 'XXX' é 'actionXXX'
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\d+>', //O standard tem que aparecer!
                    ],
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/ementa'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                        'GET {id}/nomeementa' => 'nomeementa', // 'XXX' é 'actionXXX'
                        'GET {id}/pequenoalmoco' => 'pequenoalmoco', // 'XXX' é 'actionXXX'
                        'GET {id}/almoco' => 'almoco', // 'XXX' é 'actionXXX'
                        'GET {id}/lanche1' => 'lanche1', // 'XXX' é 'actionXXX'
                        'GET {id}/lanche2' => 'lanche2', // 'XXX' é 'actionXXX'
                        'GET {id}/jantar' => 'jantar', // 'XXX' é 'actionXXX'
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\d+>', //O standard tem que aparecer!
                    ],
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/funcionario'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                        'GET {id}/primeironome' => 'primeironome', // 'XXX' é 'actionXXX'
                        'GET {id}/apelido' => 'apelido', // 'XXX' é 'actionXXX'
                        'GET {id}/datanasc' => 'datanasc', // 'XXX' é 'actionXXX'
                        'GET {id}/sexo' => 'sexo', // 'XXX' é 'actionXXX'
                        'GET {id}/numtele' => 'numtele', // 'XXX' é 'actionXXX'
                        'GET {id}/cargo' => 'cargo', // 'XXX' é 'actionXXX'
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\d+>', //O standard tem que aparecer!
                    ],
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/planonutricao'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET getplanonutricao/{id}' => 'getplanonutricao', 
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                        'GET {id}/nomeementaseg' => 'nomeementaseg', // 'XXX' é 'actionXXX'
                        'GET {id}/nomeementater' => 'nomeementater', // 'XXX' é 'actionXXX'
                        'GET {id}/nomeementaqua' => 'nomeementaqua', // 'XXX' é 'actionXXX'
                        'GET {id}/nomeementaqui' => 'nomeementaqui', // 'XXX' é 'actionXXX'
                        'GET {id}/nomeementasex' => 'nomeementasex', // 'XXX' é 'actionXXX'
                        'GET {id}/nomeementasab' => 'nomeementasab', // 'XXX' é 'actionXXX'
                        //segunda
                        'GET {id}/segundapeqalmoco' => 'segundapeqalmoco', // 'XXX' é 'actionXXX'
                        'GET {id}/segundaalmoco' => 'segundaalmoco', // 'XXX' é 'actionXXX'
                        'GET {id}/segundalanche1' => 'segundalanche1', // 'XXX' é 'actionXXX'
                        'GET {id}/segundalanche2' => 'segundalanche2', // 'XXX' é 'actionXXX'
                        'GET {id}/segundajantar' => 'segundajantar', // 'XXX' é 'actionXXX'
                        //terca
                        'GET {id}/tercapeqalmoco' => 'tercapeqalmoco', // 'XXX' é 'actionXXX'
                        'GET {id}/tercaalmoco' => 'tercaalmoco', // 'XXX' é 'actionXXX'
                        'GET {id}/tercalanche1' => 'tercalanche1', // 'XXX' é 'actionXXX'
                        'GET {id}/tercalanche2' => 'tercalanche2', // 'XXX' é 'actionXXX'
                        'GET {id}/tercajantar' => 'tercajantar', // 'XXX' é 'actionXXX'
                        //quarta
                        'GET {id}/quartapeqalmoco' => 'quartapeqalmoco', // 'XXX' é 'actionXXX'
                        'GET {id}/quartaalmoco' => 'quartaalmoco', // 'XXX' é 'actionXXX'
                        'GET {id}/quartalanche1' => 'quartalanche1', // 'XXX' é 'actionXXX'
                        'GET {id}/quartalanche2' => 'quartalanche2', // 'XXX' é 'actionXXX'
                        'GET {id}/quartajantar' => 'quartajantar', // 'XXX' é 'actionXXX'
                        //quinta
                        'GET {id}/quintapeqalmoco' => 'quintapeqalmoco', // 'XXX' é 'actionXXX'
                        'GET {id}/quintaalmoco' => 'quintaalmoco', // 'XXX' é 'actionXXX'
                        'GET {id}/quintalanche1' => 'quintalanche1', // 'XXX' é 'actionXXX'
                        'GET {id}/quintalanche2' => 'quintalanche2', // 'XXX' é 'actionXXX'
                        'GET {id}/quintajantar' => 'quintajantar', // 'XXX' é 'actionXXX'
                        //sexta
                        'GET {id}/sextapeqalmoco' => 'sextapeqalmoco', // 'XXX' é 'actionXXX'
                        'GET {id}/sextaalmoco' => 'sextaalmoco', // 'XXX' é 'actionXXX'
                        'GET {id}/sextalanche1' => 'sextalanche1', // 'XXX' é 'actionXXX'
                        'GET {id}/sextalanche2' => 'sextalanche2', // 'XXX' é 'actionXXX'
                        'GET {id}/sextajantar' => 'sextajantar', // 'XXX' é 'actionXXX'
                        //sabado
                        'GET {id}/sabadopeqalmoco' => 'sabadopeqalmoco', // 'XXX' é 'actionXXX'
                        'GET {id}/sabadoalmoco' => 'sabadoalmoco', // 'XXX' é 'actionXXX'
                        'GET {id}/sabadolanche1' => 'sabadolanche1', // 'XXX' é 'actionXXX'
                        'GET {id}/sabadolanche2' => 'sabadolanche2', // 'XXX' é 'actionXXX'
                        'GET {id}/sabadojantar' => 'sabadojantar', // 'XXX' é 'actionXXX'
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\d+>', //O standard tem que aparecer!
                    ],
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/planotreino'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET getplanotreino/{id}' => 'getplanotreino', 
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                        'GET {id}/personaltrainer' => 'personaltrainer', // 'XXX' é 'actionXXX'
                        'GET {id}/diatreino' => 'diatreino', // 'XXX' é 'actionXXX'
                        'GET {id}/semana' => 'semana', // 'XXX' é 'actionXXX'
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\d+>', //O standard tem que aparecer!
                    ],
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/clientefuncionarios'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                        'GET {id}/cliente' => 'cliente', // 'XXX' é 'actionXXX'
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\d+>', //O standard tem que aparecer!
                    ],
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/listaplanos'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET getplano/{id}' => 'getplano', 
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                        'GET {id}/cliente' => 'cliente', // 'XXX' é 'actionXXX'
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\d+>', //O standard tem que aparecer!
                    ],
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/exercicio'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                        'GET {id}/planotreino' => 'planotreino', // 'XXX' é 'actionXXX'
                        'GET {id}/nome' => 'nome', // 'XXX' é 'actionXXX'
                        'GET {id}/repeticoes' => 'repeticoes', // 'XXX' é 'actionXXX'
                        'GET {id}/tempo' => 'tempo', // 'XXX' é 'actionXXX'
                        'GET {id}/serie' => 'serie', // 'XXX' é 'actionXXX'
                        'GET {id}/repouso' => 'repouso', // 'XXX' é 'actionXXX'
                        'GET {id}/tempototal' => 'tempototal', // 'XXX' é 'actionXXX'
                        'GET {id}/nummaquina' => 'nummaquina', // 'XXX' é 'actionXXX'
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\d+>', //O standard tem que aparecer!
                    ],
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/subscricao'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                        'GET {id}/preco' => 'preco', // 'XXX' é 'actionXXX'
                        'GET {id}/cliente' => 'cliente', // 'XXX' é 'actionXXX'
                        'GET {id}/desconto' => 'desconto', // 'XXX' é 'actionXXX'
                        'GET {id}/datasubscricao' => 'datasubscricao', // 'XXX' é 'actionXXX'
                        'GET {id}/dataexpirar' => 'dataexpirar', // 'XXX' é 'actionXXX'
                        'GET {id}/vertotal' => 'vertotal', // 'XXX' é 'actionXXX'
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\d+>', //O standard tem que aparecer!
                    ],
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/tiposubscricao'], 'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total', // 'XXX' é 'actionXXX'
                        'GET {id}/tipo' => 'tipo', // 'XXX' é 'actionXXX'
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\d+>', //O standard tem que aparecer!
                    ],
                ],
            ],        
        ]
    ],
    'params' => $params,
];



