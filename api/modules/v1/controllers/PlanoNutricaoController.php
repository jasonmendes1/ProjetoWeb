<?php

namespace api\modules\v1\controllers;

use common\models\Planonutricao;
use yii\rest\ActiveController;
use yii\web\Response;

class PlanonutricaoController extends ActiveController
{
    public $modelClass = 'common\models\Planonutricao';

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
        $planonutricaoModel = new $this->modelClass;
        $recs = $planonutricaoModel::find()->all();
        return ['total' => count($recs)];
    }
}