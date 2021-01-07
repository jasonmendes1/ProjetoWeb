<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PlanosTreinoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planos-treino-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDPlanoTreino') ?>

    <?= $form->field($model, 'id_PT') ?>

    <?= $form->field($model, 'dia_treino') ?>

    <?= $form->field($model, 'semana') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
