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
    <div class = "criarplanostreino">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'dia_treino')->widget(DatePicker::className(),['dateFormat' => 'y-M-d']) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
        <div>
        <h1>Seus Planos de Treino</h1>
            <?php 
                foreach ($planoProvider as $plano){?>
                 <br> 
                 <p><?='ID: ', Html::a($plano->IDPlanoTreino, ['criarexercicio', 'idplanotreino' => $plano->IDPlanoTreino]), ' Data: ', $plano->dia_treino?></p>
                <?php }
            ?>
        </div>  
        <?php ActiveForm::end(); ?>
    </div>

    <div class = "criarexercicios">

        <?php $form = ActiveForm::begin(); ?>
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

        <?php ActiveForm::end(); ?>
    </div>
</div>
