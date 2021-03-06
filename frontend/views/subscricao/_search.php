<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SubscricaoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subscricao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDSubscricao') ?>

    <?= $form->field($model, 'preco') ?>

    <?= $form->field($model, 'id_cliente') ?>

    <?= $form->field($model, 'id_desconto') ?>

    <?= $form->field($model, 'id_tipo') ?>

    <?php // echo $form->field($model, 'data_subscricao') ?>

    <?php // echo $form->field($model, 'data_expirar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
