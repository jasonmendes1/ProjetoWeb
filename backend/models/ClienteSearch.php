<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cliente;

/**
 * ClienteSearch represents the model behind the search form of `app\models\Cliente`.
 */
class ClienteSearch extends Cliente
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_id', 'IDCliente', 'num_tele', 'nif', 'massa_muscular', 'massa_gorda'], 'integer'],
            [['primeiroNome', 'apelido', 'dt_nascimento', 'sexo', 'avatar'], 'safe'],
            [['altura', 'peso'], 'number'],
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
        $query = Cliente::find();

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
            'User_id' => $this->User_id,
            'IDCliente' => $this->IDCliente,
            'dt_nascimento' => $this->dt_nascimento,
            'num_tele' => $this->num_tele,
            'nif' => $this->nif,
            'altura' => $this->altura,
            'peso' => $this->peso,
            'massa_muscular' => $this->massa_muscular,
            'massa_gorda' => $this->massa_gorda,
        ]);

        $query->andFilterWhere(['like', 'primeiroNome', $this->primeiroNome])
            ->andFilterWhere(['like', 'apelido', $this->apelido])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'avatar', $this->avatar]);

        return $dataProvider;
    }
}
