<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlanosTreino */

$this->title = 'Create Planos Treino';
$this->params['breadcrumbs'][] = ['label' => 'Planos Treinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planos-treino-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
