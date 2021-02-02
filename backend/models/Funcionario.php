<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "funcionario".
 *
 * @property int $User_id
 * @property int $IDFuncionario
 * @property string $primeiroNome
 * @property string $apelido
 * @property string $dt_nascimento
 * @property string $sexo
 * @property string $avatar
 * @property int $num_tele
 * @property int $cargo_id
 *
 * @property ClienteFuncionarios[] $clienteFuncionarios
 * @property ClienteFuncionarios[] $clienteFuncionarios0
 * @property Cargo $cargo
 * @property User $user
 * @property Planosnutricao[] $planosnutricaos
 * @property Planostreino[] $planostreinos
 */
class Funcionario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funcionario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_id', 'primeiroNome', 'apelido', 'dt_nascimento', 'sexo', 'avatar', 'num_tele', 'cargo_id'], 'required'],
            [['User_id', 'num_tele', 'cargo_id'], 'integer'],
            [['dt_nascimento'], 'safe'],
            [['primeiroNome', 'apelido'], 'string', 'max' => 100],
            [['sexo'], 'string', 'max' => 20],
            [['avatar'], 'string', 'max' => 255],
            [['cargo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['cargo_id' => 'IDCargo']],
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
            'IDFuncionario' => 'Id Funcionario',
            'primeiroNome' => 'Primeiro Nome',
            'apelido' => 'Apelido',
            'dt_nascimento' => 'Dt Nascimento',
            'sexo' => 'Sexo',
            'avatar' => 'Avatar',
            'num_tele' => 'Num Tele',
            'cargo_id' => 'Cargo ID',
        ];
    }

    /**
     * Gets query for [[ClienteFuncionarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClienteFuncionarios()
    {
        return $this->hasMany(ClienteFuncionarios::className(), ['id_PT' => 'IDFuncionario']);
    }

    /**
     * Gets query for [[ClienteFuncionarios0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClienteFuncionarios0()
    {
        return $this->hasMany(ClienteFuncionarios::className(), ['id_nutricionista' => 'IDFuncionario']);
    }

    /**
     * Gets query for [[Cargo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCargo()
    {
        return $this->hasOne(Cargo::className(), ['IDCargo' => 'cargo_id']);
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
     * Gets query for [[Planosnutricaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanosnutricaos()
    {
        return $this->hasMany(Planosnutricao::className(), ['IDNutricionista' => 'IDFuncionario']);
    }

    /**
     * Gets query for [[Planostreinos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanostreinos()
    {
        return $this->hasMany(Planostreino::className(), ['id_PT' => 'IDFuncionario']);
    }
}
