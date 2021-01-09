<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "planostreino".
 *
 * @property int $IDPlanoTreino
 * @property int $id_PT
 * @property string $dia_treino
 * @property string $semana
 */
class PlanosTreino extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'planostreino';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_PT', 'dia_treino', 'semana'], 'required'],
            [['id_PT'], 'integer'],
            [['dia_treino'], 'safe'],
            [['semana'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDPlanoTreino' => 'Id Plano Treino',
            'id_PT' => 'Id Pt',
            'dia_treino' => 'Dia Treino',
            'semana' => 'Semana',
        ];
    }
}
