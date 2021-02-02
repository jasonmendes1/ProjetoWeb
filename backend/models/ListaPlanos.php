<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "lista_planos".
 *
 * @property int|null $IDPlanoTreino
 * @property int|null $IDPlanoNutricao
 * @property int $IDCliente
 *
 * @property Cliente $iDCliente
 */
class ListaPlanos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lista_planos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDPlanoTreino', 'IDPlanoNutricao', 'IDCliente'], 'integer'],
            [['IDCliente'], 'required'],
            [['IDCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['IDCliente' => 'User_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDPlanoTreino' => 'Id Plano Treino',
            'IDPlanoNutricao' => 'Id Plano Nutricao',
            'IDCliente' => 'Id Cliente',
        ];
    }

    /**
     * Gets query for [[IDCliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDCliente()
    {
        return $this->hasOne(Cliente::className(), ['User_id' => 'IDCliente']);
    }
}
