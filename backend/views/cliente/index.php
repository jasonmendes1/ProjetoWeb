<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista de Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    a {
        color: #800000;
    }

    a:hover {
        color: #800000;
    }
</style>

<div class="cliente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registar Cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //'User_id',
            'IDCliente',
            'primeiroNome',
            'apelido',
            'dt_nascimento',
            'sexo',
            'avatar',
            'num_tele',
            'nif',
            'altura',
            'peso',
            'massa_muscular',
            'massa_gorda',
 
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



</div>
