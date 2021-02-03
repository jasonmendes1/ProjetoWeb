<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Exercicio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exercicio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IDPlanoTreino')->textInput() ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'repeticoes')->textInput() ?>

    <?= $form->field($model, 'tempo')->textInput() ?>

    <?= $form->field($model, 'serie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'repouso')->textInput() ?>

    <?= $form->field($model, 'tempo_total')->textInput() ?>

    <?= $form->field($model, 'num_maquina')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
