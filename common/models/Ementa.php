<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ementa".
 *
 * @property int $IDEmenta
 * @property string $nomeEmenta
 * @property string|null $PequenoAlmoco
 * @property string|null $Almoco
 * @property string|null $Lanche1
 * @property string|null $Lanche2
 * @property string|null $Jantar
 *
 * @property Planosnutricao[] $planosnutricaos
 * @property Planosnutricao[] $planosnutricaos0
 * @property Planosnutricao[] $planosnutricaos1
 * @property Planosnutricao[] $planosnutricaos2
 * @property Planosnutricao[] $planosnutricaos3
 * @property Planosnutricao[] $planosnutricaos4
 */
class Ementa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ementa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomeEmenta'], 'required'],
            [['nomeEmenta'], 'string', 'max' => 50],
            [['PequenoAlmoco', 'Almoco', 'Lanche1', 'Lanche2', 'Jantar'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDEmenta' => 'Id Ementa',
            'nomeEmenta' => 'Nome Ementa',
            'PequenoAlmoco' => 'Pequeno Almoco',
            'Almoco' => 'Almoco',
            'Lanche1' => 'Lanche1',
            'Lanche2' => 'Lanche2',
            'Jantar' => 'Jantar',
        ];
    }

    /**
     * Gets query for [[Planosnutricaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanosnutricaos()
    {
        return $this->hasMany(Planosnutricao::className(), ['Segunda' => 'IDEmenta']);
    }

    /**
     * Gets query for [[Planosnutricaos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanosnutricaos0()
    {
        return $this->hasMany(Planosnutricao::className(), ['Terca' => 'IDEmenta']);
    }

    /**
     * Gets query for [[Planosnutricaos1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanosnutricaos1()
    {
        return $this->hasMany(Planosnutricao::className(), ['Quarta' => 'IDEmenta']);
    }

    /**
     * Gets query for [[Planosnutricaos2]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanosnutricaos2()
    {
        return $this->hasMany(Planosnutricao::className(), ['Quinta' => 'IDEmenta']);
    }

    /**
     * Gets query for [[Planosnutricaos3]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanosnutricaos3()
    {
        return $this->hasMany(Planosnutricao::className(), ['Sexta' => 'IDEmenta']);
    }

    /**
     * Gets query for [[Planosnutricaos4]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanosnutricaos4()
    {
        return $this->hasMany(Planosnutricao::className(), ['Sabado' => 'IDEmenta']);
    }
}
