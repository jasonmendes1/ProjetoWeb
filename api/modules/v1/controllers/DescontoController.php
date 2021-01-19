<?php

namespace api\modules\v1\controllers;

use common\models\Desconto;
use yii\rest\ActiveController;
use yii\web\Response;

class DescontoController extends ActiveController
{
    public $modelClass = 'common\models\Desconto';

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
    public function actionNome($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->nome;
    }
    public function actionQuantidade($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->quantidade;
    }
}