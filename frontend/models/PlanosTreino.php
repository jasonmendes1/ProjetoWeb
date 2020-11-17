<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "planos_treino".
 *
 * @property int $IDPlanoTreino
 * @property string $nome_exercicio
 * @property int|null $repeticoes
 * @property string|null $tempo
 * @property int $serie
 * @property string $repouso
 * @property string $tempo_total
 * @property int|null $num_maquina
 * @property int $id_cliente
 *
 * @property ListaPlanos[] $listaPlanos
 * @property Cliente $cliente
 */
class PlanosTreino extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'planos_treino';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome_exercicio', 'serie', 'repouso', 'tempo_total', 'id_cliente'], 'required'],
            [['repeticoes', 'serie', 'num_maquina', 'id_cliente'], 'integer'],
            [['tempo', 'repouso', 'tempo_total'], 'safe'],
            [['nome_exercicio'], 'string', 'max' => 255],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_cliente' => 'IDCliente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDPlanoTreino' => 'Id Plano Treino',
            'nome_exercicio' => 'Nome Exercicio',
            'repeticoes' => 'Repeticoes',
            'tempo' => 'Tempo',
            'serie' => 'Serie',
            'repouso' => 'Repouso',
            'tempo_total' => 'Tempo Total',
            'num_maquina' => 'Num Maquina',
            'id_cliente' => 'Id Cliente',
        ];
    }

    /**
     * Gets query for [[ListaPlanos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getListaPlanos()
    {
        return $this->hasMany(ListaPlanos::className(), ['IDPlano' => 'IDPlanoTreino']);
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['IDCliente' => 'id_cliente']);
    }
}
