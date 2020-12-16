<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PlanosTreino;

/**
 * PlanosTreinoSearch represents the model behind the search form of `app\models\PlanosTreino`.
 */
class PlanosTreinoSearch extends PlanosTreino
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDPlanoTreino', 'repeticoes', 'serie', 'num_maquina', 'id_PT'], 'integer'],
            [['nome_exercicio', 'tempo', 'repouso', 'tempo_total'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PlanosTreino::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'IDPlanoTreino' => $this->IDPlanoTreino,
            'repeticoes' => $this->repeticoes,
            'tempo' => $this->tempo,
            'serie' => $this->serie,
            'repouso' => $this->repouso,
            'tempo_total' => $this->tempo_total,
            'num_maquina' => $this->num_maquina,
            'id_PT' => $this->id_PT,
        ]);

        $query->andFilterWhere(['like', 'nome_exercicio', $this->nome_exercicio]);

        return $dataProvider;
    }
}
