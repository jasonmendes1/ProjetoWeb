<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Subscricao;

/**
 * SubscricaoSearch represents the model behind the search form of `app\models\Subscricao`.
 */
class SubscricaoSearch extends Subscricao
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDSubscricao', 'id_cliente', 'id_desconto', 'id_tipo'], 'integer'],
            [['preco', 'total'], 'number'],
            [['data_subscricao', 'data_expirar'], 'safe'],
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
        $query = Subscricao::find();

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
            'IDSubscricao' => $this->IDSubscricao,
            'preco' => $this->preco,
            'id_cliente' => $this->id_cliente,
            'id_desconto' => $this->id_desconto,
            'id_tipo' => $this->id_tipo,
            'data_subscricao' => $this->data_subscricao,
            'data_expirar' => $this->data_expirar,
            'total' => $this->total,
        ]);

        return $dataProvider;
    }
}
