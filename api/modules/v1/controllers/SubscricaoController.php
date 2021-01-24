<?php

namespace api\modules\v1\controllers;

use common\models\Subscricao;
use common\models\Cliente;
use common\models\Desconto;
use yii\rest\ActiveController;
use yii\web\Response;

class SubscricaoController extends ActiveController
{
    public $modelClass = 'common\models\Subscricao';
    public $modelCliente = 'common\models\Cliente';
    public $modelDesconto = 'common\models\Desconto';


    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [

            'class' => 'yii\filters\ContentNegotiator',

            'formats' => [

                'application/json' => Response::FORMAT_JSON,

            ]
        ];
        return $behaviors;
    }

    public function actionTotal()
    {
        $subscricaoModel = new $this->modelClass;
        $recs = $subscricaoModel::find()->all();
        return ['total' => count($recs)];
    }

    public function actionPreco($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->preco;
    }

    public function actionCliente($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->cliente->primeiroNome;
    }
    public function actionDesconto($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->desconto->nome;
    }

    public function actionDatasubscricao($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->data_subscricao;
    }

    public function actionDataexpirar($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->data_expirar;
    }
    public function actionVertotal($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->total;
    }
}