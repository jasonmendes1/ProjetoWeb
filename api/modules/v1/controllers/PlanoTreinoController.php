<?php

namespace api\modules\v1\controllers;

use common\models\Planotreino;
use common\models\Exercicio;
use common\models\ListaPlanos;
use common\models\Funcionario;
use yii\rest\ActiveController;
use yii\web\Response;

class PlanotreinoController extends ActiveController
{
    public $modelClass = 'common\models\Planotreino';
    public $modelExercicios = 'common\models\Exercicio';
    public $modelFuncionario = 'common\models\Funcionario';
    public $modelListaPlanos = 'common\models\ListaPlanos';

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
        $planotreinoModel = new $this->modelClass;
        $recs = $planotreinoModel::find()->all();
        return ['total' => count($recs)];
    }
    public function actionPersonaltrainer($id){ 
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->pT->primeiroNome;
    }

    public function actionDiatreino($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->dia_treino;
    }
    public function actionSemana($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->semana;
    }

    public function actionGetplanotreino($id)
    {
        $planotreino = new $this->modelClass;
        $planotreinoRecord = $planotreino::find()->where("IDPlanoTreino=" . $id)->one();
        $planotreino = array();



        array_push(
            $planotreino,
            [
                "IDPlanoTreino" => $planotreinoRecord->IDPlanoTreino,
                "id_PT" => $planotreinoRecord->id_PT,
                "dia_treino" => $planotreinoRecord->dia_treino,
                "semana" => $planotreinoRecord->semana,
            ]
        );
        return $planotreino;
    }

    public function actionGetexercicios($idcliente){
        $models = new $this->modelClass;
        $modelsExercicio = new $this->modelExercicios;
        $modelLista = new $this->modelListaPlanos;
        $modelListaFind = $modelLista::find()->where("IDCliente=" . $idcliente)->one();
        $modelExercicioFind = $modelsExercicio::find()->where("IDPlanoTreino=" . $modelListaFind->IDPlanoTreino)->one();
        $modelPlanoFind = $models::find()->where("IDPlanoTreino=" . $modelListaFind->IDPlanoTreino)->one();

        $planotreino = array();

        array_push(
            $planotreino,
            [
                "IDPlanoTreino" => $modelListaFind->IDPlanoTreino,
                "IDCliente" => $modelListaFind->IDCliente,
                "Personal Trainer" => $modelPlanoFind->pT->primeiroNome,
                "id_PT" => $modelPlanoFind->id_PT,
                "dia_treino" => $modelPlanoFind->dia_treino,
                "semana" => $modelPlanoFind->semana,
                "Nome" => $modelExercicioFind->nome,
                "repeticoes" => $modelExercicioFind->repeticoes,
                "tempo" => $modelExercicioFind->tempo,
                "serie" => $modelExercicioFind->serie,
                "repouso" => $modelExercicioFind->repouso,
                "tempo_total" => $modelExercicioFind->tempo_total,
                "num_maquina" => $modelExercicioFind->num_maquina,
            ]
        );
        
        return $planotreino;

    }
}