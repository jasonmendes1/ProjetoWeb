<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlanoNutricaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Plano Nutricaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plano-nutricao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Plano Nutricao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDPlanoNutricao',
            'Segunda',
            'Terca',
            'Quarta',
            'Quinta',
            //'Sexta',
            //'Sabado',
            //'IDNutricionista',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
