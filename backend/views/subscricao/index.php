<?php

use backend\models\Cliente;
use backend\models\ClienteSearch;
use backend\models\Desconto;
use backend\models\Subscricao;
use backend\models\TipoSubscricao;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SubscricaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subscrições';
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
                    $cliente = Cliente::find()->where(['User_id'=>$model->id_cliente])->one();
                    return $cliente->primeiroNome . ' ' . $cliente->apelido;
                }
            ],
            //'id_cliente',
            //'IDSubscricao',
            [
                'label' => 'Desconto',
                'attribute' => 'id_desconto',
                'value' => function($model){
                    $desconto = Desconto::find()->where(['IDDesconto'=>$model->id_desconto])->one();
                    return $desconto->nome;
                }
            ],
            //'id_desconto',
            [
                'label' => 'Tipo de Subscrição',
                'attribute' => 'id_tipo',
                'value' => function($model){
                    $tiposub = TipoSubscricao::find()->where(['IDTipoSubscricao'=>$model->id_tipo])->one();
                    return $tiposub->tipo;
                }
            ],
            //'id_tipo',
            'data_subscricao',
            'data_expirar',
            [
                'label' => 'Total',
                'attribute' => 'total',
                'value' => function($model){
                    $cliente = Cliente::find()->where(['User_id'=>$model->id_cliente])->one();
                    $subscricao = Subscricao::find()->where(['id_cliente'=>$cliente->IDCliente])->one();
                    $tipo_sub = TipoSubscricao::find()->where(['IDTipoSubscricao'=>$subscricao->id_tipo])->one();
                    $desconto = Desconto::find()->where(['IDDesconto'=>$subscricao->id_desconto])->one();
                    
                    $total = ($tipo_sub->valor - ($tipo_sub->valor  * $desconto->quantidade));
                    return $total . '€';
                }
            ],

            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
