<?php

namespace api\modules\v1\controllers;

use common\models\ClienteFuncionarios;
use yii\rest\ActiveController;
use yii\web\Response;

class ClienteFuncionariosController extends ActiveController
{
    public $modelClass = 'common\models\ClienteFuncionarios';

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
        $descontoModel = new $this->modelClass;
        $recs = $descontoModel::find()->all();
        return ['total' => count($recs)];
    }
    public function actionCliente($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->cliente->primeiroNome;
    }

}