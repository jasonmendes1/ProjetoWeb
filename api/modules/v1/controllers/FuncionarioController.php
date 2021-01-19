<?php

namespace api\modules\v1\controllers;

use common\models\Funcionario;
use common\models\Cargo;
use yii\rest\ActiveController;
use yii\web\Response;

class FuncionarioController extends ActiveController
{
    public $modelClass = 'common\models\Funcionario';
    public $modelCargo = 'common\models\Cargo';


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
        $funcionarioModel = new $this->modelClass;
        $recs = $funcionarioModel::find()->all();
        return ['total' => count($recs)];
    }
    public function actionPrimeironome($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->primeiroNome;
    }
    public function actionApelido($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->apelido;
    }
    public function actionDatanasc($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->dt_nascimento;
    }
    public function actionSexo($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->sexo;
    }
    public function actionNumtele($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->num_tele;
    }
    public function actionCargo($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);

        return $model->cargo->cargo;
    }
}