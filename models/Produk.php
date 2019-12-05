<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_produk".
 *
 * @property int $id_produk
 * @property string $nama_produk
 * @property string $merk_produk
 * @property int $harga
 * @property string $deskripsi
 * @property string $kondisi
 * @property int $stok
 * @property string $foto_1
 * @property string $foto_2
 * @property string $foto_3
 * @property string $foto_4
 * @property int $id_user
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property DetailKeranjang[] $detailKeranjangs
 * @property DetailPesanan[] $detailPesanans
 * @property User $user
 * @property Wishlist[] $wishlists
 */
class Produk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_produk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_produk', 'merk_produk', 'harga', 'deskripsi', 'kondisi', 'stok', 'foto_1', 'foto_2', 'foto_3', 'foto_4', 'id_user'], 'required'],
            [['harga', 'stok', 'id_user'], 'integer'],
            [['kondisi'], 'string'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['nama_produk', 'merk_produk', 'foto_1', 'foto_2', 'foto_3', 'foto_4'], 'string', 'max' => 50],
            [['deskripsi'], 'string', 'max' => 100],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_produk' => 'Id Produk',
            'nama_produk' => 'Nama Produk',
            'merk_produk' => 'Merk Produk',
            'harga' => 'Harga',
            'deskripsi' => 'Deskripsi',
            'kondisi' => 'Kondisi',
            'stok' => 'Stok',
            'foto_1' => 'Foto 1',
            'foto_2' => 'Foto 2',
            'foto_3' => 'Foto 3',
            'foto_4' => 'Foto 4',
            'id_user' => 'Id User',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailKeranjang()
    {
        return $this->hasMany(DetailKeranjang::className(), ['id_produk' => 'id_produk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPesanan()
    {
        return $this->hasMany(DetailPesanan::className(), ['id_produk' => 'id_produk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWishlist()
    {
        return $this->hasMany(Wishlist::className(), ['id_produk' => 'id_produk']);
    }
}
