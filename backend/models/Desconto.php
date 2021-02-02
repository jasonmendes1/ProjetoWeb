<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "desconto".
 *
 * @property int $IDDesconto
 * @property float $quantidade
 * @property string $nome
 *
 * @property Subscricao[] $subscricaos
 */
class Desconto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'desconto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantidade', 'nome'], 'required'],
            [['quantidade'], 'number'],
            [['nome'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDDesconto' => 'Id Desconto',
            'quantidade' => 'Quantidade',
            'nome' => 'Nome',
        ];
    }

    /**
     * Gets query for [[Subscricaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubscricaos()
    {
        return $this->hasMany(Subscricao::className(), ['id_desconto' => 'IDDesconto']);
    }
}
