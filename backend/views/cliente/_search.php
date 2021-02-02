<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ClienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'User_id') ?>

    <?= $form->field($model, 'IDCliente') ?>

    <?= $form->field($model, 'primeiroNome') ?>

    <?= $form->field($model, 'apelido') ?>

    <?= $form->field($model, 'dt_nascimento') ?>

    <?php // echo $form->field($model, 'sexo') ?>

    <?php // echo $form->field($model, 'avatar') ?>

    <?php // echo $form->field($model, 'num_tele') ?>

    <?php // echo $form->field($model, 'nif') ?>

    <?php // echo $form->field($model, 'altura') ?>

    <?php // echo $form->field($model, 'peso') ?>

    <?php // echo $form->field($model, 'massa_muscular') ?>

    <?php // echo $form->field($model, 'massa_gorda') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
