<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ExercicioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exercicio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDExer') ?>

    <?= $form->field($model, 'IDPlanoTreino') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'repeticoes') ?>

    <?= $form->field($model, 'tempo') ?>

    <?php // echo $form->field($model, 'serie') ?>

    <?php // echo $form->field($model, 'repouso') ?>

    <?php // echo $form->field($model, 'tempo_total') ?>

    <?php // echo $form->field($model, 'num_maquina') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
