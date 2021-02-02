<?php

namespace api\modules\v1\controllers;

use common\models\Planotreino;
use common\models\Funcionario;
use yii\rest\ActiveController;
use yii\web\Response;

class PlanotreinoController extends ActiveController
{
    public $modelClass = 'common\models\Planotreino';
    public $modelFuncionario = 'common\models\Funcionario';

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
        $planotreinoModel = new $this->modelClass;
        $recs = $planotreinoModel::find()->all();
        return ['total' => count($recs)];
    }
    public function actionPersonaltrainer($id){ 
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->pT->primeiroNome;
    }

    public function actionDiatreino($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->dia_treino;
    }
    public function actionSemana($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->semana;
    }
}