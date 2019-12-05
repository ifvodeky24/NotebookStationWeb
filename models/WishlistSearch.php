<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Wishlist;

/**
 * WishlistSearch represents the model behind the search form of `app\models\Wishlist`.
 */
class WishlistSearch extends Wishlist
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_wishlist', 'id_konsumen', 'id_produk'], 'integer'],
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
        $query = Wishlist::find();

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
            'id_wishlist' => $this->id_wishlist,
            'id_konsumen' => $this->id_konsumen,
            'id_produk' => $this->id_produk,
        ]);

        return $dataProvider;
    }
}
