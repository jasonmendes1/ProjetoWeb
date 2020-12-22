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
}