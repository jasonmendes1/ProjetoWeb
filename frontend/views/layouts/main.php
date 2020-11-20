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
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $login[] = ['label' => 'Registar', 'url' => ['/site/signup']];
        $login[] = ['label' => 'Fazer Login', 'url' => ['/site/login']];
        $nomecliente[] = ['label' => 'Cliente'];
        } else {
        $login[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
              // Yii::$app->cliente->avatar, // AVATAR DO CLIENTE NO BOTAO LOGOUT
              // $cliente = Cliente::find()->where(['user_id' => Yii::$app->user->id])->one(),
              // $foto = $cliente->avatar,
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
        $nomecliente[] = ['label' => Yii::$app->user->identity->username];
    }
/*
    if (Yii::$app->user->isGuest) {
        $nomecliente[] = ['label' => 'Cliente'];
    } else {
        $nomecliente[] = ['label' => Yii::$app->user->identity->username];
    }
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
            [
                'label' => 'Cliente',
                'items' => [
                    ['label' => 'Perfil', 'url' => '?r=cliente'],
                     ['label' => 'Planos de Treino', 'url' => '#'],
                     ['label' => 'Planos de Nutrição', 'url' => '#'],
                     '<li class="divider"></li>',
                     ['label' => 'Horários Aulas', 'url' => '#'],
                    ],
            ],
            [
                'label' => 'Registar/Login',
                'items' => $login,
            ]
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
