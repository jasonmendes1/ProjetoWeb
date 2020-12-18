<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlanosTreino */

$this->title = 'Update Planos Treino: ' . $model->IDPlanoTreino;
$this->params['breadcrumbs'][] = ['label' => 'Planos Treinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDPlanoTreino, 'url' => ['view', 'id' => $model->IDPlanoTreino]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="planos-treino-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
