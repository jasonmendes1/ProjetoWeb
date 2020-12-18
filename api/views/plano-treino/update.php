<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlanoTreino */

$this->title = 'Update Plano Treino: ' . $model->IDPlanoTreino;
$this->params['breadcrumbs'][] = ['label' => 'Plano Treinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDPlanoTreino, 'url' => ['view', 'id' => $model->IDPlanoTreino]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="plano-treino-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
