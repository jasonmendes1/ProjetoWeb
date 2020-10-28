<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ClienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'User_id') ?>

    <?= $form->field($model, 'primeiroNome') ?>

    <?= $form->field($model, 'apelido') ?>

    <?= $form->field($model, 'dt_nascimento') ?>

    <?= $form->field($model, 'sexo') ?>

    <?php // echo $form->field($model, 'IDCliente') ?>

    <?php // echo $form->field($model, 'avatar') ?>

    <?php // echo $form->field($model, 'nif') ?>

    <?php // echo $form->field($model, 'num_tele') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
