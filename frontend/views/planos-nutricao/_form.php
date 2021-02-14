<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Ementa;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\PlanosNutricao */
/* @var $form yii\widgets\ActiveForm */

$ementas = ArrayHelper::map(Ementa::find()->all(), 'IDEmenta', 'nomeEmenta');

?>

<div class="Form-Nutricao">
    <div class = "Form-Nutricao-Plano">
        <h1>Criar Planos Nutricão</h1>
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

        <br><br>
        <h4>Selecional qualquer dia da semana pretendida</h4>

        <?= $form->field($model,'Semana')->widget(DatePicker::className(),['dateFormat' => 'y-M-d']) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
    <div class = "Form-Nutricao-Clientes">
        <h1>Clientes</h1>
        <?php if(isset($clienteselect)){?>
            <b>Cliente selecionado: <?=$clienteselect?></b>
        <?php }else{?>
            <b>Cliente selecionado: Nenhum</b> 
        <?php }
        ?>
        
        <?php
            foreach($clientes as $cliente){?>
                <div class = "cliente-item">
                    <div><img src="<?=$cliente->avatar?>" align="left" style="border-radius: 10000px; width:50px; height:50px;"></div>
                    <div><b>Id: </b><?=Html::a($cliente->IDCliente, ['selectcliente', 'id' => $cliente->IDCliente],['class' => 'btnsemanas'])?></div>
                    <div><b>Nome: </b><?=$cliente->primeiroNome . " " . $cliente->apelido?></div>
                    <div><b>Data Nascimento: </b><?=$cliente->dt_nascimento?></div>
                </div>
            <?php }
        ?>
    </div>
    <div class = "Form-Nutricao-Planos">
        
    </div>

    

</div>
