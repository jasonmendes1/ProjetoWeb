<?php

namespace api\modules\v1\controllers;

use common\models\Planonutricao;
use common\models\Ementa;
use yii\rest\ActiveController;
use yii\web\Response;

class PlanonutricaoController extends ActiveController
{
    public $modelClass = 'common\models\Planonutricao';
    public $modelEmenta = 'common\models\Ementa';

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
    public function actionNomeementaseg($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->segunda->nomeEmenta;
    }
    public function actionNomeementater($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->terca->nomeEmenta;
    }
    public function actionNomeementaqua($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->quarta->nomeEmenta;
    }
    public function actionNomeementaqui($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->quinta->nomeEmenta;
    }
    public function actionNomeementasex($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->sexta->nomeEmenta;
    }
    public function actionNomeementasab($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->sabado->nomeEmenta;
    }
    //Segunda
    public function actionSegundapeqalmoco($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->segunda->PequenoAlmoco;
    }
    public function actionSegundaalmoco($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->segunda->Almoco;
    }
    public function actionSegundalanche1($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->segunda->Lanche1;
    }
    public function actionSegundalanche2($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->segunda->Lanche2;
    }
    public function actionSegundajantar($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->segunda->Jantar;
    }
    //terca
    public function actionTercapeqalmoco($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->terca->PequenoAlmoco;
    }
    public function actionTercaalmoco($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->terca->Almoco;
    }
    public function actionTercalanche1($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->terca->Lanche1;
    }
    public function actionTercalanche2($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->terca->Lanche2;
    }
    public function actionTercajantar($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->terca->Jantar;
    }
    //quarta
    public function actionQuartapeqalmoco($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->quarta->PequenoAlmoco;
    }
    public function actionQuartaalmoco($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->quarta->Almoco;
    }
    public function actionQuartalanche1($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->quarta->Lanche1;
    }
    public function actionQuartalanche2($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->quarta->Lanche2;
    }
    public function actionQuartajantar($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->quarta->Jantar;
    }
    //quinta
    public function actionQuintapeqalmoco($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->quinta->PequenoAlmoco;
    }
    public function actionQuintaalmoco($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->quinta->Almoco;
    }
    public function actionQuintalanche1($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->quinta->Lanche1;
    }
    public function actionQuintalanche2($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->quinta->Lanche2;
    }
    public function actionQuintajantar($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->quinta->Jantar;
    }
    //sexta
    public function actionSextapeqalmoco($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->sexta->PequenoAlmoco;
    }
    public function actionSextaalmoco($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->sexta->Almoco;
    }
    public function actionSextalanche1($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->sexta->Lanche1;
    }
    public function actionSextalanche2($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->sexta->Lanche2;
    }
    public function actionSextajantar($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->sexta->Jantar;
    }
    //sabado
    public function actionSabadopeqalmoco($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->sabado->PequenoAlmoco;
    }
    public function actionSabadoalmoco($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->sabado->Almoco;
    }
    public function actionSabadolanche1($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->sabado->Lanche1;
    }
    public function actionSabadolanche2($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->sabado->Lanche2;
    }
    public function actionSabadojantar($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->sabado->Jantar;
    }

    
    public function actionGetplanonutricao($id)
    {
        $user = new $this->modelClass;
        $userRecord = $user::find()->where("IDPlanoNutricao=" . $id)->one();
        $planonutricao = array();


        array_push(
            $planonutricao,
            [
                "IDPlanoNutricao" => $userRecord->IDPlanoNutricao,
                "Segunda" => $userRecord->segunda->IDEmenta,
                "Terca" => $userRecord->terca->IDEmenta,
                "Quarta" => $userRecord->quarta->IDEmenta,
                "Quinta" => $userRecord->quinta->IDEmenta,
                "Sexta" => $userRecord->sexta->IDEmenta,
                "Sabado" => $userRecord->sabado->IDEmenta,
                "Semana" => $userRecord->Semana,
            ]
        );
        return $planonutricao;
    }
}