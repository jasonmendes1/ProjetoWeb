<?php

namespace api\modules\v1\controllers;

use common\models\User;
use yii\rest\ActiveController;
use yii\web\Response;
use Yii;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

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

    public function actionCliente($id)
    {
        $user = new $this->modelClass;
        $userRecord = $user::find()->where("Id=" . '\'' . $id . '\'')->one();
        $cliente = array();

        array_push(
            $cliente,
            [
                "UserUsername" => $userRecord->username,
                "ClientePrimeiroNome" => $userRecord->cliente->primeiroNome,
                "ClienteApelido" => $userRecord->cliente->apelido,
                "ClienteDataNasc" => $userRecord->cliente->dt_nascimento,
                "ClienteSexo" => $userRecord->cliente->sexo,
                "ClienteAvatar" => $userRecord->cliente->avatar,
                "ClienteNumTele" => $userRecord->cliente->num_tele,
                "ClienteNIF" => $userRecord->cliente->nif,
                "ClienteAltura" => $userRecord->cliente->altura,
                "ClientePeso" => $userRecord->cliente->peso,
                "ClienteMassaMuscular" => $userRecord->cliente->massa_muscular,
                "ClienteMassaGorda" => $userRecord->cliente->massa_gorda,
                "UserEmail" => $userRecord->email,
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
        $userRecord = $user::find()->where("Id=" . '\'' . $idUser . '\'')->one();
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