<?php

namespace api\modules\v1\controllers;

use common\models\Cargo;
use yii\rest\ActiveController;
use yii\web\Response;

class CargoController extends ActiveController
{
    public $modelClass = 'common\models\Cargo';
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
        $cargoModel = new $this->modelClass;
        $recs = $cargoModel::find()->all();
        return ['total' => count($recs)];
    }

    public function actionCargocreate()
    {
        $cargoModel = new $this->modelClass;
        $cargoModel->cargo= \Yii::$app->request->post('cargo');
        $ret = $cargoModel->save();
        return ['SaveError' => $ret];
    }
    public function actionCargofuncionario($id, $idfuncionario){
        $modelClass = new $this->modelClass;

        $modelFuncionario = new $this->modelFuncionario;
        $funcionario = $modelFuncionario::find()->where(['cargo_id' => $id])->one();

        foreach ($funcionario->cargo_id as $funcionarios) {
            if($funcionarios->id == $idfuncionario){
                return $funcionario->cargo;
            }
        }
    }
}