<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ementa".
 *
 * @property int $IDEmenta
 * @property string|null $PequenoAlmoco
 * @property string|null $Almoco
 * @property string|null $Lanche1
 * @property string|null $Lanche2
 * @property string|null $Jantar
 *
 * @property Planonutricao[] $planonutricaos
 * @property Planonutricao[] $planonutricaos0
 * @property Planonutricao[] $planonutricaos1
 * @property Planonutricao[] $planonutricaos2
 * @property Planonutricao[] $planonutricaos3
 * @property Planonutricao[] $planonutricaos4
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
            'PequenoAlmoco' => 'Pequeno Almoco',
            'Almoco' => 'Almoco',
            'Lanche1' => 'Lanche1',
            'Lanche2' => 'Lanche2',
            'Jantar' => 'Jantar',
        ];
    }

    /**
     * Gets query for [[Planonutricaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanonutricaos()
    {
        return $this->hasMany(Planonutricao::className(), ['Segunda' => 'IDEmenta']);
    }

    /**
     * Gets query for [[Planonutricaos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanonutricaos0()
    {
        return $this->hasMany(Planonutricao::className(), ['Terca' => 'IDEmenta']);
    }

    /**
     * Gets query for [[Planonutricaos1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanonutricaos1()
    {
        return $this->hasMany(Planonutricao::className(), ['Quarta' => 'IDEmenta']);
    }

    /**
     * Gets query for [[Planonutricaos2]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanonutricaos2()
    {
        return $this->hasMany(Planonutricao::className(), ['Quinta' => 'IDEmenta']);
    }

    /**
     * Gets query for [[Planonutricaos3]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanonutricaos3()
    {
        return $this->hasMany(Planonutricao::className(), ['Sexta' => 'IDEmenta']);
    }

    /**
     * Gets query for [[Planonutricaos4]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanonutricaos4()
    {
        return $this->hasMany(Planonutricao::className(), ['Sabado' => 'IDEmenta']);
    }
}
