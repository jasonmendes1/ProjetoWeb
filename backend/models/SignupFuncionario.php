<?php

namespace backend\models;

use frontend\models\Funcionario;
use Yii;
use yii\base\Model;
use common\models\User;

class SignupFuncionario extends Model{

    public $username;
    public $password;
    public $email;
    public $primeiroNome;
    public $apelido;
    public $dtNascimento;
    public $userId;
    public $sexo;
    public $numtele;
    public $cargoId;


    public function rules(){
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            [['User_id', 'primeiroNome', 'apelido', 'dt_nascimento', 'sexo', 'num_tele', 'cargo_id'], 'required'],
            [['User_id', 'num_tele', 'cargo_id'], 'integer'],
            [['dt_nascimento'], 'safe'],
            [['primeiroNome', 'apelido'], 'string', 'max' => 100],
            [['sexo'], 'string', 'max' => 20],
            [['avatar'], 'string', 'max' => 255],
            [['User_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['User_id' => 'id']],
        ];
    }

    public function signup($getAvatar){
        $avatardefaultdir = '/web/ProjetoWeb/common/avatar';

        $user = new User();
        $funcionario = new Funcionario();

        $user->username = $this->username;
        $user->password = $this->password;
        $user->primeiroNome = $this->primeiroNome;
        $user->apelido = $this->apelido;
        $user->email = $this->email;
        $user->sexo = $this->sexo;
        $user->num_tele = $this->numtele;
        $user->dtNascimento = date('Y-m-d');

        $funcionario->cargo_id = $this->cargoId;

        if($getAvatar == null){
            $funcionario->avatar = '/web/ProjetoWeb/common/avatar/avatar-windows-10-person-ico-115628997732fatjfxg5s.png';
        }else{
            $funcionario->avatar = $avatardefaultdir . "/" . $getAvatar;
        }

        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->status = 10;


        $user->save();
        $funcionario->User_id = $user->id;
        $funcionario->save();

        $auth = Yii::$app->authManager;
        $authorRole = $auth->getRole('funcionario');
        $auth->assign($authorRole, $user->getId());

        return $user->save();
    }
}

