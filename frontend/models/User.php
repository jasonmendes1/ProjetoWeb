<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 * @property string $primeiroNome
 * @property string $apelido
 * @property string $dt_nascimento
 * @property string $sexo
 * @property string|null $avatar
 * @property int $num_tele
 *
 * @property Cliente[] $clientes
 * @property Funcionario[] $funcionarios
 * @property Funcionario $id0
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'primeiroNome', 'apelido', 'dt_nascimento', 'sexo', 'num_tele'], 'required'],
            [['status', 'created_at', 'updated_at', 'num_tele'], 'integer'],
            [['dt_nascimento'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token', 'primeiroNome', 'apelido', 'avatar'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['sexo'], 'string', 'max' => 50],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['id' => 'User_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
            'primeiroNome' => 'Primeiro Nome',
            'apelido' => 'Apelido',
            'dt_nascimento' => 'Dt Nascimento',
            'sexo' => 'Sexo',
            'avatar' => 'Avatar',
            'num_tele' => 'Num Tele',
        ];
    }

    /**
     * Gets query for [[Clientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Cliente::className(), ['User_id' => 'id']);
    }

    /**
     * Gets query for [[Funcionarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarios()
    {
        return $this->hasMany(Funcionario::className(), ['User_id' => 'id']);
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Funcionario::className(), ['User_id' => 'id']);
    }
}
