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
    //por acabar
    public function actionNomeementa($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->nomeEmenta;
    }
    public function actionSegundapeqalmoco($id){
        $models = new $this->modelClass;
        $modelEmenta = new $this->modelEmenta;
        $model = $models::findOne($id);
        $modelEmenta->IDEmenta = $model->Segunda;

        return $model->ementa->PequenoAlmoco;
    }
    public function actionSegundaalmoco($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->Almoco;
    }
    public function actionSegundalanche1($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Lanche1;
    }
    public function actionSegundalanche2($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Lanche2;
    }
    public function actionSegundajantar($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Jantar;
    }
    public function actionTercapeqalmoco($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->PequenoAlmoco;
    }
    public function actionTercaalmoco($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Almoco;
    }
    public function actionTercalanche1($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Lanche1;
    }
    public function actionTercalanche2($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Lanche2;
    }
    public function actionTercajantar($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Jantar;
    }
    public function actionQuartapeqalmoco($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->PequenoAlmoco;
    }
    public function actionQuartaalmoco($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Almoco;
    }
    public function actionQuartalanche1($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Lanche1;
    }
    public function actionQuartalanche2($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Lanche2;
    }
    public function actionQuartajantar($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Jantar;
    }
    public function actionQuintapeqalmoco($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->PequenoAlmoco;
    }
    public function actionQuintaalmoco($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Almoco;
    }
    public function actionQuintalanche1($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Lanche1;
    }
    public function actionQuintalanche2($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Lanche2;
    }
    public function actionQuintajantar($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Jantar;
    }
    public function actionSextapeqalmoco($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->PequenoAlmoco;
    }
    public function actionSextaalmoco($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Almoco;
    }
    public function actionSextalanche1($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Lanche1;
    }
    public function actionSextalanche2($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Lanche2;
    }
    public function actionSextajantar($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Jantar;
    }
    public function actionSabadopeqalmoco($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->PequenoAlmoco;
    }
    public function actionSabadoalmoco($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Almoco;
    }
    public function actionSabadolanche1($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Lanche1;
    }
    public function actionSabadolanche2($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Lanche2;
    }
    public function actionSabadojantar($id){
        $models = new $this->modelEmenta;
        $model = $models::findOne($id);

        return $model->Jantar;
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
                "Segunda" => $userRecord->segunda,
                "Terca" => $userRecord->terca,
                "Quarta" => $userRecord->quarta,
                "Quinta" => $userRecord->quinta,
                "Sexta" => $userRecord->sexta,
                "Sabado" => $userRecord->sabado,
            ]
        );
        return $planonutricao;
    }
}