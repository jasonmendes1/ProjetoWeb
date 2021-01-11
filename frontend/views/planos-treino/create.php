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

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelExercicio' => $modelExercicio,
    ]) ?>

</div>
