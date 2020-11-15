<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lista_planos".
 *
 * @property int $IDPlano
 * @property int $IDCliente
 *
 * @property PlanosTreino $iDPlano
 * @property Cliente $iDCliente
 * @property Planonutricao $iDPlano0
 */
class Lista_Planos extends \yii\db\ActiveRecord
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
            [['IDPlano', 'IDCliente'], 'required'],
            [['IDPlano', 'IDCliente'], 'integer'],
            [['IDPlano'], 'exist', 'skipOnError' => true, 'targetClass' => PlanosTreino::className(), 'targetAttribute' => ['IDPlano' => 'IDPlanoTreino']],
            [['IDCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['IDCliente' => 'IDCliente']],
            [['IDPlano'], 'exist', 'skipOnError' => true, 'targetClass' => Planonutricao::className(), 'targetAttribute' => ['IDPlano' => 'IDPlanoNutricao']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDPlano' => 'Id Plano',
            'IDCliente' => 'Id Cliente',
        ];
    }

    /**
     * Gets query for [[IDPlano]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDPlano()
    {
        return $this->hasOne(PlanosTreino::className(), ['IDPlanoTreino' => 'IDPlano']);
    }

    /**
     * Gets query for [[IDCliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDCliente()
    {
        return $this->hasOne(Cliente::className(), ['IDCliente' => 'IDCliente']);
    }

    /**
     * Gets query for [[IDPlano0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDPlano0()
    {
        return $this->hasOne(Planonutricao::className(), ['IDPlanoNutricao' => 'IDPlano']);
    }
}
