<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetailKeranjang;

/**
 * DetailKeranjangSearch represents the model behind the search form of `app\models\DetailKeranjang`.
 */
class DetailKeranjangSearch extends DetailKeranjang
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_detail_keranjang', 'id_keranjang', 'id_produk', 'jumlah'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
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
        $query = DetailKeranjang::find();

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
            'id_detail_keranjang' => $this->id_detail_keranjang,
            'id_keranjang' => $this->id_keranjang,
            'id_produk' => $this->id_produk,
            'jumlah' => $this->jumlah,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ]);

        return $dataProvider;
    }
}
