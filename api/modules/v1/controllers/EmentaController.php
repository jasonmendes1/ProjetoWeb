<?php

namespace api\modules\v1\controllers;

use common\models\Ementa;
use yii\rest\ActiveController;
use yii\web\Response;

class EmentaController extends ActiveController
{
    public $modelClass = 'common\models\Ementa';

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
        $ementaModel = new $this->modelClass;
        $recs = $ementaModel::find()->all();
        return ['total' => count($recs)];
    }
}