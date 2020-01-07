<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PembayaranKhusus;

/**
 * PembayaranKhususSearch represents the model behind the search form of `app\models\PembayaranKhusus`.
 */
class PembayaranKhususSearch extends PembayaranKhusus
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pembayaran_khusus', 'id_pesanan_khusus', 'jumlah_transfer'], 'integer'],
            [['bukti_transfer', 'status', 'createdAt', 'updatedAt'], 'safe'],
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
        $query = PembayaranKhusus::find();

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
            'id_pembayaran_khusus' => $this->id_pembayaran_khusus,
            'id_pesanan_khusus' => $this->id_pesanan_khusus,
            'jumlah_transfer' => $this->jumlah_transfer,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ]);

        $query->andFilterWhere(['like', 'bukti_transfer', $this->bukti_transfer])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
