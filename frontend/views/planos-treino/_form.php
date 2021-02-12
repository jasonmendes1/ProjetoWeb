<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use frontend\models\Funcionario; 
use frontend\models\PlanosTreino; 
use yii\data\ActiveDataProvider;


$this->title = 'Criar Exercicio';

/* @var $this yii\web\View */
/* @var $model frontend\models\PlanosTreino */
/* @var $modelExercicio frontend\models\Exercicio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planos-treino-form">
    <div class = "planostreino">
        <div class = "criar-planostreino">
            
            <h1>Planos de Treino</h1>
            <br>
            <?php
                if(isset($idcliente)){?>
                    <b>Cliente Selecionado: <?=$idcliente?></b>
                <?php }else{ ?>
                    <b>Cliente Selecionado: Nenhum</b>
                <?php }
            ?>
            <button><?=Html::a('Select Clientes', ['apresentarcliente'])?></button>
            <?php $form = ActiveForm::begin(); ?>
            
                <?= $form->field($model, 'dia_treino')->widget(DatePicker::className(),['dateFormat' => 'y-M-d']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
                
            <?php ActiveForm::end(); ?>
        </div>
        <br><br>
        <div class = "mostrar-planostreino">
            <h1>Seus Planos de Treino</h1>
            <div class = "cadaplano">
                <?php 
                    foreach ($planoProvider as $plano){?>
                    <br> 
                    <p><?='ID: ', Html::a($plano->IDPlanoTreino, ['selectplano', 'id' => $plano->IDPlanoTreino]), ' Data: ', $plano->dia_treino?></p>
                    <?php }
                ?> 
            </div>  
        </div>
    </div>
    <div class = "exercicioscreate">
        <div class = "mostrar-exercicios">
            <?php if(isset($exercicios)){?>
                <div class = "exer-title">
                    <div><h1>Exercícios</h1></div>
                    <div style="padding-top:30px"><button><?=Html::a("Criar Exercício", ['criarexercicio', 'idplanotreino' => $selectedid],['class' => 'btnsemanas'])?></button></div>
                </div>
                <?php foreach($exercicios as $exer){?>
                    <div class = "exer">
                        <div class = "exer-top">
                            <div><b>Nome: </b><?=$exer->nome?></div>
                            <div><b>Repetições: </b><?=$exer->repeticoes?></div>
                            <div><b>Tempo: </b><?=$exer->tempo?><b> segs</b></div>
                        </div>
                        <div class = "exer-down">
                            <div><b>Serie: </b><?=$exer->serie?></div>
                            <div><b>Repouso: </b><?=$exer->repouso?></div>
                            <div><b>Tempo Total: </b><?=$exer->tempo_total?><b> segs</b></div>
                            <div><b>Num Máquina: </b><?=$exer->num_maquina?></div>
                        </div>
                    </div>
                <?php }
            }else if(isset($clientes)){ ?>
                <?php foreach($clientes as $cliente){ ?>
                    <div class = "exer-title">
                        <div><h1>Clientes</h1></div>
                    </div>
                    <div class = "exer">
                        <div class = "exer-top">
                            <div><img src="<?=$cliente->avatar?>" align="left" style="border-radius: 10000px; width:50px; height:50px;"></div>
                            <div><b>Id: </b><?=Html::a($cliente->IDCliente, ['selectcliente', 'idcliente' => $cliente->IDCliente],['class' => 'btnsemanas'])?></div>
                            <div><b>Nome: </b><?=$cliente->primeiroNome . " " . $cliente->apelido?></div>
                            <div><b>Data Nascimento: </b><?=$cliente->dt_nascimento?></div>
                        </div>
                    </div>
                <?php }?>
            <?php }
            ?>     
        </div>  
        <div class = "criar-exercicios">
            <?php
                if(isset($op)){
                     $form = ActiveForm::begin(); ?>
                    <h1><?= Html::encode($this->title) ?></h1>
        
                    <?= $form->field($modelExercicio, 'nome')->textInput(['maxlength' => true]) ?>
        
                    <?= $form->field($modelExercicio, 'repeticoes')->textInput(['maxlength' => true]) ?>
        
                    <?= $form->field($modelExercicio, 'tempo')->textInput() ?>
        
                    <?= $form->field($modelExercicio, 'serie')->textInput(['maxlength' => true]) ?>
        
                    <?= $form->field($modelExercicio, 'repouso')->textInput() ?>
        
                    <?= $form->field($modelExercicio, 'num_maquina')->textInput(['maxlength' => true]) ?>
        
                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>
        
                    <?php ActiveForm::end(); 
                }
            ?>
            
        </div>      
    </div>
</div>
