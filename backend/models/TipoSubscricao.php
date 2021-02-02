<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipo_subscricao".
 *
 * @property int $IDTipoSubscricao
 * @property string $tipo
 * @property int $valor
 *
 * @property Subscricao[] $subscricaos
 */
class TipoSubscricao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_subscricao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo', 'valor'], 'required'],
            [['valor'], 'integer'],
            [['tipo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDTipoSubscricao' => 'Id Tipo Subscricao',
            'tipo' => 'Tipo',
            'valor' => 'Valor',
        ];
    }

    /**
     * Gets query for [[Subscricaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubscricaos()
    {
        return $this->hasMany(Subscricao::className(), ['id_tipo' => 'IDTipoSubscricao']);
    }
}
