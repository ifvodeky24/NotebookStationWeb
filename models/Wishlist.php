<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_wishlist".
 *
 * @property int $id_wishlist
 * @property int $id_konsumen
 * @property int $id_produk
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property Konsumen $konsumen
 * @property Produk $produk
 */
class Wishlist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_wishlist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_konsumen', 'id_produk'], 'required'],
            [['id_konsumen', 'id_produk'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['id_konsumen'], 'exist', 'skipOnError' => true, 'targetClass' => Konsumen::className(), 'targetAttribute' => ['id_konsumen' => 'id_konsumen']],
            [['id_produk'], 'exist', 'skipOnError' => true, 'targetClass' => Produk::className(), 'targetAttribute' => ['id_produk' => 'id_produk']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_wishlist' => 'Id Wishlist',
            'id_konsumen' => 'Id Konsumen',
            'id_produk' => 'Id Produk',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKonsumen()
    {
        return $this->hasOne(Konsumen::className(), ['id_konsumen' => 'id_konsumen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduk()
    {
        return $this->hasOne(Produk::className(), ['id_produk' => 'id_produk']);
    }
}
