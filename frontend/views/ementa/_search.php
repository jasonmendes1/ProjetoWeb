<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\EmentaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ementa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDEmenta') ?>

    <?= $form->field($model, 'nomeEmenta') ?>

    <?= $form->field($model, 'PequenoAlmoco') ?>

    <?= $form->field($model, 'Almoco') ?>

    <?= $form->field($model, 'Lanche1') ?>

    <?php // echo $form->field($model, 'Lanche2') ?>

    <?php // echo $form->field($model, 'Jantar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
