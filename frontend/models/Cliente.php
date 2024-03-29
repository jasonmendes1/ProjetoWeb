<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $User_id
 * @property int $IDCliente
 * @property string $primeiroNome
 * @property string $apelido
 * @property string $dt_nascimento
 * @property string $sexo
 * @property string $avatar
 * @property int $num_tele
 * @property int $nif
 * @property float|null $altura
 * @property float|null $peso
 * @property int|null $massa_muscular
 * @property int|null $massa_gorda
 *
 * @property User $user
 * @property ClienteFuncionarios[] $clienteFuncionarios
 * @property ListaPlanos[] $listaPlanos
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
            [['User_id', 'primeiroNome', 'apelido', 'dt_nascimento', 'sexo', 'avatar', 'num_tele', 'nif'], 'required'],
            [['User_id', 'num_tele', 'nif', 'massa_muscular', 'massa_gorda'], 'integer'],
            [['dt_nascimento'], 'safe'],
            [['altura', 'peso'], 'number'],
            [['primeiroNome', 'apelido'], 'string', 'max' => 100],
            [['sexo'], 'string', 'max' => 20],
            [['avatar'], 'string', 'max' => 255],
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
            'IDCliente' => 'Id Cliente',
            'primeiroNome' => 'Primeiro Nome',
            'apelido' => 'Apelido',
            'dt_nascimento' => 'Dt Nascimento',
            'sexo' => 'Sexo',
            'avatar' => 'Avatar',
            'num_tele' => 'Num Tele',
            'nif' => 'Nif',
            'altura' => 'Altura',
            'peso' => 'Peso',
            'massa_muscular' => 'Massa Muscular',
            'massa_gorda' => 'Massa Gorda',
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
     * Gets query for [[ClienteFuncionarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClienteFuncionarios()
    {
        return $this->hasMany(ClienteFuncionarios::className(), ['id_cliente' => 'IDCliente']);
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
     * Gets query for [[Subscricaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubscricaos()
    {
        return $this->hasMany(Subscricao::className(), ['id_cliente' => 'IDCliente']);
    }
}
