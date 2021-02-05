<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "lista_planos".
 *
 * @property int $id_lista
 * @property int|null $IDPlanoTreino
 * @property int|null $IDPlanoNutricao
 * @property int $IDCliente
 *
 * @property Cliente $iDCliente
 * @property Planosnutricao $iDPlanoNutricao
 * @property Planostreino $iDPlanoTreino
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
            [['IDPlanoNutricao'], 'exist', 'skipOnError' => true, 'targetClass' => Planosnutricao::className(), 'targetAttribute' => ['IDPlanoNutricao' => 'IDPlanoNutricao']],
            [['IDPlanoTreino'], 'exist', 'skipOnError' => true, 'targetClass' => Planostreino::className(), 'targetAttribute' => ['IDPlanoTreino' => 'IDPlanoTreino']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_lista' => 'Id Lista',
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

    /**
     * Gets query for [[IDPlanoNutricao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDPlanoNutricao()
    {
        return $this->hasOne(Planosnutricao::className(), ['IDPlanoNutricao' => 'IDPlanoNutricao']);
    }

    /**
     * Gets query for [[IDPlanoTreino]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDPlanoTreino()
    {
        return $this->hasOne(Planostreino::className(), ['IDPlanoTreino' => 'IDPlanoTreino']);
    }
}
