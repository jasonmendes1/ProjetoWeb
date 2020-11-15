<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SubscricaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subscricaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscricao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Subscricao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDSubscricao',
            'preco',
            'id_cliente',
            'id_desconto',
            'id_tipo',
            //'data_subscricao',
            //'data_expirar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
