<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Ementa;

/**
 * EmentaSearch represents the model behind the search form of `frontend\models\Ementa`.
 */
class EmentaSearch extends Ementa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDEmenta'], 'integer'],
            [['nomeEmenta', 'PequenoAlmoco', 'Almoco', 'Lanche1', 'Lanche2', 'Jantar'], 'safe'],
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
        $query = Ementa::find();

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
            'IDEmenta' => $this->IDEmenta,
        ]);

        $query->andFilterWhere(['like', 'nomeEmenta', $this->nomeEmenta])
            ->andFilterWhere(['like', 'PequenoAlmoco', $this->PequenoAlmoco])
            ->andFilterWhere(['like', 'Almoco', $this->Almoco])
            ->andFilterWhere(['like', 'Lanche1', $this->Lanche1])
            ->andFilterWhere(['like', 'Lanche2', $this->Lanche2])
            ->andFilterWhere(['like', 'Jantar', $this->Jantar]);

        return $dataProvider;
    }
}
