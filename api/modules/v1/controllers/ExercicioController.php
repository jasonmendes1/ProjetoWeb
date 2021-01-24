<?php

namespace api\modules\v1\controllers;

use common\models\Exercicio;
use common\models\Planotreino;
use yii\rest\ActiveController;
use yii\web\Response;

class ExercicioController extends ActiveController
{
    public $modelClass = 'common\models\Exercicio';
    public $modelPlanotreino = 'common\models\Planotreino';


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

    public function actionPlanotreino($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->IDPlanoTreino;
    }
    public function actionNome($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->nome;
    }
    public function actionRepeticoes($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->repeticoes;
    }
    public function actionTempo($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->tempo;
    }
    public function actionSerie($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->serie;
    }
    public function actionRepouso($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->repouso;
    }
    public function actionTempototal($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->tempo_total;
    }
    public function actionNummaquina($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->num_maquina;
    }
}
