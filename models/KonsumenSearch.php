<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Konsumen;

/**
 * KonsumenSearch represents the model behind the search form of `app\models\Konsumen`.
 */
class KonsumenSearch extends Konsumen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_konsumen', 'password', 'nomor_hp'], 'integer'],
            [['username', 'nama_lengkap', 'email', 'alamat', 'foto'], 'safe'],
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
        $query = Konsumen::find();

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
            'id_konsumen' => $this->id_konsumen,
            'password' => $this->password,
            'nomor_hp' => $this->nomor_hp,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
