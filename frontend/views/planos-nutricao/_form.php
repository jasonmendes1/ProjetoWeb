<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PlanosNutricao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Segunda')->dropDownList(['' =>'Selecionar ementa...',1 => 'Perda de peso'])  ?>

    <?= $form->field($model, 'Terca')->dropDownList(['' =>'Selecionar ementa...',1 => 'Perda de peso']) ?>

    <?= $form->field($model, 'Quarta')->dropDownList(['' =>'Selecionar ementa...',1 => 'Perda de peso']) ?>

    <?= $form->field($model, 'Quinta')->dropDownList(['' =>'Selecionar ementa...',1 => 'Perda de peso']) ?>

    <?= $form->field($model, 'Sexta')->dropDownList(['' =>'Selecionar ementa...',1 => 'Perda de peso']) ?>

    <?= $form->field($model, 'Sabado')->dropDownList(['' =>'Selecionar ementa...',1 => 'Perda de peso']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>