<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Imoveis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="imoveis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'metrosquadrados')->textInput() ?>

    <?= $form->field($model, 'localidade')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
