<?php

namespace api\modules\v1\controllers;

use common\models\Cliente;
use Yii;
use yii\rest\ActiveController;
use yii\web\Response;

class ClienteController extends ActiveController
{
    public $modelClass = 'common\models\Cliente';
    public $modelSubscricao = 'common\models\Subscricao';


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
        $cliModel = new $this->modelClass;
        $recs = $cliModel::find()->all();
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
    public function actionNif($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->nif;
    }
    public function actionAltura($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->altura;
    }
    public function actionPeso($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->peso;
    }
    public function actionMassamuscular($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->massa_muscular;
    }
    public function actionMassagorda($id){
        $models = new $this->modelClass;
        $model = $models::findOne($id);
        return $model->massa_gorda;
    }

    public function actionGet($id)
    {
        $user = new $this->modelClass;
        $userRecord = $user::find()->where("User_ID=" . $id)->one();
        $subscricaoModel = new $this->modelSubscricao;
        $cliente = array();

       // $subscricaoRecord = $subscricaoModel::find()->where("User_ID=" . $userRecord->cliente->subscricao->IDSubscricao)->one();

        array_push(
            $cliente,
            [
                "UserUsername" => $userRecord->user->username,
                "ClientePrimeiroNome" => $userRecord->primeiroNome,
                "ClienteApelido" => $userRecord->apelido,
                "ClienteDataNasc" => $userRecord->dt_nascimento,
                "ClienteSexo" => $userRecord->sexo,
                "ClienteAvatar" => $userRecord->avatar,
                "ClienteNumTele" => $userRecord->num_tele,
                "ClienteNIF" => $userRecord->nif,
                "ClienteAltura" => $userRecord->altura,
                "ClientePeso" => $userRecord->peso,
                "ClienteMassaMuscular" => $userRecord->massa_muscular,
                "ClienteMassaGorda" => $userRecord->massa_gorda,
                "UserEmail" => $userRecord->user->email,
                //"DataSubscricao" => $subscricaoRecord->data_subscricao,
                //"DataExpirar" => $subscricaoRecord->data_expirar,
            ]
        );
        return $cliente;
    }

    public function actionEdit()
    {
        $request = Yii::$app->request;

        $idUser = $request->get('IdUser');
        $user = new $this->modelClass;
        $cliente = new $this->modelCliente;
        $userRecord = $user::find()->where("User_ID=" . '\'' . $idUser . '\'')->one();
        $clienteRecord = $cliente::find()->where("Id=" . '\'' . $userRecord->cliente->Id . '\'')->one();
        
        $clienteNome = $request->get('ClientePrimeiroNome');
        $clienteApelido = $request->get('ClienteApelido');
        $clienteDataNasc = $request->get('ClienteDataNasc');
        $clienteSexo = $request->get('ClienteSexo');
        $clienteNumTele = $request->get('ClienteNumTele');
        $clienteNIF = $request->get('ClienteNIF');
        $clienteAltura = $request->get('ClienteAltura');
        $clientePeso = $request->get('ClientePeso');
        $clienteMassaMuscular = $request->get('ClienteMassaMuscular');
        $clienteMassaGorda = $request->get('ClienteMassaGorda');

        $clienteRecord->primeiroNome = $clienteNome;
        $clienteRecord->apelido = $clienteApelido;
        $clienteRecord->dt_nascimento = $clienteDataNasc;
        $clienteRecord->sexo = $clienteSexo;
        $clienteRecord->num_tele = $clienteNumTele;
        $clienteRecord->nif = $clienteNIF;
        $clienteRecord->altura = $clienteAltura;
        $clienteRecord->peso = $clientePeso;
        $clienteRecord->massa_muscular = $clienteMassaMuscular;
        $clienteRecord->massa_gorda = $clienteMassaGorda;

        $userRecord->save();
        $clienteRecord->save(false);

        return $clienteRecord->Id;
    }
}