<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Exercicios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exercicio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Exercicio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDExer',
            'IDPlanoTreino',
            'nome',
            'repeticoes',
            'tempo',
            //'serie',
            //'repouso',
            //'tempo_total',
            //'num_maquina',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
