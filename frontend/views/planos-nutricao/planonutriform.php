<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Ementa;
$this->title = 'Criar Plano De Nutricao';

/* @var $this yii\web\View */
/* @var $model frontend\models\PlanosNutricao */
/* @var $form yii\widgets\ActiveForm */
/* @var $form yii\widgets\ActiveForm */

$ementas = ArrayHelper::map(Ementa::find()->all(), 'IDEmenta', 'nomeEmenta');
?>

<div class="main form-control">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <h4> Segunda </h4>
    <?= Html::activeDropDownList($model, 'Segunda', $ementas)?>
    <br>
    <h4> Terca </h4>
    <?= Html::activeDropDownList($model, 'Terca', $ementas)?>
    <br>
    <h4> Quarta </h4>
    <?= Html::activeDropDownList($model, 'Quarta', $ementas)?>
    <br>
    <h4> Quinta </h4>
    <?= Html::activeDropDownList($model, 'Quinta', $ementas)?>
    <br>
    <h4> Sexta </h4>
    <?= Html::activeDropDownList($model, 'Sexta', $ementas)?>
    <br>
    <h4> Sábado </h4>
    <?= Html::activeDropDownList($model, 'Sabado', $ementas)?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>