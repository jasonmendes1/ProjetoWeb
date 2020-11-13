<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use frontend\models\Cliente;

class SignupCliente extends Model{

    public $username;
    public $password;
    public $email;
    public $primeiroNome;
    public $apelido;
    public $dtNascimento;
    public $userId;
    public $sexo;
    public $numtele;
    public $nif;
    public $profilepic;


    public function rules(){
        return[];
    }

    public function signup(){
        $user = new User();
        $cliente = new Cliente();

        $user->username = $this->$username;
        $user->password = $this->$password;
        $user->primeiroNome = $this->$primeiroNome;
        $user->apelido = $this->$apelido;
        $user->email = $this->$email;
        $user->sexo = $this->$sexo;
        $user->num_tele = $this->$numtele;
        $user->dtNascimento = date('Y-m-d');
        
        $cliente->nif = $this->$nif;

        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        $user->save();
        $cliente->User_id = $user->id;
        $cliente->save();

        $auth = Yii::$app->authManager;
        $authorRole = $auth->getRole('cliente');
        $auth->assign($authorRole, $user->getId());

        return $user->save();
    }
}

