<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_detail_keranjang".
 *
 * @property int $id_detail_keranjang
 * @property int $id_keranjang
 * @property int $id_produk
 * @property int $jumlah
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property Keranjang $keranjang
 * @property Produk $produk
 */
class DetailKeranjang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_detail_keranjang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_keranjang', 'id_produk', 'jumlah'], 'required'],
            [['id_keranjang', 'id_produk', 'jumlah'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['id_keranjang'], 'exist', 'skipOnError' => true, 'targetClass' => Keranjang::className(), 'targetAttribute' => ['id_keranjang' => 'id_keranjang']],
            [['id_produk'], 'exist', 'skipOnError' => true, 'targetClass' => Produk::className(), 'targetAttribute' => ['id_produk' => 'id_produk']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_detail_keranjang' => 'Id Detail Keranjang',
            'id_keranjang' => 'Id Keranjang',
            'id_produk' => 'Id Produk',
            'jumlah' => 'Jumlah',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeranjang()
    {
        return $this->hasOne(Keranjang::className(), ['id_keranjang' => 'id_keranjang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduk()
    {
        return $this->hasOne(Produk::className(), ['id_produk' => 'id_produk']);
    }
}
