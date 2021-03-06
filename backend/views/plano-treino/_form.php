<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlanoTreino */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plano-treino-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome_exercicio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'repeticoes')->textInput() ?>

    <?= $form->field($model, 'tempo')->textInput() ?>

    <?= $form->field($model, 'serie')->textInput() ?>

    <?= $form->field($model, 'repouso')->textInput() ?>

    <?= $form->field($model, 'tempo_total')->textInput() ?>

    <?= $form->field($model, 'num_maquina')->textInput() ?>

    <?= $form->field($model, 'id_cliente')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
