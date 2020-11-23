<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use frontend\models\Cliente;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    public $primeiroNome;
    public $apelido;
    public $avatar;
    public $num_tele;
    public $nif;
    public $userId;
    public $sexo;
    public $dt_nascimento;
    public $data;



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
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

            [['User_id', 'primeiroNome', 'apelido', 'dt_nascimento', 'sexo', 'num_tele', 'nif'], 'required'],
            [['User_id', 'num_tele', 'nif'], 'integer'],
            [['dt_nascimento'], 'safe'],
            [['primeiroNome', 'apelido'], 'string', 'max' => 100],
            [['sexo'], 'string', 'max' => 20],
            [['avatar'], 'string', 'max' => 255],
            [['User_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['User_id' => 'id']],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup($getAvatar)
    {
        $avatardefaultdir = '/web/ProjetoWeb/common/avatar';

        $user = new User();
        $cliente = new Cliente();

        $user->username = $this->username;
        $user->email = $this->email;
        
        $cliente->primeiroNome = $this->primeiroNome;
        $cliente->apelido = $this->apelido;
        $cliente->dt_nascimento = $this->dt_nascimento;
        $cliente->sexo = $this->sexo;
        $cliente->num_tele = $this->num_tele;
        $cliente->nif = $this->nif;

        if($getAvatar == null){
            $cliente->avatar = '/web/ProjetoWeb/common/avatar/avatar-windows-10-person-ico-115628997732fatjfxg5s.png';
        }else{
            $cliente->avatar = $avatardefaultdir . "/" . $getAvatar;
        }

        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->status = 10;

        $user->save();
        $cliente->User_id = $user->id;
        $cliente->save();

        return $cliente->save();

        /*
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save() && $this->sendEmail($user);
        */
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
