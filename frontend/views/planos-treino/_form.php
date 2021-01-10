<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model frontend\models\PlanosTreino */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planos-treino-form">
    <div class = "criarplanostreino">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'dia_treino')->widget(DatePicker::className(),['dateFormat' => 'y-M-d']) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
    <div class = "criarexercicios">
        Fazer aqui a criação do exercicios
    </div>
</div>
