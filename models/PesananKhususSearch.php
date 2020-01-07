<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PesananKhusus;

/**
 * PesananKhususSearch represents the model behind the search form of `app\models\PesananKhusus`.
 */
class PesananKhususSearch extends PesananKhusus
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pesanan_khusus', 'id_produk', 'jumlah', 'total_tagihan'], 'integer'],
            [['kode_pesanan', 'tanggal_pesanan', 'alamat_lengkap', 'status', 'catatan_opsional', 'createdAt', 'updatedAt'], 'safe'],
            [['latitude', 'longitude'], 'number'],
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
        $query = PesananKhusus::find();

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
            'id_pesanan_khusus' => $this->id_pesanan_khusus,
            'id_produk' => $this->id_produk,
            'tanggal_pesanan' => $this->tanggal_pesanan,
            'jumlah' => $this->jumlah,
            'total_tagihan' => $this->total_tagihan,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ]);

        $query->andFilterWhere(['like', 'kode_pesanan', $this->kode_pesanan])
            ->andFilterWhere(['like', 'alamat_lengkap', $this->alamat_lengkap])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'catatan_opsional', $this->catatan_opsional]);

        return $dataProvider;
    }
}
