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
        $clientRecord = $user::find()->where("User_ID=" . $id)->one();
        $cliente = array();

        array_push(
            $cliente,
            [
                "IDCliente" => $clientRecord->IDCliente,
                "UserUsername" => $clientRecord->user->username,
                "ClientePrimeiroNome" => $clientRecord->primeiroNome,
                "ClienteApelido" => $clientRecord->apelido,
                "ClienteDataNasc" => $clientRecord->dt_nascimento,
                "ClienteSexo" => $clientRecord->sexo,
                "ClienteAvatar" => $clientRecord->avatar,
                "ClienteNumTele" => $clientRecord->num_tele,
                "ClienteNIF" => $clientRecord->nif,
                "ClienteAltura" => $clientRecord->altura,
                "ClientePeso" => $clientRecord->peso,
                "ClienteMassaMuscular" => $clientRecord->massa_muscular,
                "ClienteMassaGorda" => $clientRecord->massa_gorda,
                "UserEmail" => $clientRecord->user->email,
                "DataSubscricao" => $clientRecord->subscricaos[0]->data_subscricao,
                "DataExpirar" => $clientRecord->subscricaos[0]->data_expirar,
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
        $clienteRecord = $cliente::find()->where("User_ID=" . '\'' . $userRecord->cliente->IDCliente . '\'')->one();
        
        $clienteNome = $request->get('ClientePrimeiroNome');
        $clienteApelido = $request->get('ClienteApelido');
        $clienteDataNasc = $request->get('ClienteDataNasc');
        $clienteNumTele = $request->get('ClienteNumTele');
        $clienteNIF = $request->get('ClienteNIF');
        $clienteSexo = $request->get('ClienteSexo');
        $clienteAvatar = $request->get('ClienteAvatar');
        $clienteAltura = $request->get('ClienteAltura');
        $clientePeso = $request->get('ClientePeso');
        $clienteMassaMuscular = $request->get('ClienteMassaMuscular');
        $clienteMassaGorda = $request->get('ClienteMassaGorda');

        $clienteRecord->primeiroNome = $clienteNome;
        $clienteRecord->apelido = $clienteApelido;
        $clienteRecord->dt_nascimento = $clienteDataNasc;
        $clienteRecord->num_tele = $clienteNumTele;
        $clienteRecord->nif = $clienteNIF;
        $clienteRecord->sexo = $clienteSexo;
        $clienteRecord->avatar = $clienteAvatar;
        $clienteRecord->altura = $clienteAltura;
        $clienteRecord->peso = $clientePeso;
        $clienteRecord->massa_muscular = $clienteMassaMuscular;
        $clienteRecord->massa_gorda = $clienteMassaGorda;

        $userRecord->save();
        $clienteRecord->save(false);

        return $clienteRecord->Id;
    }
}