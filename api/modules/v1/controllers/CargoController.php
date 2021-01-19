<?php

namespace api\modules\v1\controllers;

use common\models\Cargo;
use yii\rest\ActiveController;
use yii\web\Response;

class CargoController extends ActiveController
{
    public $modelClass = 'common\models\Cargo';

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
    public function actionCargo($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->cargo;
    }
}