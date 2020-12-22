<?php

namespace api\modules\v1\controllers;

use common\models\Subscricao;
use yii\rest\ActiveController;
use yii\web\Response;

class SubscricaoController extends ActiveController
{
    public $modelClass = 'common\models\Subscricao';

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
}