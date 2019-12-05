<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pesanan;

/**
 * PesananSearch represents the model behind the search form of `app\models\Pesanan`.
 */
class PesananSearch extends Pesanan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pesanan', 'id_konsumen'], 'integer'],
            [['tanggal_pesanan', 'status'], 'safe'],
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
        $query = Pesanan::find();

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
            'id_pesanan' => $this->id_pesanan,
            'id_konsumen' => $this->id_konsumen,
            'tanggal_pesanan' => $this->tanggal_pesanan,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
