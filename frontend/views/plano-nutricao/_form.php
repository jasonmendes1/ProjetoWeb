<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlanoNutricao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plano-nutricao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Segunda')->dropDownList(['' =>'Selecionar ementa...','Perda de peso' => '1'])  ?>

    <?= $form->field($model, 'Terca')->dropDownList(['' =>'Selecionar ementa...','Perda de peso' => '1']) ?>

    <?= $form->field($model, 'Quarta')->dropDownList(['' =>'Selecionar ementa...','Perda de peso' => '1']) ?>

    <?= $form->field($model, 'Quinta')->dropDownList(['' =>'Selecionar ementa...','Perda de peso' => '1']) ?>

    <?= $form->field($model, 'Sexta')->dropDownList(['' =>'Selecionar ementa...','Perda de peso' => '1']) ?>

    <?= $form->field($model, 'Sabado')->dropDownList(['' =>'Selecionar ementa...','Perda de peso' => '1']) ?>

    <?= $form->field($model, 'IDNutricionista')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
