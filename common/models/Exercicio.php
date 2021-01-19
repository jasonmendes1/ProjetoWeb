<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "exercicio".
 *
 * @property int $IDExer
 * @property int $IDPlanoTreino
 * @property string $nome
 * @property int $repeticoes
 * @property int $tempo
 * @property string $serie
 * @property int $repouso
 * @property int $tempo_total
 * @property string|null $num_maquina
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
            [['IDPlanoTreino', 'repeticoes', 'tempo', 'repouso', 'tempo_total'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['serie', 'num_maquina'], 'string', 'max' => 10],
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
}
