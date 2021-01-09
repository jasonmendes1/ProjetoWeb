<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "planosnutricao".
 *
 * @property int $IDPlanoNutricao
 * @property int|null $Segunda
 * @property int|null $Terca
 * @property int|null $Quarta
 * @property int|null $Quinta
 * @property int|null $Sexta
 * @property int|null $Sabado
 * @property int $IDNutricionista
 */
class PlanosNutricao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'planosnutricao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Segunda', 'Terca', 'Quarta', 'Quinta', 'Sexta', 'Sabado', 'IDNutricionista'], 'integer'],
            [['IDNutricionista'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDPlanoNutricao' => 'Id Plano Nutricao',
            'Segunda' => 'Segunda',
            'Terca' => 'Terca',
            'Quarta' => 'Quarta',
            'Quinta' => 'Quinta',
            'Sexta' => 'Sexta',
            'Sabado' => 'Sabado',
            'IDNutricionista' => 'Id Nutricionista',
        ];
    }
}
