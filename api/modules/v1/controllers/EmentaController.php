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
    public function actionNomeementa($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->nomeEmenta;
    }
    public function actionPequenoalmoco($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->PequenoAlmoco;
    }
    public function actionAlmoco($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->Almoco;
    }
    public function actionLanche1($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->Lanche1;
    }
    public function actionLanche2($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->Lanche2;
    }
    public function actionJantar($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->Jantar;
    }
}