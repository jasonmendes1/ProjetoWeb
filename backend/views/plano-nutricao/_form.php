<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlanoNutricao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plano-nutricao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Segunda')->textInput() ?>

    <?= $form->field($model, 'Terca')->textInput() ?>

    <?= $form->field($model, 'Quarta')->textInput() ?>

    <?= $form->field($model, 'Quinta')->textInput() ?>

    <?= $form->field($model, 'Sexta')->textInput() ?>

    <?= $form->field($model, 'Sabado')->textInput() ?>

    <?= $form->field($model, 'IDNutricionista')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
