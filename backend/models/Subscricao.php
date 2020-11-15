<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subscricao".
 *
 * @property int $IDSubscricao
 * @property float $preco
 * @property int $id_cliente
 * @property int $id_desconto
 * @property int $id_tipo
 * @property string $data_subscricao
 * @property string $data_expirar
 *
 * @property Cliente $cliente
 * @property Desconto $desconto
 * @property TipoSubscricao $tipo
 */
class Subscricao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscricao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['preco', 'id_cliente', 'id_desconto', 'id_tipo', 'data_subscricao', 'data_expirar'], 'required'],
            [['preco'], 'number'],
            [['id_cliente', 'id_desconto', 'id_tipo'], 'integer'],
            [['data_subscricao', 'data_expirar'], 'safe'],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_cliente' => 'IDCliente']],
            [['id_desconto'], 'exist', 'skipOnError' => true, 'targetClass' => Desconto::className(), 'targetAttribute' => ['id_desconto' => 'IDDesconto']],
            [['id_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo_Subscricao::className(), 'targetAttribute' => ['id_tipo' => 'IDTipoSubscricao']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDSubscricao' => 'Id Subscricao',
            'preco' => 'Preco',
            'id_cliente' => 'Id Cliente',
            'id_desconto' => 'Id Desconto',
            'id_tipo' => 'Id Tipo',
            'data_subscricao' => 'Data Subscricao',
            'data_expirar' => 'Data Expirar',
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
     * Gets query for [[Desconto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDesconto()
    {
        return $this->hasOne(Desconto::className(), ['IDDesconto' => 'id_desconto']);
    }

    /**
     * Gets query for [[Tipo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(Tipo_Subscricao::className(), ['IDTipoSubscricao' => 'id_tipo']);
    }
}
