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

            [
                'label' => 'Nome do Cliente',
                'attribute' => 'id_cliente',
                'value' => function($model){
                    $cliente = app\models\Cliente::find()->where(['User_id'=>$model->id_cliente])->one();
                    return $cliente->primeiroNome . ' ' . $cliente->apelido;
                }
            ],
            //'id_cliente',
            //'IDSubscricao',
            'preco',
            [
                'label' => 'Desconto',
                'attribute' => 'id_desconto',
                'value' => function($model){
                    $desconto = app\models\Desconto::find()->where(['IDDesconto'=>$model->id_desconto])->one();
                    return $desconto->nome;
                }
            ],
            //'id_desconto',
            [
                'label' => 'Tipo de Subscrição',
                'attribute' => 'id_tipo',
                'value' => function($model){
                    $tiposub = app\models\TipoSubscricao::find()->where(['IDTipoSubscricao'=>$model->id_tipo])->one();
                    return $tiposub->tipo;
                }
            ],
            //'id_tipo',
            'data_subscricao',
            'data_expirar',
            'total',


            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
