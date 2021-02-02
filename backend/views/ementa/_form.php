<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Ementa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ementa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomeEmenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PequenoAlmoco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Almoco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Lanche1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Lanche2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Jantar')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
