<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PlanosNutricaoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planos-nutricao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDPlanoNutricao') ?>

    <?= $form->field($model, 'Segunda') ?>

    <?= $form->field($model, 'Terca') ?>

    <?= $form->field($model, 'Quarta') ?>

    <?= $form->field($model, 'Quinta') ?>

    <?php // echo $form->field($model, 'Sexta') ?>

    <?php // echo $form->field($model, 'Sabado') ?>

    <?php // echo $form->field($model, 'IDNutricionista') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
