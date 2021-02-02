<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PlanosTreino;

/**
 * PlanosTreinoSearch represents the model behind the search form of `backend\models\PlanosTreino`.
 */
class PlanosTreinoSearch extends PlanosTreino
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDPlanoTreino', 'id_PT'], 'integer'],
            [['dia_treino', 'semana'], 'safe'],
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
            'id_PT' => $this->id_PT,
            'dia_treino' => $this->dia_treino,
        ]);

        $query->andFilterWhere(['like', 'semana', $this->semana]);

        return $dataProvider;
    }
}
