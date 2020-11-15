<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PlanoNutricao;

/**
 * PlanoNutricaoSearch represents the model behind the search form of `app\models\PlanoNutricao`.
 */
class PlanoNutricaoSearch extends PlanoNutricao
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDPlanoNutricao', 'Segunda', 'Terca', 'Quarta', 'Quinta', 'Sexta', 'Sabado', 'IDNutricionista'], 'integer'],
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
        $query = PlanoNutricao::find();

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

        return $dataProvider;
    }
}
