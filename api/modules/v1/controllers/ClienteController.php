<?php

namespace api\modules\v1\controllers;

use common\models\Cliente;
use yii\rest\ActiveController;
use yii\web\Response;

class ClienteController extends ActiveController
{
    public $modelClass = 'common\models\Cliente';

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
        $cliModel = new $this->modelClass;
        $recs = $cliModel::find()->all();
        return ['total' => count($recs)];
    }
}