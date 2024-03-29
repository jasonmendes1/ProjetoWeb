<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\models\Cliente;
use frontend\models\Funcionario;
use frontend\controllers\ClienteController;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/logo_temp.png', ['alt'=>Yii::$app->name], ['style=width:2%;']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $login[] = ['label' => 'Fazer Login', 'url' => ['/site/login']];
        $login[] = ['label' => 'Registar', 'url' => ['/site/signup']];
        $nomecliente[] = ['label' => 'Área Clientes'];
        echo Nav::widget([
            'items' => [
                [
                    'label' => 'Registar/Login',
                    'items' => $login,
                ],
                
            ],
            'options' => ['class' => 'navbar-nav navbar-right'],
        ]);

        } else {
        $login[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout', 'name' => 'logout-button']
            )
            . Html::endForm()
            . '</li>';
        $nomecliente[] = ['label' => Yii::$app->user->identity->username];
        $ifguest = Yii::$app->user->identity->username;
        //$ifguest = Cliente::findOne(['User_id' => Yii::$app->user->id]);

        if(Cliente::findOne(['User_id' => Yii::$app->user->identity->id])){
            echo Nav::widget([
                'items' => [
                    [
                        'label' => 'Bem Vindo ' . $ifguest, //. $ifguest->primeiroNome . ' ' . $ifguest->apelido,
                        'items' => [
                            ['label' => 'Ver Perfil', 
                            'url' => ['cliente/profile']],
        
                            '<li class="divider"></li>',    
        
                             ['label' => 'Planos de Treino', 
                             'url' => ['planos-treino/planostreino']],
        
                             ['label' => 'Planos de Nutrição', 
                             'url' => ['planos-nutricao/planosnutri']],

        

                             ['label' => 'Horários Aulas', 
                             'url' => ['/event']],
                        ],
                    ],
                    
                    [
                        'label' => 'Logout',
                        'items' => $login,
                    ],
                    
                ],
                'options' => ['class' => 'navbar-nav navbar-right'],
            ]);
        }else if(Funcionario::findOne(['User_id' => Yii::$app->user->identity->id])){
            $func = Funcionario::findOne(['User_id' => Yii::$app->user->identity->id]);
            //Se o cargo do funcionario for Personal Trainer
            if($func->cargo_id == 1){
                echo Nav::widget([
                    'items' => [
                        [
                            'label' => 'Bem Vindo ' . $ifguest, //. $ifguest->primeiroNome . ' ' . $ifguest->apelido,
                            'items' => [
                                ['label' => 'Ver Perfil', 
                                'url' => ['funcionario/profilefunc']],
            
                                '<li class="divider"></li>',    
            
                                 ['label' => 'Horários Aulas', 
                                 'url' => ['/event']],
        
                                '<li class="divider"></li>',
        
                                ['label' => 'Criar Plano de Treino',
                                    'url' => ['planos-treino/create']
                                ],
                            ],
                        ],
                        
                        [
                            'label' => 'Logout',
                            'items' => $login,
                        ],
                        
                    ],
                    'options' => ['class' => 'navbar-nav navbar-right'],
                ]);

                //Se o cargo for Nutricionista
            }elseif($func->cargo_id == 2){
                echo Nav::widget([
                    'items' => [
                        [
                            'label' => 'Bem Vindo ' . $ifguest, //. $ifguest->primeiroNome . ' ' . $ifguest->apelido,
                            'items' => [
                                ['label' => 'Ver Perfil', 
                                'url' => ['funcionario/profilefunc']],
            
                                '<li class="divider"></li>',    
            
                                 ['label' => 'Horários Aulas', 
                                 'url' => ['/event']],
        
                                '<li class="divider"></li>',

                                ['label' => 'Criar Plano de Nutrição',
                                    'url' => ['planos-nutricao/create']
                                ],

                                ['label' => 'Criar Ementas',
                                    'url' => ['ementa/create']
                                ],
                            ],
                        ],
                        
                        [
                            'label' => 'Registar/Login',
                            'items' => $login,
                        ],
                        
                    ],
                    'options' => ['class' => 'navbar-nav navbar-right'],
                ]);
            }
            
        }

        
    }
/*
    if (Yii::$app->user->isGuest) {
        $nomecliente[] = ['label' => 'Cliente'];
    } else {
        $nomecliente[] = ['label' => Yii::$app->user->identity->username];
    }
*/

/*
    echo Nav::widget([
        'items' => [
            [
                'label' => 'Bem Vindo ' . $ifguest,
                'items' => [
                    ['label' => 'Ver Perfil', 
                    'url' => 'cliente/profile'],

                    '<li class="divider"></li>',    

                     ['label' => 'Planos de Treino', 
                     'url' => 'planos-treino/index'],

                     ['label' => 'Planos de Nutrição', 
                     'url' => 'planos-nutricao/index'],

                     '<li class="divider"></li>',

                     ['label' => 'Horários Aulas', 
                     'url' => '#'],
                    ],
            ],
            [
                'label' => 'Registar/Login',
                'items' => $login,
            ],
        ],
        'options' => ['class' => 'navbar-nav navbar-right'],
    ]);
    */
    echo Nav::widget([  
        'items' => [
            [
                'label' => 'Ginásio',
                'url' => ['site/about']           
            ],
            [
                'label' => 'Contacto',
                'url' => ['site/contact']
            ],
        ],
        'options' => ['class' => 'navbar-nav navbar-right'],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
