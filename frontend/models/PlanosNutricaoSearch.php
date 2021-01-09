<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Planosnutricao;

/**
 * PlanosnutricaoSearch represents the model behind the search form of `frontend\models\Planosnutricao`.
 */
class PlanosnutricaoSearch extends Planosnutricao
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDPlanoNutricao', 'Segunda', 'Terca', 'Quarta', 'Quinta', 'Sexta', 'Sabado', 'IDNutricionista'], 'integer'],
            [['Semana'], 'safe'],
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
        $query = Planosnutricao::find();

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
            'IDPlanoNutricao' => $this->IDPlanoNutricao,
            'Segunda' => $this->Segunda,
            'Terca' => $this->Terca,
            'Quarta' => $this->Quarta,
            'Quinta' => $this->Quinta,
            'Sexta' => $this->Sexta,
            'Sabado' => $this->Sabado,
            'IDNutricionista' => $this->IDNutricionista,
        ]);

        $query->andFilterWhere(['like', 'Semana', $this->Semana]);

        return $dataProvider;
    }
}
