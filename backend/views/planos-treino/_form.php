<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PlanosTreino */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planos-treino-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_PT')->textInput() ?>

    <?= $form->field($model, 'dia_treino')->textInput() ?>

    <?= $form->field($model, 'semana')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
