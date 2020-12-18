<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlanoTreinoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Plano Treinos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plano-treino-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Plano Treino', ['create'], ['class' => 'btn btn-success']) ?>
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
