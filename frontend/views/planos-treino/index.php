<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlanosTreinoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Planos Treinos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planos-treino-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Planos Treino', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDPlanoTreino',
            'nome_exercicio',
            'repeticoes',
            'tempo',
            'serie',
            //'repouso',
            //'tempo_total',
            //'num_maquina',
            //'id_cliente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
