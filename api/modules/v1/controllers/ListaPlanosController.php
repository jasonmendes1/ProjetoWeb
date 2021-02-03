<?php

namespace api\modules\v1\controllers;

use common\models\Cliente;
use common\models\ListaPlanos;
use yii\rest\ActiveController;
use yii\web\Response;

class ListaPlanosController extends ActiveController
{
    public $modelClass = 'common\models\ListaPlanos';
    public $modelCliente = 'common\models\Cliente';


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

    public function actionGetplano($id)
    {
        $user = new $this->modelClass;
        $userRecord = $user::find()->where("User_ID=" . $id)->one();
        $cliente = array();


        array_push(
            $cliente,
            [
                "IDPlanoTreino" => $userRecord->IDPlanoTreino,
                "IDPlanoNutricao" => $userRecord->IDPlanoNutricao,
                "IDCliente" => $userRecord->IDCliente,
            ]
        );
        return $cliente;
    }

    public function actionCliente($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->idcliente->primeiroNome;
    }
}
