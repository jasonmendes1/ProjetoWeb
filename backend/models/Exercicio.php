<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "exercicio".
 *
 * @property int $IDExer
 * @property int $IDPlanoTreino
 * @property string $nome
 * @property string $repeticoes
 * @property int $tempo
 * @property string $serie
 * @property int $repouso
 * @property int $tempo_total
 * @property string|null $num_maquina
 *
 * @property Planostreino $iDPlanoTreino
 */
class Exercicio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exercicio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDPlanoTreino', 'nome', 'repeticoes', 'tempo', 'serie', 'repouso', 'tempo_total'], 'required'],
            [['IDPlanoTreino', 'tempo', 'repouso', 'tempo_total'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['repeticoes', 'serie', 'num_maquina'], 'string', 'max' => 10],
            [['IDPlanoTreino'], 'exist', 'skipOnError' => true, 'targetClass' => Planostreino::className(), 'targetAttribute' => ['IDPlanoTreino' => 'IDPlanoTreino']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDExer' => 'Id Exer',
            'IDPlanoTreino' => 'Id Plano Treino',
            'nome' => 'Nome',
            'repeticoes' => 'Repeticoes',
            'tempo' => 'Tempo',
            'serie' => 'Serie',
            'repouso' => 'Repouso',
            'tempo_total' => 'Tempo Total',
            'num_maquina' => 'Num Maquina',
        ];
    }

    /**
     * Gets query for [[IDPlanoTreino]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDPlanoTreino()
    {
        return $this->hasOne(Planostreino::className(), ['IDPlanoTreino' => 'IDPlanoTreino']);
    }
}
