<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_konsumen".
 *
 * @property int $id_konsumen
 * @property string $username
 * @property string $nama_lengkap
 * @property string $email
 * @property string $password
 * @property string $nomor_hp
 * @property string $alamat
 * @property string $foto
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property Keranjang[] $keranjang
 * @property Pesanan[] $pesanan
 * @property Wishlist[] $wishlist
 */
class Konsumen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_konsumen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'nama_lengkap', 'email', 'password', 'nomor_hp', 'alamat', 'foto'], 'required'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['username', 'nama_lengkap', 'email', 'nomor_hp', 'alamat', 'foto'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_konsumen' => 'Id Konsumen',
            'username' => 'Username',
            'nama_lengkap' => 'Nama Lengkap',
            'email' => 'Email',
            'password' => 'Password',
            'nomor_hp' => 'Nomor Hp',
            'alamat' => 'Alamat',
            'foto' => 'Foto',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeranjang()
    {
        return $this->hasMany(Keranjang::className(), ['id_konsumen' => 'id_konsumen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesanan()
    {
        return $this->hasMany(Pesanan::className(), ['id_konsumen' => 'id_konsumen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWishlist()
    {
        return $this->hasMany(Wishlist::className(), ['id_konsumen' => 'id_konsumen']);
    }

}
