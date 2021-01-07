<?php

namespace api\modules\v1\controllers;

use common\models\User;
use yii\rest\ActiveController;
use yii\web\Response;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';
    public $modelCliente = 'common\models\Cliente';
    public $modelFuncionario = 'common\models\Funcionario';


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
        $userModel = new $this->modelClass;
        $recs = $userModel::find()->all();
        return ['total' => count($recs)];
    }

    public function actionUsernameget($id){
        $model = new $this->modelClass;
        $req = $model::findOne($id);
        return $req->username;
    }

    public function actionAuthkeyget($id){
        $model = new $this->modelClass;
        $req = $model::findOne($id);
        return $req->auth_key;
    }

    public function actionEmailget($id){
        $model = new $this->modelClass;
        $req = $model::findOne($id);
        return $req->email;
    }
    public function actionCliente($id){
        $modelsUser = new $this->modelClass;
        $modelsProfile = new $this->modelCliente;

        $user = $modelsUser->findOne($id);
        $cliente = $modelsProfile::find()->where(['user_id' => $user->id])->one();
        return $cliente;
    }
    public function actionFuncionario($id){
        $modelsUser = new $this->modelClass;
        $modelsProfile = new $this->modelFuncionario;

        $user = $modelsUser->findOne($id);
        $funcionario = $modelsProfile::find()->where(['user_id' => $user->id])->one();
        return $funcionario;
    }

}