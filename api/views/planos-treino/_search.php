<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlanosTreinoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planos-treino-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDPlanoTreino') ?>

    <?= $form->field($model, 'nome_exercicio') ?>

    <?= $form->field($model, 'repeticoes') ?>

    <?= $form->field($model, 'tempo') ?>

    <?= $form->field($model, 'serie') ?>

    <?php // echo $form->field($model, 'repouso') ?>

    <?php // echo $form->field($model, 'tempo_total') ?>

    <?php // echo $form->field($model, 'num_maquina') ?>

    <?php // echo $form->field($model, 'id_PT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
