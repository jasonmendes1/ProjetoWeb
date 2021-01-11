<?php

use frontend\models\Cliente;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Subscricao */
/* @var $form yii\widgets\ActiveForm */
$cliente = ArrayHelper::map(Cliente::find()->all(), 'IDCliente', 'primeiroNome', 'IDCliente');

?>

<div class="subscricao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'preco')->textInput() ?>

    <h4> Cliente </h4>

    <?= Html::activeDropDownList($model, 'id_cliente', $cliente)?>
    <br>
    <br>
    <?= $form->field($model, 'id_desconto')->textInput() ?>

    <?= $form->field($model, 'id_tipo')->textInput() ?>

    <?= $form->field($model, 'data_subscricao')->textInput() ?>

    <?= $form->field($model, 'data_expirar')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
