<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "planostreino".
 *
 * @property int $IDPlanoTreino
 * @property int $id_PT
 * @property string $dia_treino
 * @property string $semana
 *
 * @property Exercicio[] $exercicios
 * @property ListaPlanos[] $listaPlanos
 * @property Funcionario $pT
 */
class Planotreino extends \yii\db\ActiveRecord
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
            [['id_PT'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['id_PT' => 'IDFuncionario']],
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

    /**
     * Gets query for [[ListaPlanos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getListaPlanos()
    {
        return $this->hasMany(ListaPlanos::className(), ['IDPlanoTreino' => 'IDPlanoTreino']);
    }

    /**
     * Gets query for [[PT]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPT()
    {
        return $this->hasOne(Funcionario::className(), ['IDFuncionario' => 'id_PT']);
    }

    public function getExercicios()
    {
        return $this->hasMany(Exercicio::className(), ['IDPlanoTreino' => 'IDPlanoTreino']);
    }

}
