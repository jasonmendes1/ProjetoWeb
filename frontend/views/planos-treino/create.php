<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PlanosTreino */
/* @var $modelExercicio frontend\models\Exercicio */


$this->title = 'Create Planos Treino';
$this->params['breadcrumbs'][] = ['label' => 'Planos Treinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planos-treino-create">
    <?php
        if(isset($option)){?>
            <?= $this->render('_form', [
                'model' => $model,
                'modelExercicio' => $modelExercicio,
                'planoProvider' => $planoProvider,
                'selectedid' => $idplanotreino,
                'exercicios' => $exercicios,
                'op' => $option,
            ]) ?>
        <?php }else if(isset($idplanotreino)){?>
            <?= $this->render('_form', [
                'model' => $model,
                'modelExercicio' => $modelExercicio,
                'planoProvider' => $planoProvider,
                'selectedid' => $idplanotreino,
                'exercicios' => $exercicios,
            ]) ?>
        <?php }else{?>
            <?= $this->render('_form', [
                'model' => $model,
                'modelExercicio' => $modelExercicio,
                'planoProvider' => $planoProvider,
            ]) ?>
        <?php }
    ?>
    
    

    
</div>
