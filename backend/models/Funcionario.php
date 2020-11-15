<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "funcionario".
 *
 * @property int $User_id
 * @property int $IDFuncionario
 * @property int $cargo_id
 *
 * @property User $user
 * @property Cargo $cargo
 * @property Planonutricao[] $planonutricaos
 * @property User $user0
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
            [['User_id', 'cargo_id'], 'required'],
            [['User_id', 'cargo_id'], 'integer'],
            [['User_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['User_id' => 'id']],
            [['cargo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['cargo_id' => 'IDCargo']],
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
            'cargo_id' => 'Cargo ID',
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
     * Gets query for [[Cargo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCargo()
    {
        return $this->hasOne(Cargo::className(), ['IDCargo' => 'cargo_id']);
    }

    /**
     * Gets query for [[Planonutricaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanonutricaos()
    {
        return $this->hasMany(Planonutricao::className(), ['IDNutricionista' => 'IDFuncionario']);
    }

    /**
     * Gets query for [[User0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'User_id']);
    }
}
