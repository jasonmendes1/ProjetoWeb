<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ExercicioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Exercicios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exercicio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Exercicio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
