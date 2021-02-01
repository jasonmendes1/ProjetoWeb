<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "imoveis".
 *
 * @property int $id
 * @property int $metrosQuadrados
 * @property string $localidade
 */
class Imovel extends \yii\db\ActiveRecord
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
            [['metrosQuadrados', 'localidade'], 'required'],
            [['metrosQuadrados'], 'integer'],
            [['localidade'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'metrosQuadrados' => 'Metros Quadrados',
            'localidade' => 'Localidade',
        ];
    }
}
