<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\web\Response;

class ListaPlanosController extends ActiveController
{
    public $modelClass = 'common\models\ListaPlanos';
    public $modelCliente = 'common\models\Cliente';


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
        $descontoModel = new $this->modelClass;
        $recs = $descontoModel::find()->all();
        return ['total' => count($recs)];
    }
}
