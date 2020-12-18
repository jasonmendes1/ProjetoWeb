<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cargo".
 *
 * @property int $IDCargo
 * @property string $cargo
 *
 * @property Funcionario[] $funcionarios
 */
class Cargo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cargo'], 'required'],
            [['cargo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDCargo' => 'Id Cargo',
            'cargo' => 'Cargo',
        ];
    }

    /**
     * Gets query for [[Funcionarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarios()
    {
        return $this->hasMany(Funcionario::className(), ['cargo_id' => 'IDCargo']);
    }
}
