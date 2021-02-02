<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cliente_funcionarios".
 *
 * @property int $id
 * @property int $id_cliente
 * @property int $id_PT
 * @property int $id_nutricionista
 *
 * @property Cliente $cliente
 * @property Funcionario $pT
 * @property Funcionario $nutricionista
 */
class ClienteFuncionarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente_funcionarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente', 'id_PT', 'id_nutricionista'], 'required'],
            [['id_cliente', 'id_PT', 'id_nutricionista'], 'integer'],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_cliente' => 'IDCliente']],
            [['id_PT'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['id_PT' => 'IDFuncionario']],
            [['id_nutricionista'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['id_nutricionista' => 'IDFuncionario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_cliente' => 'Id Cliente',
            'id_PT' => 'Id Pt',
            'id_nutricionista' => 'Id Nutricionista',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['IDCliente' => 'id_cliente']);
    }

    /**
     * Gets query for [[PT]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPT()
    {
        return $this->hasOne(Funcionario::className(), ['IDFuncionario' => 'id_PT']);
    }

    /**
     * Gets query for [[Nutricionista]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNutricionista()
    {
        return $this->hasOne(Funcionario::className(), ['IDFuncionario' => 'id_nutricionista']);
    }
}
