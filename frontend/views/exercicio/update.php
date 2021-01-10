<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Exercicio */

$this->title = 'Update Exercicio: ' . $model->IDExer;
$this->params['breadcrumbs'][] = ['label' => 'Exercicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDExer, 'url' => ['view', 'id' => $model->IDExer]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="exercicio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
