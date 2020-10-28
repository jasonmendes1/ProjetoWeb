<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $User_id
 * @property string $primeiroNome
 * @property string $apelido
 * @property string $dt_nascimento
 * @property string $sexo
 * @property int $IDCliente
 * @property resource $avatar
 * @property int $nif
 * @property int $num_tele
 *
 * @property User $user
 * @property ListaPlanos[] $listaPlanos
 * @property PlanosTreino[] $planosTreinos
 * @property Subscricao[] $subscricaos
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_id', 'primeiroNome', 'apelido', 'dt_nascimento', 'sexo', 'avatar', 'nif', 'num_tele'], 'required'],
            [['User_id', 'nif', 'num_tele'], 'integer'],
            [['dt_nascimento'], 'safe'],
            [['avatar'], 'string'],
            [['primeiroNome', 'apelido', 'sexo'], 'string', 'max' => 50],
            [['User_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['User_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'User_id' => 'User ID',
            'primeiroNome' => 'Primeiro Nome',
            'apelido' => 'Apelido',
            'dt_nascimento' => 'Dt Nascimento',
            'sexo' => 'Sexo',
            'IDCliente' => 'Id Cliente',
            'avatar' => 'Avatar',
            'nif' => 'Nif',
            'num_tele' => 'Num Tele',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'User_id']);
    }

    /**
     * Gets query for [[ListaPlanos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getListaPlanos()
    {
        return $this->hasMany(ListaPlanos::className(), ['IDCliente' => 'IDCliente']);
    }

    /**
     * Gets query for [[PlanosTreinos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanosTreinos()
    {
        return $this->hasMany(PlanosTreino::className(), ['id_cliente' => 'IDCliente']);
    }

    /**
     * Gets query for [[Subscricaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubscricaos()
    {
        return $this->hasMany(Subscricao::className(), ['id_cliente' => 'IDCliente']);
    }
}
