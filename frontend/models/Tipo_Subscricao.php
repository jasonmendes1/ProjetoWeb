<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_subscricao".
 *
 * @property int $IDTipoSubscricao
 * @property string $tipo
 *
 * @property Subscricao[] $subscricaos
 */
class Tipo_Subscricao extends \yii\db\ActiveRecord
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
            [['tipo'], 'required'],
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
