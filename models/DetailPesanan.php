<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_detail_pesanan".
 *
 * @property int $id_detail_pesanan
 * @property int $id_pesanan
 * @property int $id_produk
 * @property int $jumlah
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property Pesanan $pesanan
 * @property Produk $produk
 */
class DetailPesanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_detail_pesanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pesanan', 'id_produk', 'jumlah'], 'required'],
            [['id_pesanan', 'id_produk', 'jumlah'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['id_pesanan'], 'exist', 'skipOnError' => true, 'targetClass' => Pesanan::className(), 'targetAttribute' => ['id_pesanan' => 'id_pesanan']],
            [['id_produk'], 'exist', 'skipOnError' => true, 'targetClass' => Produk::className(), 'targetAttribute' => ['id_produk' => 'id_produk']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_detail_pesanan' => 'Id Detail Pesanan',
            'id_pesanan' => 'Id Pesanan',
            'id_produk' => 'Id Produk',
            'jumlah' => 'Jumlah',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesanan()
    {
        return $this->hasOne(Pesanan::className(), ['id_pesanan' => 'id_pesanan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduk()
    {
        return $this->hasOne(Produk::className(), ['id_produk' => 'id_produk']);
    }
}
