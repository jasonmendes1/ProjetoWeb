<?php

namespace api\modules\v1\controllers;

use common\models\Planotreino;
use yii\rest\ActiveController;
use yii\web\Response;

class PlanotreinoController extends ActiveController
{
    public $modelClass = 'common\models\Planotreino';

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
}