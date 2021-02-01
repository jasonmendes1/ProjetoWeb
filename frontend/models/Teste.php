<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "teste".
 *
 * @property int $id
 * @property string $nome
 * @property int $quantidade
 */
class Teste extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teste';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'quantidade'], 'required'],
            [['quantidade'], 'integer'],
            [['nome'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'quantidade' => 'Quantidade',
        ];
    }
}
