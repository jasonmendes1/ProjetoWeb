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
    public $dt_nascimento;
    public $userId;
    public $sexo;
    public $num_tele;
    public $cargo_id;
    public $avatar;

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
        $funcionario->primeiroNome = $this->primeiroNome;
        $funcionario->apelido = $this->apelido;
        $user->email = $this->email;
        $funcionario->sexo = $this->sexo;
        $funcionario->num_tele = $this->num_tele;
        $funcionario->dt_nascimento = date('Y-m-d');

        $funcionario->cargo_id = $this->cargo_id;

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

        $auth = Yii::$app->authManager;
        $authorRole = $auth->getRole('funcionario');
        $auth->assign($authorRole, $user->getId());

        return $funcionario->save();
    }
}

