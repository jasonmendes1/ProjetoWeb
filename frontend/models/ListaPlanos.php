<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "lista_planos".
 *
 * @property int $IDPlanoTreino
 * @property int $IDPlanoNutricao
 * @property int $IDCliente
 *
 * @property Cliente $iDCliente
 * @property PlanosTreino $iDPlanoTreino
 * @property PlanosNutricao $iDPlanoNutricao
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
            [['IDPlanoTreino', 'IDPlanoNutricao', 'IDCliente'], 'required'],
            [['IDPlanoTreino', 'IDPlanoNutricao', 'IDCliente'], 'integer'],
            [['IDCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['IDCliente' => 'IDCliente']],
            [['IDPlanoTreino'], 'exist', 'skipOnError' => true, 'targetClass' => PlanosTreino::className(), 'targetAttribute' => ['IDPlanoTreino' => 'IDPlanoTreino']],
            [['IDPlanoNutricao'], 'exist', 'skipOnError' => true, 'targetClass' => PlanosNutricao::className(), 'targetAttribute' => ['IDPlanoNutricao' => 'IDPlanoNutricao']],
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
        return $this->hasOne(Cliente::className(), ['IDCliente' => 'IDCliente']);
    }

    /**
     * Gets query for [[IDPlanoTreino]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDPlanoTreino()
    {
        return $this->hasOne(PlanosTreino::className(), ['IDPlanoTreino' => 'IDPlanoTreino']);
    }

    /**
     * Gets query for [[IDPlanoNutricao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDPlanoNutricao()
    {
        return $this->hasOne(PlanosNutricao::className(), ['IDPlanoNutricao' => 'IDPlanoNutricao']);
    }
}
