<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "imoveis".
 *
 * @property int $ID
 * @property int $metrosquadrados
 * @property string $localidade
 */
class Imoveis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'imoveis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['metrosquadrados', 'localidade'], 'required'],
            [['metrosquadrados'], 'integer'],
            [['localidade'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'metrosquadrados' => 'Metrosquadrados',
            'localidade' => 'Localidade',
        ];
    }
}
