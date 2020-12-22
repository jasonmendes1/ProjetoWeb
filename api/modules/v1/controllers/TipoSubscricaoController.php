<?php

namespace api\modules\v1\controllers;

use common\models\TipoSubscricao;
use yii\rest\ActiveController;
use yii\web\Response;

class TiposubscricaoController extends ActiveController
{
    public $modelClass = 'common\models\TipoSubscricao';

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
        $tiposubscricaoModel = new $this->modelClass;
        $recs = $tiposubscricaoModel::find()->all();
        return ['total' => count($recs)];
    }
}